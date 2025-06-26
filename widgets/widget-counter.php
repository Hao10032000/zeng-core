<?php class TFCounter_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-counter';
    }
    
    public function get_title() {
        return esc_html__( 'TF Counter', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-counter'];
	}

    public function get_script_depends() {
		return [ 'waypoint', 'tf-counter' ];
	}

	protected function register_controls() {
		// Start Counter  
	$repeater = new \Elementor\Repeater();
		         
	$this->start_controls_section(
        'counter_section',
        [
            'label' => __('Counters', 'themesflat-core'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );


    $repeater->add_control(
        'number',
        [
            'label' => __('Number', 'themesflat-core'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 0,
        ]
    );

    $repeater->add_control(
        'suffix',
        [
            'label' => __('Number Suffix', 'themesflat-core'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '+',
        ]
    );

    $repeater->add_control(
        'title',
        [
            'label' => __('Title', 'themesflat-core'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Sample Title', 'themesflat-core'),
        ]
    );

    $this->add_control(
        'counters',
        [
            'label' => __('Counter Items', 'themesflat-core'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'number' => 10,
                    'suffix' => '+',
                    'title' => __('Years in AI Development', 'themesflat-core'),
                ],
                [
                    'number' => 500,
                    'suffix' => '+',
                    'title' => __('Satisfied Clients', 'themesflat-core'),
                ],
                [
                    'number' => 1,
                    'suffix' => 'k+',
                    'title' => __('Projects Completed', 'themesflat-core'),
                ],
            ],
            'title_field' => '{{{ title }}}',
        ]
    );

    $this->end_controls_section();
        // /.End Counter  

        // Start Style Number
	        $this->start_controls_section( 'section_style_number',
	            [
	                'label' => esc_html__( 'Number', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );
            $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typo Number', 'themesflat-core' ),
					'name' => 'typography_number_df',
					'selector' => '{{WRAPPER}} .counter-item .odometer ',
				]
			);
	        $this->add_control(
				'number_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .counter-item .odometer' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Typo Number Suffix', 'themesflat-core' ),
					'name' => 'typography_number_df_sf',
					'selector' => '{{WRAPPER}} .counter-item span ',
				]
			);

			$this->add_control(
				'number_color_pf',
				[
					'label' => esc_html__( 'Text Suffix Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .counter-item span' => 'color: {{VALUE}};',
					],
				]
			);
			
	


			$this->add_responsive_control(
				'margin_number',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .counter-item .counter-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style Number

        // Start Style Title
	        $this->start_controls_section( 'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Text Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .text_muted-color' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
					'selector' => '{{WRAPPER}} .text_muted-color',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_shadow',
					'selector' => '{{WRAPPER}} .text_muted-color',
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .text_muted-color' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],					
				]
			);	
			        
        	$this->end_controls_section();    
	    // /.End Style Title
		
	}
	
	protected function render() {
    $settings = $this->get_settings_for_display();
if ( isset($settings['counters']) && is_array($settings['counters']) ) {
    echo '<div class="wrap-counter tf-grid-layout md-col-3">';
    foreach ( $settings['counters'] as $item ) {
        ?>
        <div class="counter-item bs-light-mode">
            <div class="counter-number h2 text_white mb_7">
                <div class="odometer" data-number="<?php echo esc_attr($item['number']); ?>">0</div>
                <span class="sub"><?php echo esc_html($item['suffix']); ?></span>
            </div>
            <p class="text-body-1 text_muted-color font-3"><?php echo esc_html($item['title']); ?></p>
            <div class="item-shape">
                <img src="<?php echo esc_url( URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/img/small-comet.webp' ); ?>" loading="lazy" decoding="async" alt="">
            </div>
        </div>
        <?php
    }
    echo '</div>';
}
}

}