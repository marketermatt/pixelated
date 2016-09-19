<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if (empty($woocommerce_loop['loop']))
    $woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns']))
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);

// Ensure visibility
if (!$product || !$product->is_visible())
    return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if (0 == ($woocommerce_loop['loop'] - 1) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'])
    $classes[] = 'first';
if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'])
    $classes[] = 'last';

$classes[] = 'col-xs-12 col-sm-6 col-md-4 boxed-prod-list';
?>
<div <?php post_class($classes); ?>>
    <a href="<?php the_permalink(); ?>">
        <h5 class="p-title"><?php the_title(); ?></h5>
        <div class="prod-list-dets">
            <div class="imgcont">
                <?php do_action('woocommerce_before_shop_loop_item_title'); ?>
            </div>
        </div>
    </a>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
            <?php
            if(!empty(get_post_meta(get_the_ID(),'_pts_page_options_product_demo_link',true))){
                ?>
            <a href="<?php echo get_post_meta(get_the_ID(),'_pts_page_options_product_demo_link',true); ?>" target="_blank" class="btn btn-sm btn-info"><?php _e('DEMO',PTS_DOMAIN); ?></a>
            <?php
            }
            ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <?php if($product->price != 0): ?>
            <a href="<?php echo home_url('/cart/?add-to-cart='.get_the_ID()); ?>" class="btn btn-sm btn-danger"><?php echo __('BUY',PTS_DOMAIN).' ('.$product->get_price_html().')'; ?></a>
            <?php else: ?>
            <a href="<?php echo home_url('/cart/?add-to-cart='.get_the_ID()); ?>" class="btn btn-sm btn-danger"><?php echo __('GET FREE',PTS_DOMAIN); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>