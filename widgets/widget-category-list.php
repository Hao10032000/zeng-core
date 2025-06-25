<?php

class TFCategory_list_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-category-list';

    }

    

    public function get_title() {

        return esc_html__( 'TF Category List', 'themesflat-core' );

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

					],

				]

			);

			$this->add_control(
			    'posts_per_page',
			    [
			        'label' => esc_html__( 'Categories to Show', 'themesflat-core' ),
			        'type' => \Elementor\Controls_Manager::NUMBER,
			        'default' => 7,
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

				'show_count',

				[

					'label' => esc_html__( 'Show Count Posts', 'themesflat-core' ),

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

					'default' => esc_html__( 'Top Categories', 'themesflat-core' ),

					'label_block' => true,
					                	'condition' => [
		                'style' => 'style1',
		            ]

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
		                'style' => 'style1',
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
					                	'condition' => [
		                'style' => 'style1',
		            ]

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'heading_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .category-heading',
					                	'condition' => [
		                'style' => 'style1',
		            ]

				]

			);

            $this->add_control(

				'heading_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .category-heading' => 'color: {{VALUE}}',

					],
					                	'condition' => [
		                'style' => 'style1',
		            ]

				]

			);

        	$this->add_control(

				'h_title',

				[

					'label' => esc_html__( 'Title Category', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'title_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .categoires-item h6, {{WRAPPER}} .section-categories-2 .title ',

				]

			);

            $this->add_control(

				'title_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .categoires-item h6 a, {{WRAPPER}} .section-categories-2 .title' => 'color: {{VALUE}}',

					],

				]

			);

            $this->add_control(

				'h_count',

				[

					'label' => esc_html__( 'Count', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'count_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .section-categories-2 .number, {{WRAPPER}} .categoires-item .text-caption-1',

				]

			);

            $this->add_control(

				'count_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .section-categories-2 .number, {{WRAPPER}} .categoires-item .text-caption-1' => 'color: {{VALUE}}',

					],

				]

			);


		$this->end_controls_section();

        

	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display(); 

		$slides_per_view_xs = !empty($settings['slidesPerView-xs']) ? $settings['slidesPerView-xs'] : 1;
		$slides_per_view_sm = !empty($settings['slidesPerView-sm']) ? $settings['slidesPerView-sm'] : 2;
		$slides_per_view_md = !empty($settings['slidesPerView-md']) ? $settings['slidesPerView-md'] : 3;
		$slides_per_view_lg = !empty($settings['slidesPerView-lg']) ? $settings['slidesPerView-lg'] : 4;
		$slides_per_view_xl = !empty($settings['slidesPerView-xl']) ? $settings['slidesPerView-xl'] : 6;
		$slides_spacing_lg = !empty($settings['slidesSpacing-lg']) ? $settings['slidesSpacing-lg'] : 20;
		$slides_spacing_md = !empty($settings['slidesSpacing-md']) ? $settings['slidesSpacing-md'] : 20;
		$slides_spacing_xs = !empty($settings['slidesSpacing-xs']) ? $settings['slidesSpacing-xs'] : 15;

		$exclude = ! empty( $settings['exclude'] ) ? (array) $settings['exclude'] : [];

		$order_by = ! empty( $settings['order_by'] ) ? $settings['order_by'] : 'name'; 
		$order = ! empty( $settings['order'] ) ? $settings['order'] : 'ASC';
		$limit     = isset( $settings['posts_per_page'] ) ? intval( $settings['posts_per_page'] ) : 0;

		$categories = get_terms([
    		'taxonomy'   => 'category',
    		'hide_empty' => false,
    		'exclude'    => $exclude,
    		'orderby'    => $order_by,
    		'order'      => $order,
    		'number'     => $limit,
		]);

		$categories = array_filter($categories, function($term) {
		    return $term->slug !== 'uncategorized';
		});

        if ( ! empty( $categories ) ) :
        ?>

		
        <?php if ( $settings['style'] == 'style1' ): ?>

        <!-- section-categories -->
            <div class="section-categories sw-layout">
                <div class="tf-container">

					<div class="heading-section d-flex justify-content-between mb_26">
                        <h3 class="category-heading"><?php echo $settings['heading']; ?></h3>
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

                            <?php foreach ( $categories as $category ) :
                                $term_link  = get_category_link( $category->term_id );
                                $term_name  = esc_html( $category->name );
                                $term_count = intval( $category->count );
                                $term_image = get_term_meta( $category->term_id, 'term_image', true );

                                // Fallback image if empty
                                if ( empty( $term_image ) ) {
                                    $term_image = URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg";
                                }
                            ?>

                            <div class="swiper-slide">
                                <div class="categoires-item hover-image">
                                    <a href="<?php echo esc_url( $term_link ); ?>" class="img-style mb_8">
                                        <img class="lazyload" decoding="async" loading="lazy"
                                            src="<?php echo esc_url( $term_image ); ?>"
                                            alt="<?php echo esc_attr( $term_name ); ?>"
                                            width="212" height="158">
                                    </a>
                                    <div class="content">
                                        <h6 class="mb_4">
                                            <a href="<?php echo esc_url( $term_link ); ?>" class="link"><?php echo $term_name; ?></a>
                                        </h6>
                        				<?php if ( $settings['show_count'] == 'yes' ): ?>
                                        	<p class="text-caption-1"><?php echo $term_count; ?> <?php esc_html_e(' Posts','themesflat-core') ?> </p>
            							<?php endif; ?>
									</div>
                                </div>
                            </div>

                            <?php endforeach; ?>

                        </div>
                        <div class="sw-dots sw-pagination-layout mt_22 justify-content-center d-flex d-md-none">
                        </div>
                    </div>

                </div>
            </div>
        <!-- /End section-categories -->

		<?php else: ?>

			<!-- section-categories -->
                <div class="section-categories-2">
                    <div class="tf-container">
                        <div class="wrap-list">

						    <?php foreach ( $categories as $category ) :
                                $term_link  = get_category_link( $category->term_id );
                                $term_name  = esc_html( $category->name );
                                $term_count = intval( $category->count );
                                $term_image = get_term_meta( $category->term_id, 'term_image', true );

                                // Fallback image if empty
                                if ( empty( $term_image ) ) {
                                    $term_image = URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg";
                                }
                            ?>

                            <a href="<?php echo esc_url( $term_link ); ?>"
                                class="media-list-item d-flex align-items-center gap_12 ">
                                <div class="heading-title">
                                    <h3 class="title">
										<?php echo $term_name; ?>
									</h3>
                                    <div class="image">
                                        <img class="lazyload" decoding="async" loading="lazy"
                                            src="<?php echo esc_url( $term_image ); ?>"
                                            alt="<?php echo esc_attr( $term_name ); ?>"
                                            width="400" height="300">
                                    </div>
                                </div>
								<?php if ( $settings['show_count'] == 'yes' ): ?>
									<span class="h5 number">
										<?php echo $term_count . ' ' . _n('Post', 'Posts', $term_count, 'themesflat-core'); ?>
									</span>
            					<?php endif; ?>
                            </a>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            <!-- End section-categories -->

		<?php endif; ?>


        <?php wp_reset_postdata(); ?>

		<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;	
	}



}