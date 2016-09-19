<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header('shop'); ?>
<?php

global $post, $product;

$_pf = new WC_Product_Factory();
$product = $_pf->get_product($post->ID);

if(get_post_meta($post->ID,'_pts_page_options_page_width',true)=='2'){
    $pageMainContent = 'sidebar';
    $no15 = '';
}
elseif(get_post_meta($post->ID,'_pts_page_options_page_width',true)=='1'){
    $pageMainContent = 'full';
    $no15 = ' no-15';
}
else{
    $pageMainContent = 'sidebar';
    $no15 = '';
}


$page_id = get_queried_object_id();
$sliderOrBanner = get_post_meta($page_id, '_pts_page_options_banner_slider', true);
?>
    <div class="container-wrap">
        <div class="container-fluid borderbottom product-header">
            <div class="row">
            <?php if (!empty($sliderOrBanner) && $sliderOrBanner == 'banner') {
                 ?>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
				<?php
					echo '<img src="' . get_post_meta($page_id, '_pts_page_options_product_banner', true) . '">';
				?>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
					</div>
				</div>
                <div class="row" style="margin-top:-70px;">

                    <div class="col-xs-6 col-sm-6 col-md-6" style="text-align: right;">
                        <?php if(!empty(get_post_meta($post->ID,'_pts_page_options_product_demo_link',true))){ ?>
                        <a href="<?php echo get_post_meta($post->ID,'_pts_page_options_product_demo_link',true); ?>" target="_blank" class="btn btn-md btn-info"><?php _e('DEMO',PTS_DOMAIN); ?></a>
                        <?php } ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="<?php echo home_url('/cart/?add-to-cart='.$post->ID); ?>" class="btn btn-md btn-fill btn-danger">

                        <!--<a href="<?php echo do_shortcode('[add_to_cart_url id="'.$post->id.'"]'); ?>" class="btn pts-buy btn-block btn-fill">-->
                            <?php
                            $price_html = $product->get_price_html();
                            if($price_html != 'Free!'){
                                echo __('BUY ',PTS_DOMAIN) . ' <strong>' . get_woocommerce_currency().$product->get_price().'</strong>';
                            }else{
                                echo __('DOWNLOAD',PTS_DOMAIN);
                            }
                            ?>
                        <!--</a>-->
                        </a>

                    </div>

                </div>
            <?php }elseif(!empty($sliderOrBanner) && $sliderOrBanner == 'slider'){
                $slider = get_post_meta($page_id, '_pts_page_options_slider_shortcode', true);
                echo do_shortcode('[rev_slider alias="'.$slider.'"]');
            } ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php
            if($pageMainContent == 'sidebar'){
                echo '<div class="content-area col-xs-12 col-sm-8 col-md-9">';
            }
            else{
                echo '<div class="content-area col-xs-12 col-sm-12 col-md-12">';
            }

            ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; // end of the loop. ?>

            <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            //do_action( 'woocommerce_after_main_content' );
            if($pageMainContent == 'sidebar'){
                echo '</div>';
                do_action( 'woocommerce_sidebar' );
                //echo '</div>';
            }
            else{
                echo '</div>';
            }
            ?>
            </div>
        </div>
    </div>

<?php get_footer('shop'); ?>