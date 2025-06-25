<?php

class TFSlides_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-slides';

    }

    

    public function get_title() {

        return esc_html__( 'TF Posts Slide', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-slides';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }

	public function get_script_depends() {

		return ['tf-posts-core'];

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

	                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::NUMBER,

	                'default' => '3',

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

					'condition' => [
		                'style!' => 'style3',
		            ]

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

					'default' => 11,

					'condition' => [

						'show_excerpt' => 'yes'

					],

				]

			);


			$this->end_controls_section();

        // /.End Posts Query


		// Start Author        

			$this->start_controls_section( 

				'section_posts_author',

	            [

	                'label' => esc_html__('Author', 'themesflat-core'),
					'condition' => [
		                'style' => 'style2',
		            ]

	            ]

	        );	

			$this->add_control(

				'title_authorbox',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Wellcome to Drozy', 'themesflat-core' ),

					'label_block' => true,

				]

			);	

			$this->add_control( 

				'show_location',

				[

					'label' => esc_html__( 'Show Location', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

			$this->add_control( 

				'show_social',

				[

					'label' => esc_html__( 'Show Social', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

			$this->add_control( 

				'show_desc',

				[

					'label' => esc_html__( 'Show Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

			$this->add_control( 

				'desc_limit',

	            [

	                'label' => esc_html__( 'Limit Length', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::NUMBER,

	                'default' => '2',

					'selectors' => [

						'{{WRAPPER}} .box-author.style-1.v2 p' => '-webkit-line-clamp: {{VALUE}};
    -webkit-box-orient: vertical;
    display: -webkit-box;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;',

					],
					'condition' => [
		                'show_desc' => 'yes',
		            ]

	            ]

	        );

			$this->end_controls_section();

			        // Start General Style 
	    $this->start_controls_section( 
	    	'section_style_general',
	        [
	            'label' => esc_html__( 'General', 'themesflat-core' ),
	            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	        ]
	    );

        	$this->add_control(

				'h_title',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'title_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .sw-single h1',

				]

			);

            $this->add_control(

				'title_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .sw-single h1 a' => 'color: {{VALUE}}',

					],

				]

			);

            $this->add_control(

				'title_color_hover',

				[

					'label' => esc_html__( 'Hover', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .sw-single h1 a:hover' => 'color: {{VALUE}}',

					],

				]

			);

            $this->add_control(

				'h_meta',

				[

					'label' => esc_html__( 'Meta', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'meta_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .sw-single .meta-feature li',

				]

			);

            $this->add_control(

				'meta_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .sw-single .meta-feature li, {{WRAPPER}} .sw-single .meta-feature li:after, {{WRAPPER}} .sw-single .meta-feature li a' => 'color: {{VALUE}}',

					],

				]

			);

			$this->add_control(

				'h_desc',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'desc_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .sw-single p',

				]

			);

            $this->add_control(

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .sw-single p' => 'color: {{VALUE}}',

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

        <!-- page-title -->
        <div class="page-title slide-1">
            <div class="tf-container ">
            
                 <div class="swiper sw-single animation-sl" data-cs-parallax="true" data-effect="creative">
                    <div class="swiper-wrapper">

						<?php while ( $query->have_posts() ) : $query->the_post();
						    $get_id_post_thumbnail = get_post_thumbnail_id();
						    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
						?>
						    <div class="swiper-slide">
						        <div class="hero-banner style-default">
						            <div class="img-thumbs">
						                <?= $featured_image; ?>
						            </div>
						            <div class="content cs-entry__content">
						                <div class="content__top d-flex justify-content-between">
            								<?php if ( $settings['show_category'] == 'yes' ): ?>
						                    <?php 
						                    $categories = get_the_category();
						                    if ( ! empty( $categories ) ) :
						                        echo '<span class="post-category">';
						                        foreach ( $categories as $category ) :
						                            $category_link = esc_url( get_category_link( $category->term_id ) );
						                            $category_name = esc_html( $category->name );
						                            echo '<a href="' . $category_link . '" class="tag categories text-title text_white">' . $category_name . '</a> ';
						                        endforeach;
						                        echo '</span>';
						                    endif;
						                    ?>
            								<?php endif; ?>
            								<?php if ( $settings['show_reading'] == 'yes' ): ?>
						                    <div class="tag time text-title text_white">
						                        <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						                    </div>
            								<?php endif; ?>
						                </div>
										
						                <div class="content__body">
            								<?php if ( $settings['show_meta'] == 'yes' ): ?>
						                    <div class="wrap-meta d-flex justify-content-between mb_16">
						                        <ul class="meta-feature fw-7 d-flex h6 text_white">
						                            <li><?= esc_html( get_the_date() ); ?></li>
						                            <li>
						                                <?= esc_html__( 'POST BY', 'drozy' ); ?>
						                                <?php
						                                $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						                                $author_name = get_user_full_name($author_id); 
						                                ?>
						                                <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
						                            </li>
						                        </ul>
						                        <ul class="meta-feature interact fw-7 d-flex h6 text_white">
						                            <li><i class="icon-Eye"></i> <?= get_post_views( get_the_ID() ); ?> <?= esc_html__( 'VIEWS', 'drozy' ); ?></li>
						                            <li><i class="icon-ChatsCircle"></i> <?= get_comments_number( get_the_ID() ); ?> <?= esc_html__( 'COMMENT', 'drozy' ); ?></li>
						                        </ul>
						                    </div>
            								<?php endif; ?>
										
						                    <h1 class="text_white mb_24">
						                        <a href="<?= esc_url( get_permalink() ); ?>" title="<?= esc_attr( get_the_title() ); ?>">
						                            <?= esc_html( get_the_title() ); ?>
						                        </a>
						                    </h1>
            								<?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						                    <p class="text_white line-clamp-2">
						                        <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						                    </p>
            								<?php endif; ?>
						                </div>
						            </div>
						        </div>
						    </div>
						<?php endwhile; ?>

                   
                    </div>
                    <div class="sw-button style-1 sw-single-prev md-hide">
                        <i class="icon-CaretLeft"></i>
                    </div>
                    <div class="sw-button style-1 sw-single-next md-hide">
                        <i class="icon-CaretRight"></i>
                    </div>
                    <div class="sw-dots sw-pagination-single justify-content-center d-flex d-md-none">
                    </div>
                </div>

            </div>
        </div>
        <!-- /End page-title -->

		<?php elseif($settings['style'] == 'style2'): 
			$user_id = get_the_author_meta('ID');
			$facebook   = get_user_meta($user_id, 'facebook', true);
			$twitter    = get_user_meta($user_id, 'twitter', true);
			$instagram  = get_user_meta($user_id, 'instagram', true);
			$pinterest  = get_user_meta($user_id, 'pinterest', true);
		?>

		<div class="page-title hero-slider slide-2">
            <div class="tf-container">
                <div class="row">
                    <div class="col-lg-9 slider-mb">
                        <div class="swiper sw-single animation-sl" data-cs-parallax="true" data-effect="creative">
                            <div class="swiper-wrapper">
								<?php while ( $query->have_posts() ) : $query->the_post();
								    $get_id_post_thumbnail = get_post_thumbnail_id();
								    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
								    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
								?>
								    <div class="swiper-slide">
						        		<div class="hero-banner style-default">
						        		    <div class="img-thumbs">
						        		        <?= $featured_image; ?>
						        		    </div>
						        		    <div class="content cs-entry__content">
						        		        <div class="content__top d-flex justify-content-between">
            										<?php if ( $settings['show_category'] == 'yes' ): ?>
						        		            <?php 
						        		            $categories = get_the_category();
						        		            if ( ! empty( $categories ) ) :
						        		                echo '<span class="post-category">';
						        		                foreach ( $categories as $category ) :
						        		                    $category_link = esc_url( get_category_link( $category->term_id ) );
						        		                    $category_name = esc_html( $category->name );
						        		                    echo '<a href="' . $category_link . '" class="tag categories text-title text_white">' . $category_name . '</a> ';
						        		                endforeach;
						        		                echo '</span>';
						        		            endif;
						        		            ?>
            										<?php endif; ?>
            										<?php if ( $settings['show_reading'] == 'yes' ): ?>
						        		            <div class="tag time text-title text_white">
						        		                <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						        		            </div>
            										<?php endif; ?>
						        		        </div>
													
						        		        <div class="content__body">
            										<?php if ( $settings['show_meta'] == 'yes' ): ?>
						        		            <div class="wrap-meta d-flex justify-content-between mb_16">
						        		                <ul class="meta-feature fw-7 d-flex h6 text_white">
						        		                    <li><?= esc_html( get_the_date() ); ?></li>
						        		                    <li>
						        		                        <?= esc_html__( 'POST BY', 'drozy' ); ?>
						        		                        <?php
						        		                        $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						        		                        $author_name = get_user_full_name($author_id); 
						        		                        ?>
						        		                        <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
						        		                    </li>
						        		                </ul>
						        		                <ul class="meta-feature interact fw-7 d-flex h6 text_white">
						        		                    <li><i class="icon-Eye"></i> <?= get_post_views( get_the_ID() ); ?> <?= esc_html__( 'VIEWS', 'drozy' ); ?></li>
						        		                    <li><i class="icon-ChatsCircle"></i> <?= get_comments_number( get_the_ID() ); ?> <?= esc_html__( 'COMMENT', 'drozy' ); ?></li>
						        		                </ul>
						        		            </div>
            										<?php endif; ?>
													
						        		            <h1 class="text_white mb_24">
						        		                <a href="<?= esc_url( get_permalink() ); ?>" title="<?= esc_attr( get_the_title() ); ?>">
						        		                    <?= esc_html( get_the_title() ); ?>
						        		                </a>
						        		            </h1>
            										<?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						        		            <p class="text_white line-clamp-2">
						        		                <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						        		            </p>
            										<?php endif; ?>
						        		        </div>
						        		    </div>
						        		</div>
								    </div>
								<?php endwhile; ?>
                            </div>
                            <div class="sw-button style-1 sw-single-prev md-hide">
                                <i class="icon-CaretLeft"></i>
                            </div>
                            <div class="sw-button style-1 sw-single-next md-hide">
                                <i class="icon-CaretRight"></i>
                            </div>
                            <div class="sw-dots style-1 sw-pagination-single justify-content-center d-flex d-md-none">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box-author style-1 v2 text-center">
                            <h5 class="heading-title"> <?php echo $settings['title_authorbox']; ?></h5>
                            <div class="info ">
                                <div class="avatar mb_12">
                                    <?php
										echo get_avatar(get_the_author_meta('user_email'),$size='200');
									?>
                                </div>
                                <h4 class="mb_4"><a href="#" class="link"><?php echo get_user_full_name($author_id); ?></a></h4>
            					<?php if ( $settings['show_location'] == 'yes' ): ?>
                                	<p class="text-body-1"><?php echo get_user_meta($user_id, 'address', true); ?></p>
            					<?php endif; ?>
                            </div>
            					<?php if ( $settings['show_social'] == 'yes' ): ?>

                            										<?php if( !empty($facebook) || !empty($twitter) || !empty($pinterest) || !empty($instagram) ): ?>
                                        <ul class="social">
											<?php if ($facebook) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($facebook) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-FacebookLogo"></i></a></li>';
											} ?>
												<?php if ($twitter) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($twitter) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-XLogo"></i></a></li>';
											} ?>
												<?php if ($pinterest) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($pinterest) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="icon-PinterestLogo"></i></a></li>';
											} ?>
												<?php if ($instagram) {
											    echo '<li class="text-title fw-7 text_on-surface-color"><a href="' . esc_url($instagram) . '" class="d-flex align-items-center gap_12" target="_blank"><i class="InstagramLogo"></i></a></li>';
											} ?>
                                        </ul>
									<?php endif; ?>
            					<?php endif; ?>
            					<?php if ( $settings['show_desc'] == 'yes' ): ?>
                            <p><?php echo get_the_author_meta( 'description' ); ?></p>
            					<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<?php else: ?>

			        <!-- page-title -->
                    <div class="page-title homepage-3">
                        <div class="tf-container">
                            <div class="swiper sw-single animation-sl" data-cs-parallax="true" data-effect="creative">
                                <div class="swiper-wrapper">

								<?php while ( $query->have_posts() ) : $query->the_post();
								    $get_id_post_thumbnail = get_post_thumbnail_id();
								    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
								    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
								?>

                                    <div class="swiper-slide">
                                        <div class="hero-banner style-1">
                                            <div class="img-thumbs">
                                                <?= $featured_image; ?>
                                            </div>
                                            <div class="content cs-entry__content">
                                                <div class="content__body">
                                                    <div class="wrap-meta d-flex justify-content-between mb_20">
                                                        <ul class="meta-feature interact fw-7 d-flex h6 text_white ">
                                                            <li><i class="icon-Eye"></i><?= get_post_views( get_the_ID() ); ?> <?= esc_html__( 'VIEWS', 'drozy' ); ?></li>
                                                            <li><i class="icon-ChatsCircle"></i><?= get_comments_number( get_the_ID() ); ?> <?= esc_html__( 'COMMENT', 'drozy' ); ?></li>
                                                        </ul>
                                                    </div>
                                                    <h1 class="text_white mb_20">
						        		                <a href="<?= esc_url( get_permalink() ); ?>" title="<?= esc_attr( get_the_title() ); ?>">
						        		                    <?= esc_html( get_the_title() ); ?>
						        		                </a>
														</h1>
            										<?php if ( $settings['show_meta'] == 'yes' ): ?>

                                                    <div class="wrap d-flex align-items-center gap_12 flex-wrap">
														<?php if ( $settings['show_category'] == 'yes' ): ?>
						        		            	<?php 
						        		            	$categories = get_the_category();
						        		            	if ( ! empty( $categories ) ) :
						        		            	    echo '<span class="post-category">';
						        		            	    foreach ( $categories as $category ) :
						        		            	        $category_link = esc_url( get_category_link( $category->term_id ) );
						        		            	        $category_name = esc_html( $category->name );
						        		            	        echo '<a href="' . $category_link . '" class="tag categories text-title text_white">' . $category_name . '</a> ';
						        		            	    endforeach;
						        		            	    echo '</span>';
						        		            	endif;
						        		            	?>
            											<?php endif; ?>
                                                        <ul class="meta-feature fw-7 d-flex h6 text_white">
						        		                    <li><?= esc_html( get_the_date() ); ?></li>
						        		                    <li>
						        		                        <?= esc_html__( 'POST BY', 'drozy' ); ?>
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
                                                <div class="content__top d-flex justify-content-between ">
													<?php if ( $settings['show_reading'] == 'yes' ): ?>
						        		            <div class="tag time text-caption-2 text_white">
						        		                <i class="icon-Timer"></i> <?= esc_html( get_reading_time() ); ?>
						        		            </div>
            										<?php endif; ?>
                                                </div>

														<div class="wrap-feature">
														    <?php
														    $related_args = array(
														        'post_type'           => 'post',
														        'posts_per_page'      => 3, 
														        'post__not_in'        => array( get_the_ID() ), 
														        'ignore_sticky_posts' => 1,
														    );
														
														    $related_query = new WP_Query( $related_args );
														
														    if ( $related_query->have_posts() ) :
														        while ( $related_query->have_posts() ) : $related_query->the_post();
														            $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
														            ?>
														            <div class="item hover-image-rotate">
														                <a href="<?= esc_url( get_permalink() ); ?>" class="img-style">
														                    <img decoding="async" loading="lazy" width="120" height="120"
														                        src="<?= esc_url( $thumbnail ); ?>"
														                        alt="<?= esc_attr( get_the_title() ); ?>">
														                </a>
														                <div>
														                    <h6 class="text_white mb_12">
														                        <a href="<?= esc_url( get_permalink() ); ?>" class="link line-clamp-2">
														                            <?= esc_html( get_the_title() ); ?>
														                        </a>
														                    </h6>
														                    <div class="d-flex align-items-center gap_12 flex-wrap">
														                        <?php
														                        $categories = get_the_category();
														                        if ( ! empty( $categories ) ) {
														                            $first_cat = $categories[0];
														                            echo '<a href="' . esc_url( get_category_link( $first_cat->term_id ) ) . '" class="tag categories text_white">' . esc_html( $first_cat->name ) . '</a>';
														                        }
														                        ?>
														                        <div class="text-caption-2 text_white text-uppercase">
														                            <?= esc_html( get_the_date() ); ?>
														                        </div>
														                    </div>
														                </div>
														            </div>
														            <?php
														        endwhile;
														        wp_reset_postdata();
														    else :
														        echo '<p class="text_white">' . esc_html__( 'No related posts found.', 'drozy' ) . '</p>';
														    endif;
														    ?>
														</div>




                                            </div>
                                        </div>
                                    </div>

								<?php endwhile; ?>
                      
                                </div>
                                <div class="sw-button style-1 sw-single-prev">
                                    <i class="icon-CaretLeft"></i>
                                </div>
                                <div class="sw-button style-1 sw-single-next">
                                    <i class="icon-CaretRight"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End page-title -->

        <?php endif; ?>	


        <?php wp_reset_postdata(); ?>

		<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;	
	}



}