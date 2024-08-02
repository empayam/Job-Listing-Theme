<?php get_header(); ?>

<div class="single-job">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_content(); ?></p>
                        <div class="resume-upload mt-5">
                            <form action="/upload" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="resume">Upload Resume (PDF)</label>
                                    <input type="file" class="form-control-file" id="resume" name="resume">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
