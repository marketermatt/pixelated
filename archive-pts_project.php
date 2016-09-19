<?php
get_header();
?>
    <div class="container-wrap">
        <div class="container-fluid borderbottom">
            <div class="page-excerpt container">
                <h3><?php echo single_cat_title(); ?></h3>
                <?php pts_breadcrumbs(); ?>
            </div>
        </div>
        <div class="<?php echo set_container(); ?>">
            <div class="row" style="margin-bottom:20px;">
                <?php
                if(ot_get_option('pts_project_count_per_line')=='3')
                {
                    $class = 'col-xs-12 col-sm-4 col-md-4';
                }
                elseif(ot_get_option('pts_project_count_per_line')=='4')
                {
                    $class = 'col-xs-12 col-sm-3 col-md-3';
                }
                elseif(ot_get_option('pts_project_count_per_line')=='6')
                {
                    $class = 'col-xs-12 col-sm-2 col-md-2';
                }
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        if ( has_post_thumbnail() ): ?>
                        <div class="<?php echo $class; ?>">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <div class="single-project-container">
                                    <?php the_post_thumbnail('full'); ?>
                                    <div class="single-project-content">
                                        <h2><?php the_title(); ?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif;
                    endwhile;
                endif;
                ?>
                <ul class="post-index-pagination pager">
                    <li class="previous"><?php next_posts_link( __( 'Newer', PTS_DOMAIN ) ); ?></li>
                    <li class="next"><?php previous_posts_link( __( 'Older', PTS_DOMAIN ) ); ?></li>
                </ul>
            </div>
        </div>
    </div>
<?php get_footer(); ?>