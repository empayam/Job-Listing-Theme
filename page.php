<?php get_header(); ?>

<div class="page-content mt-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="row">
            <div class="col-md-12">
                <h1><?php the_title(); ?></h1>
                <div class="page-body">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
