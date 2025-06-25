<?php

class TFCaseStudy_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-case-study';

    }

    

    public function get_title() {

        return esc_html__( 'TF Case Study', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-posts-grid';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



	public function get_style_depends(){

		return ['owl-carousel'];

	}



	public function get_script_depends() {

		return ['owl-carousel', 'jquery-isotope','tf-case-study'];

	}



	protected function register_controls() {

        // Start Posts Query        

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

						'options' => ThemesFlat_Addon_For_Elementor_drozy::tf_get_taxonomies('case_study_category'),

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

		        	'layout',

					[

						'label' => esc_html__( 'Columns', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'column-4',

						'options' => [

							'column-1' => esc_html__( '1', 'themesflat-core' ),

							'column-2' => esc_html__( '2', 'themesflat-core' ),

							'column-3' => esc_html__( '3', 'themesflat-core' ),

							'column-4' => esc_html__( '4', 'themesflat-core' ),

						],

					]

				);	



				$this->add_control( 

		        	'style',

					[

						'label' => esc_html__( 'Styles', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'style1',

						'options' => [

							'style1' => esc_html__( 'Style 1', 'themesflat-core' ),

							'style2' => esc_html__( 'Style 2', 'themesflat-core' ),

							'style3' => esc_html__( 'Style 3', 'themesflat-core' ),

							'style4' => esc_html__( 'Style 4', 'themesflat-core' ),
						],

					]

				);

				$this->add_control( 

					'style_dark',

					[

						'label' => esc_html__( 'Style Dark', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Enable', 'themesflat-core' ),

						'label_off' => esc_html__( 'Disable', 'themesflat-core' ),

						'return_value' => 'yes',

						'default' => 'no',

						'condition' => [

							'style'	=> 'style2',

						],

					]

				);



				$this->add_control( 

					'show_exc',

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

					'excerpt_lenght',

					[

						'label' => esc_html__( 'Excerpt Length', 'drozy' ),

						'type' => \Elementor\Controls_Manager::NUMBER,

						'min' => 0,

						'max' => 500,

						'step' => 1,

						'default' => 15,

						'condition' => [

							'show_exc'	=> 'yes',

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

					]

				);



				$this->add_control( 

					'button_text',

					[

						'label' => esc_html__( 'Button Text', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::TEXT,

						'default' => esc_html__( 'Read more', 'themesflat-core' ),

						'condition' => [

							'show_button'	=> 'yes',

						],

					]

				);	



				$this->add_control(

					'post_icon_readmore',

					[

						'label' => esc_html__( 'Post Icon ', 'drozy' ),

						'type' => \Elementor\Controls_Manager::ICONS,

						'default' => [

							'value' => 'icon-drozy-arrowright2',

							'library' => 'theme_icon',

						],

						'condition' => [

							'show_button' => 'yes',

						],

					]

				);	

				$this->add_control(
					'show_filter',
					[
						'label' => esc_html__( 'Filter', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Show', 'themesflat-core' ),
						'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
						'return_value' => 'yes',
						'default' => 'no',
					]
				);
	
				$this->add_control( 
					'filter_category_order',
					[
						'label' => esc_html__( 'Filter Order', 'themesflat-core' ),
						'type'	=> \Elementor\Controls_Manager::TEXT,	
						'description' => esc_html__( 'Filter Slug Categories Order Split By ","', 'themesflat-core' ),
						'default' => '',
						'label_block' => true,	
						'condition' => [
							'show_filter' => 'yes',
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
			'show_filter!' => 'yes',
		],	

	]

);	



$this->add_control( 

	'carousel',

	[

		'label' => esc_html__( 'Carousel', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'On', 'themesflat-core' ),

		'label_off' => esc_html__( 'Off', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

	]

);

$this->add_control( 

	'carousel_column_desk',

	[

		'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '3',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

			'3' => esc_html__( '3', 'themesflat-core' ),

			'4' => esc_html__( '4', 'themesflat-core' ),

			'5' => esc_html__( '5', 'themesflat-core' ),

			'6' => esc_html__( '6', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);



$this->add_control( 

	'carousel_column_tablet',

	[

		'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '1',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

			'3' => esc_html__( '3', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);



$this->add_control( 

	'carousel_column_mobile',

	[

		'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '1',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);	

$this->add_control(

	'carousel_spacer',

	[

		'label' => esc_html__( 'Spacer', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::NUMBER,

		'min' => 0,

		'max' => 100,

		'step' => 1,

		'default' => 30,				

	]

);

$this->add_control( 

	'carousel_centered',

	[

		'label' => esc_html__( 'Active Center', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'Yes', 'themesflat-core' ),

		'label_off' => esc_html__( 'No', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

	]

);

$this->add_control( 

	'carousel_loop',

	[

		'label' => esc_html__( 'Loop', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'Yes', 'themesflat-core' ),

		'label_off' => esc_html__( 'No', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

	]

);

// $this->add_control( 

// 	'carousel_arrow',

// 	[

// 		'label' => esc_html__( 'Arrow', 'themesflat-core' ),

// 		'type' => \Elementor\Controls_Manager::SWITCHER,

// 		'label_on' => esc_html__( 'Show', 'themesflat-core' ),

// 		'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

// 		'return_value' => 'yes',

// 		'default' => 'no',

// 		'condition' => [

// 			'carousel' => 'yes',

// 		],

// 		'description'	=> 'Just show when you have two slide',

// 		'separator' => 'before',

// 	]

// );


$this->add_control( 

	'carousel_bullets',

	[

		'label'         => esc_html__( 'Bullets', 'themesflat-core' ),

		'type'          => \Elementor\Controls_Manager::SWITCHER,

		'label_on'      => esc_html__( 'Show', 'themesflat-core' ),

		'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),

		'return_value'  => 'yes',

		'default'       => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

		'separator' => 'before',

	]

);	

$this->end_controls_section();

// /.End Carousel


		// Start General Style 

			$this->start_controls_section( 

				'section_style_general',

				[

					'label' => esc_html__( 'General', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_responsive_control( 

				'padding',

				[

					'label' => esc_html__( 'Padding Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'default' => [

						'top' => '15',

						'right' => '15',

						'bottom' => '15',

						'left' => '15',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],					

				]

			);	



			$this->add_responsive_control( 

				'margin',

				[

					'label' => esc_html__( 'Margin Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'allowed_dimensions' => [ 'right', 'left' ],

					'default' => [

						'right' => '',

						'left' => '',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



			$this->add_responsive_control( 

				'padding_inner',

				[

					'label' => esc_html__( 'Padding Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post .item .case-study-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],					

				]

			);	



			$this->add_responsive_control( 

				'margin_inner',

				[

					'label' => esc_html__( 'Margin Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post .item .case-study-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);



			$this->end_controls_section();    

		// /.End General Style



		// Start Post Icon Style 

		$this->start_controls_section( 

			'image_hei',

			[

				'label' => esc_html__( 'Image', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);

		

		$this->add_responsive_control( 

			'image_sv',

			[

				'label' => esc_html__( 'Image Height', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::SLIDER,

				'size_units' => [ 'px' ],

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 1000,

						'step' => 1,

					]

				],

				'selectors' => [

					'{{WRAPPER}} .tf-case-study-wrap .case-study-post img' => 'height: {{SIZE}}{{UNIT}}; !important',

				],

			]

		);
		$this->add_responsive_control( 

			'image_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .tf-case-study-wrap .case-study-post .featured-post a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section(); 


		// Start Content Style 

		$this->start_controls_section( 

			'section_style_content',

			[

				'label' => esc_html__( 'Content', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_responsive_control( 

			'padding_content',

			[

				'label' => esc_html__( 'Padding', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .wrap-case-study-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],					

			]

		);	



		$this->add_responsive_control( 

			'margin_content',

			[

				'label' => esc_html__( 'Margin', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .wrap-case-study-post .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);  

		$this->end_controls_section(); 


		// Start Title Style 

			$this->start_controls_section( 

				'section_style_title',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-case-study-post .case-study-post .title ',

				]

			); 



			$this->add_responsive_control( 

				'margin_title',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post .case-study-post .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  	



			$this->start_controls_tabs( 

				'background_title_tabs',

				);

				$this->start_controls_tab( 

					'title_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] ); 

					$this->add_control( 

						'title_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-case-study-post .case-study-post .title a' => 'color: {{VALUE}}',

							],

							

							

						]

					);  



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'title_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					] );



					$this->add_control( 

						'title_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-case-study-post  .case-study-post  .title a:hover' => 'color: {{VALUE}}',

							],

						]

					);   



					

				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			

			$this->end_controls_section();    

		// /.End Title Style



		// Start Description Style 

			$this->start_controls_section( 

				'section_style_desc',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

					'condition' => [

	                    'style'	=> ['style2','style3','style5'],
						
	                    ],

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_desc',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-case-study-post  .case-study-post .description',

					'condition' => [

	                    'style'	=> ['style2','style3','style5'],
						
	                    ],

				]

			);



			$this->add_control( 

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post  .case-study-post .description' => 'color: {{VALUE}}',

					],
					'condition' => [

	                    'style'	=> ['style2','style3','style5'],
						
	                    ],

					

				]

			); 



			$this->add_responsive_control( 

				'margin_desc',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-case-study-post  .case-study-post .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],
					'condition' => [

	                    'style'	=> ['style2','style3','style5'],
						
	                    ],

				]

			);  



		

			

			$this->end_controls_section();    

		// /.End Description Style



		// Start Button Style 

			$this->start_controls_section( 

				'section_style_btn',

				[

					'label' => esc_html__( 'Button', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_button',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a ',

				]

			);



			$this->start_controls_tabs( 

				'background_button_tabs',

				);

				$this->start_controls_tab( 

					'button_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] ); 

					$this->add_control( 

						'button_color_a',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a,{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a i ,{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a .read' => 'color: {{VALUE}}',

							],

							

						]

					);
					$this->add_control( 

						'button_bg_color_a',

						[

							'label' => esc_html__( 'Background Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a' => 'background-color: {{VALUE}}',

							],
							'condition' => [
	                          'style'	=> ['style1','style2','style3','style4'],
	                         ], 

							

						]

					); 
					$this->add_group_control( 

						\Elementor\Group_Control_Border::get_type(),
			
						[
			
							'name' => 'inner_case_border',
			
							'label' => esc_html__( 'Border', 'themesflat-core' ),
			
							'selector' => '{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a',
							'condition' => [
	                          'style'	=> ['style1','style2','style3','style4'],
	                         ],
			
						] 
						);



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'social_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					] );





					$this->add_control( 

						'button_color_hover',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a:hover ,{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a:hover i ,{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a:hover .read' => 'color: {{VALUE}}',

							],

							

						]

					); 
					$this->add_control( 

						'button_bg_color_hover_a',

						[

							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a:hover::after,{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a:hover' => 'background-color: {{VALUE}}',

							],
							'condition' => [
	                          'style'	=> ['style1','style2','style3','style4'],
	                         ],

							

						]

					); 
					$this->add_group_control( 

						\Elementor\Group_Control_Border::get_type(),
			
						[
			
							'name' => 'inner_case_hv_border',
			
							'label' => esc_html__( 'Border', 'themesflat-core' ),
			
							'selector' => '{{WRAPPER}} .wrap-case-study-post .case-study-post .tf-button-container a:hover',
							'condition' => [
	                          'style'	=> ['style1','style2','style3','style4'],
	                         ],
			
						] 
						);



				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			



			

			$this->end_controls_section();    

		// /.End Button Style

	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();


		$has_carousel = 'no-carousel';

		if ( $settings['carousel'] == 'yes' ) {

			$has_carousel = 'has-carousel';

		}



		$this->add_render_attribute( 'tf_case_study_wrap', ['class' => ['tf-case-study-wrap', 'themesflat-case-study-taxonomy', $settings['style'], $has_carousel ], 'data-tabid' => $this->get_id()] );





		if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'case-study',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );



        if (! empty( $settings['posts_categories'] )) {        	

        	$query_args['tax_query'] = array(

							        array(

							            'taxonomy' => 'case_study_category',

							            'field'    => 'slug',

							            'terms'    => $settings['posts_categories']

							        ),

							    );

        }        

        if ( ! empty( $settings['exclude'] ) ) {				

			if ( ! is_array( $settings['exclude'] ) )

				$exclude = explode( ',', $settings['exclude'] );



			$query_args['post__not_in'] = $exclude;

		}



		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];



		if ( $settings['sort_by_id'] != '' ) {	

			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );

			$query_args['post__in'] = $sort_by_id;

			$query_args['orderby'] = 'post__in';

		}

		?>

<?php 
				if ($settings['show_filter'] == 'yes'):
					$show_filter_class = 'show-filter'; 
					$filter_category_order = $settings['filter_category_order'];
					$filters = wp_list_pluck( get_terms( 'case_study_category','hide_empty=1'), 'name','slug' );
					echo '<ul class="case-study-filter posttype-filter">';
						echo '<li class="active"><a data-filter="*" href="#">' . esc_html('Show All', 'themesflat-core') . '</a></li>'; 
						if ($filter_category_order == '') { 

							foreach ($filters as $key => $value) {
								echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
							}
						
						}
						else {
							$filter_category_order = explode(",", $filter_category_order);
							foreach ($filter_category_order as $key) {
								$key = trim($key);
								echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $filters[$key] ) . '">' . esc_html( $filters[$key] ) . '</a></li>'; 
							}
						}
	                echo '</ul>';
					
					echo '<div class="container-filter ' . esc_attr($show_filter_class) . ' wrap-case-study-post">';

	            endif;
		?>

<?php $query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>



<div <?php echo $this->get_render_attribute_string('tf_case_study_wrap'); ?>
    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"
    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"
    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"
    data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>"
    data-centered="<?php echo esc_attr($settings['carousel_centered']); ?>" data-prev_icon="icon-drozy-chevron-left"
    data-next_icon="icon-drozy-chevron-right" data-loop="<?php echo esc_attr($settings['carousel_loop']) ?>"
    data-arrow="false" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">

	<?php if ( $settings['style'] == 'style3' ): ?>

		<div class="wrap-thumbnail">
			<?php $count=1;  while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="thumbnail-image" data-item="<?php echo esc_attr($count); ?>">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php 
						$get_id_post_thumbnail = get_post_thumbnail_id();
						echo sprintf('<img src="%s" class="lazyload" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
						?>
					</a>
				</div>
            <?php $count++; endwhile; ?>
		</div>

	<?php endif; ?>


    <div class="wrap-case-study-post row <?php echo esc_attr($settings['layout']); ?> ">

        <?php if ( $settings['carousel'] == 'yes' ): ?>
        <div class="owl-carousel">
            <?php endif; ?>

            <?php $count=1;  while ( $query->have_posts() ) : $query->the_post(); ?>


            <?php 

						$attr['settings'] = $settings; 
						$attr['count'] = $count; 
						$attr['icon'] = \Elementor\Addon_Elementor_Icon_manager_drozy::render_icon( themesflat_get_opt_elementor('case-study_post_icon') );

						tf_get_template_widget("case-study/{$settings['style']}", $attr); 

						?>


            <?php $count++; endwhile; ?>
            <?php if ( $settings['carousel'] == 'yes' ): ?>

        </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>

</div>

<?php 
	if ($settings['show_filter'] == 'yes'): ?>
</div>
<?php endif; ?>


<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;

			

	}	



}