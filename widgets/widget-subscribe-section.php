<?php

class TFSubscribe_Section_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-subscribe-section';

    }

    

    public function get_title() {

        return esc_html__( 'TF Subscribe Section', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-form-horizontal';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }


	protected function register_controls() {

		// Start List Setting        

			$this->start_controls_section( 'section_setting',

	            [

	                'label' => esc_html__('Setting', 'themesflat-core'),

	            ]

	        );


			$this->add_control(

				'heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Subscribe now to stay updated with top news!', 'themesflat-core' ),

					'label_block' => true,

				]

			);

			$this->add_control(

				'description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXTAREA,					

					'default' => esc_html__( 'Subscribe now to stay updated with all the top news, exclusive insights, and weekly highlights you won’t want to miss.', 'themesflat-core' ),

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

        // /.End List Setting  

        
        // Start Style

	        $this->start_controls_section( 'section_style',

	            [

	                'label' => esc_html__( 'Style', 'themesflat-core' ),

	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

	            ]

	        );	

			$this->add_control(

				'h_general',

				[

					'label' => esc_html__( 'General', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_responsive_control(

				'content_padding',

				[

					'label' => esc_html__( 'Padding', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'size_units' => [ 'px', '%', 'em' ],

					'selectors' => [

						'{{WRAPPER}}  .newsletter-item.style-1 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);

			$this->add_control( 

				'content_color',

				[

					'label' => esc_html__( 'Background', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .newsletter-item.style-1' => 'background-color: {{VALUE}}',					

					],

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

					'selector' => '{{WRAPPER}} .title',

				]

			); 



			$this->add_control( 

				'heading_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .title' => 'color: {{VALUE}}',					

					],

				]

			);


			$this->add_control(

				'h_description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_description',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .description',


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


				]

			);			







        	$this->end_controls_section();    

	    // /.End Style 


	}	



	protected function render() {

		$settings = $this->get_settings_for_display(); ?>


        <!-- section-newsletter -->
            <div class="tf-container">
                <div class="newsletter-item style-1 d-flex justify-content-between">

                    <?php if (!empty($settings['heading'])) : ?>
                        <h3 class="title"><?php echo esc_html($settings['heading']); ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($settings['description'])) : ?>
                        <p class="description"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($settings['subscribe_form'])) : ?>
                    	<div class="form widget-subscribe-section">
							<?php echo do_shortcode( $settings['subscribe_form'] ); ?>
                    	</div>
                    <?php endif; ?>

                </div>
            </div>
        <!-- /End section-newsletter -->


        <?php 		

	}



}