<?php
/**
 * My Orders
 *
 * Shows recent orders on the account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $downloads = WC()->customer->get_downloadable_products() ) : ?>

	<?php do_action( 'woocommerce_before_available_downloads' ); ?>

	<h2><?php echo apply_filters( 'woocommerce_my_account_my_downloads_title', __( 'Available downloads', 'woocommerce' ) ); ?></h2>

	<ul class="digital-downloads">
		<?php foreach ( $downloads as $download ) :
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $download['product_id'] ), 'thumbnail' );	?>
			<li>
				<div class="row">
					<div class="hidden-xs col-md-2"><img src="<?php echo $image[0]; ?>" style="width:50px; height: 50px;"> </div>
					<div class="col-md-4">
						<?php
							$product_details = wc_get_product( $download['product_id'] );
							//$preview_url = get_post_meta(1426,'_pts_preview_url', true);
							$demo_link = explode("&ndash;",$download['download_name']); 
														
							$demo_link_exact = preg_replace('/[0-9]+/', '', $demo_link[1]);
							$demo_link_rtrim = rtrim($demo_link_exact, ".");
							$demo_link_ltrim = ltrim($demo_link_rtrim, "&ndash;");	
							$demo_link_final = str_replace(" ","",$demo_link_ltrim);
							
							if($demo_link_final=='GlowingAmberPro')
							{
								$demo_link_final = 'GlowingAmber';
							}
							if($demo_link_final=='PixelBlogger')
							{
								$demo_link_final = 'PixelMediaBlogger';
							}
							if($demo_link_final=='Eveningshade')
							{
								$demo_link_final = 'EveningShade';
							}
							
							$preview_url = 'http://pixelthemestudio.ca/pts-demo?theme='.$demo_link_final;
							echo '<h4 style="margin: 0px !important;"><a href="'.get_permalink($product_details->id).'"> '.$download['download_name'].'</a></h4>';

						?>
					</div>
					<div class="col-md-2">

						<?php
						do_action( 'woocommerce_available_download_start', $download );

						if ( is_numeric( $download['downloads_remaining'] ) )
							echo apply_filters( 'woocommerce_available_download_count', '<span class="count">' . sprintf( _n( '%s download remaining', '%s downloads remaining', $download['downloads_remaining'], 'woocommerce' ), $download['downloads_remaining'] ) . '</span> ', $download );

						echo apply_filters( 'woocommerce_available_download_link', '<a href="' . esc_url( $download['download_url'] ) . '" class="dll">Download</a>', $download );

						do_action( 'woocommerce_available_download_end', $download );
						?>

					</div>
					
					<div class="col-md-2"><a href="<?php echo $preview_url; ?>" target="_blank" class="pl">Preview</a></div>
					<div class="col-md-2">
						<?php if(get_post_meta($download['product_id'],'_pts_page_options_readme_file',true)): ?>
							<a href="<?php echo get_post_meta($download['product_id'],'_pts_page_options_readme_file',true); ?>" class="rm" download>Readme</a></div>
						<?php endif; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php do_action( 'woocommerce_after_available_downloads' ); ?>

<?php endif; ?>
