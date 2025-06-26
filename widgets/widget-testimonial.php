<?php
class TFTestimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'tf-testimonial';
    }

    public function get_title() {
        return esc_html__( 'TF Testimonials', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_script_depends() {
		return ['tf-carousel'];
	}

    protected function register_controls() {
        // Start List Setting
        $this->start_controls_section( 'section_setting',
            [
                'label' => esc_html__('Content', 'themesflat-core'), // Đổi nhãn thành Content cho rõ ràng
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA, // Thay đổi thành TEXTAREA cho nội dung dài hơn
                'default' => esc_html__( 'ZenG is one of the most reliable developers I\'ve ever worked with. He’s detail-oriented, responsive, and always delivers clean, scalable code. Highly recommended!', 'themesflat-core' ),
                'rows' => 5, // Số hàng mặc định cho textarea
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Lincoln Press', 'themesflat-core' ),
            ]
        );

        $repeater->add_control(
            'position',
            [
                'label' => esc_html__( 'Position', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'CEO Avitex', 'themesflat-core' ),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Testimonial List', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'name' => esc_html__( 'Lincoln Press', 'themesflat-core' ),
                        'position' => esc_html__( 'AI Developer', 'themesflat-core' ),
                        'description' => esc_html__( 'ZenG is one of the most reliable developers I\'ve ever worked with. He\'s detail-oriented, responsive, and always delivers clean, scalable code. Highly recommended!', 'themesflat-core' ),
                    ],
                    [
                        'name' => esc_html__( 'Cheyenne Mango', 'themesflat-core' ),
                        'position' => esc_html__( 'Machine Learning Engineer', 'themesflat-core' ),
                        'description' => esc_html__( 'ZenG is one of the most reliable developers I\'ve ever worked with. He\'s detail-oriented, responsive, and always delivers clean, scalable code. Highly recommended!', 'themesflat-core' ),
                    ],
                    [
                        'name' => esc_html__( 'Lincoln Press', 'themesflat-core' ),
                        'position' => esc_html__( 'AI Developer', 'themesflat-core' ),
                        'description' => esc_html__( 'ZenG is one of the most reliable developers I\'ve ever worked with. He\'s detail-oriented, responsive, and always delivers clean, scalable code. Highly recommended!', 'themesflat-core' ),
                    ],
                    [
                        'name' => esc_html__( 'Cheyenne Mango', 'themesflat-core' ),
                        'position' => esc_html__( 'Machine Learning Engineer', 'themesflat-core' ),
                        'description' => esc_html__( 'ZenG is one of the most reliable developers I\'ve ever worked with. He\'s detail-oriented, responsive, and always delivers clean, scalable code. Highly recommended!', 'themesflat-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}', // Hiển thị tên trong tiêu đề của mỗi repeater item
            ]
        );

        $this->end_controls_section(); // End Content Section

        // START: Carousel Settings Section
        $this->start_controls_section(
            'section_carousel_settings',
            [
                'label' => esc_html__('Carousel Settings', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT, // Đặt trong tab Content hoặc tạo tab mới nếu muốn
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label' => esc_html__( 'Show Arrows', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'themesflat-core' ),
                'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slides_per_view',
            [
                'label' => esc_html__( 'Slides Per View (Desktop)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'slides_per_view_tablet',
            [
                'label' => esc_html__( 'Slides Per View (Tablet)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'slides_per_view_mobile',
            [
                'label' => esc_html__( 'Slides Per View (Mobile)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'space_between',
            [
                'label' => esc_html__( 'Space Between Slides (Desktop)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 12,
            ]
        );

        $this->add_control(
            'space_between_tablet',
            [
                'label' => esc_html__( 'Space Between Slides (Tablet)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 12,
            ]
        );

        $this->add_control(
            'space_between_mobile',
            [
                'label' => esc_html__( 'Space Between Slides (Mobile)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 12,
            ]
        );

        $this->end_controls_section(); // END: Carousel Settings Section

        // START: Style Section for Description
        $this->start_controls_section(
            'section_style_description',
            [
                'label' => esc_html__('Description Style', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .testimonial-item .description',
            ]
        );

        $this->end_controls_section(); // END: Style Section for Description

        // START: Style Section for Name
        $this->start_controls_section(
            'section_style_name',
            [
                'label' => esc_html__('Name Style', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Color', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .testimonial-item .name',
            ]
        );

        $this->end_controls_section(); // END: Style Section for Name

        // START: Style Section for Position
        $this->start_controls_section(
            'section_style_position',
            [
                'label' => esc_html__('Position Style', 'themesflat-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => esc_html__( 'Color', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .position' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .testimonial-item .position',
            ]
        );

        $this->end_controls_section(); // END: Style Section for Position

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Prepare Swiper data attributes based on settings
        $swiper_data_attributes = [
            'data-preview="' . esc_attr($settings['slides_per_view']) . '"',
            'data-destop="' . esc_attr($settings['slides_per_view']) . '"', // Assuming destop is same as preview
            'data-tablet="' . esc_attr($settings['slides_per_view_tablet']) . '"',
            'data-mobile="' . esc_attr($settings['slides_per_view_mobile']) . '"',
            'data-space-lg="' . esc_attr($settings['space_between']) . '"',
            'data-space-md="' . esc_attr($settings['space_between_tablet']) . '"',
            'data-space="' . esc_attr($settings['space_between_mobile']) . '"',
        ];
        $swiper_data_attributes_string = implode(' ', $swiper_data_attributes);
        ?>

        <div id="testimonial" class="section-testimonial section sw-layout">
            <?php if ( 'yes' === $settings['show_arrows'] ) : // Conditional display for arrows ?>
                <div class="heading-section mb_43 d-flex align-items-end justify-content-between">
                    <div class="wrap-sw-button d-flex gap_12 ">
                        <div class="sw-button nav-prev-layout">
                            <i class="icon-CaretLeft"></i>
                        </div>
                        <div class="sw-button nav-next-layout ">
                            <i class="icon-CaretRight"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="swiper " <?php echo $swiper_data_attributes_string; ?>>
                <div class="swiper-wrapper">

                    <?php foreach ( $settings['list'] as $index => $item ): ?>
                        <div class="swiper-slide">
                            <div class="testimonial-item area-effect">
                                <div class="icon">
                                    <i class="icon-quote"></i>
                                </div>
                                <?php
                                // Ensure the description element exists only if content is present
                                if (!empty($item['description'])) {
                                    echo '<p class="text-body-2 text_white mb_21 description">' . esc_html($item['description']) . '</p>';
                                }
                                ?>
                                <div class="athor">
                                    <?php
                                    // Ensure the name element exists only if content is present
                                    if (!empty($item['name'])) {
                                        echo '<h5 class="name text_white mb_4 font-4">' . esc_html($item['name']) . '</h5>';
                                    }
                                    ?>
                                    <?php
                                    // Ensure the position element exists only if content is present
                                    if (!empty($item['position'])) {
                                        echo '<span class="text-label text-uppercase text_primary-color font-3 position">' . esc_html($item['position']) . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="item-shape spotlight">
                                    <img src="<?php echo esc_url(URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . "assets/img/small-comet.webp"); ?>" loading="lazy" decoding="async" alt="item">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    <?php
    }
}