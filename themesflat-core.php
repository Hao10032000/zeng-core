<?php

/*

Plugin Name: Themesflat Core

Description: The theme's components

Author: Themesflat

Version: 1.0.0

Text Domain: themesflat-core

Domain Path: /languages

*/



define( 'THEMESFLAT_VERSION', '1.0.0' );

define( 'THEMESFLAT_PATH', plugin_dir_path( __FILE__ ) );

define( 'THEMESFLAT_URL', plugin_dir_url( __FILE__ ) );

define( 'THEMESFLAT_LINK_PLUGIN', trailingslashit( get_template_directory_uri() ) );



$theme = wp_get_theme();

if ( 'zeng' == $theme->name || 'zeng' == $theme->parent_theme ) {
    require THEMESFLAT_PATH . "/widgets/themesflat_recent_post.php";
    require_once plugin_dir_path( __FILE__ ).'/user-option.php';
}




function themesflat_mime_types_svg($mimes) {

    $mimes['svg'] = 'image/svg+xml';

    return $mimes;

}

add_filter('upload_mimes', 'themesflat_mime_types_svg');

add_filter('mime_types', 'themesflat_mime_types_svg');



if (!defined('ABSPATH'))

    exit;



final class ThemesFlat_Addon_For_Elementor_zeng {



    const VERSION = '1.0.0';

    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    const MINIMUM_PHP_VERSION = '5.2';



    private static $_instance = null;

    private static $meta_option;

    private static $current_page_type = null;

    private static $current_page_data = array();

    private static $user_selection;

    private static $location_selection;



    public static function instance() {

        if ( is_null( self::$_instance ) ) {

            self::$_instance = new self();

        }

        return self::$_instance;

    }



    public function __construct() {        

        add_action( 'init', [ $this, 'i18n' ] );

        add_action( 'plugins_loaded', [ $this, 'init' ] );

        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );

        define('URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME', plugins_url('/', __FILE__));

