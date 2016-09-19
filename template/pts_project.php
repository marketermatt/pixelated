<?php

/**
 * pts_project.php
 * template for displaying single project
 *
 * @package pts theme
 * @since version 1.0
 */

get_header(); ?>
    <div class="container-wrap">
        <?php
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id());
        if(!empty($feat_image)) {
            $style = ' style=" background: URL(' . $feat_image . ') no-repeat; background-position: center; background-size:cover;"';
        }else{
            $style ='';
        }
        ?>
        <div class="container-fluid borderbottom no-15 project-title"<?php echo $style; ?>>
            <div class="page-excerpt container-fluid no-15" style="text-align: center; height: 200px; background-color: rgba(0, 0, 0, 0.76);">
                <h3 style="margin-top: 40px;"><?php echo get_the_title(); ?></h3>

                <div class="entry-meta" style="color:#fff;">
                    <?php //echo pts_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php pts_breadcrumbs(); ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="content-area col-xs-12 col-sm-8 col-md-9 hidden-overflow">
                    <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            the_content();
                            ?>
                            <div class="tags">
                                <?php the_tags(); ?>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                    <?php
                    ob_start();
                    comments_template('', true);
                    $output = ob_get_contents();
                    ob_end_clean();

                    $output = str_replace('type="text"','type="text" class="form-control"',$output);
                    $output = str_replace('<textarea','<textarea class="form-control"',$output);
                    $output = str_replace('class="submit"','class="btn btn-default"',$output);

                    echo '<br/>'.$output;
                    ?>
                </div>
                <div class="sidebar-area col-xs-12 col-sm-4 col-md-3 hidden-overflow">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single_post_widget') ) : else : ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>