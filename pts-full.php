<?php
/**
 * Template Name: Full Width Template
 */
get_header(); ?>
    <div class="container-wrap">
        <?php if (!is_front_page()): ?>
            <div class="container-fluid borderbottom">
                <div class="page-excerpt container"><div class="row">
                    <h3><?php echo get_the_title(); ?></h3>
                    <?php pts_breadcrumbs(); ?>
                    <?php echo theme_excerpts(); ?>
                </div></div>
            </div>
        <?php endif; ?>

    </div>
<?php get_footer(); ?>