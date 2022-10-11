<?php

/**
 * Single Product Image
 */

defined('ABSPATH') || exit;

if (!function_exists('monoscopic_gallery_image_html')) {
	return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();

?>
<div class="product-gallery">

<div class="container">

	<div class="slider">
		<div class="swiper-wrapper">
			<?php
			if ($post_thumbnail_id) {
				$html = monoscopic_gallery_image_html($post_thumbnail_id);
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
				$html .= '</div>';
			}

			echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

			do_action('woocommerce_product_thumbnails');
			?>
		</div>

		<div class="navigation">
			<div class="prev">
				<div class="cursor-area">
					<span class="icon"></span>
				</div>
			</div>

			<div class="next">
				<div class="cursor-area">
					<span class="icon"></span>
				</div>
			</div>
		</div>

		<div class="swiper-pagination"></div>

	</div>

	</div>


</div>