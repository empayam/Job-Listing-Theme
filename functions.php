<?php
// Theme setup
function job_listings_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'job-listings-theme')
    ));
}

add_action('after_setup_theme', 'job_listings_theme_setup');

// Enqueue scripts and styles
function job_listings_theme_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'job_listings_theme_scripts');

// Include custom post types, meta boxes, and form handling
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/handle-form-submission.php';
?>
