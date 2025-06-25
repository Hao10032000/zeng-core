<?php

class TFHighlight_Post_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-highlight-post';

    }

    

    public function get_title() {

        return esc_html__( 'TF Highlight Post', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-posts-carousel';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }

	protected function register_controls() {


            $this->start_controls_section( 

				'section_posts_query',

	            [

	                'label' => esc_html__('Query', 'themesflat-core'),

	            ]

	        );	

			 $this->add_control( 

	        	'style',

				[

					'label' => esc_html__( 'Style', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'style1',

					'options' => [

						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
						'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
					],

				]

			);

			$this->add_control( 

				'posts_per_page',

	            [

	                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),

	                'type' => \Elementor\Controls_Manager::NUMBER,

	                'default' => '4',

	            ]

	        );

	        $this->add_control( 

	        	'order_by',

				[

					'label' => esc_html__( 'Order By', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'date',

					'options' => [						

			            'date' => 'Date',

			            'ID' => 'Post ID',			            

			            'title' => 'Title',

					],

				]

			);



			$this->add_control( 

				'order',

				[

					'label' => esc_html__( 'Order', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT,

					'default' => 'desc',

					'options' => [						

			            'desc' => 'Descending',

			            'asc' => 'Ascending',	

					],

				]

			);


            			$this->add_control( 

				'posts_categories',

				[

					'label' => esc_html__( 'Categories', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SELECT2,

					'options' => ThemesFlat_Addon_For_Elementor_drozy::tf_get_taxonomies(),

					'label_block' => true,

	                'multiple' => true,

				]

			);



			$this->add_control( 

				'exclude',

				[

					'label' => esc_html__( 'Exclude', 'themesflat-core' ),

					'type'	=> \Elementor\Controls_Manager::TEXT,	

					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),

					'default' => '',

					'label_block' => true,				

				]

			);

						$this->add_group_control( 

				\Elementor\Group_Control_Image_Size::get_type(),

				[

					'name' => 'thumbnail',

					'default' => 'full',

				]

			);

            $this->add_control( 

				'show_excerpt',

				[

					'label' => esc_html__( 'Show Excerpt', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

                    'condition' => [
		                'style' => 'style2',
		            ]

				]

			);



			$this->add_control( 

				'excerpt_length',

				[

					'label' => esc_html__( 'Excerpt Length', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::NUMBER,

					'min' => 0,

					'max' => 500,

					'step' => 1,

					'default' => 20,

					'condition' => [
						'show_excerpt' => 'yes',
		                'style' => 'style2',
					],

				]

			);


            			$this->add_control( 

				'show_meta',

				[

					'label' => esc_html__( 'Show Meta', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

            $this->add_control( 

				'show_category',

				[

					'label' => esc_html__( 'Show Category', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

			$this->add_control( 

				'show_reading',

				[

					'label' => esc_html__( 'Show Reading Time', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

            $this->add_control( 

				'show_heading',

				[

					'label' => esc_html__( 'Show Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

				]

			);

            $this->add_control(

				'heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Latest Posts', 'themesflat-core' ),

					'label_block' => true,

                    'condition' => [
		                'show_heading' => 'yes',
		            ]

				]

			);	

            $this->add_control( 

				'show_heading_right',

				[

					'label' => esc_html__( 'Show Heading Box Right', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::SWITCHER,

					'label_on' => esc_html__( 'Show', 'themesflat-core' ),

					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

					'return_value' => 'yes',

					'default' => 'yes',

                    'condition' => [
		                'style' => 'style3',
		            ]

				]

			);


            $this->add_control(

				'heading_right',

				[

					'label' => esc_html__( 'Heading Box Right', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::TEXT,

					'default' => esc_html__( 'Relatest', 'themesflat-core' ),

					'label_block' => true,

                    'condition' => [
		                'show_heading_right' => 'yes',
		            ]

				]

			);        

			$this->end_controls_section();

        // /.End List Setting  

        // Start Style
	    $this->start_controls_section( 'section_style',
	        [
	            'label' => esc_html__( 'Style', 'themesflat-core' ),
	            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	        ]
	    );	

            $this->add_control(

				'h_heading',

				[

					'label' => esc_html__( 'Heading', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .main-title',

				]

			); 

			$this->add_control( 

				'heading_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .main-title' => 'color: {{VALUE}}',					

					],

				]
			);

        $this->add_responsive_control(

			'heading_margin',
			[
				'label'     => esc_html__( 'Spacing', 'vineta-addon' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px','%','vh' ],
				'range'     => [
					'px' => [
						'min' => 1,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

            $this->add_control(

				'h_heading_box_right',

				[

					'label' => esc_html__( 'Heading Box Right', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

                    'condition' => [
		                'style' => 'style3',
					],

				]

			);

			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_sub_heading',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .sub-heading',

                    'condition' => [
		                'style' => 'style3',
					],

				]

			); 

			$this->add_control( 

				'heading_sub_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .sub-heading' => 'color: {{VALUE}}',					

					],

                    'condition' => [
		                'style' => 'style3',
					],

				]
			);

        $this->add_responsive_control(

			'heading_sub_margin',
			[
				'label'     => esc_html__( 'Spacing', 'vineta-addon' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px','%','vh' ],
				'range'     => [
					'px' => [
						'min' => 1,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sub-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
		            'style' => 'style3',
				],
			]
		);

        $this->add_control(

				'h_title_post',

				[

					'label' => esc_html__( 'Title Posts', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

			$this->add_control( 

				'title_posts_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .title' => 'color: {{VALUE}}',					

					],

				]

			);

            $this->add_control(

				'h_description',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

                    'condition' => [
		                'style' => 'style2',
		            ]

				]

			);

            $this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_description',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .text-body-1',

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			); 

			$this->add_control( 

				'description_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .description' => 'color: {{VALUE}}',					

					],

                                        'condition' => [
		                'style' => 'style2',
		            ]

				]

			);


            $this->add_control(

				'h_category',

				[

					'label' => esc_html__( 'Category & Reading Times', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

					'separator' => 'before',

				]

			);

            $this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_category',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tag',

				]

			); 

            $this->add_control( 

				'category_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tag' => 'color: {{VALUE}}',					

					],

				]

			);


            $this->add_control( 

				'category_background_color',

				[

					'label' => esc_html__( 'Background', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .tag' => 'background-color: {{VALUE}}',					

					],

				]

			);

            $this->add_control(

				'h_meta',

				[

					'label' => esc_html__( 'Meta', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::HEADING,

				]

			);

        	$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'meta_typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .meta-feature li',

				]

			);

            $this->add_control(

				'meta_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [

						'{{WRAPPER}} .meta-feature li, {{WRAPPER}} .meta-feature li a' => 'color: {{VALUE}}',

					],

				]

			);



		$this->end_controls_section();


	}	



protected function render($instance = []) {
    $settings = $this->get_settings_for_display();

    $paged = max(1, get_query_var('paged') ?: get_query_var('page') ?: 1);

    $query_args = [
        'post_type' => 'post',
        'posts_per_page' => $settings['posts_per_page'],
        'paged' => $paged,
        'orderby' => $settings['order_by'],
        'order' => $settings['order'],
    ];

    if (!empty($settings['posts_categories'])) {
        $query_args['category_name'] = implode(',', $settings['posts_categories']);
    }

    if (!empty($settings['exclude'])) {
        $exclude = explode(',', $settings['exclude']);
        $query_args['post__not_in'] = array_map('intval', $exclude);
    }

    $query = new WP_Query($query_args);

    if ($query->have_posts()) : 
	$author_id = get_post_field('post_author', get_the_ID());
	?>

	
		<?php if ($settings['style'] == 'style1'): ?>

       <?php $posts = $query->posts;

        $columns = [[], [], []];
        $index = 0;

        foreach ($posts as $i => $post) {
            $columns[$index % 3][] = $post;
            $index++;
        }

        echo '<div class="section-highlight">';
        echo '<div class="tf-container">';
        if ($settings['show_heading'] === 'yes') {
            echo '<div class="heading-section mb_28"><h3 class="title main-title">' . esc_html($settings['heading']) . '</h3></div>';
        }

        echo '<div class="tf-grid-layout lg-col-3">';

        foreach ($columns as $col) {
            echo '<div class="col-feature item-grid">';
            foreach ($col as $j => $post) {
                setup_postdata($post);
                $has_thumbnail = ($j === 0 && has_post_thumbnail($post));

                echo '<div class="feature-post-item style-default hover-image-translate">';
                
                if ($has_thumbnail) {
                    echo '<div class="img-style mb_24">';
                    echo get_the_post_thumbnail($post->ID, $settings['thumbnail_size'], ['class' => 'lazyload', 'loading' => 'lazy']);
                    if ($settings['show_category'] === 'yes') {
                        $cat = get_the_category($post->ID);
                        if (!empty($cat)) {
                            echo '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '" class="tag categories text-caption-2 text_white">' . esc_html($cat[0]->name) . '</a>';
                        }
                    }
                    if ($settings['show_reading'] === 'yes') {
                        echo '<div class="tag time text-caption-2 text_white"><i class="icon-Timer"></i> ' . get_reading_time() .'</div>';
                    }
                    echo '<a href="' . get_permalink($post->ID) . '" class="overlay-link"></a>';
                    echo '</div>';
                }

                echo '<div class="content">';
                if ($settings['show_meta'] === 'yes') {
                    echo '<ul class="meta-feature fw-7 d-flex text-caption-2 text-uppercase mb_12">';
                    echo '<li>' . get_the_date('', $post->ID) . '</li>';
                    echo '<li><span class="text_secodary2-color">POST BY</span> <a href="' . get_author_posts_url($post->post_author) . '" class="link">' . get_user_full_name($author_id) . '</a></li>';
                    echo '</ul>';
                }
                echo '<h5 class="title"><a href="' . get_permalink($post->ID) . '" class="line-clamp-2 link">' . get_the_title($post->ID) . '</a></h5>';
                echo '</div>'; // .content

                echo '</div>'; // .feature-post-item
            }
            echo '</div>'; // .col-feature
        }

        echo '</div></div></div>'; // .tf-container .section-highlight

		?>

		<?php elseif($settings['style'] == 'style2') : 
        $feature_posts = [];
        $regular_posts = [];
        $count = 0;

        while ($query->have_posts()) {
            $query->the_post();
            if ($count < 3) {
                $feature_posts[] = get_post();
            } else {
                $regular_posts[] = get_post();
            }
            $count++;
        }
            ?>

            <!-- section-highlight -->
            <div class="section-highlight-2">
                <div class="tf-container">
                    <?php if ( $settings['show_heading'] == 'yes' ): ?>
                        <div class="heading-section mb_28">
                            <h3 class="main-title"><?php echo esc_html($settings['heading']); ?></h3>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="left">
                                <?php foreach ($feature_posts as $post) :
                                    setup_postdata($post);
                                    $img = get_the_post_thumbnail_url($post->ID, $settings['thumbnail_size']);
                                    $category = get_the_category($post->ID);
                                    ?>
                                    <div class="feature-post-item style-list v3 style-border hover-image-translate">
                                        <div class="img-style">
                                            <img class="lazyload" decoding="async" loading="lazy"
                                                 src="<?php echo esc_url($img); ?>"
                                                 alt="<?php echo esc_attr(get_the_title()); ?>">
                                            <?php if ( $settings['show_category'] == 'yes' ): ?>
            						            <?php 
            						            $categories = get_the_category($post->ID);
            						            if ( ! empty( $categories ) ) :
            						                foreach ( $categories as $category ) :
            						                    $category_link = esc_url( get_category_link( $category->term_id ) );
            						                    $category_name = esc_html( $category->name );
            						                    echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
            						                endforeach;
            						            endif;
            						            ?>
                        					<?php endif; ?>
                                            <?php if ( $settings['show_reading'] == 'yes' ): ?>
            						            <div class="tag time text-caption-2 text_white">
            						                <i class="icon-Timer"></i> <?= esc_html( get_reading_time($post->ID) ); ?>
            						            </div>
                        					<?php endif; ?>
                                            <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="overlay-link"></a>
                                        </div>
                                        <div class="content">
                        					<?php if ( $settings['show_meta'] == 'yes' ): ?>
                                                <ul class="meta-feature fw-7 d-flex mb_12 text-caption-2 text-uppercase">
                                                    <li><?php echo get_the_date('F j, Y', $post->ID); ?></li>
                                                    <li>
                                                        <span class="text_secodary2-color">
            						                        <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                                        </span>
            						                    <?php
                                                            $author_id   = $post->post_author;
                                                            $author_url  = get_author_posts_url( $author_id );
                                                            $author_name = get_user_full_name( $author_id ); 
            						                    ?>
            						                    <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
            						                </li>
                                                </ul>
                        					<?php endif; ?>
                                            <h4 class="title"><a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="link line-clamp-2"><?= esc_html( get_the_title($post->ID) ); ?></a></h4>
                                            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                                                <p class="text-body-1 line-clamp-2">
                                                    <?= esc_html( wp_trim_words( get_the_content(null, false, $post), $settings['excerpt_length'], '...' ) ); ?>
                                                </p>
                        					<?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                                            
                        <div class="col-lg-4">
                            <div class="right">
                                <?php
                                $index = 1;
                                foreach ($regular_posts as $post) :
                                    setup_postdata($post);
                                    $img = get_the_post_thumbnail_url($post->ID, 'themesflat-blog-grid');
                                    $category = get_the_category($post->ID);
                                    ?>
                                    <div class="feature-post-item style-has-number hover-image-translate">
                                        <?php if ($index === 1 && $img) : ?>
                                            <div class="img-style mb_24">
                                                <img class="lazyload" decoding="async" loading="lazy"
                                                     src="<?php echo esc_url($img); ?>"
                                                     alt="<?php echo esc_attr(get_the_title()); ?>">
                                                <?php if ( $settings['show_category'] == 'yes' ): ?>
            						            <?php 
            						            $categories = get_the_category($post->ID);
            						            if ( ! empty( $categories ) ) :
            						                foreach ( $categories as $category ) :
            						                    $category_link = esc_url( get_category_link( $category->term_id ) );
            						                    $category_name = esc_html( $category->name );
            						                    echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
            						                endforeach;
            						            endif;
            						            ?>
                        					<?php endif; ?>
                                                <?php if ( $settings['show_reading'] == 'yes' ): ?>
            						            <div class="tag time text-caption-2 text_white">
            						                <i class="icon-Timer"></i> <?= esc_html( get_reading_time($post->ID) ); ?>
            						            </div>
                        					<?php endif; ?>
                                                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="overlay-link"></a>
                                            </div>
                                        <?php endif; ?>
                                                
                                        <div class="content">
                                            <span class="number h2"><?php echo $index; ?></span>
                                            <div>
                        					    <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                                    <ul class="meta-feature fw-7 d-flex mb_12 text-caption-2 text-uppercase">
                                                        <li><?php echo get_the_date('F j, Y', $post->ID); ?></li>
                                                        <li>
                                                        <span class="text_secodary2-color">
            						                        <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                                        </span>
            						                    <?php
                                                            $author_id   = $post->post_author;
                                                            $author_url  = get_author_posts_url( $author_id );
                                                            $author_name = get_user_full_name( $author_id ); 
            						                    ?>
            						                    <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
            						                </li>
                                                    </ul>
                                                <?php endif; ?>
                                                <h5 class="title"><a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="link line-clamp-2"><?= esc_html( get_the_title($post->ID) ); ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $index++; ?>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                                                
                    </div>
                </div>
            </div>
            <!-- /End section-highlight -->

        <?php else: ?>


                <div class="section-highlight-3 tf-spacing-1">
                    <div class="tf-container">
                        <?php if ( $settings['show_heading'] == 'yes' ): ?>
                            <div class="heading-section mb_28">
                                <h3 class="main-title"><?php echo esc_html($settings['heading']); ?></h3>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="left">
                                    <?php
                                    $count = 0;
                                    while ($query->have_posts() && $count < 4) : $query->the_post(); $count++; 
										$get_id_post_thumbnail = get_post_thumbnail_id();
					    				$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings );
					    				$featured_image = sprintf( '<img src="%s" class="lazyload" alt="image">', esc_url( $image_src ) );
									?>
                                        <div class="feature-post-item style-line v3 hover-image-translate">
                                            <div class="img-style">
                                                    <?= $featured_image; ?>
                                                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title mb_16">
                                                    <a href="<?php the_permalink(); ?>" class="link line-clamp-2"><?php the_title(); ?></a>
                                                </h5>
                                                <div class="wrap-meta d-flex align-items-center gap_9 text-uppercase">
                                                    <?php if ( $settings['show_category'] == 'yes' ): ?>
            						                    <?php 
            						                    $categories = get_the_category();
            						                    if ( ! empty( $categories ) ) :
            						                        foreach ( $categories as $category ) :
            						                            $category_link = esc_url( get_category_link( $category->term_id ) );
            						                            $category_name = esc_html( $category->name );
            						                            echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
            						                        endforeach;
            						                    endif;
            						                    ?>
                        					        <?php endif; ?>
                        					    <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                                    <ul class="meta-feature fw-7 d-flex text-caption-2">
                                                        <li><?php echo get_the_date('F j, Y'); ?></li>
                                                        <li>
                                                        <span class="text_secodary2-color">
            						                        <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                                        </span>
            						                    <?php
						        		                    $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						        		                    $author_name = get_user_full_name($author_id); 
            						                    ?>
            						                    <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
            						                </li>
                                                    </ul>
                        					        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right">
                                    <?php if ( $settings['show_heading_right'] == 'yes' ): ?>
                                        <h5 class="mb_28 sub-heading"><?php echo $settings['heading_right']; ?></h5>
                        			<?php endif; ?>
                                    <?php
                                    if ($query->have_posts()) : $query->the_post(); ?>
                                        <div class="feature-post-item style-line v4 hover-image-translate item-grid">
                                            <div class="img-style mb_20">
                                                <img class="lazyload" loading="lazy"
                                                     data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'themesflat-blog-style3'); ?>"
                                                     src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'themesflat-blog-style3'); ?>"
                                                     width="392" height="221"
                                                     alt="<?php the_title_attribute(); ?>">
                                                <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title">
                                                    <a href="<?php the_permalink(); ?>" class="link line-clamp-2"><?php the_title(); ?></a>
                                                </h5>
                                                <div class="wrap-meta d-flex align-items-center gap_8 text-uppercase">
                                                    <?php if ( $settings['show_category'] == 'yes' ): ?>
            						                    <?php 
            						                    $categories = get_the_category();
            						                    if ( ! empty( $categories ) ) :
            						                        foreach ( $categories as $category ) :
            						                            $category_link = esc_url( get_category_link( $category->term_id ) );
            						                            $category_name = esc_html( $category->name );
            						                            echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
            						                        endforeach;
            						                    endif;
            						                    ?>
                        					        <?php endif; ?>
                                                    <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                                    <ul class="meta-feature fw-7 d-flex text-caption-2">
                                                        <li><?php echo get_the_date('F j, Y'); ?></li>
                                                        <li>
                                                        <span class="text_secodary2-color">
            						                        <?= esc_html__( 'POST BY', 'drozy' ); ?>
                                                        </span>
            						                    <?php
						        		                    $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
						        		                    $author_name = get_user_full_name($author_id); 
            						                    ?>
            						                    <a class="link" href="<?= esc_url( $author_url ); ?>" title="<?= esc_attr__( 'POST BY ' . $author_name, 'drozy' ); ?>" rel="author" aria-label="author"><?= esc_html( $author_name ); ?></a>
            						                </li>
                                                    </ul>
                        					        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                                    
                                    <?php
                                    $count_small = 0;
                                    while ($query->have_posts() && $count_small < 4) : $query->the_post(); $count_small++; ?>
                                        <div class="feature-post-item style-small v2 d-flex align-items-center hover-image-rotate item-grid">
                                            <a href="<?php the_permalink(); ?>" class="img-style">
                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
                                                     width="120" height="120" alt="<?php the_title_attribute(); ?>">
                                            </a>
                                            <div class="content">
                                                <h6 class="title mb_12">
                                                    <a href="<?php the_permalink(); ?>" class="link line-clamp-2"><?php the_title(); ?></a>
                                                </h6>
                                                <div class="wrap d-flex align-items-center gap_8">
                                                     <?php if ( $settings['show_category'] == 'yes' ): ?>
            						                    <?php 
            						                    $categories = get_the_category();
            						                    if ( ! empty( $categories ) ) :
            						                        foreach ( $categories as $category ) :
            						                            $category_link = esc_url( get_category_link( $category->term_id ) );
            						                            $category_name = esc_html( $category->name );
            						                            echo '<a href="' . $category_link . '" class="tag categories text-caption-2 text_white">' . $category_name . '</a> ';
            						                        endforeach;
            						                    endif;
            						                    ?>
                        					        <?php endif; ?>
                                                    <?php if ( $settings['show_meta'] == 'yes' ): ?>
                                                    <ul class="meta-feature text-caption-2 fw-7 text_secodary-color text-uppercase">
                                                        <li><?php echo get_the_date('F j, Y'); ?></li>
                                                    </ul>
                        					        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


       <?php endif; ?>



       <?php wp_reset_postdata(); ?>

		<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;	
	}



}