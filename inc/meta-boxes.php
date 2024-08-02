<?php
// Add meta boxes for job details
function add_job_meta_boxes() {
    add_meta_box(
        'job_details',
        __('Job Details'),
        'render_job_details_meta_box',
        'job',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'add_job_meta_boxes');

function render_job_details_meta_box($post) {
    // Add nonce for security
    wp_nonce_field('save_job_details', 'job_details_nonce');

    // Retrieve current details based on post ID
    $location = get_post_meta($post->ID, '_job_location', true);
    $type = get_post_meta($post->ID, '_job_type', true);

    echo '<label for="job_location">Location</label>';
    echo '<input type="text" id="job_location" name="job_location" value="' . esc_attr($location) . '" class="widefat" />';

    echo '<label for="job_type">Job Type</label>';
    echo '<input type="text" id="job_type" name="job_type" value="' . esc_attr($type) . '" class="widefat" />';
}

function save_job_details($post_id) {
    if (!isset($_POST['job_details_nonce']) || !wp_verify_nonce($_POST['job_details_nonce'], 'save_job_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['job_location'])) {
        update_post_meta($post_id, '_job_location', sanitize_text_field($_POST['job_location']));
    }

    if (isset($_POST['job_type'])) {
        update_post_meta($post_id, '_job_type', sanitize_text_field($_POST['job_type']));
    }
}

add_action('save_post', 'save_job_details');
?>