        if ( ! function_exists('is_plugin_active') ){ include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }    

    }



    public function i18n() {

        load_plugin_textdomain( 'themesflat-core', false, basename( dirname( __FILE__ ) ) . '/languages' );

    }



    public function init() {

        // Check if Elementor installed and activated        

        if ( ! did_action( 'elementor/loaded' ) ) {

            add_action( 'admin_notices', [ $this, 'tf_admin_notice_missing_main_plugin' ] );

            return;

        }



        // Check for required Elementor version

        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {

            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );

            return;

        }



        // Check for required PHP version

        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {

            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );

            return;

        }      

        require_once plugin_dir_path( __FILE__ ).'/helpers.php';


        // Add Plugin actions

        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );



        add_action( 'elementor/elements/categories_registered', function () {

            $elementsManager = \Elementor\Plugin::instance()->elements_manager;

            $elementsManager->add_category(

                'themesflat_addons',

                array(

                  'title' => 'THEMESFLAT ADDONS',

                  'icon'  => 'fonts',

            ));
            $elementsManager->add_category(

                'themesflat_addons_core',

                array(

                  'title' => 'THEMESFLAT ADDONS',

                  'icon'  => 'fonts',

            ));



        });


    }    



    public function tf_admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );



        $message = sprintf(

            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'themesflat-core' ),

            '<strong>' . esc_html__( 'Themesflat Addons For Elementor', 'themesflat-core' ) . '</strong>',

            '<strong>' . esc_html__( 'Elementor', 'themesflat-core' ) . '</strong>'

        );



        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }



    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(

            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themesflat-core' ),

            '<strong>' . esc_html__( 'Themesflat Addons For Elementor', 'themesflat-core' ) . '</strong>',

            '<strong>' . esc_html__( 'Elementor', 'themesflat-core' ) . '</strong>',

             self::MINIMUM_ELEMENTOR_VERSION

        );



        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );



    }



    public function admin_notice_minimum_php_version() {



        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(

            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themesflat-core' ),

            '<strong>' . esc_html__( 'Themesflat Addons For Elementor', 'themesflat-core' ) . '</strong>',

            '<strong>' . esc_html__( 'PHP', 'themesflat-core' ) . '</strong>',

             self::MINIMUM_PHP_VERSION

        );



        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );



    }



    public function init_widgets() {



        // require_once( __DIR__ . '/widgets/widget-slides.php' );
        // \Elementor\Plugin::instance()->widgets_manager->register( new \TFSlides_Widget() );

        // require_once( __DIR__ . '/widgets/widget-flex-post.php' );
        // \Elementor\Plugin::instance()->widgets_manager->register( new \TFFlex_Posts_Widget() );

        // require_once( __DIR__ . '/widgets/widget-popular-post.php' );
        // \Elementor\Plugin::instance()->widgets_manager->register( new \TFPopular_Posts_Widget() );

        require_once( __DIR__ . '/widgets/widget-project.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFProject_Widget() );

        require_once( __DIR__ . '/widgets/widget-call-action.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFCall_Action_Widget() );

        require_once( __DIR__ . '/widgets/widget-subscribe-section.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFSubscribe_Section_Widget() );

        require_once( __DIR__ . '/widgets/widget-service.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFService_Widget() );

        require_once( __DIR__ . '/widgets/widget-step.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFListStep_Widget() );

        require_once( __DIR__ . '/widgets/widget-counter.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFCounter_Widget() );

        require_once( __DIR__ . '/widgets/widget-testimonial.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFTestimonial_Widget() );

        require_once( __DIR__ . '/widgets/widget-tabs.php' );
        \Elementor\Plugin::instance()->widgets_manager->register( new \TFTabs_Widget() );

    }



    public function init_controls() {}    


    public function widget_scripts() {


        wp_register_script( 'tf-posts-core', plugins_url( '/assets/js/posts/tf-posts.js', __FILE__ ), [ 'jquery' ], false, true );

        wp_register_script( 'tf-carousel', plugins_url( '/assets/js/carousel-widget.js', __FILE__ ), [ 'jquery' ], false, true );

    }



    /*========================================= 

    post 

    ======================================== */

        static function tf_get_post_types() {

            $post_type_args = [

                'show_in_nav_menus' => true,

            ];

            $post_types = get_post_types($post_type_args, 'objects');



            foreach ( $post_types as $post_type ) {

                $post_type_name[$post_type->name] = $post_type->label;      

            }

            return $post_type_name;

        }



        static function tf_get_taxonomies( $category = 'category' ){

            $category_posts = get_terms( 

                array(

                    'taxonomy' => $category,

                )

            );

    
            foreach ( $category_posts as $category_post ) {

                $category_posts_name[$category_post->slug] = $category_post->name;      

            }

            return $category_posts_name;

        }  


}

ThemesFlat_Addon_For_Elementor_zeng::instance();

/**
 * Custom Walker for WordPress Navigation Menu
 * Generates the specific HTML structure for menu items as requested.
 */
class Custom_Nav_Menu_Walker extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param WP_Post $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param stdClass $args An object of wp_nav_menu() arguments.
     * @param int $id Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'preserve' === $args->item_spacing ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'text-menu text_white'; // Add your desired LI classes here

        // Filter CSS classes for the current LI element.
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        // Filter the ID attribute for the current LI element.
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['class'] = 'nav_link toggle splitting link link-no-action text-button font-3 fw-6'; // Add your desired A classes here

        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';

        // Apply filters to the HTML attributes.
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /**
         * Construct the link HTML with custom <span> elements.
         * The item->title contains the menu item's title.
         */
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span class="text" data-splitting>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';
        $item_output .= '<span class="text" data-splitting>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // You generally don't need to override end_el() for this structure,
    // as it just closes the </li> tag, which is fine by default.
}
