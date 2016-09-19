<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
    <?php if($price_html == 'Free!'){ ?>
        <a href="?add-to-cart=<?php echo $product->id; ?>" class="button pts-download"><?php _e('Download',PTS_DOMAIN); ?></a>
    <?php }else{ ?>
        <h2 class="price"><?php echo $price_html; ?></h2>
    <?php } ?>
<?php endif; ?>