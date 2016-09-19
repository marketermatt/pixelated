<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="alert alert-success"><?php echo str_replace('button wc-forward','btn btn-default',wp_kses_post( $message )); ?><div style="clear:both;"></div>
</div>
<?php endforeach; ?>
