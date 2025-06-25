<?php

class TFInstagram_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-instagram';

    }

    

    public function get_title() {

        return esc_html__( 'TF Instagram', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-instagram-gallery';

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

			$this->add_group_control( 

				\Elementor\Group_Control_Image_Size::get_type(),

				[

					'name' => 'thumbnail',

					'default' => 'full',

				]

			);


			$this->add_control(

				'heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Follow Us On Instagram', 'themesflat-core' ),

					'label_block' => true,

				]

			);

            $this->add_control( 

                'button_text',

                [

                    'label' => esc_html__( 'Button Text', 'drozy' ),

                    'type' => \Elementor\Controls_Manager::TEXT,

                    'default' => esc_html__( 'Follow Us', 'drozy' ),

                ]

            );	


            $this->add_control(

				'link',

				[

					'label' => esc_html__( 'Link', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::URL,

					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),

					'default' => [

						'url' => '#',

						'is_external' => false,

						'nofollow' => false,

					],

				]

			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/instagram.jpg",
					],
				]
			);

			$repeater->add_control(
				'link_image',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
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
							'image' =>  URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/instagram.jpg",
							'link' => esc_html__( '#', 'themesflat-core' ),
						],
						[
							'image' =>  URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/instagram.jpg",
							'link' => esc_html__( '#', 'themesflat-core' ),
						],
						[
							'image' =>  URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/instagram.jpg",
							'link' => esc_html__( '#', 'themesflat-core' ),
						],
						[
							'image' =>  URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/instagram.jpg",
							'link' => esc_html__( '#', 'themesflat-core' ),
						],
					],
				]
			);

            $this->add_control(

				'heading_form',

				[

					'label' => esc_html__( 'Heading Form', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,					

					'default' => esc_html__( 'Subscribe for all the top news!', 'themesflat-core' ),

					'label_block' => true,

                    'condition' => [
		                'style' => 'style2',
		            ]

				]

			);

            $this->add_control(

				'subscribe_form',

				[

					'label' => esc_html__( 'Shortcode Mailchimp Form', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXTAREA,					

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

					'selector' => '{{WRAPPER}} .ins-button',

				]

			); 

			$this->add_control( 

				'button_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .ins-button' => 'color: {{VALUE}}',					

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

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_heading_form',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .title-form',
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

						'{{WRAPPER}} .title-form' => 'color: {{VALUE}}',					

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
                $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        $max_items = ($settings['style'] === 'style1') ? 4 : 5;
        $items = array_slice($settings['list'], 0, $max_items);
        ?>

        <?php if ( $settings['style'] == 'style1' ): ?>

            <!-- section-instagram -->
            <div class="section-instagram tf-spacing-3">
                <div class="tf-container">
                    <div class="tf-grid-layout lg-col-5 md-col-4 tf-col-2">
                        <div class="ins-item">
                            <span class="icon-InstagramLogo icon"></span>
                            <?php if (!empty($settings['heading'])) : ?>
                                <h4 class="title main-title"><?php echo esc_html($settings['heading']); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($settings['link']['url']) && !empty($settings['button_text'])) : ?>
                                <a href="<?php echo esc_url($settings['link']['url']); ?>" class="ins-button hover-underline-link fw-7 text_on-surface-color text-body-1" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                <?php echo esc_html($settings['button_text']); ?></a>
                            <?php endif; ?>
                        </div>

                            <?php
                            $count = 1;
                            $total = count($settings['list']); 
                            foreach ( $settings['list'] as $index => $item ):
                                $is_last = ($count === $total);
                                $is_even = ($count % 2 === 0);
                            
                                $extra_class = ($is_last && $is_even) ? ' lg-hide' : '';
 								$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $item['image']['id'], 'thumbnail', $settings );
					    		$featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
                            ?>
                                <div class="hover-image-translate<?php echo esc_attr($extra_class); ?>">
                                    <a href="<?php echo esc_url($item['link_image']['url']); ?>" class="img-style rounded-16">
                                        <?= $featured_image; ?>
                                    </a>
                                </div>
                            <?php
                                $count++;
                            endforeach;
                            ?>
                        
                    </div>
                </div>
            </div>
            <!-- /End section-instagram -->

		<?php else: ?>

                    <!-- section-instagram -->
                    <div id="contact" class="section-instagram-2 section">
                        <div class="tf-container">
                            <div class="tf-grid-layout lg-col-2">
                                <div class="col-ins tf-grid-layout sm-col-2">
                                    <div class="ins-item style-1">
                                        <span class="icon-InstagramLogo icon"></span>
                                        <?php if (!empty($settings['heading'])) : ?>
                                            <h3 class="title main-title"><?php echo esc_html($settings['heading']); ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['link']['url']) && !empty($settings['button_text'])) : ?>
                                            <a href="<?php echo esc_url($settings['link']['url']); ?>" class="ins-button hover-underline-link fw-7 text_on-surface-color text-body-1" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
                                            <?php echo esc_html($settings['button_text']); ?></a>
                                        <?php endif; ?>
                                    </div>

                                        <?php  foreach ( array_slice($settings['list'], 0, 3) as $item ): 
											 	$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $item['image']['id'], 'thumbnail', $settings );
					    						$featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
											?>
                                            <div class="hover-image-translate">
                                                <a href="<?php echo esc_url($item['link_image']['url']); ?>" class="img-style rounded-12">
                                                     <?= $featured_image; ?>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                  
                                </div>

                                <div class="col-ins">
                                    <div class="tf-grid-layout sm-col-2 mb_30">
                                        
                                        <?php 
                                        foreach ( array_slice($settings['list'], 3, 2) as $item ): 
										$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $item['image']['id'], 'thumbnail', $settings );
					    						$featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
										?>
                                            <div class="hover-image-translate">
                                                <a href="<?php echo esc_url($item['link_image']['url']); ?>" class="img-style rounded-12">
                                                    <?= $featured_image; ?>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                    <div class="newsletter-item d-flex flex-column justify-content-between instagram-form">
                                        
                                        <?php if (!empty($settings['heading_form'])) : ?>
                                            <h3 class="title mb_20 title-form"><?php echo esc_html($settings['heading_form']); ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['subscribe_form'])) : ?>
                                        	<div class="form widget-subscribe-section">
					                    		<?php echo do_shortcode( $settings['subscribe_form'] ); ?>
                                        	</div>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- /End section-instagram -->

        <?php endif; ?>


        <?php 		

	}



}