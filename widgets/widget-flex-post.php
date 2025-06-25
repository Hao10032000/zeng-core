<?php

class TFFlex_Posts_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-flex-posts';

    }

    

    public function get_title() {

        return esc_html__( 'TF Flex Posts', 'themesflat-core' );

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

					'selector' => '{{WRAPPER}} .wrap-feature .title a',

				]

			);

            $this->add_control(

				'title_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .wrap-feature .title a' => 'color: {{VALUE}}',

					],

				]

			);

            $this->add_control(

				'title_color_hover',

				[

					'label' => esc_html__( 'Hover', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .wrap-feature .title a:hover' => 'color: {{VALUE}}',

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

					'selector' => '{{WRAPPER}} .wrap-feature .meta-feature li',

				]

			);

            $this->add_control(

				'meta_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .wrap-feature .meta-feature li, {{WRAPPER}} .wrap-feature .meta-feature li a' => 'color: {{VALUE}}',

					],

				]

			);

	


		$this->end_controls_section();

		// Start Carousel        
		$this->start_controls_section( 
			'section_posts_carousel',
	        [
	            'label' => esc_html__('Carousel', 'themesflat-core'),
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
				'default' => 4,
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
				'default' => 60,
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
		
		$slides_per_view_xs = !empty($settings['slidesPerView-xs']) ? $settings['slidesPerView-xs'] : 1;
		$slides_per_view_sm = !empty($settings['slidesPerView-sm']) ? $settings['slidesPerView-sm'] : 2;
		$slides_per_view_md = !empty($settings['slidesPerView-md']) ? $settings['slidesPerView-md'] : 3;
		$slides_per_view_lg = !empty($settings['slidesPerView-lg']) ? $settings['slidesPerView-lg'] : 3;
		$slides_per_view_xl = !empty($settings['slidesPerView-xl']) ? $settings['slidesPerView-xl'] : 4;

		$slides_spacing_lg = !empty($settings['slidesSpacing-lg']) ? $settings['slidesSpacing-lg'] : 60;
		$slides_spacing_md = !empty($settings['slidesSpacing-md']) ? $settings['slidesSpacing-md'] : 24;
		$slides_spacing_xs = !empty($settings['slidesSpacing-xs']) ? $settings['slidesSpacing-xs'] : 15;
		$author_id = get_post_field('post_author', get_the_ID());
		?>


        <div class="page-title homepage-1 sw-layout">
            <div class="tf-container ">

                <div class="swiper wrap-feature" data-screen-xl="<?php echo esc_attr($slides_per_view_xl); ?>" data-preview="<?php echo esc_attr($slides_per_view_lg); ?>" data-tablet="<?php echo esc_attr($slides_per_view_md); ?>" data-mobile="<?php echo esc_attr($slides_per_view_xs); ?>"
                    data-mobile-sm="<?php echo esc_attr($slides_per_view_sm); ?>" data-space-lg="<?php echo esc_attr($slides_spacing_lg); ?>" data-space-md="<?php echo esc_attr($slides_spacing_md); ?>" data-space="<?php echo esc_attr($slides_spacing_xs); ?>">
                    <div class="swiper-wrapper">

            			<?php while ( $query->have_posts() ) : $query->the_post();
						    $get_id_post_thumbnail = get_post_thumbnail_id();
						    $image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
						    $featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
						?>

                        <div class="swiper-slide">
                            <div class="feature-post-item style-small d-flex align-items-center hover-image-rotate  ">
                                <a href="<?= esc_url( get_permalink() ); ?>" class="img-style">
                                    <?= $featured_image; ?>
                                </a>
                                <div class="content">
            					<?php if ( $settings['show_meta'] == 'yes' ): ?>
                                    <ul class="meta-feature text-caption-2 fw-7 text_secodary-color d-flex align-items-center mb_8 text-uppercase">
                                        <li><?= esc_html( get_the_date() ); ?></li>
                                        <li>
                                            <?php
                                            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
                                            $author_name = get_user_full_name($author_id); 
                                            ?>
                                            <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
                                        </li>
                                    </ul>
            					<?php endif; ?>
                                    <h6 class="title"> <a href="<?= esc_url( get_permalink() ); ?>" class="link line-clamp-2"><?= esc_html( get_the_title() ); ?></a></h6>
                                </div>
                            </div>
                        </div>

						<?php endwhile; ?>

                    </div>
                    <div class="sw-dots sw-pagination-layout mt_24 justify-content-center d-flex mt_22">
                    </div>
                </div>


            </div>
        </div>


        <?php wp_reset_postdata(); ?>

		<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;	
	}



}