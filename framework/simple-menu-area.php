<?php
global $post;
$transclass = '';

if (get_post_meta($post->ID, '_pts_page_options_override_header_type', true) == 'on') {
    $transclass = ' trans';
}

if(class_exists(WooCommerce)){
    if(is_shop()){
        $transclass = '';
    }
}



?>

<div class="section-menu<?php echo $transclass; ?>">
    <div class="container">
        <div class="row">
            <div class="branding-menu col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <a href="<?php echo home_url(); ?>"><?php
                    pts_get_logo();
                    ?></a>
            </div>
            <div class="col-xs-6 col-sm-8 col-md-9 col-lg-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php if (class_exists('Woocommerce') && ot_get_option('pts_show_cart') == '1'): ?>
                    <?php pts_top_cart(); ?>
                <?php endif; ?>

                <?php
                $args = array(
                    'theme_location' => 'main',
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse head-nav',
                    'container_id' => 'navigationbar',
                    'menu_class' => 'nav navbar-nav',
                    'walker' => new wp_pts_navwalker()
                );
                echo wp_nav_menu($args);
                ?>
            </div>
        </div>
    </div>
</div>