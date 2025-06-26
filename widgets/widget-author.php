<?php

class TFAuthor_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'tf-author';
	}

	public function get_title() {
		return esc_html__( 'TF Author', 'themesflat-core' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $website_info = get_my_website_info();
		?>

                <div class="user-bar style-1 text-center">
                    <div class="box-author mb_12">
                        <div class="img-style mb_16">
                            <?php if ($website_info['custom_avatar']): ?>
                                <img decoding="async" loading="lazy" src="<?php echo esc_url($website_info['custom_avatar']); ?>" width="314" height="314"
                                    alt="feature post">
                            <?php else: ?>
                                    <img src="<?php echo  THEMESFLAT_LINK . '/images/avatar-thumbnail.png'; ?>" alt="avatar">
                            <?php endif; ?>
                        </div>
                        <div class="info">
                            <?php if ($website_info['full_name']): ?>
                                <div class="name font-2 text_white mb_8"><?php echo esc_html($website_info['full_name']); ?></div>
                            <?php else: ?>
                                <div class="name font-2 text_white mb_8"><?php echo _e('ZenG', 'zeng'); ?></div>
                            <?php endif; ?>  

                            <?php if ($website_info['job_title']): ?>
                                <div class="text-label text-uppercase fw-6 text_primary-color font-3 mb_16 letter-spacing-1"><?php echo esc_html($website_info['job_title']); ?></div>
                            <?php else: ?>
                                <div class="text-label text-uppercase fw-6 text_primary-color font-3 mb_16 letter-spacing-1"><?php echo _e('AI Developer', 'zeng'); ?></div>
                            <?php endif; ?>

                            <?php if ($website_info['email_address']): ?>
                                                    <a href="mailto:<?php echo esc_attr($website_info['email_address']); ?>"
                            class="hover-underline-link text_white text-body-2 mb_4"><?php echo esc_html($website_info['email_address']); ?></a>
                            <?php else: ?>
                                <a href="mailto:sample@gmail.com"
                                class="hover-underline-link text_white text-body-2 mb_4"><?php echo _e('sample@gmail.com', 'zeng'); ?></a>
                            <?php endif; ?> 

                            <?php if ($website_info['address']): ?>
                                    <p class="text-caption-2 text_secondary-color font-3"><?php echo esc_html($website_info['address']); ?></p>
                            <?php else: ?>
                                <p class="text-caption-2 text_secondary-color font-3"><?php echo _e('Based in San Francisco, CA', 'zeng'); ?></p>
                            <?php endif; ?> 
                         
                        </div>
                    </div>
                    <ul class="list-icon d-flex justify-content-center mb_28">
                        <?php if ($website_info['social_linkedin']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_linkedin']); ?>" class="icon-LinkedIn"></a></li>
                        <?php endif; ?>   
                        <?php if ($website_info['social_github']): ?>
                            <li> <a href="<?php echo esc_attr($website_info['social_github']); ?>" class="icon-GitHub"></a></li>
                        <?php endif; ?>  
                        <?php if ($website_info['social_twitter']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_twitter']); ?>" class="icon-X"></a></li>
                        <?php endif; ?>  
                        <?php if ($website_info['social_dribbble']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_dribbble']); ?>" class="icon-dribbble"></a></li>
                        <?php endif; ?> 
                        <?php if ($website_info['social_facebook']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_facebook']); ?>" class="icon-facebook"></a></li>
                        <?php endif; ?> 
                        <?php if ($website_info['social_instagram']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_instagram']); ?>" class="icon-instagram"></a></li>
                        <?php endif; ?> 
                        <?php if ($website_info['social_tiktok']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_tiktok']); ?>" class="icon-tiktok"></a></li>
                        <?php endif; ?> 
                        <?php if ($website_info['social_youtube']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_youtube']); ?>" class="icon-youtube"></a></li>
                        <?php endif; ?> 
                        <?php if ($website_info['social_behance']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_behance']); ?>" class="icon-behance"></a></li>
                        <?php endif; ?> 
                        <?php if ($website_info['social_medium']): ?>
                            <li><a href="<?php echo esc_attr($website_info['social_medium']); ?>" class="icon-medium"></a></li>
                        <?php endif; ?> 
                    </ul>
                </div>

        <?php 
	}
}
