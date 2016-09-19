<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (get_post_meta(get_option('woocommerce_shop_page_id'), '_pts_page_options_page_width', true) == '2') {
    $pageMainContent = 'sidebar';
    $no15 = '';
} elseif (get_post_meta(get_option('woocommerce_shop_page_id'), '_pts_page_options_page_width', true) == '1') {
    $pageMainContent = 'full';
    $no15 = ' no-15';
} else {
    $pageMainContent = 'sidebar';
    $no15 = '';
}

get_header('shop'); ?>

<div class="container-wrap">
    <div class="container-fluid borderbottom">
        <div class="page-excerpt container">
            <h3><?php woocommerce_page_title(); ?></h3>
            <?php woocommerce_breadcrumb(); ?>
            <?php do_action('woocommerce_archive_description'); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            if ($pageMainContent == 'sidebar') {
                echo '<div class="content-area col-xs-12 col-sm-8 col-md-9">';
            } else {
                echo '<div class="content-area col-xs-12 col-sm-12 col-md-12">';
            }
            if (have_posts()) : ?>

                <?php
                /**
                 * woocommerce_before_shop_loop hook
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');
                ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; // end of the loop. ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>

            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                <?php wc_get_template('loop/no-products-found.php'); ?>

            <?php endif; ?>

            <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            //do_action( 'woocommerce_after_main_content' );
            if ($pageMainContent == 'sidebar') {
                echo '</div>';
                do_action('woocommerce_sidebar');
            } else {
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer('shop'); ?>
