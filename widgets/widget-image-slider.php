<?php class TFImage_slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-image-slider';
    }
    
    public function get_title() {
        return esc_html__( 'TF Image Slider', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {

	$this->start_controls_section(
        'partner_section',
        [
            'label' => esc_html__( 'Partner Logos', 'themesflat-core' ),
        ]
    );

	$repeater = new \Elementor\Repeater();

    $repeater->add_control(
        'image',
        [
            'label' => esc_html__( 'Logo Image', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $repeater->add_control(
        'link',
        [
            'label' => esc_html__( 'Link', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => 'https://your-link.com',
        ]
    );

    $repeater->add_control(
        'size_class',
        [
            'label' => esc_html__( 'Size Class', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'sz-60' => 'sz-60',
                'sz-80' => 'sz-80',
                'sz-100' => 'sz-100',
                'sz-120' => 'sz-120',
                'sz-160' => 'sz-160',
                'sz-200' => 'sz-200',
            ],
            'default' => 'sz-100',
        ]
    );

    $repeater->add_control(
        'scroll_effect',
        [
            'label' => esc_html__( 'Enable Scroll Effect', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => 'Yes',
            'label_off' => 'No',
            'return_value' => 'scrolling-effect effectZoomIn',
            'default' => '',
        ]
    );

    $repeater->add_control(
        'delay',
        [
            'label' => esc_html__( 'Animation Delay (s)', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => 'e.g. 0.3',
            'description' => 'Set data-delay attribute like 0.3',
        ]
    );

    $this->add_control(
        'partner_list',
        [
            'label' => esc_html__( 'Partner Items', 'themesflat-core' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]
    );


    $this->end_controls_section();
 
}
	
protected function render() {
    $settings = $this->get_settings_for_display();

    if ( ! empty( $settings['partner_list'] ) ) {
		  echo '<div class="section-partner">';
        echo '<div class="swiper tf-sw-partner wrap-partner position-2" data-preview="8" data-tablet="8"
                data-mobile-sm="6" data-mobile="4" data-space="15" data-space-md="30"
                data-space-lg="30"><div class="swiper-wrapper">';

        foreach ( $settings['partner_list'] as $index => $item ) {
            $link_open = '<a href="#">';
            $link_close = '</a>';
            if ( ! empty( $item['link']['url'] ) ) {
                $this->add_link_attributes( 'partner_link_' . $index, $item['link'] );
                $link_open = '<a ' . $this->get_render_attribute_string( 'partner_link_' . $index ) . '>';
            }

            $scroll_class = $item['scroll_effect'] ? $item['scroll_effect'] : '';
            $delay_attr = $item['delay'] ? ' data-delay="' . esc_attr( $item['delay'] ) . '"' : '';

            echo '<div class="swiper-slide">';
            echo $link_open;
            echo '<div class="partner-item item-' . ($index+1) . ' ' . esc_attr( $item['size_class'] ) . ' ' . esc_attr($scroll_class) . '"' . $delay_attr . '>';
            echo '<img src="' . esc_url( $item['image']['url'] ) . '" alt="partner">';
           echo '<div class="item-shape"><img src="' . esc_url( plugins_url( 'assets/img/small-comet.webp', plugin_dir_path( __FILE__ ) ) ) . '" loading="lazy" decoding="async" alt="item"></div>';
            echo '</div>';
            echo $link_close;
            echo '</div>';
        }

        echo '</div></div></div>';
    }
}

}