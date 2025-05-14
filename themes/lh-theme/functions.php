<?php

define('LH_THEME_VERSION',     '1.1.0');
define('LH_THEME_SLUG',        'lh-theme');
define('LH_THEME_PATH',        get_template_directory());
define('LH_THEME_FILE',        __FILE__);
define('LH_THEME_URL',         get_template_directory_uri());
define('LH_THEME_ASSETS_PATH', get_template_directory() . '/assets/dist');
define('LH_THEME_ASSETS_URL',  get_template_directory_uri() . '/assets/dist');

require_once('src/alias_functions.php');
// require_once('vendor/autoload.php');
require_once('src/autoload.php');

new \LH_THEME\Setup();

// Add this code to your functions.php file

// AJAX handler for getting post content
function lh_get_post_content()
{
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'lh_theme_nonce')) {
        wp_send_json_error('Invalid nonce');
    }

    // Get post ID
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    if (!$post_id) {
        wp_send_json_error('Invalid post ID');
    }

    // Get post
    $post = get_post($post_id);

    if (!$post) {
        wp_send_json_error('Post not found');
    }

    $response = array(
        'title' => get_the_title($post_id),
        'content' => apply_filters('the_content', $post->post_content)
    );

    wp_send_json_success($response);
}
add_action('wp_ajax_get_post_content', 'lh_get_post_content');
add_action('wp_ajax_nopriv_get_post_content', 'lh_get_post_content');

// Add nonce to JavaScript
function lh_theme_enqueue_scripts()
{
    // Localize script with nonce
    wp_localize_script('jquery', 'lh_theme', array(
        'nonce' => wp_create_nonce('lh_theme_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'lh_theme_enqueue_scripts');
