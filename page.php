<?php

/**
 * page.php
 * This is just the page template with a sidebar
 *
 * @package pts theme
 * @since version 1.0
 */

global $post;

get_header(); ?>
    <div class="container-wrap">
<?php get_template_part('template/page','title');

if(get_post_meta($post->ID,'_pts_page_options_page_width',true)=='2'):
    get_template_part('template/page','normal');
elseif(get_post_meta($post->ID,'_pts_page_options_page_width',true)=='1'):
    get_template_part('template/page','full');
else:
    get_template_part('template/page','normal');
endif;
?>
    </div>
<?php get_footer(); ?>