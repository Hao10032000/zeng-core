<?php
class Themesflat_Recent_Post extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Recent_Post
     */
    function __construct() {
        $this->defaults = array(
            'title' 	=> 'Recent News', 
            'category'  => '',
            'ids'  => '',
            'count' 	=> 4          
        );
        parent::__construct(
            'widget_recent_post',
            esc_html__( 'Themesflat - Recent News', 'themesflat' ),
            array(
                'classname'   => 'widget-recent-news',
                'description' => esc_html__( 'Recent News.', 'themesflat' )
            )
        );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );        
        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => intval($count)
        );
        if ( !empty( $category ) )
            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'terms'    => $category,
                ),
            );      
        if ($ids !=  '')       {
            $query_args['post__in'] = explode(",",$ids);
             $query_args['orderby'] = 'post__in';
        }
        global $wp_query;
$current_posts_ids = wp_list_pluck( $wp_query->posts, 'ID' );
$query_args['post__not_in'] = $current_posts_ids;
        $flat_post = new WP_Query( $query_args );
        $classes[] = 'recent-news wrap-post';
        echo wp_kses_post( $before_widget );
		if ( !empty($title) ) { echo wp_kses_post($before_title).esc_html($title).wp_kses_post($after_title); } ?>		
        <ul class="<?php echo esc_attr(implode(' ', $classes)) ;?> clearfix">  
		<?php if ( $flat_post->have_posts() ) : ?>
			<?php $count = 1; while ( $flat_post->have_posts() ) : $flat_post->the_post(); ?>
				<li class="feature-post-item style-default hover-image-translate">
                    <?php if ( $count == 1) : ?>
                    <div class="img-style mb_24">
                        <a href="<?php the_permalink(); ?>">
                            <?php 
                                the_post_thumbnail( 'themesflat-blog-style1' );
                            ?>
                        </a>
                                <?php

                $categories = get_the_category();

                if (!empty($categories)) {
                    echo '<span class="post-category">';
                    foreach ($categories as $category) {
                        $category_link = esc_url(get_category_link($category->term_id));
                        $category_name = esc_html($category->name);

                        echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
                    }
                    echo '</span>';
                }

                echo '<div class="tag time text-caption-2 text_white"><i class="icon-Timer"></i> ' . get_reading_time() . '</div>';
        ?>
                    </div>
                    <?php endif; ?>                       
                    <div class="content">     

                        <ul class="meta-feature fw-7 d-flex text-caption-2 text-uppercase mb_11">
                            <?php
                                echo '<li>';   
                                    echo get_the_date();
                                echo '</li>';
            echo '<li>';
                $author_id = get_post_field('post_author', get_the_ID());
                echo '<span class="text_secodary2-color">' . esc_html__( 'POST BY', 'drozy' ) . '</span>';
                printf(
                    ' <a class="link" href="%s" title="%s" rel="author" aria-label="author">%s</a>',
                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
                    esc_attr( sprintf( __( 'POST BY %s', 'drozy' ), get_user_full_name($author_id) )),
                    get_user_full_name($author_id)
                );
            echo '</li>';
                            ?>
                        </ul>

              
                        <?php the_title( sprintf( '<h6 class="title"><a href="%s" class="link" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>                        
                                                                   
                    </div><!-- /.text -->                        
			    </li>
			<?php $count++; endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php else : ?>  
            <?php printf( '<li>%s</li>',esc_html__('Oops, category not found.', 'themesflat' )); ?>
		<?php endif; ?>        
        </ul>		
		<?php echo wp_kses_post( $after_widget );
    }

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {
        $instance               = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['ids']      = ( $new_instance['ids'] );
        $instance['count']      =  intval($new_instance['count']);
        $instance['category']           = array_filter( $new_instance['category'] );        
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        if (empty($instance['category'])) {                    
            $instance['category'] = array("1");
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'themesflat' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]">
                <option value=""<?php selected( empty( $instance['category'] ) ); ?>><?php esc_html_e( 'All', 'themesflat' ); ?></option>
                <?php               
                $categories = get_categories();
                foreach ($categories as $category) {
                    printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', esc_attr($category->term_id), esc_attr($category->name), esc_attr($category->count), (in_array($category->term_id, $instance['category'] )) ? 'selected="selected"' : '');
                }               
                ?>
            </select>
        </p>
      <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"><?php esc_html_e( 'Get Post by IDS EX:1,2,3', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['ids'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Count:', 'themesflat' ); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" value="<?php echo esc_attr( $instance['count'] ); ?>">
        </p>
    <?php
    }
}

add_action( 'widgets_init', 'themesflat_register_recent_post' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_recent_post() {
    register_widget( 'Themesflat_Recent_Post' );
}