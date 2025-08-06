<?php
class TFListStep_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list-step';
    }
    
    public function get_title() {
        return esc_html__( 'TF List Step', 'themesflat-core' );
    }

    public function get_icon() {
		return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-step'];
	}

	public function get_script_depends() {
		return ['tf-step'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

            $this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail', 
				]
			);


			$repeater = new \Elementor\Repeater();

            $repeater->add_control(
				'image_thumb',
				[
					'label' => esc_html__( 'Choose Image Thumbnail', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
				]
			);

            $repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'What is the difference between saving and investing?', 'themesflat-core' ),
				]
			);

            $repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Nam commodo semper molestie. Duis eget pretium metus. Vestibulum ante ipsum primis in faucibus orci luctus...', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'link_button',
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

			$repeater->add_control(
				'number_step',
				[
					'label' => esc_html__( 'Number Year', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '2000', 'themesflat-core' ),
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
							'title' => esc_html__( 'AI Developer', 'themesflat-core' ),
							'description' => esc_html__( 'Google Inc.', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'Machine Learning Engineer', 'themesflat-core' ),
							'description' => esc_html__( 'Microsoft Inc.', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'Data Scientist', 'themesflat-core' ),
							'description' => esc_html__( 'IBM Inc.', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'M.Sc. in Computer Science', 'themesflat-core' ),
							'description' => esc_html__( 'Stanford University', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'B.Sc. in Information Technolog', 'themesflat-core' ),
							'description' => esc_html__( 'Massachusetts Institute of Technology', 'themesflat-core' ),
						],
					],
				]
			);

	        
			$this->end_controls_section();
        // /.End List Setting   
		
		$this->start_controls_section(
    'section_style_box',
    [
        'label' => esc_html__('Box Style', 'themesflat-core'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

// Content: Background Color
$this->add_control(
    'content_bg_color',
    [
        'label' => esc_html__('Content Background Color', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .education-item' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Content: Background Color Hover
$this->add_control(
    'content_bg_hover_color',
    [
        'label' => esc_html__('Content Background Hover', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .wrap-education-item:hover .education-item' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Content: Border Radius
$this->add_control(
    'content_border_radius',
    [
        'label' => esc_html__('Border Radius', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .education-item' => 'border-radius: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// Title: Color
$this->add_control(
    'title_color',
    [
        'label' => esc_html__('Title Color', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .education-item .content h5' => 'color: {{VALUE}};',
        ],
    ]
);

// Title: Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [    
		'label' => esc_html__('Title Typography', 'themesflat-core'),
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .education-item .content h5',
    ]
);

// Description: Color
$this->add_control(
    'desc_color',
    [
        'label' => esc_html__('Description Color', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .education-item .content span' => 'color: {{VALUE}};',
        ],
    ]
);

// Description: Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
		'label' => esc_html__('Description Typography', 'themesflat-core'),
        'name' => 'desc_typography',
        'selector' => '{{WRAPPER}} .education-item .content span',
    ]
);

// Number Step: Color
$this->add_control(
    'number_step_color',
    [
        'label' => esc_html__('Number Step Color', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .education-item .date' => 'color: {{VALUE}};',
        ],
    ]
);

// Number Step: Background
$this->add_control(
    'number_step_bg',
    [
        'label' => esc_html__('Number Step Background', 'themesflat-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .education-item .date' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Number Step: Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
		'label' => esc_html__('Number Step Typography', 'themesflat-core'),
        'name' => 'number_step_typography',
        'selector' => '{{WRAPPER}} .education-item .date',
    ]
);

$this->end_controls_section();

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
        ?>
<div class="effect-line-hover">
    <?php $count=1;  foreach ( $settings['list'] as $index => $item ): 
                       				 $image_thumb = $item['image_thumb'];
                                        if ( ! empty( $image_thumb['id'] ) ) {
                                            $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src(
                                                $image_thumb['id'],
                                                'thumbnail', 
                                                $settings 
                                            );
                                        } else {
                                            $image_url = ''; 
                                        }
                ?>
    <div class="wrap-education-item area-effect  scrolling-effect effectTop">
        <span class="point"></span>
        <div class="education-item">
            <div class="content">
                <h5 class="font-4 mb_4"><a href="<?php echo esc_url($item['link_button']['url']);?>"
                        class="link"><?php echo esc_html($item['title']); ?></a></h5>
                <span class="text-body-1 font-3"><?php echo esc_html($item['description']); ?></span>
            </div>
            <div class="date text-caption-1 text_white font-3"><?php echo esc_html($item['number_step']) ; ?></div>
            <div class="item-shape spotlight">
                <?php if ( $image_url ) {
                                echo '<img src="' . esc_url( $image_url ) . '" loading="lazy" decoding="async" alt="item">';
                } ?>

            </div>
        </div>
    </div>
    <?php $count++; endforeach; ?>
</div>

<?php
	
		
}

}