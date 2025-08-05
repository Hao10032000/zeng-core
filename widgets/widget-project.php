<?php
class TFProject_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-project';
    }
    
    public function get_title() {
        return esc_html__( 'TF Project', 'themesflat-core' );
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

			$this->add_control(
				'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1'  => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
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
					'default' => esc_html__( 'AI-Powered Chatbot', 'themesflat-core' ),
				]
			);

            $repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Category', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Saas Dashboard', 'themesflat-core' ),
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


			$this->add_control(
	'list',
	[
		'label' => esc_html__( 'List', 'themesflat-core' ),
		'type' => \Elementor\Controls_Manager::REPEATER,
		'fields' => $repeater->get_controls(),
		'default' => [
			[
				'image_thumb' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
				'title' => esc_html__( 'AI-Powered Chatbot 1', 'themesflat-core' ),
				'description' => esc_html__( 'Saas Dashboard 1', 'themesflat-core' ),
				'link_button' => [ 'url' => 'https://example.com/1' ],
			],
			[
				'image_thumb' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
				'title' => esc_html__( 'AI-Powered Chatbot 2', 'themesflat-core' ),
				'description' => esc_html__( 'Saas Dashboard 2', 'themesflat-core' ),
				'link_button' => [ 'url' => 'https://example.com/2' ],
			],
			[
				'image_thumb' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
				'title' => esc_html__( 'AI-Powered Chatbot 3', 'themesflat-core' ),
				'description' => esc_html__( 'Saas Dashboard 3', 'themesflat-core' ),
				'link_button' => [ 'url' => 'https://example.com/3' ],
			],
			[
				'image_thumb' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
				'title' => esc_html__( 'AI-Powered Chatbot 4', 'themesflat-core' ),
				'description' => esc_html__( 'Saas Dashboard 4', 'themesflat-core' ),
				'link_button' => [ 'url' => 'https://example.com/4' ],
			],

		],
	]
);


	        
			$this->end_controls_section();
        // /.End List Setting              
	}

	protected function render($instance = []) {
    $settings = $this->get_settings_for_display();

    if (empty($settings['list']) || !is_array($settings['list'])) {
        echo '<p>' . esc_html__('No items found. Please add some content in the widget settings.', 'themesflat-core') . '</p>';
        return;
    }

 
    $fallback_image_url = esc_url(get_stylesheet_directory_uri() . '/images/placeholder-2.jpg');

    if (!empty($settings['style']) && $settings['style'] === 'style1') {
        ?>
        <div class="tabs-content-wrap tf-grid-layout md-col-2">
            <?php
            foreach ($settings['list'] as $item):
                $image_url = '';

                if (!empty($item['image_thumb']['id'])) {
                    $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src(
                        $item['image_thumb']['id'],
                        'thumbnail',
                        $settings
                    );
                }
                if (empty($image_url)) {
                    $image_url = $fallback_image_url;
                }

                $link_url = !empty($item['link_button']['url']) ? $item['link_button']['url'] : '#';
                $title = !empty($item['title']) ? $item['title'] : '';
                $description = !empty($item['description']) ? $item['description'] : '';
                ?>
                <div class="portfolio-item">
                    <a href="<?php echo esc_url($link_url); ?>" data-fancybox="gallery" class="img-style">
                        <img src="<?php echo esc_url($image_url); ?>" alt="thumb">
                        <div class="tag font-3 text-label text-uppercase fw-6 letter-spacing-1">
                            <?php echo esc_html($description); ?>
                        </div>
                    </a>
                    <h5 class="title font-4 text_white">
                        <a href="<?php echo esc_url($link_url); ?>" class="link">
                            <?php echo esc_html($title); ?>
                        </a>
                    </h5>
                    <div class="item-shape">
                        <img src="<?php echo esc_url(URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . "assets/img/small-comet.webp"); ?>"
                             loading="lazy" decoding="async" alt="item">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    } else {
        ?>
        <div id="portfolio" class="section-portfolio spacing-1 stack-element section">
            <div class="tabs-content-wrap">
                <?php
                foreach ($settings['list'] as $item):
                    $image_url = '';

                    if (!empty($item['image_thumb']['id'])) {
                        $image_url = \Elementor\Group_Control_Image_Size::get_attachment_image_src(
                            $item['image_thumb']['id'],
                            'thumbnail',
                            $settings
                        );
                    }

                    if (empty($image_url)) {
                        $image_url = $fallback_image_url;
                    }

                    $link_url = !empty($item['link_button']['url']) ? $item['link_button']['url'] : '#';
                    $title = !empty($item['title']) ? $item['title'] : '';
                    $description = !empty($item['description']) ? $item['description'] : '';
                    ?>
                    <div class="portfolio-item element">
                        <a href="<?php echo esc_url($image_url); ?>" data-fancybox="gallery" class="img-style">
                            <img src="<?php echo esc_url($image_url); ?>" alt="thumb">
                            <div class="tag font-3 text-label text-uppercase fw-6 letter-spacing-1">
                                <?php echo esc_html($description); ?>
                            </div>
                        </a>
                        <h5 class="title font-4 text_white">
                            <a href="<?php echo esc_url($link_url); ?>" class="link">
                                <?php echo esc_html($title); ?>
                            </a>
                        </h5>
                        <div class="item-shape">
                            <img src="<?php echo esc_url(URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . "assets/img/small-comet.webp"); ?>"
                                 loading="lazy" decoding="async" alt="item">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

}