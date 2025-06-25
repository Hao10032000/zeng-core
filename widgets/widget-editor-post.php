<?php

class TFEditor_Post_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-editor-post';

    }

    

    public function get_title() {

        return esc_html__( 'TF Editor Posts', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-slides';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }


	protected function register_controls() {

		// Start Tab Setting        

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
						'style3' => esc_html__( 'Style 3', 'themesflat-core' ),

					],

				]

			);

			$this->add_control(
			    'posts_per_page',
			    [
			        'label' => esc_html__( 'Categories to Show', 'themesflat-core' ),
			        'type' => \Elementor\Controls_Manager::NUMBER,
			        'default' => 4,
			        'min' => 0,
			        'description' => esc_html__( 'Set to 0 to show all categories.', 'themesflat-core' ),
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

				'exclude',

				[

					'label' => esc_html__( 'Exclude', 'themesflat-core' ),

					'type'	=> \Elementor\Controls_Manager::TEXT,	

					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),

					'default' => '',

					'label_block' => true,				

				]

			);

				$this->add_control( 

					'sort_by_id',

					[

						'label' => esc_html__( 'Sort By ID', 'themesflat-core' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-core' ),

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

				'show_excerpt',

				[

					'label' => esc_html__( 'Show Excerpt', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);



			$this->add_control( 

				'excerpt_lenght',

				[

					'label' => esc_html__( 'Excerpt Length', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::NUMBER,

					'min' => 0,

					'max' => 500,

					'step' => 1,

					'default' => 20,

					'condition' => [
						'show_excerpt' => 'yes'
					],

				]

			);

                        $this->add_control( 

				'desc_limit',

	            [

	                'label' => esc_html__( 'Limit Length', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::NUMBER,

	                'default' => '2',

					'selectors' => [

						'{{WRAPPER}} .text-excerpt' => '-webkit-line-clamp: {{VALUE}};
    -webkit-box-orient: vertical;
    display: -webkit-box;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;',

					],
					'condition' => [
						'show_excerpt' => 'yes'
					],

	            ]

	        );

            $this->add_control( 

				'show_button',

				[

					'label' => esc_html__( 'Show Button', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

					'condition' => [
		                'style' => 'style1',
		            ]

				]

			);

            $this->add_control(

				'text_button',

				[

					'label' => esc_html__( 'Text Button', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Read More', 'themesflat-core' ),

					'label_block' => true,

                    'condition' => [
		                'show_button' => 'yes',
		                'style' => 'style1',
		            ]

				]

			);	

            $this->add_control(

				'heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Editor picks', 'themesflat-core' ),

					'label_block' => true,

				]

			);	

			$this->end_controls_section();

        // /.End Posts Query

        // Start General Style 
	    $this->start_controls_section( 
	    	'section_style_general',
	        [
	            'label' => esc_html__( 'General', 'themesflat-core' ),
	            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	        ]
	    );

		$this->add_control(

				'h_heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'heading_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .editor-heading',

				]

			);

            $this->add_control(

				'heading_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .editor-heading' => 'color: {{VALUE}}',

					],

				]

			);

        	$this->add_control(

				'h_title',

				[

					'label' => esc_html__( 'Title Featured Box', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'title_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .title-featured ',

				]

			);

            $this->add_control(

				'title_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .title-featured' => 'color: {{VALUE}}',

					],

				]

			);

			$this->add_control(

				'h_title_normal',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'title_normal_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .title-normal ',

				]

			);

            $this->add_control(

				'title_normal_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .title-normal' => 'color: {{VALUE}}',

					],

				]

			);

            
			$this->add_control(

				'h_desc',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'desc_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .text-excerpt ',

				]

			);

            $this->add_control(

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .text-excerpt' => 'color: {{VALUE}}',

					],

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

				if ( $settings['sort_by_id'] != '' ) {	

			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );

			$query_args['post__in'] = $sort_by_id;

			$query_args['orderby'] = 'post__in';

		}

		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];	

        $query = new WP_Query( $query_args );

        if ( $query->have_posts() ) : 
		$author_id = get_post_field('post_author', get_the_ID());
		?>

                <?php if ($settings['style'] == 'style1'): ?>

                <!-- section-editor-pick -->
                <div class="section-editor-pick">
                    <div class="tf-container">
                        <div class="heading-section mb_27">
                            <h3 class="editor-heading"><?php echo $settings['heading']; ?></h3>
                        </div>
                        <div class="row wrap">
                            <?php
                            $post_count = 0;
                            $right_posts = [];

                            while ( $query->have_posts() ) : $query->the_post();
                                $get_id_post_thumbnail = get_post_thumbnail_id();
						        $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						        $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
                                $post_count++;
                                if ( $post_count == 1 ) :
                            ?>
                            <!-- First Post (Left Column) -->
                            <div class="col-lg-6">
                                <div class="feature-post-item style-default hover-image-translate item-grid ">
                                    <div class="img-style mb_28">
                                        <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
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

                                    </div>
                                    <div class="content">
                                        <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                            <div class="wrap-meta d-flex justify-content-between mb_16">
                                                <ul class="meta-feature fw-7 d-flex text-body-1">
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
                                                <ul class="meta-feature interact fw-7 d-flex text-body-1">
						        		            <li><i class="icon-Eye"></i> <?= get_post_views( get_the_ID() ); ?> <?= esc_html__( 'VIEWS', 'drozy' ); ?></li>
						        		            <li><i class="icon-ChatsCircle"></i> <?= get_comments_number( get_the_ID() ); ?> <?= esc_html__( 'COMMENT', 'drozy' ); ?></li>
						        		        </ul>
                                            </div>
            							<?php endif; ?>
                                        <h2 class="title mb_20 title-featured"><a href="<?php the_permalink(); ?>" class="link line-clamp-2"><?php the_title(); ?></a></h2>
                                        <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						        		    <p class="text-body-1 mb_28 line-clamp-2 text-excerpt">
						        		        <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						        		    </p>
            							<?php endif; ?>
                                        <?php if ( $settings['show_button'] == 'yes' ): ?>
                                            <a href="<?php the_permalink(); ?>" class="hover-underline-link text-body-1 fw-7 text_on-surface-color"><?php echo esc_html($settings['text_button']); ?></a>
            							<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <?php
                                else:
                                    // Collect remaining posts
                                    $right_posts[] = [
                                        'title'     => get_the_title(),
                                        'permalink' => get_permalink(),
                                        'excerpt'   => get_the_excerpt(),
                                        'thumb'     => get_the_post_thumbnail( get_the_ID(), 'themesflat-blog-grid', ['class' => 'lazyload', 'alt' => get_the_title()] ),
                                        'date'      => get_the_date(),
                                        'author'    => get_the_author(),
                                        'category'  => get_the_category(),
                                        'youtube'  =>  get_post_meta(get_the_ID(), '_youtube_url', true)
                                    ];
                                endif;
                            endwhile;
                        
                            // Render remaining posts inside right column
                           foreach ( $right_posts as $post ) :
                                    ?>
                                    <div class="feature-post-item style-list v2 hover-image-translate">
                                        <div class="img-style">
                                            <a href="<?php echo esc_url( $post['permalink'] ); ?>" class="overlay-link"></a>
                                            <?php echo $post['thumb']; ?>

                                            <?php if ( $settings['show_category'] == 'yes' && !empty($post['category']) ): ?>
                                                <?php 
                                                foreach ( $post['category'] as $category ) :
                                                    $category_link = esc_url( get_category_link( $category->term_id ) );
                                                    $category_name = esc_html( $category->name );
                                                    echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
                                                endforeach;
                                                ?>
                                            <?php endif; ?>
                                            
                                            <?php if ( $settings['show_reading'] == 'yes' ): ?>
                                                <div class="tag time text-caption-2 text_white">
                                                    <i class="icon-Timer"></i> <?= esc_html( get_reading_time( $post['excerpt'] ) ); ?>
                                                </div>
                                            <?php endif; ?>

													<?php
													$youtube_url = isset($post['youtube']) ? esc_url($post['youtube']) : '';
													if ($youtube_url) {
													    echo '<button class="video_btn_play" aria-label="Play / Pause">
													            <i class="icon-play-filled"></i>
													            <span class="pause"></span>
													        </button>
													        <div class="tf-video">
													            <div class="fn__video_youtube"
													                data-property=\'' . json_encode([
													                    'videoURL' => $youtube_url,
													                    'containment' => 'self',
													                    'autoPlay' => true,
													                    'loop' => true,
													                    'mute' => true,
													                    'showControls' => false,
													                    'realfullscreen' => false,
													                    'playOnlyIfVisible' => true,
													                    'stopMovieOnBlur' => false,
													                    'startAt' => 0,
													                    'stopAt' => 0,
													                    'opacity' => 1,
													                    'showYTLogo' => false,
													                    'anchor' => 'center,center',
													                ], JSON_UNESCAPED_SLASHES) . '\'>
													            </div>
													        </div>';
													}
													?>


                                        </div>
                                        <div class="content">
                                            <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                                <ul class="meta-feature fw-7 d-flex mb_12 text-caption-2 text-uppercase">
                                                    <li><?= esc_html( $post['date'] ); ?></li>
                                                    <li>
                                                        <span class="text_secodary2-color"><?= esc_html__( 'POST BY', 'drozy' ); ?></span>
                                                        <a class="link" href="#" rel="author" aria-label="author"><?= esc_html( $post['author'] ); ?></a>
                                                    </li>
                                                </ul>
                                            <?php endif; ?>
                                            <h5 class="title mb_16 title-normal"><a href="<?= esc_url( $post['permalink'] ); ?>" class="link line-clamp-2"><?= esc_html( $post['title'] ); ?></a></h5>
                                            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                                                <p class="text-body-1 line-clamp-2 text-excerpt"><?= esc_html( wp_trim_words( $post['excerpt'], $settings['excerpt_lenght'], '...' ) ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div><!-- end col-lg-6 for right posts -->
                        </div><!-- end row -->
                    </div><!-- end tf-container -->
                </div>
                <!-- /End section-editor-pick -->

                <?php elseif($settings['style'] == 'style2'): ?>

                <!-- section-lastest-post -->
                <div  class="section-lastest-post-2 tf-spacing-5 ">
                            <div class="tf-container">
                                <div class="heading-section">
                                    <h3 class="mb_27 editor-heading"><?php echo $settings['heading']; ?></h3>
                                </div>
                                <div class="row">

                            <?php
                            $post_count = 0;
                            $right_posts = [];

                            while ( $query->have_posts() ) : $query->the_post();
                                $get_id_post_thumbnail = get_post_thumbnail_id();
						        $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						        $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
                                $post_count++;
                                if ( $post_count == 1 ) :
                            ?>

                                    <div class="col-md-6">
                                        <div class="feature-post-item style-line hover-image-translate">
                                            <div class="img-style mb_24">
                                                    <?= $featured_image; ?>
                                                <?php if ( $settings['show_reading'] == 'yes' ): ?>
						                            <div class="tag time text-caption-2 text_white">
						                                <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						                            </div>
            							        <?php endif; ?>
                                                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                                            </div>
                                            <div class="content">
                                            
                                                <h4 class="title mb_20 title-featured"><a href="<?php the_permalink(); ?>" class="link line-clamp-2"><?php the_title(); ?></a></h4>

                                                <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						        		            <p class="text-body-1 mb_28 line-clamp-2 text-excerpt">
						        		                <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						        		            </p>
            							        <?php endif; ?>

                                            <?php if ( $settings['show_meta'] == 'yes' ): ?>

                                                <div class="wrap-meta d-flex align-items-center gap_12">

                                                    <?php if ( $settings['show_category'] == 'yes' ): ?>
						                                <?php 
						                                $categories = get_the_category();
						                                if ( ! empty( $categories ) ) :
						                                    foreach ( $categories as $category ) :
						                                        $category_link = esc_url( get_category_link( $category->term_id ) );
						                                        $category_name = esc_html( $category->name );
						                                        echo '<a href="' . $category_link . '" class="tag categories text-title text_white">' . $category_name . '</a> ';
						                                    endforeach;
						                                endif;
						                                ?>
            								        <?php endif; ?>

                                                    <ul class="meta-feature fw-7 d-flex text-body-1">
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
                                                </div>
            							    <?php endif; ?>


                                            </div>
                                        </div>
                                    </div>

                            <div class="col-lg-6">
                            <?php
                                else:
                                    // Collect remaining posts
                                    $right_posts[] = [
                                        'title'     => get_the_title(),
                                        'permalink' => get_permalink(),
                                        'excerpt'   => get_the_excerpt(),
                                        'thumb'     => get_the_post_thumbnail( get_the_ID(), 'themesflat-blog-style2', ['class' => 'lazyload', 'alt' => get_the_title()] ),
                                        'date'      => get_the_date(),
                                        'author'    => get_the_author(),
                                        'category'  => get_the_category()
                                    ];
                                endif;
                            endwhile;
                        
                            // Render remaining posts inside right column
                           foreach ( $right_posts as $post ) :
                                    ?>



                                        <div class="feature-post-item style-line v2 hover-image-translate">
                                            <div class="img-style">
                                                <a href="<?php echo esc_url( $post['permalink'] ); ?>" class="overlay-link"></a>
                                            <?php echo $post['thumb']; ?>
                                    
                                            <?php if ( $settings['show_reading'] == 'yes' ): ?>
                                                <div class="tag time text-caption-2 text_white">
                                                    <i class="icon-Timer"></i> <?= esc_html( get_reading_time( $post['excerpt'] ) ); ?>
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                            <div class="content">
                                                <h5 class="title mb_16 title-normal"><a href="<?= esc_url( $post['permalink'] ); ?>" class="link"><?= esc_html( $post['title'] ); ?></a></h5>

                                            <?php if ( $settings['show_meta'] == 'yes' ): ?>

                                               <div class="wrap-meta d-flex align-items-center gap_8 text-uppercase">

                                                    <?php if ( $settings['show_category'] == 'yes' && !empty($post['category']) ): ?>
                                                        <?php 
                                                        foreach ( $post['category'] as $category ) :
                                                            $category_link = esc_url( get_category_link( $category->term_id ) );
                                                            $category_name = esc_html( $category->name );
                                                            echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
                                                        endforeach;
                                                        ?>
                                                    <?php endif; ?>

                                                    <ul class="meta-feature fw-7 d-flex text-caption-2">
                                                        <li><?= esc_html( $post['date'] ); ?></li>
                                                        <li>
                                                            <span class="text_secodary2-color"><?= esc_html__( 'POST BY', 'drozy' ); ?></span>
                                                            <a class="link" href="#" rel="author" aria-label="author"><?= esc_html( $post['author'] ); ?></a>
                                                        </li>
                                                    </ul>

                                                </div>

                                            <?php endif; ?>

                                              
                                            </div>
                                        </div>

                                <?php endforeach; ?>
                                  
                                    </div>

                                </div>
                            </div>
                </div>
                <!-- End section-lastest-post -->     

                <?php else: ?>

                    <!-- section-editor -->
                    <div class="section-editor-pick-3 tf-spacing-6 ">
                            <div class="tf-container">
                                <div class="heading-section">
                                    <h3 class="mb_26 editor-heading"><?php echo $settings['heading']; ?></h3>
                                </div>
                                <div class="row">


            <?php $count = 0; while ($query->have_posts()): $query->the_post(); 
            
			    $featured_image = get_the_post_thumbnail(get_the_ID(), 'themesflat-blog-single-2');
            ?>



                <?php if ($count == 0): ?>
                    <div class="col-lg-6">
                        <div class="feature-post-item style-position hover-image-translate item-grid editor-post">
                            <div class="img-style">
                                <?= $featured_image; ?>
                                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                            </div>
                            <div class="content">
                                <div class="heading-title">
                          
                                    <h4 class="title mb_12 text_white title-featured"><a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a></h4>

                                    <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						        	    <p class="text-body-1 text_white text-excerpt">
						        	        <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						        	    </p>
            						<?php endif; ?>

                                </div>

                            <?php if ( $settings['show_meta'] == 'yes' ): ?>

                                <div class="wrap-meta d-flex align-items-center gap_12">

                                    <?php if ( $settings['show_category'] == 'yes' ): ?>
						                <?php 
						                $categories = get_the_category();
						                if ( ! empty( $categories ) ) :
						                    foreach ( $categories as $category ) :
						                        $category_link = esc_url( get_category_link( $category->term_id ) );
						                        $category_name = esc_html( $category->name );
						                        echo '<a href="' . $category_link . '" class="tag categories text-title text_white">' . $category_name . '</a> ';
						                    endforeach;
						                endif;
						                ?>
            						<?php endif; ?>

                                    <ul class="meta-feature fw-7 d-flex text-body-1 text_white">
                                        <li><?= esc_html( get_the_date() ); ?></li>
						                <li>
                                            <span>
						                    <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                            </span>
						                    <?php
						                    $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						                    $author_name = get_user_full_name($author_id); 
						                    ?>
						                    <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
						                </li>
                                    </ul>

                                </div>

            				<?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tf-grid-layout sm-col-2 wrap-feature">
                <?php else: 
					$get_id_post_thumbnail = get_post_thumbnail_id();
					    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
					    $featured_image2 = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
					?>
                            <div class="feature-post-item style-line v4 hover-image-translate item-grid">
                                <div class="img-style mb_20">
                                    <?= $featured_image2; ?>

                                    <?php if ( $settings['show_reading'] == 'yes' ): ?>
						                <div class="tag time text-caption-2 text_white">
						                    <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						                </div>
            						<?php endif; ?>

                                    <a href="<?php the_permalink(); ?>" class="overlay-link"></a>

                                </div>
                                <div class="content">
                                    <h5 class="title title-normal">
                                        <a href="<?php the_permalink(); ?>" class="link line-clamp-2"><?php the_title(); ?></a>
                                    </h5>
                            <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                    <div class="wrap-meta d-flex align-items-center gap_12 text-uppercase">

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


                                        <ul class="meta-feature fw-7 d-flex text-caption-2">
                                            <li><?= esc_html( get_the_date() ); ?></li>
                                        </ul>
                                    </div>
            						<?php endif; ?>

                                </div>
                            </div>
                <?php endif; $count++; endwhile; ?>


                                </div>
                            </div>
                    </div>
                    <!-- End section-editor -->
                 
                <?php endif; ?>


<?php
    endif;

    wp_reset_postdata();

}

}