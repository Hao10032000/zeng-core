<?php

class TFLastest_Post_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-lastest-post';

    }

    

    public function get_title() {

        return esc_html__( 'TF Lastest Post', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-posts-carousel';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }

	protected function register_controls() {


            $this->start_controls_section( 

				'section_posts_query',

	            [

	                'label' => esc_html__('Query', 'themesflat-core'),

	            ]

	        );	

			 $this->add_control( 

	        	'style',

				[

					'label' => esc_html__( 'Style', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'style1',

					'options' => [

						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),

					],

				]

			);

			$this->add_control( 

				'posts_per_page',

	            [

	                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::NUMBER,

	                'default' => '4',

	            ]

	        );

	        $this->add_control( 

	        	'order_by',

				[

					'label' => esc_html__( 'Order By', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'date',

					'options' => [						

			            'date' => 'Date',

			            'ID' => 'Post ID',			            

			            'title' => 'Title',

					],

				]

			);



			$this->add_control( 

				'order',

				[

					'label' => esc_html__( 'Order', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'desc',

					'options' => [						

			            'desc' => 'Descending',

			            'asc' => 'Ascending',	

					],

				]

			);


            			$this->add_control( 

				'posts_categories',

				[

					'label' => esc_html__( 'Categories', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT2,

					'options' => ThemesFlat_Addon_For_Elementor_drozy::tf_get_taxonomies(),

					'label_block' => true,

	                'multiple' => true,

				]

			);



			$this->add_control( 

				'exclude',

				[

					'label' => esc_html__( 'Exclude', 'themesflat-core' ),

					'type'	=> \Elementor\Controls_Manager::TEXT,	

					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),

					'default' => '',

					'label_block' => true,				

				]

			);

						$this->add_group_control( 

				\Elementor\Group_Control_Image_Size::get_type(),

				[

					'name' => 'thumbnail',

					'default' => 'full',

				]

			);


            			$this->add_control( 

				'show_meta',

				[

					'label' => esc_html__( 'Show Meta', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

            $this->add_control( 

				'show_category',

				[

					'label' => esc_html__( 'Show Category', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

			$this->add_control( 

				'show_reading',

				[

					'label' => esc_html__( 'Show Reading Time', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

            $this->add_control(

				'heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Latest Posts', 'themesflat-core' ),

					'label_block' => true,

				]

			);	

	        

			$this->end_controls_section();

        // /.End List Setting  

         $this->start_controls_section( 
			'section_form',
	        [
	            'label' => esc_html__('Content Form Subscribe', 'themesflat-core'),
                	'condition' => [
						'style' => 'style2'
					],
	        ]
	    );

        $this->add_control( 
			'show_form',
			[
				'label' => esc_html__( 'Show Form', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(

				'heading_form',

				[

					'label' => esc_html__( 'Heading Form', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Subscribe now to stay updated with top news!', 'themesflat-core' ),

					'label_block' => true,

				]

			);

            $this->add_control(

				'subscribe_form',

				[

					'label' => esc_html__( 'Shortcode Mailchimp Form', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXTAREA,					

					'label_block' => true,

				]

			);

		$this->end_controls_section();

        // Start Style
	    $this->start_controls_section( 'section_style',
	        [
	            'label' => esc_html__( 'Style', 'themesflat-core' ),
	            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	        ]
	    );	

        $this->add_control(

				'h_heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .main-title',

				]

			); 

			$this->add_control( 

				'heading_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .main-title' => 'color: {{VALUE}}',					

					],

				]

			);

             $this->add_control(

				'h_title_post',

				[

					'label' => esc_html__( 'Title Post', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_title',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .title',

				]

			); 

			$this->add_control( 

				'title_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .title a' => 'color: {{VALUE}}',					

					],

				]

			);

            $this->add_control(

				'h_meta_post',

				[

					'label' => esc_html__( 'Meta Post', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_meta',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .meta-feature li',

				]

			); 

			$this->add_control( 

				'meta_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .meta-feature li, {{WRAPPER}} .meta-feature li span, {{WRAPPER}} .meta-feature li a' => 'color: {{VALUE}}',					

					],

				]

			);

            $this->add_control(

				'h_heading_form',

				[

					'label' => esc_html__( 'Heading Form', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',
					                   'condition' => [
		                'style' => 'style2',
		            ]

				]

			);

            $this->add_responsive_control(

				'content_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}}  .newsletter-item ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

			$this->add_control( 

				'content_color',

				[

					'label' => esc_html__( 'Background', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .newsletter-item' => 'background-color: {{VALUE}}',					

					],

				]

			);

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_heading_form',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .form-title',
					                   'condition' => [
		                'style' => 'style2',
		            ]

				]

			); 

			$this->add_control( 

				'heading_form_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .form-title' => 'color: {{VALUE}}',					

					],
					                   'condition' => [
		                'style' => 'style2',
		            ]

				]

			);



		$this->end_controls_section();


	}	



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display(); 

        if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'post',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );

        if (! empty( $settings['posts_categories'] )) {

        	$query_args['category_name'] = implode(',', $settings['posts_categories']);

        }        

        if ( ! empty( $settings['exclude'] ) ) {				

			if ( ! is_array( $settings['exclude'] ) )

				$exclude = explode( ',', $settings['exclude'] );



			$query_args['post__not_in'] = $exclude;

		}

		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];	

		

		$query = new WP_Query( $query_args );
        

        if ( $query->have_posts() ) : 
		$author_id = get_post_field('post_author', get_the_ID());
		?>

		<?php if ($settings['style'] == 'style1'): ?>

        
            <!-- section-latest-posts -->
            <div class="tf-container tf-spacing-1">
                <div class="heading-section mb_28">
                    <h3 class="main-title"><?php echo $settings['heading']; ?></h3>
                </div>
                <div class="tf-grid-layout lg-col-4 md-col-2">

            		<?php while ( $query->have_posts() ) : $query->the_post();
					    $get_id_post_thumbnail = get_post_thumbnail_id();
					    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
					    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
					?>

                        <div class="feature-post-item style-default style-border hover-image-translate ">
                        <div class="content mb_24">
                            
            			    <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                <ul class="meta-feature fw-7 d-flex  text-caption-2 text-uppercase mb_12">
                                    <li><?= esc_html( get_the_date() ); ?></li>
						            <li>
                                        <span class="text_secodary2-color">
						                    <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                        </span>
						                <?php
						                $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						                $author_name = get_user_full_name($author_id); 
						                ?>
						                <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
						            </li>
                                </ul>
            				<?php endif; ?>

                        <h5 class="title"> <a href="<?= esc_url( get_permalink() ); ?>" class="link line-clamp-2"><?= esc_html( get_the_title() ); ?></a></h5>


                        </div>
                        <div class="img-style">
                             <?= $featured_image; ?>
                   
                            <a href="<?= esc_url( get_permalink() ); ?>" class="overlay-link"></a>

                                <?php if ( $settings['show_category'] == 'yes' ): ?>
						    <?php 
						        $categories = get_the_category();
						        if ( ! empty( $categories ) ) :
						            foreach ( $categories as $category ) :
						                $category_link = esc_url( get_category_link( $category->term_id ) );
						                $category_name = esc_html( $category->name );
						                echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
						            endforeach;
						        endif;
						        ?>
            				<?php endif; ?>

                            <?php if ( $settings['show_reading'] == 'yes' ): ?>
						        <div class="tag time text-caption-2 text_white">
						            <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						        </div>
            				<?php endif; ?>

                        </div>

                        </div>

					<?php endwhile; ?>


                </div>
            </div>
            <!-- /End section-latest-posts -->

		<?php else: ?>

            <!-- section-latest-posts -->
            <div class="tf-container tf-spacing-1">
                <div class="heading-section mb_28">
                    <h3 class="main-title"><?php echo $settings['heading']; ?></h3>
                </div>
                <div class="tf-grid-layout xxl-col-4 sm-col-2">

                    <?php while ( $query->have_posts() ) : $query->the_post();
					    $get_id_post_thumbnail = get_post_thumbnail_id();
					    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
					    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
					?>

                    <div class="feature-post-item style-default hover-image-translate item-grid ">
                        <div class="img-style mb_24">
                            <?= $featured_image; ?>

                            <?php if ( $settings['show_category'] == 'yes' ): ?>
						        <?php 
						        $categories = get_the_category();
						        if ( ! empty( $categories ) ) :
						            foreach ( $categories as $category ) :
						                $category_link = esc_url( get_category_link( $category->term_id ) );
						                $category_name = esc_html( $category->name );
						                echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
						            endforeach;
						        endif;
						        ?>
            				<?php endif; ?>

                            <?php if ( $settings['show_reading'] == 'yes' ): ?>
						        <div class="tag time text-caption-2 text_white">
						            <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						        </div>
            				<?php endif; ?>

                            <a href="<?= esc_url( get_permalink() ); ?>" class="overlay-link"></a>

                        </div>
                        <div class="content">

                            <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                <ul class="meta-feature fw-7 d-flex  text-caption-2 text-uppercase mb_12">
                                    <li><?= esc_html( get_the_date() ); ?></li>
						            <li>
                                        <span class="text_secodary2-color">
						                    <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                        </span>
						                <?php
						                $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						                $author_name = get_user_full_name($author_id); 
						                ?>
						                <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
						            </li>
                                </ul>
            				<?php endif; ?>

                            <h5 class="title"> <a href="<?= esc_url( get_permalink() ); ?>" class="line-clamp-2 link"><?= esc_html( get_the_title() ); ?></a></h5>
                                
                        </div>
                    </div>

					<?php endwhile; ?>

                    <?php if ( $settings['show_form'] == 'yes' ): ?>
                        <div class="newsletter-item d-flex flex-column justify-content-between">
                            <h4 class="mb_20 form-title"><?php echo $settings['heading_form']; ?></h4>
                            <?php if (!empty($settings['subscribe_form'])) : ?>
                            	<div class="form widget-subscribe-section st2">
					        		<?php echo do_shortcode( $settings['subscribe_form'] ); ?>
                            	</div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
            <!-- /End section-latest-posts -->
        
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

		<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;	
	}



}