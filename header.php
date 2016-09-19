<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="<?php echo pts_get_favicon(); ?>"/>
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', PTS_DOMAIN), max($paged, $page));

        ?></title>
    <?php
    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    wp_head();

    ?>
</head>
<body <?php body_class(); ?>>
<div class="main">
    <?php if(ot_get_option('pts_enable_top_bar')=='on'){ ?>
    <div class="section-top hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="top-left">
                    <?php echo do_shortcode(ot_get_option('pts_slider_top_menu_left')); ?>
                </div>
                
                <ul class="nav navbar-nav top-nav">
                    <?php
                    $args = array(
                        'theme_location' => 'top',
                        'container' => false,
                        /*'menu_class' => 'nav navbar-nav top-nav',*/
                        'items_wrap' => '%3$s'
                    );
                    echo wp_nav_menu($args);
                    echo top_social_section();
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php
    get_template_part(trailingslashit(FRAMEWORK_FOLDER).'simple-menu','area');