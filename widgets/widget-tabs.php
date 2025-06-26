<?php
class TFTabs_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tftabs';
    }
    
    public function get_title() {
        return esc_html__( 'TF Tabs', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
        // Start Tab Setting        
			 $repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'list_title',
        [
            'label' => esc_html__( 'Tab Title', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Standard Plan', 'themesflat-core' ),
            'label_block' => true,
        ]
    );

    $repeater->add_control(
        'description',
        [
            'label' => esc_html__( 'Description (WYSIWYG)', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'themesflat-core' ),
            'label_block' => true,
        ]
    );

    $repeater->add_control(
        'list_price',
        [
            'label' => esc_html__( 'Price', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '29',
        ]
    );

    $repeater->add_control(
        'list_per',
        [
            'label' => esc_html__( 'Per (e.g. /per hour)', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '/per hour',
        ]
    );

    $repeater->add_control(
        'title-btn',
        [
            'label' => esc_html__( 'Button Text', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Get Started!', 'themesflat-core' ),
            'label_block' => true,
        ]
    );

    $repeater->add_control(
        'link_button',
        [
            'label' => esc_html__( 'Button Link', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_url( home_url( '/' ) ),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => false,
                'nofollow' => false,
            ],
        ]
    );

    $this->start_controls_section(
        'content_tabs_section',
        [
            'label' => esc_html__( 'Tabs Content', 'themesflat-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'tab_list',
        [
            'label' => esc_html__( 'Tab Items', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ list_title }}}',
        ]
    );

	
	    $this->end_controls_section();
        // /.End Tab Setting 
		$this->start_controls_section(
    'tab_nav_style',
    [
        'label' => esc_html__( 'Tab (Menu Tab Link)', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

// Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'tab_nav_typography',
        'label'    => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .menu-tab li .tab-link',
    ]
);

// Text Color
$this->add_control(
    'tab_nav_text_color',
    [
        'label'     => esc_html__( 'Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .menu-tab li .tab-link' => 'color: {{VALUE}};',
        ],
    ]
);

// Active Text Color
$this->add_control(
    'tab_nav_text_color_active',
    [
        'label'     => esc_html__( 'Active Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .menu-tab li .tab-link.active' => 'color: {{VALUE}};',
        ],
    ]
);

// Background
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'     => 'tab_nav_background',
        'label'    => esc_html__( 'Background', 'themesflat-core' ),
        'types'    => [ 'classic', 'gradient' ],
        'selector' => '{{WRAPPER}} .tab-slide',
    ]
);

$this->end_controls_section();

		$this->start_controls_section(
    'tab_title_style',
    [
        'label' => esc_html__( 'Tab Title', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'list_title_color',
    [
        'label'     => esc_html__( 'Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pricing-item .title' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'list_title_typography',
        'label'    => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .pricing-item .title',
    ]
);

$this->end_controls_section();
$this->start_controls_section(
    'tab_price_style',
    [
        'label' => esc_html__( 'Tab Price', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'list_price_color',
    [
        'label'     => esc_html__( 'Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wrap-pricing h3' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'list_price_typography',
        'label'    => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .wrap-pricing h3',
    ]
);

$this->add_responsive_control(
    'list_price_margin',
    [
        'label'      => esc_html__( 'Margin', 'themesflat-core' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors'  => [
            '{{WRAPPER}} .wrap-pricing h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();
$this->start_controls_section(
    'tab_per_style',
    [
        'label' => esc_html__( 'Tab Per', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'list_per_color',
    [
        'label'     => esc_html__( 'Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wrap-pricing h3 span' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'list_per_typography',
        'label'    => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .wrap-pricing h3 span',
    ]
);

$this->add_responsive_control(
    'list_per_margin',
    [
        'label'      => esc_html__( 'Margin', 'themesflat-core' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors'  => [
            '{{WRAPPER}} .wrap-pricing h3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->end_controls_section();
$this->start_controls_section(
    'tab_button_style',
    [
        'label' => esc_html__( 'Tab Button', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'button_color',
    [
        'label'     => esc_html__( 'Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .tf-btn span' => 'color: {{VALUE}};',
        ],
    ]
);

// Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'button_typography',
        'label'    => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .tf-btn span',
    ]
);

// Background
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'     => 'button_background',
        'label'    => esc_html__( 'Background', 'themesflat-core' ),
        'types'    => [ 'classic', 'gradient' ],
        'selector' => '{{WRAPPER}} .tf-btn',
    ]
);

// Padding
$this->add_responsive_control(
    'button_padding',
    [
        'label'      => esc_html__( 'Padding', 'themesflat-core' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors'  => [
            '{{WRAPPER}} .tf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Margin
$this->add_responsive_control(
    'button_margin',
    [
        'label'      => esc_html__( 'Margin', 'themesflat-core' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors'  => [
            '{{WRAPPER}} .tf-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Border Radius
$this->add_responsive_control(
    'button_border_radius',
    [
        'label'      => esc_html__( 'Border Radius', 'themesflat-core' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'selectors'  => [
            '{{WRAPPER}} .tf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Hover
$this->start_controls_tab( 'button_hover_tab', [ 'label' => esc_html__( 'Hover', 'themesflat-core' ) ] );

$this->add_control(
    'button_hover_color',
    [
        'label'     => esc_html__( 'Hover Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .tf-btn:hover span' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'button_hover_background',
    [
        'label'     => esc_html__( 'Hover Background', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .tf-btn:hover' => 'background-color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_tab();

$this->end_controls_section();
$this->start_controls_section(
    'tab_description_style',
    [
        'label' => esc_html__( 'Tab Content List', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_control(
    'description_text_color',
    [
        'label'     => esc_html__( 'Text Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pricing-item li' => 'color: {{VALUE}};',
        ],
    ]
);

// Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'description_typography',
        'label'    => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .pricing-item li',
    ]
);

$this->add_control(
    'description_icon_color',
    [
        'label'     => esc_html__( 'Icon Color', 'themesflat-core' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pricing-item.style-1 li::before' => 'color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();

	    // /.End Style Title 

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

$this->add_render_attribute( 'tf_tabs_wrapper', [
    'id' => 'tf-tabs-' . $this->get_id(),
    'data-tabid' => $this->get_id(),
] );	
	?>
<?php if ( ! empty( $settings['tab_list'] ) ) : ?>
<div id="pricing" class="section-pricing flat-animate-tab section">
    <div class="tab-slide mb_32">
        <ul class="menu-tab d-flex align-items-center" role="tablist">
            <li class="item-slide-effect"></li>
            <?php foreach ( $settings['tab_list'] as $index => $tab ) : ?>
            <li class="nav-tab-item <?php echo $index === 0 ? 'active' : ''; ?>" role="presentation">
                <a href="#tab-<?php echo $index; ?>"
                    class="text-button tab-link fw-6 font-3 <?php echo $index === 0 ? 'active' : ''; ?>"
                    data-bs-toggle="tab">
                    <?php echo esc_html( $tab['list_title'] ); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="tab-content">
        <?php foreach ( $settings['tab_list'] as $index => $tab ) : ?>
        <div class="tab-pane <?php echo $index === 0 ? 'active show' : ''; ?>" id="tab-<?php echo $index; ?>"
            role="tabpanel">
            <div class="pricing-item style-1 bs-light-mode area-effect">
                <h4 class="title"><?php echo esc_html( $tab['list_title'] ); ?></h4>

                <div class="list-check">
                    <?php echo wp_kses_post( $tab['description'] ); ?>
                </div>

                <div class="wrap-pricing">
                    <h3 class="text_white d-flex align-items-center gap_4 mb_20">
                        <?php echo esc_html( $tab['list_price'] ); ?>
                        <span class="text-caption-1 text_muted-color"><?php echo esc_html( $tab['list_per'] ); ?></span>
                    </h3>
                    <?php if ( ! empty( $tab['link_button']['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $tab['link_button']['url'] ); ?>"
                        class="tf-btn style-1 animate-hover-btn">
                        <span><?php echo esc_html( $tab['title-btn'] ); ?></span>
                    </a>
                    <?php endif; ?>
                </div>

                <div class="item-shape spotlight">
                    <img src="<?php echo esc_url( URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/img/small-comet.webp' ); ?>"
                        loading="lazy" decoding="async" alt="item">
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<?php
		
	}

}