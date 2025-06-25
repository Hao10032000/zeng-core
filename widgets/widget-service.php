<?php
class TFService_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-service';
    }
    
    public function get_title() {
        return esc_html__( 'TF Service', 'themesflat-core' );
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
					'default' => esc_html__( 'Custom AI Solutions', 'themesflat-core' ),
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
				'bg_image_thumb',
				[
					'label' => esc_html__( 'Choose Background', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
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
							'title' => esc_html__( 'Custom AI Solutions', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'Data Analysis & Visualization', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'Machine Learning Automation', 'themesflat-core' ),
						],
                        [
							'title' => esc_html__( 'AI Consulting & Training', 'themesflat-core' ),
						],
					],
				]
			);

	        
			$this->end_controls_section();
        // /.End List Setting              
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
        ?>
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
<div class="service-item area-effect scrolling-effect effectBottom">
    <div class="content-inner d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center content">
            <span
                class="number text-label text_muted-color font-3"><?php echo esc_html($count < 10 ? '0'. $count : $count) ; ?>/</span>
            <h5 class="text_white font-4"><a href="<?php echo esc_url($item['link_button']['url']);?>"
                    class="link"><?php echo esc_html($item['title']); ?></a>
            </h5>
        </div>
        <a href="<?php echo esc_url($item['link_button']['url']);?>" class="btn-arrow"><i
                class="icon-ArrowRight"></i></a>
        <div class="item-shape spotlight">
            <img src="../../img/small-comet.png" loading="lazy" decoding="async" alt="item">
        </div>
    </div>
    <div class="img-hover">
        <?php if ( $image_url ) {
                                echo '<img src="' . esc_url( $image_url ) . '" width="140" height="=14" alt="item">';
           } ?>
    </div>

</div>
<?php $count++; endforeach; ?>
<?php
	
}

}