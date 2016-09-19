<div class="container">
    <div class="row">
        <div class="content-area col-xs-12 col-sm-8 col-md-9">
            <?php
            if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>