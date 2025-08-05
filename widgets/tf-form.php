<?php

class TFForm_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-form';
	}

	public function get_title() {
		return esc_html__( 'TF Form', 'themesflat-core' );
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
		$this->start_controls_section('section_setting', [
			'label' => esc_html__('Setting', 'themesflat-core'),
		]);

		$this->add_control('style', [
			'label' => esc_html__('Style', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'style1',
			'options' => [
				'style1' => esc_html__('Style 1', 'themesflat-core'),
				'style2' => esc_html__('Style 2', 'themesflat-core'),
			],
		]);
        $this->add_control('heading', [
			'label' => esc_html__('Sub Title', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('Contact', 'themesflat-core'),
			'label_block' => true,
		]);

		$this->add_control('description', [
			'label' => esc_html__('Title', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('Lets', 'themesflat-core'),
			'label_block' => true,
		]);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control('animate_text', [
			'label' => esc_html__('Animate Text', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('Design', 'themesflat-core'),
		]);

		$this->add_control('list', [
			'label' => esc_html__('List', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['animate_text' => esc_html__('Design', 'themesflat-core')],
				['animate_text' => esc_html__('Design 1', 'themesflat-core')],
			],

		]);
        $this->add_control('description2', [
			'label' => esc_html__('Title 2', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('incredible work together', 'themesflat-core'),
			'label_block' => true,
		]);

		$this->add_control('title-heding', [
			'label' => esc_html__('Title Heading', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('hi.avitex@gmail.com', 'themesflat-core'),
			'label_block' => true,

		]);

		$this->add_control('description-heding', [
			'label' => esc_html__('Description', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => esc_html__('Based in San Francisco, CA ', 'themesflat-core'),
			'label_block' => true,
		]);
        $repeater = new \Elementor\Repeater();

$repeater->add_control(
    'icon',
    [
        'label'   => esc_html__('Icon', 'themesflat-core'),
        'type'    => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value'   => 'fas fa-star',
            'library' => 'fa-solid',
        ],
    ]
);
$repeater->add_control(
    'link',
    [
        'label'       => esc_html__('Link', 'themesflat-core'),
        'type'        => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'themesflat-core'),
        'show_external' => true,
        'default'     => [
            'url' => '#',
        ],
    ]
);

$this->add_control(
    'icon_list',
    [
        'label'       => esc_html__('Icons', 'themesflat-core'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $repeater->get_controls(),
        'default'     => [
            [
                'icon' => [
                    'value'   => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ],
            [
                'icon' => [
                    'value'   => 'fas fa-heart',
                    'library' => 'fa-solid',
                ],
            ],
        ],
        'title_field' => '<i class="{{ icon.value }}"></i>',
    ]
);

$this->add_control(
    'cf7_shortcode',
    [
        'label'       => esc_html__('Form Shortcode', 'themesflat-core'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'placeholder' => '[contact-form-7 id="8bed001" title="Form Contact"]',
        'default' => esc_html__('[contact-form-7 id="8bed001" title="Form Contact"]', 'themesflat-core'),
    ]
);

$this->end_controls_section();
$this->start_controls_section(
    'section_heading_style',
    [
        'label' => esc_html__( 'Content', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

// Heading style 
$this->add_control(
    'heading_style_heading',
    [
        'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'heading_typography',
        'label' => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .tag-heading',

    ]
);

$this->add_control(
    'heading_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .tag-heading' => 'color: {{VALUE}};',
        ],

    ]
);

$this->add_control(
    'heading_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .tag-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],

    ]
);

// Description 
$this->add_control(
    'description_style_heading',
    [
        'label' => esc_html__( 'Title', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'description_typography',
        'label' => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .heading-section .title',
    ]
);

$this->add_control(
    'description_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .heading-section h3' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'description_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .heading-section .title,{{WRAPPER}} .heading-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->add_control(
    'mail_style_heading',
    [
        'label' => esc_html__( 'Title Mail', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'mail_typography',
        'label' => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .heading-section .hover-underline-link',
    ]
);

$this->add_control(
    'mail_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .heading-section .hover-underline-link' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'mail_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .heading-section .hover-underline-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

$this->add_control(
    'address_style_heading',
    [
        'label' => esc_html__( 'Title Address', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'address_typography',
        'label' => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .heading-section .text-caption-2',
    ]
);

$this->add_control(
    'address_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .heading-section .text-caption-2' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'address_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .heading-section .text-caption-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
$this->end_controls_section();
	}

protected function render() {
	$settings = $this->get_settings_for_display();
?>

<?php if ($settings['style'] === 'style1') : ?>
<div id="contact" class="section-contact style-1 section spacing-6">
    <div class="row">
        <div class="col-lg-5">
            <div class="heading-section mb_44">
                <?php if (!empty($settings['heading'])) : ?>
                <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_33">
                    <?php echo esc_html($settings['heading']); ?>
                </div>
                <?php endif; ?>
                <div class="title mb_40">
                    <h3 class="text_white  fw-5 animationtext clip">
                        <?php if (!empty($settings['description'])) : ?>
                        <?php echo esc_html($settings['description']); ?>
                        <?php endif; ?>
                        <span class="tf-text s1 cd-words-wrapper text_primary-color">
                            <?php $count=1; foreach ($settings['list'] as $item) : ?>
                            <span
                                class="item-text <?php echo esc_attr($count==1 ? 'is-visible': ''); ?>"><?php echo esc_html($item['animate_text']); ?></span>
                            <?php $count++; endforeach; ?>
                        </span>
                    </h3>
                    <?php if (!empty($settings['description2'])) : ?>
                    <h3 class="text_white title fw-5 "> <?php echo esc_html($settings['description2']); ?></h3>
                    <?php endif; ?>
                </div>
                <div class="heading-title">
                    <div class="mb_12">
                        <?php if (!empty($settings['description-heding'])) : ?>
                        <h4 class="text_white fw-4 mb_4"><a class="hover-underline-link link">
                                <?php echo esc_html($settings['title-heding']); ?></a>
                        </h4>
                        <?php endif; ?>
                        <?php if (!empty($settings['description-heding'])) : ?>
                        <p class="text-caption-2 text_secondary-color font-3">
                            <?php echo esc_html($settings['description-heding']); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ( ! empty( $settings['icon_list'] ) ) {
                    echo '<ul class="list-icon d-flex">';
                    foreach ( $settings['icon_list'] as $item ) {
                    echo '<li>';

                    $this->add_render_attribute( 'icon_link', 'class', 'icon-link' );

                    if ( ! empty( $item['link']['url'] ) ) {
                       $this->add_link_attributes( 'icon_link', $item['link'] );
                       echo '<a ' . $this->get_render_attribute_string( 'icon_link' ) . '>';
                    }

                    \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );

                    if ( ! empty( $item['link']['url'] ) ) {
                    echo '</a>';
                     }

                     echo '</li>';
                    }
                   echo '</ul>';
                   }
                ?>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-contact bs-light-mode">
                <?php if ( ! empty( $settings['cf7_shortcode'] ) ) {
               echo do_shortcode( $settings['cf7_shortcode'] );
             } ?>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div id="contact" class="section-contact spacing-1 pb-0 section spacing-1">
    <div class="heading-section mb_44">
        <?php if (!empty($settings['heading'])) : ?>
        <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_33">
            <?php echo esc_html($settings['heading']); ?>
        </div>
        <?php endif; ?>
        <h3 class="text_white  fw-5 animationtext clip">
            <?php if (!empty($settings['description'])) : ?>
            <?php echo esc_html($settings['description']); ?>
            <?php endif; ?>
            <span class="tf-text s1 cd-words-wrapper text_primary-color">
                <?php $count=1; foreach ($settings['list'] as $item) : ?>
                <span
                    class="item-text <?php echo esc_attr($count==1 ? 'is-visible': ''); ?>"><?php echo esc_html($item['animate_text']); ?></span>
                <?php $count++; endforeach; ?>
            </span>
        </h3>
        <?php if (!empty($settings['description2'])) : ?>
        <h3 class="text_white title fw-5 "> <?php echo esc_html($settings['description2']); ?></h3>
        <?php endif; ?>
    </div>
    <div class="form-contact bs-light-mode">
        <div class="heading-title d-flex justify-content-between align-items-center mb_32">
            <div>
                <?php if (!empty($settings['description-heding'])) : ?>
                <h4 class="text_white fw-4 mb_4"><a class="hover-underline-link link">
                        <?php echo esc_html($settings['title-heding']); ?></a>
                </h4>
                <?php endif; ?>
                <?php if (!empty($settings['description-heding'])) : ?>
                <p class="text-caption-2 text_secondary-color font-3">
                    <?php echo esc_html($settings['description-heding']); ?></p>
                <?php endif; ?>
            </div>
            <?php if ( ! empty( $settings['icon_list'] ) ) {
                    echo '<ul class="list-icon d-flex">';
                    foreach ( $settings['icon_list'] as $item ) {
                    echo '<li>';

                    $this->add_render_attribute( 'icon_link', 'class', 'icon-link' );

                    if ( ! empty( $item['link']['url'] ) ) {
                       $this->add_link_attributes( 'icon_link', $item['link'] );
                       echo '<a ' . $this->get_render_attribute_string( 'icon_link' ) . '>';
                    }

                    \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );

                    if ( ! empty( $item['link']['url'] ) ) {
                    echo '</a>';
                     }

                     echo '</li>';
                    }
                   echo '</ul>';
                   }
                ?>
        </div>

        <?php if ( ! empty( $settings['cf7_shortcode'] ) ) {
               echo do_shortcode( $settings['cf7_shortcode'] );
             } ?>
    </div>
</div>
<?php endif; ?>
<?php
	}
}