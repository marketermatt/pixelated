<?php 

/**
 * page.php
 * This is just the page template with a sidebar
 *
 * @package pts theme
 * @since version 1.0
 */

get_header();

if('pts_project'==get_post_type())
{
    get_template_part('template/pts_project', 'index');
}
else
{
    get_template_part('template/normal','post');
}

get_footer();