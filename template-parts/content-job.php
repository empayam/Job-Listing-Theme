<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <p class="card-text">
                    <strong>Location:</strong> <?php echo get_post_meta(get_the_ID(), '_job_location', true); ?><br>
                    <strong>Type:</strong> <?php echo get_post_meta(get_the_ID(), '_job_type', true); ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</div>
