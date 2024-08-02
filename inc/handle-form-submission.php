<?php
// Handle form submission for adding job
function handle_add_job() {
    if (!isset($_POST['job_title'], $_POST['job_description'], $_POST['job_location'], $_POST['job_type'], $_POST['job_category'])) {
        wp_die('Invalid form submission.');
    }

    $post_id = wp_insert_post(array(
        'post_title' => sanitize_text_field($_POST['job_title']),
        'post_content' => sanitize_textarea_field($_POST['job_description']),
        'post_status' => 'publish',
        'post_type' => 'job',
    ));

    if ($post_id) {
        update_post_meta($post_id, '_job_location', sanitize_text_field($_POST['job_location']));
        update_post_meta($post_id, '_job_type', sanitize_text_field($_POST['job_type']));
        wp_set_post_terms($post_id, array(intval($_POST['job_category'])), 'job_category');
    }

    wp_redirect(home_url());
    exit;
}

add_action('admin_post_nopriv_add_job', 'handle_add_job');
add_action('admin_post_add_job', 'handle_add_job');
?>
