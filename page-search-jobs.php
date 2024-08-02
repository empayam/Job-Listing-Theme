<?php
/* Template Name: Search Jobs */
get_header(); ?>

<div class="job-search mt-5">
    <h2>Search Jobs</h2>
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" name="s" placeholder="Search jobs">
            </div>
            <div class="col-md-4">
                <select class="form-control" name="job_category">
                    <option value="">Select Category</option>
                    <?php
                    $categories = get_terms(array('taxonomy' => 'job_category', 'hide_empty' => false));
                    foreach ($categories as $category) {
                        echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="job_location" placeholder="Location">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Search</button>
    </form>
</div>

<div class="job-list mt-5">
    <?php
    $meta_query = array();
    if (!empty($_GET['job_location'])) {
        $meta_query[] = array(
            'key' => '_job_location',
            'value' => sanitize_text_field($_GET['job_location']),
            'compare' => 'LIKE',
        );
    }

    $tax_query = array();
    if (!empty($_GET['job_category'])) {
        $tax_query[] = array(
            'taxonomy' => 'job_category',
            'field' => 'slug',
            'terms' => sanitize_text_field($_GET['job_category']),
        );
    }

    $args = array(
        'post_type' => 'job',
        'meta_query' => $meta_query,
        'tax_query' => $tax_query,
        's' => sanitize_text_field($_GET['s']),
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; else : ?>
        <p>No job listings found.</p>
    <?php endif; wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>