<?php get_header(); ?>

<div class="job-list mt-5">
    <?php if (have_posts()) : ?>
        <h2>Job Listings</h2>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'job'); ?>
        <?php endwhile; ?>
        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>
    <?php else : ?>
        <p>No job listings found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
