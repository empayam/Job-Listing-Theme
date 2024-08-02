<?php
// Register Custom Post Type for Jobs
function create_job_post_type() {
    register_post_type('job',
        array(
            'labels' => array(
                'name' => __('Jobs'),
                'singular_name' => __('Job')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'jobs'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

    register_taxonomy('job_category', 'job', array(
        'label' => __('Categories'),
        'rewrite' => array('slug' => 'job-category'),
        'hierarchical' => true,
    ));
}

add_action('init', 'create_job_post_type');
?>
