<?php
/* Template Name: Add Job */
get_header(); ?>

<div class="job-create mt-5">
    <h2>Add New Job</h2>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" required>
        </div>
        <div class="form-group">
            <label for="job_description">Description</label>
            <textarea class="form-control" id="job_description" name="job_description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="job_location">Location</label>
            <input type="text" class="form-control" id="job_location" name="job_location" required>
        </div>
        <div class="form-group">
            <label for="job_type">Job Type</label>
            <input type="text" class="form-control" id="job_type" name="job_type" required>
        </div>
        <div class="form-group">
            <label for="job_category">Category</label>
            <?php
            $categories = get_terms(array('taxonomy' => 'job_category', 'hide_empty' => false));
            if (!empty($categories)) {
                echo '<select class="form-control" id="job_category" name="job_category" required>';
                foreach ($categories as $category) {
                    echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
                }
                echo '</select>';
            }
            ?>
        </div>
        <input type="hidden" name="action" value="add_job">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php get_footer(); ?>
