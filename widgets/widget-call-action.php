<?php

class TFCall_Action_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-call-to-action';
	}

	public function get_title() {
		return esc_html__( 'TF Title Section', 'themesflat-core' );
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
				'style3' => esc_html__('Style 3', 'themesflat-core'),
                'style4' => esc_html__('Style 4', 'themesflat-core'),
			],
		]);

		$this->add_control('heading', [
			'label' => esc_html__('Sub Title', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('Resume', 'themesflat-core'),
			'label_block' => true,
            'condition' => [
              'style!' => [ 'style4']
            ],
		]);

		$this->add_control('description', [
			'label' => esc_html__('Title', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('Education & Experience', 'themesflat-core'),
			'label_block' => true,
             'condition' => [
              'style!' => [ 'style4']
            ],
		]);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control('animate_text', [
			'label' => esc_html__('Animate Text', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('AI Developer', 'themesflat-core'),
		]);

		$this->add_control('list', [
			'label' => esc_html__('List', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['animate_text' => esc_html__('AI Developer', 'themesflat-core')],
				['animate_text' => esc_html__('AI Developer 1', 'themesflat-core')],
			],
			'condition' => [
                  'style' => ['style2', 'style3']
             ],

		]);

		$this->add_control('title-heding', [
			'label' => esc_html__('Title Heading', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__('Empower Code Intelligence', 'themesflat-core'),
			'label_block' => true,
			'condition' => [
              'style' => ['style2', 'style3', 'style4']
            ],

		]);

		$this->add_control('description-heding', [
			'label' => esc_html__('Description', 'themesflat-core'),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => esc_html__('Hello! I\'m ZenG, an AI Developer with 10 years of experience...', 'themesflat-core'),
			'label_block' => true,
			'condition' => [
    'style' => ['style2', 'style4']
],

		]);

		$this->end_controls_section();

		$this->start_controls_section(
    'section_heading_style',
    [
        'label' => esc_html__( 'Content', 'themesflat-core' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);
$this->add_control(
    'content_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} .heading-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
// Heading style 
$this->add_control(
    'heading_style_heading',
    [
        'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'condition' => [
            'style!' => ['style4'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'heading_typography',
        'label' => esc_html__( 'Typography', 'themesflat-core' ),
        'selector' => '{{WRAPPER}} .tag-heading',
        'condition' => [
            'style!' => ['style4'],
        ],
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
        'condition' => [
            'style!' => ['style4'],
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
        'condition' => [
            'style!' => ['style4'],
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
        'selector' => '{{WRAPPER}} .heading-section h3,{{WRAPPER}} .heading-section h4',
    ]
);

$this->add_control(
    'description_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .heading-section h3,{{WRAPPER}} .heading-section h4' => 'color: {{VALUE}};',
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
            '{{WRAPPER}} .heading-section h3,{{WRAPPER}} .heading-section h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);
// Title Heading 
$this->add_control(
    'title_heading_style_heading',
    [
        'label' => esc_html__( 'Title Heading', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'condition' => [
            'style' => ['style2'],
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'title_heading_typography',
        'selector' => '{{WRAPPER}} h1.title',
        'condition' => [
            'style' => ['style2'],
        ],
    ]
);

$this->add_control(
    'title_heading_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} h1.title' => 'color: {{VALUE}};',
        ],
        'condition' => [
            'style' => ['style2'],
        ],
    ]
);

$this->add_control(
    'title_heading_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} h1.title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'style' => ['style2'],
        ],
    ]
);

// Description 
$this->add_control(
    'description_heading_style_heading',
    [
        'label' => esc_html__( 'Description ', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
        'condition' => [
            'style' => 'style2',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'description_text_typography',
        'selector' => '{{WRAPPER}} p.split-text',
        'condition' => [
            'style' => 'style2',
        ],
    ]
);

$this->add_control(
    'description_text_color',
    [
        'label' => esc_html__( 'Color', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} p.split-text' => 'color: {{VALUE}};',
        ],
        'condition' => [
            'style' => 'style2',
        ],
    ]
);

$this->add_control(
    'description_text_margin',
    [
        'label' => esc_html__( 'Margin', 'themesflat-core' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'selectors' => [
            '{{WRAPPER}} p.split-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
            'style' => 'style2',
        ],
    ]
);


$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
<?php if ($settings['style'] === 'style4') : ?>
<div class="heading-title">
    <div class="mb_12">
        <?php if (!empty($settings['title-heding'])) : ?>
        <h4 class="text_white fw-4 mb_4">
            <a class="hover-underline-link link"><?php echo esc_html($settings['title-heding']); ?></a>
        </h4>
        <?php endif; ?>

        <?php if (!empty($settings['description-heding'])) : ?>
        <p class="text-caption-2 text_secondary-color font-3">
            <?php echo esc_html($settings['description-heding']); ?>
        </p>
        <?php endif; ?>
    </div>
</div>


<?php elseif ($settings['style'] === 'style3') : ?>
<div class="heading-section style3 mb_47">
    <?php if (!empty($settings['heading'])) : ?>
    <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_30">
        <?php echo esc_html($settings['heading']); ?>
    </div>
    <?php endif; ?>

    <div class="title-border-shape">
        <h4 class="animationtext clip">
            <?php if (!empty($settings['description'])) : ?>
            <?php echo esc_html($settings['description']); ?>
            <?php endif; ?>
            <span class="tf-text s1 cd-words-wrapper text_primary-color">
                <?php $count=1; foreach ($settings['list'] as $item) : ?>
                <span
                    class="item-text <?php echo esc_attr($count==1 ? 'is-visible': ''); ?>"><?php echo esc_html($item['animate_text']); ?></span>
                <?php $count++; endforeach; ?>
            </span>
            <?php if (!empty($settings['title-heding'])) : ?>
            <?php echo esc_html($settings['title-heding']); ?>
            <?php endif; ?>
        </h4>
    </div>
</div>

<?php elseif ($settings['style'] === 'style1') : ?>
<div class="heading-section mb_47">
    <?php if (!empty($settings['heading'])) : ?>
    <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_30">
        <?php echo esc_html($settings['heading']); ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($settings['description'])) : ?>
    <h3 class="text_white fw-5 split-text effect-blur-fade">
        <?php echo esc_html($settings['description']); ?>
    </h3>
    <?php endif; ?>

</div>
<?php else: ?>
<div class="heading-section mb_45">
    <?php if (!empty($settings['heading'])) : ?>
    <div class="tag-heading text-uppercase text-label font-3 letter-spacing-1 mb_30">
        <?php echo esc_html($settings['heading']); ?>
    </div>
    <?php endif; ?>

    <div class="title-border-shape">
        <h4 class="animationtext clip">
            <?php if (!empty($settings['description'])) : ?>
            <?php echo esc_html($settings['description']); ?>
            <?php endif; ?>
            <span class="tf-text s1 cd-words-wrapper text_primary-color">
                <?php $count=1; foreach ($settings['list'] as $item) : ?>
                <span
                    class="item-text <?php echo esc_attr($count==1 ? 'is-visible': ''); ?>"><?php echo esc_html($item['animate_text']); ?></span>
                <?php $count++; endforeach; ?>
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
<p class="text_muted-color font-3 mb_43 split-text split-lines-transform">
    <?php echo esc_html($settings['description-heding']); ?>
</p>
<?php endif; ?>
<?php endif; ?>
<?php
	}
}