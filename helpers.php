<?php

// Add meta box
function add_youtube_url_meta_box() {
    add_meta_box(
        'youtube_url_meta_box',        // ID
        'YouTube Video URL',           // Title
        'render_youtube_url_meta_box', // Callback
        'post',                        // Post type
        'normal',                      // Context
        'default'                      // Priority
    );
}
add_action('add_meta_boxes', 'add_youtube_url_meta_box');

// Render meta box HTML
function render_youtube_url_meta_box($post) {
    // Retrieve existing value
    $youtube_url = get_post_meta($post->ID, '_youtube_url', true);
    // Add a nonce field for security
    wp_nonce_field('save_youtube_url_meta_box', 'youtube_url_nonce');

    echo '<label for="youtube_url_field">Paste YouTube Video URL:</label><br>';
    echo '<input type="text" id="youtube_url_field" name="youtube_url_field" value="' . esc_attr($youtube_url) . '" style="width:100%;" />';
}

// Save the meta box value
function save_youtube_url_meta_box($post_id) {
    // Check if our nonce is set and valid
    if (!isset($_POST['youtube_url_nonce']) || !wp_verify_nonce($_POST['youtube_url_nonce'], 'save_youtube_url_meta_box')) {
        return;
    }

    // Avoid autosaves
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // Sanitize and save
    if (isset($_POST['youtube_url_field'])) {
        update_post_meta($post_id, '_youtube_url', esc_url_raw($_POST['youtube_url_field']));
    }
}
add_action('save_post', 'save_youtube_url_meta_box');
