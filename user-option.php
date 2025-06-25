<?php
/**
 * Custom Admin Settings Page for Website/Admin Information
 * This code should be placed in your theme's functions.php or a custom plugin.
 */

// 1. Add a custom menu item to the WordPress admin dashboard
function my_custom_website_info_admin_menu() {

    // Optionally, add a top-level menu item if you prefer
    add_menu_page(
        'Website/Admin Information',
        'Website Info',
        'manage_options',
        'my-website-info',
        'my_website_info_page_callback',
        'dashicons-admin-generic', // Icon for the menu (check dashicons.com for options)
        80 // Position in the menu hierarchy
    );
}
add_action('admin_menu', 'my_custom_website_info_admin_menu');

// 2. Register settings fields
function my_website_info_settings_init() {
    // Register a setting group and an option to store all data as an array
    register_setting(
        'my_website_info_group',       // Settings group name
        'my_website_info_options'      // Option name (all data will be stored here as an array)
    );

    // Add a settings section for general information
    add_settings_section(
        'my_website_info_general_section', // ID of the section
        'General Information',             // Title of the section
        'my_website_info_general_section_callback', // Callback function for section description
        'my-website-info'                  // Slug of the settings page
    );

    // Add individual fields for general information
    add_settings_field(
        'custom_avatar',
        'Avatar (URL)',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'custom_avatar', 'type' => 'text', 'description' => 'URL for the avatar image.']
    );

    add_settings_field(
        'full_name',
        'Full Name',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'full_name', 'type' => 'text', 'description' => 'Full name of the website manager or representative.']
    );

    add_settings_field(
        'job_title',
        'Job Title',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'job_title', 'type' => 'text', 'description' => 'E.g., CEO, Founder, Webmaster.']
    );

    add_settings_field(
        'address',
        'Address',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'address', 'type' => 'text', 'description' => 'Contact address.']
    );

    // NEW FIELD: Email
    add_settings_field(
        'email_address',
        'Email Address',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'email_address', 'type' => 'email', 'description' => 'General contact email address.']
    );

    add_settings_field(
        'cv_link',
        'CV/Resume Link',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'cv_link', 'type' => 'url', 'description' => 'URL to a CV or portfolio page.']
    );

    add_settings_field(
        'contact_link',
        'Contact Link',
        'my_website_info_field_callback',
        'my-website-info',
        'my_website_info_general_section',
        ['name' => 'contact_link', 'type' => 'url', 'description' => 'URL of the contact page or form.']
    );

    // Section for social media links
    add_settings_section(
        'my_website_info_social_section',
        'Social Media',
        'my_website_info_social_section_callback',
        'my-website-info'
    );

    $socials = [
        'linkedin' => 'LinkedIn',
        'github'   => 'GitHub',
        'twitter'  => 'X (Twitter)',
        'dribbble' => 'Dribbble',
        'facebook' => 'Facebook',
        'instagram'=> 'Instagram',
        'tiktok'   => 'TikTok',
        'youtube'  => 'YouTube',
        'behance'  => 'Behance',
        'medium'   => 'Medium',
    ];

    foreach ($socials as $id => $label) {
        add_settings_field(
            'social_' . $id, // Unique ID for each social field
            $label,
            'my_website_info_field_callback',
            'my-website-info',
            'my_website_info_social_section',
            ['name' => 'social_' . $id, 'type' => 'url', 'description' => 'URL for your ' . $label . ' profile.']
        );
    }
}
add_action('admin_init', 'my_website_info_settings_init');

// 3. Callback function for the General Information section
function my_website_info_general_section_callback() {
    echo '<p>Enter the basic information about your website or its representative.</p>';
}

// Callback function for the Social Media section
function my_website_info_social_section_callback() {
    echo '<p>Enter the links to your social media profiles.</p>';
}

// Function to render individual input fields
function my_website_info_field_callback($args) {
    $options = get_option('my_website_info_options');
    $name = $args['name'];
    $type = $args['type'];
    $description = $args['description'];
    $value = isset($options[$name]) ? esc_attr($options[$name]) : '';

    echo '<input type="' . esc_attr($type) . '" id="' . esc_attr($name) . '" name="my_website_info_options[' . esc_attr($name) . ']" value="' . esc_attr($value) . '" class="regular-text">';
    echo '<p class="description">' . esc_html($description) . '</p>';

    // If it's the avatar field, add a media uploader button
    if ($name === 'custom_avatar') {
        echo '<button type="button" class="button my-upload-button" data-field-id="custom_avatar">Select Image</button>';
        // Enqueue WordPress Media Uploader scripts
        wp_enqueue_media();
        ?>
        <script>
            jQuery(document).ready(function($){
                $('.my-upload-button').click(function(e) {
                    e.preventDefault();
                    var button = $(this);
                    var field_id = button.data('field-id');
                    var custom_uploader = wp.media({
                        title: 'Select Avatar Image',
                        library: { type: 'image' },
                        button: { text: 'Select Image' },
                        multiple: false
                    }).on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $('#' + field_id).val(attachment.url);
                    }).open();
                });
            });
        </script>
        <?php
    }
}

// 4. Render the settings page content
function my_website_info_page_callback() {
    ?>
    <div class="wrap">
        <h1>Website/Admin Information</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('my_website_info_group'); // The settings group registered
            do_settings_sections('my-website-info');  // The slug of the settings page
            submit_button('Save Changes');
            ?>
        </form>
    </div>
    <?php
}

// 5. Function to retrieve the saved data in the front-end
function get_my_website_info() {
    $options = get_option('my_website_info_options');

    // Default values to prevent errors if no data has been saved yet
    $default_info = [
        'custom_avatar' => '',
        'full_name'     => '',
        'job_title'     => '',
        'address'       => '',
        'email_address' => '', // NEW DEFAULT: Email
        'cv_link'       => '',
        'contact_link'  => '',
    ];

    $socials = [
        'linkedin' => '', 'github' => '', 'twitter' => '',
        'dribbble' => '', 'facebook' => '', 'instagram' => '',
        'tiktok'   => '', 'youtube' => '', 'behance' => '',
        'medium'   => '',
    ];

    foreach ($socials as $id => $label) {
        $default_info['social_' . $id] = '';
    }

    // Merge saved options with defaults to ensure all keys exist
    return wp_parse_args($options, $default_info);
}

?>