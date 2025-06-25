<?php

class TFPopular_Posts_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-popular-posts';

    }

    

    public function get_title() {

        return esc_html__( 'TF Popular Posts', 'themesflat-core' );

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

	                'default' => '6',

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

					'condition' => [
		                'style!' => 'style3',
		            ]

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
		                'style' => 'style2',
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

					'default' => 20,

					'condition' => [
		                'style' => 'style2',
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

						'{{WRAPPER}} .description' => '-webkit-line-clamp: {{VALUE}};
    -webkit-box-orient: vertical;
    display: -webkit-box;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;',

					],
					'condition' => [
		                'style' => 'style2',
						'show_excerpt' => 'yes'
					],

	            ]

	        );

			$this->add_control( 

				'show_heading',

				[

					'label' => esc_html__( 'Show Heading', 'themesflat-core' ),

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

					'default' => esc_html__( 'Most Popular', 'themesflat-core' ),

					'label_block' => true,

					'condition' => [
						'show_heading' => 'yes'
					],

				]

			);	

			$this->end_controls_section();

        // /.End Posts Query

        // Start Carousel        
		$this->start_controls_section( 
			'section_posts_carousel',
	        [
	            'label' => esc_html__('Carousel', 'themesflat-core'),
                	'condition' => [
		                'style!' => 'style2',
		            ]
	        ]
	    );	

                    			$this->add_control( 

				'show_arrow',

				[

					'label' => esc_html__( 'Show Arrow', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

				$this->add_control(
			'group-slidesPerView',
			[
				'label' => esc_html__( 'Slides Per View', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'default' => '',	
			]
		);

		$this->start_popover();

		$this->add_control(
			'slidesPerView-xs',
			[
				'label' => esc_html__( 'XS (<576px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,

			]
		);

		$this->add_control(
			'slidesPerView-sm',
			[
				'label' => esc_html__( 'SM (≥576px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 2,

			]
		);
		
		$this->add_control(
			'slidesPerView-md',
			[
				'label' => esc_html__( 'MD (≥768px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 10,
				'step' => 1,
				'default' => 3,

			]
		);
		
		$this->add_control(
			'slidesPerView-lg',
			[
				'label' => esc_html__( 'LG (≥992px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 10,
				'step' => 1,
				'default' => 3,

			]
		);
		
		$this->add_control(
			'slidesPerView-xl',
			[
				'label' => esc_html__( 'XL (≥1200px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 10,
				'step' => 1,
				'default' => 5,
			]
		);
		
		$this->end_popover();


		$this->add_control(
			'group-slidesSpacing',
			[
				'label' => esc_html__( 'Slides Spacing', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'default' => '',	
			]
		);

		$this->start_popover();

		$this->add_control(
			'slidesSpacing-lg',
			[
				'label' => esc_html__( 'LG (≥1200px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 40,
			]
		);
		
		$this->add_control(
			'slidesSpacing-md',
			[
				'label' => esc_html__( 'MD (≥768px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 24,
			]
		);

		$this->add_control(
			'slidesSpacing-xs',
			[
				'label' => esc_html__( 'XS (≥768px)', 'vineta-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 15,
			]
		);
		

		
		$this->end_popover();

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

        $this->add_responsive_control(

			'heading_margin',
			[
				'label'     => esc_html__( 'Spacing', 'vineta-addon' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px','%','vh' ],
				'range'     => [
					'px' => [
						'min' => 1,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        	$this->add_control(

				'h_title',

				[

					'label' => esc_html__( 'Title Posts', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'title_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .title a',

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

				'title_color_hover',

				[

					'label' => esc_html__( 'Hover', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .title a:hover' => 'color: {{VALUE}}',

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

					'selector' => '{{WRAPPER}} .meta-feature li',

				]

			);

            $this->add_control(

				'meta_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .meta-feature li, {{WRAPPER}} .meta-feature li a' => 'color: {{VALUE}}',

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

					'selector' => '{{WRAPPER}} .description',

				]

			);

            $this->add_control(

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .description' => 'color: {{VALUE}}',

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

		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];	

		

		$query = new WP_Query( $query_args );
        
		if ( $query->have_posts() ) : 
		$author_id = get_post_field('post_author', get_the_ID());
		?>

		<?php if ($settings['style'] == 'style1'): 
            
                $slides_per_view_xs = !empty($settings['slidesPerView-xs']) ? $settings['slidesPerView-xs'] : 1;
		        $slides_per_view_sm = !empty($settings['slidesPerView-sm']) ? $settings['slidesPerView-sm'] : 2;
		        $slides_per_view_md = !empty($settings['slidesPerView-md']) ? $settings['slidesPerView-md'] : 3;
		        $slides_per_view_lg = !empty($settings['slidesPerView-lg']) ? $settings['slidesPerView-lg'] : 3;
		        $slides_per_view_xl = !empty($settings['slidesPerView-xl']) ? $settings['slidesPerView-xl'] : 5;

		        $slides_spacing_lg = !empty($settings['slidesSpacing-lg']) ? $settings['slidesSpacing-lg'] : 40;
		        $slides_spacing_md = !empty($settings['slidesSpacing-md']) ? $settings['slidesSpacing-md'] : 24;
		        $slides_spacing_xs = !empty($settings['slidesSpacing-xs']) ? $settings['slidesSpacing-xs'] : 15;
            ?>

            <!-- section-most-popular -->
            <div class="section-most-popular tf-spacing-1 wg-popular-post">
                <div class="tf-container sw-layout ">
                    <div class="heading-section d-flex justify-content-between mb_28">
						<h3 class="main-title">
								<?php if ( $settings['show_heading'] == 'yes' ): ?>
									<?php echo $settings['heading']; ?>
								<?php endif; ?>
							</h3>
                        <?php if ( $settings['show_arrow'] == 'yes' ): ?>
                            <div class="wrap-sw-button d-flex gap_12 md-hide">
                                <div class="sw-button sz-56 v2 style-cycle nav-prev-layout">
                                    <i class="icon-CaretLeft"></i>
                                </div>
                                <div class="sw-button sz-56 v2 style-cycle nav-next-layout ">
                                    <i class="icon-CaretRight"></i>
                                </div>
                            </div>
            			<?php endif; ?>
                    </div>
                    <div class="swiper" data-screen-xl="<?php echo esc_attr($slides_per_view_xl); ?>" data-preview="<?php echo esc_attr($slides_per_view_lg); ?>" data-tablet="<?php echo esc_attr($slides_per_view_md); ?>" data-mobile="<?php echo esc_attr($slides_per_view_xs); ?>"
                        data-mobile-sm="<?php echo esc_attr($slides_per_view_sm); ?>" data-space-lg="<?php echo esc_attr($slides_spacing_lg); ?>" data-space-md="<?php echo esc_attr($slides_spacing_md); ?>" data-space="<?php echo esc_attr($slides_spacing_xs); ?>">
                        <div class="swiper-wrapper">

                            <?php while ( $query->have_posts() ) : $query->the_post();
						        $get_id_post_thumbnail = get_post_thumbnail_id();
						        $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						        $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
						    ?>

                            <div class="swiper-slide">
                                <div class="feature-post-item style-default hover-image-translate  ">
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

                                        <h5 class="title">
						                    <a href="<?= esc_url( get_permalink() ); ?>" class="line-clamp-2 link" title="<?= esc_attr( get_the_title() ); ?>">
						                        <?= esc_html( get_the_title() ); ?>
						                    </a>
						                </h5>

                                    </div>
                                </div>
                            </div>

						    <?php endwhile; ?>

                        </div>
                        <div class="sw-dots sw-pagination-layout mt_22 justify-content-center d-flex d-md-none">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End section-most-popular -->

		<?php elseif($settings['style'] == 'style2'): ?>

                    <?php

                    if ($query->have_posts()) :
                        $post_index = 0;
                        ?>
                        <div class="section-most-popular-2 wg-popular-post">
                            <div class="tf-container tf-spacing-1">
                        		<?php if ( $settings['show_heading'] == 'yes' ): ?>
                                <div class="heading-section mb_26">
                                    <h3 class="main-title"><?php echo esc_html($settings['heading']); ?></h3>
                                </div>
            					<?php endif; ?>
                                <div class="row">
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            $get_id_post_thumbnail = get_post_thumbnail_id();
						    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
                    
                            if ($post_index == 0 || $post_index == 3) :
                                ?>
                                <div class="col-lg-6">
                                    <div class="feature-post-item style-default style-border hover-image-translate">
                                        <div class="content mb_28">

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

                                            <h2 class="title">
						        		        <a href="<?= esc_url( get_permalink() ); ?>" title="<?= esc_attr( get_the_title() ); ?>" class="link line-clamp-2">
						        		            <?= esc_html( get_the_title() ); ?>
						        		        </a>
						        		    </h2>

                                        </div>
                                        <div class="img-style mb_28">
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

                                        <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						        		    <p class="description">
						        		        <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						        		    </p>
            							<?php endif; ?>

                                    </div>
                                    <div class="tf-grid-layout md-col-2">
                                <?php
                            elseif ($post_index == 1 || $post_index == 2 || $post_index == 4 || $post_index == 5):
                                ?>
                                <div class="feature-post-item style-default style-border hover-image-translate">
                                    <div class="content">

                                        <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                        <div class="wrap-meta d-flex justify-content-between mb_12">

                                            <ul class="meta-feature fw-7 d-flex text-caption-2 text-uppercase">
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

                                        <h5 class="title mb_16">
						        		    <a href="<?= esc_url( get_permalink() ); ?>" title="<?= esc_attr( get_the_title() ); ?>" class="link line-clamp-2">
						        		        <?= esc_html( get_the_title() ); ?>
						        		    </a>
						        		</h5>

                                        <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
						        		    <p class="text-body-1 description">
						        		        <?= esc_html( wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '...' ) ); ?>
						        		    </p>
            							<?php endif; ?>

                                    </div>
                                </div>
                                <?php
                                if ($post_index == 2 || $post_index == 5):
                                    echo '</div></div>';
                                endif;
                            endif; ?>

                           <?php $post_index++;
                        endwhile;
                        ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>

		<?php else: 
			                $slides_per_view_xs = !empty($settings['slidesPerView-xs']) ? $settings['slidesPerView-xs'] : 1;
		        $slides_per_view_sm = !empty($settings['slidesPerView-sm']) ? $settings['slidesPerView-sm'] : 2;
		        $slides_per_view_md = !empty($settings['slidesPerView-md']) ? $settings['slidesPerView-md'] : 3;
		        $slides_per_view_lg = !empty($settings['slidesPerView-lg']) ? $settings['slidesPerView-lg'] : 3;
		        $slides_per_view_xl = !empty($settings['slidesPerView-xl']) ? $settings['slidesPerView-xl'] : 5;

		        $slides_spacing_lg = !empty($settings['slidesSpacing-lg']) ? $settings['slidesSpacing-lg'] : 40;
		        $slides_spacing_md = !empty($settings['slidesSpacing-md']) ? $settings['slidesSpacing-md'] : 24;
		        $slides_spacing_xs = !empty($settings['slidesSpacing-xs']) ? $settings['slidesSpacing-xs'] : 15;
			?>

			        <!-- section-most-popular -->
                        <div class="section-most-popular-3 sw-layout ">
                            <div class="tf-container">
                                <div class="heading-section d-flex justify-content-between mb_26">
									<h3 class="main-title">
											<?php if ( $settings['show_heading'] == 'yes' ): ?>
												<?php echo $settings['heading']; ?>
											<?php endif; ?>	
										</h3>
                        			<?php if ( $settings['show_arrow'] == 'yes' ): ?>
                                    	<div class="wrap-sw-button d-flex gap_12 md-hide">
                                    	    <div class="sw-button sz-56 v2 style-cycle nav-prev-layout">
                                    	        <i class="icon-CaretLeft"></i>
                                    	    </div>
                                    	    <div class="sw-button sz-56 v2 style-cycle nav-next-layout ">
                                    	        <i class="icon-CaretRight"></i>
                                    	    </div>
                                    	</div>
        							<?php endif; ?>	
                                </div>
                                <div class="swiper" data-screen-xl="<?php echo esc_attr($slides_per_view_xl); ?>" data-preview="<?php echo esc_attr($slides_per_view_lg); ?>" data-tablet="<?php echo esc_attr($slides_per_view_md); ?>" data-mobile="<?php echo esc_attr($slides_per_view_xs); ?>"
                        data-mobile-sm="<?php echo esc_attr($slides_per_view_sm); ?>" data-space-lg="<?php echo esc_attr($slides_spacing_lg); ?>" data-space-md="<?php echo esc_attr($slides_spacing_md); ?>" data-space="<?php echo esc_attr($slides_spacing_xs); ?>">
                                    <div class="swiper-wrapper">

										<?php while ( $query->have_posts() ) : $query->the_post();
						    			    $get_id_post_thumbnail = get_post_thumbnail_id();
						    			    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						    			    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
						    			?>

                                        <div class="swiper-slide">
                                            <div
                                                class="feature-post-item style-position v2 hover-image-translate item-grid ">
                                                <div class="img-style ">
                                                    <?= $featured_image; ?>
                                                    <a href="<?= esc_url( get_permalink() ); ?>" class="overlay-link"></a>
                                                </div>
                                                <div class="content">
                                                    <div class="heading-title">
                                                        <h5 class="title mb_20 text_white"> <a href="<?= esc_url( get_permalink() ); ?>"
                                                                class="link line-clamp-3"><?= esc_html( get_the_title() ); ?></a></h5>
                                                    </div>
                                                    <div class="wrap-meta d-flex align-items-center gap_12">

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

														<?php if ( $settings['show_meta'] == 'yes' ): ?>
                                        				<ul class="meta-feature fw-7 text-caption-2 text_white text-uppercase">
						                				    <li><?= esc_html( get_the_date() ); ?></li>
						                				</ul>
            											<?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

						    			<?php endwhile; ?>
                

                                    </div>
                                    <div
                                        class="sw-dots sw-pagination-layout mt_22 justify-content-center d-flex d-md-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End section-most-popular -->

        <?php endif; ?>	


        <?php wp_reset_postdata(); ?>

		<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;	
	}



}