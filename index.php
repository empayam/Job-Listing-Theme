<?php get_header(); ?>

<div class="job-list">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
    <?php endif; ?>
</div>

<?php get_footer(); ?>