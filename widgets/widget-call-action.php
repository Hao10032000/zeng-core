<?php

class TFCall_Action_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-call-to-action';

    }

    

    public function get_title() {

        return esc_html__( 'TF Tittle Section', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-t-letter';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }

    public function get_style_depends() {

		return ['animate-text'];

	}



	public function get_script_depends() {

		return ['animate-text'];

	}



	protected function register_controls() {

		// Start List Setting        

			$this->start_controls_section( 'section_setting',

	            [

	                'label' => esc_html__('Setting', 'themesflat-core'),

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

				'heading',

				[

					'label' => esc_html__( 'Sub Tittle', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Resume', 'themesflat-core' ),

					'label_block' => true,

				]

			);
			$this->add_control(

				'description',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Education & Experience', 'themesflat-core' ),

					'label_block' => true,

				]

			);

			$repeater = new \Elementor\Repeater();

            $repeater->add_control(
				'animate_text',
				[
					'label' => esc_html__( 'Animate Text', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'AI Developer', 'themesflat-core' ),
				]
			);

            $this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'animate_text' => esc_html__( 'AI Developer', 'themesflat-core' ),
						],
                        [
							'animate_text' => esc_html__( 'AI Developer 1', 'themesflat-core' ),
						],
					],
                    'condition' => [
		                'style' => 'style2',
		            ]
				]
			);
			
			$this->add_control(

				'title-heding',

				[

					'label' => esc_html__( 'Tittle Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Empower Code Intelligence', 'themesflat-core' ),

					'label_block' => true,

					'condition' => [
		                'style' => 'style2',
		            ]

				]

			);
			$this->add_control(

				'description-heding',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXTAREA,					

					'default' => esc_html__( 'Hello! Im ZenG, an AI Developer with 10 years of experience in designing and developing intelligent systems. My expertise spans machine learning, natural language processing, computer vision, and data analysis. Driven by curiosity, I transform complex data into smart solutions.', 'themesflat-core' ),

					'label_block' => true,
                          'condition' => [
		                'style' => 'style2',
		            ]

				]

			);


           
	        

			$this->end_controls_section();

        // /.End List Setting  


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

					'selector' => '{{WRAPPER}} .heading',

				]

			); 



			$this->add_control( 

				'heading_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .heading' => 'color: {{VALUE}}',					

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
					'{{WRAPPER}} .heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


			$this->add_control(

				'h_description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

                    'condition' => [
		                'style' => 'style1',
		            ]

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_description',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .description',

                    'condition' => [
		                'style' => 'style1',
		            ]

				]

			); 



			$this->add_control( 

				'description_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .description' => 'color: {{VALUE}}',					

					],

                    'condition' => [
		                'style' => 'style1',
		            ]

				]

			);			





		$this->add_responsive_control(

			'description_margin',
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
					'{{WRAPPER}} .description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],

                  'condition' => [
		                'style' => 'style1',
		            ]
			]
		);


			$this->add_control(

				'h_button',

				[

					'label' => esc_html__( 'Button', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

            $this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_button',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-btn',

				]

			); 



			$this->add_control( 

				'button_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'color: {{VALUE}}',					

					],

				]

			);	


            $this->add_control( 

				'button_background_color',

				[

					'label' => esc_html__( 'Background', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'background-color: {{VALUE}}',					

					],

				]

			);	
			        

            $this->add_responsive_control( 

				'button_border_radius',

				[

					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px' , '%' ],

					'selectors' => [

						'{{WRAPPER}} .tf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);


            $this->add_control(

				'h_heading_right',

				[

					'label' => esc_html__( 'Heading Right', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			);

            $this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_heading_right',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .heading-right',

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			); 



			$this->add_control( 

				'heading_right_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .heading-right' => 'color: {{VALUE}}',					

					],

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			);
		
		$this->add_responsive_control(

			'heading_right_margin',
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
					'{{WRAPPER}} .heading-right' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],

                                    'condition' => [
		                'style' => 'style2',
		            ]
			]
		);

        
            $this->add_control(

				'h_content',

				[

					'label' => esc_html__( 'Content List', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			);

            $this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_content_right',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .list-work a',

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			); 



			$this->add_control( 

				'content_right_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .list-work a' => 'color: {{VALUE}}',					

					],

                    'condition' => [
		                'style' => 'style2',
		            ]

				]

			);
		

        	$this->end_controls_section();    

	    // /.End Style 


	}	



	protected function render() {

		$settings = $this->get_settings_for_display();		
        ?>

<?php if ($settings['style'] == 'style1'): ?>

<!-- Section CTA -->

<div class="heading-section mb_47">
    <?php if (!empty($settings['heading'])) : ?>
    <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_30">
        <?php echo esc_html($settings['heading']); ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($settings['description'])) : ?>
    <?php echo sprintf( '<h3 class="text_white fw-5 split-text effect-blur-fade">%1$s</h3>', $settings['description'] ); ?>
    <?php endif; ?>
</div>
<!-- /End Section CTA -->

<?php else: ?>

<!-- section-about -->
<div class="heading-section mb_45">
    <?php if (!empty($settings['heading'])) : ?>
    <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_30">
        <?php echo esc_html($settings['heading']); ?>
    </div>
    <?php endif; ?>

    <div class="title-border-shape">
        <h4 class="animationtext clip ">
            <?php if (!empty($settings['description'])) : ?>
            <?php echo sprintf( '%1$s', $settings['description'] ); ?>
            <?php endif; ?>
            <span class="tf-text s1 cd-words-wrapper text_primary-color">
                <?php foreach ( $settings['list'] as $item ): ?>
                <span class="item-text is-visible"><?php echo esc_html($item['animate_text']); ?></span>
                <?php endforeach; ?>
            </span>
        </h4>

        <div class="shape">
            <span class="shape-1"></span>
            <span class="shape-2"></span>
            <span class="shape-3"></span>
            <span class="shape-4"></span>
        </div>
        <div class="line">
            <span class="line-horizontal horizontal-1"></span>
            <span class="line-horizontal horizontal-2"></span>
            <span class="line-vertical vertical-1"></span>
            <span class="line-vertical vertical-2"></span>
        </div>
    </div>
</div>
 <?php if (!empty($settings['title-heding'])) : ?>
	<h1 class="title mb_16 split-text effect-blur-fade">
    <?php echo esc_html($settings['title-heding']); ?>
    </h1>
<?php endif; ?>
 <?php if (!empty($settings['description-heding'])) : ?>
	<p class="text_muted-color font-3 mb_43 split-text split-lines-transform"><?php echo esc_html($settings['description-heding']); ?></p>
<?php endif; ?>

<!-- End section-about -->

<?php endif; ?>

<?php 		

	}



}