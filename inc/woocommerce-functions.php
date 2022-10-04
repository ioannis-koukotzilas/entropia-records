<?php

/**
 * WooCommerce Custom Functions
 */

/**
 * HTML for each gallery image.
 *
 * @link https://github.com/woocommerce/woocommerce/blob/trunk/plugins/woocommerce/includes/wc-template-functions.php
 * 
 */
function monoscopic_gallery_image_html($attachment_id)
{
	$image = wp_get_attachment_image($attachment_id, 'large');

	return '<div class="swiper-slide">' . $image . '</div>';
}

/**
 * Breadcrumb
 */

// Customize the breadcrumb.
function customize_woocommerce_breadcrumb()
{
	return array(
		'delimiter'   => ' / ',
		'wrap_before' => '<nav class="breadcrumb" itemprop="breadcrumb">',
		'wrap_after'  => '</nav>',
		'before'      => '',
		'after'       => '',
		'home'        => '',
	);
}
add_filter('woocommerce_breadcrumb_defaults', 'customize_woocommerce_breadcrumb');

/**
 * Product Title
 */

function monoscopic_product_title()
{
	if (get_field('product_title')) : ?>
		<h1 class="product-title"><?php the_field('product_title') ?></h1>
	<?php endif;
}

/**
 * Attributes
 */

// Arstist attribute archive link.
function monoscopic_attribute_link_artist()
{
	global $post;
	$attribute_names = array('pa_artist');
	foreach ($attribute_names as $attribute_name) {
		$taxonomy = get_taxonomy($attribute_name);
		if ($taxonomy && !is_wp_error($taxonomy)) {
			$terms = wp_get_post_terms($post->ID, $attribute_name);
			$terms_array = array();
			if (!empty($terms)) {
				foreach ($terms as $term) {
					$archive_link = get_term_link($term->slug, $attribute_name);
					$full_line = '<a href="' . $archive_link . '">' . $term->name . '</a>';
					array_push($terms_array, $full_line);
				}
				echo '<h1 class="artist">' . implode(', ', $terms_array) . '</h1>';
			}
		}
	}
}

// Label attribute name.
function monoscopic_attribute_name_label()
{
	global $post;
	$attribute_names = ['pa_format'];
	foreach ($attribute_names as $attribute_name) {
		$taxonomy = get_taxonomy($attribute_name);
		if ($taxonomy && !is_wp_error($taxonomy)) {
			$terms = wp_get_post_terms($post->ID, $attribute_name);
			$terms_array = [];
			if (!empty($terms)) {
				foreach ($terms as $term) {
					$full_line = $term->name;
					array_push($terms_array, $full_line);
				}
				echo '<span class="format">' . implode(', ', $terms_array) . '&nbsp;|</span>';
			}
		}
	}
}
add_action('woocommerce_after_shop_loop_item_title', 'monoscopic_attribute_name_label', 9);

/**
 * Product attribute arrays
 */

// Product attributes archive link.
function monoscopic_attributes_link()
{
	global $post;
	$attribute_names = ['pa_label', 'pa_style'];
	foreach ($attribute_names as $attribute_name) {
		$taxonomy = get_taxonomy($attribute_name);
		if ($taxonomy && !is_wp_error($taxonomy)) {
			$terms = wp_get_post_terms($post->ID, $attribute_name);
			$terms_array = [];
			if (!empty($terms)) {
				foreach ($terms as $term) {
					$archive_link = get_term_link($term->slug, $attribute_name);
					$full_line = '<a href="' . $archive_link . '">' . $term->name . '</a>';
					array_push($terms_array, $full_line);
				}
				echo '<div class="term">' . $taxonomy->labels->singular_name . ': ' . implode(', ', $terms_array) . '</div>';
			}
		}
	}
}

// Product attributes name.
function monoscopic_attributes_name()
{
	global $post;
	$attribute_names = ['pa_format', 'pa_release-year'];
	foreach ($attribute_names as $attribute_name) {
		$taxonomy = get_taxonomy($attribute_name);
		if ($taxonomy && !is_wp_error($taxonomy)) {
			$terms = wp_get_post_terms($post->ID, $attribute_name);
			$terms_array = [];
			if (!empty($terms)) {
				foreach ($terms as $term) {
					$full_line = $term->name;
					array_push($terms_array, $full_line);
				}
				echo '<div class="term">' . $taxonomy->labels->singular_name . ': ' . implode(', ', $terms_array) . '</div>';
			}
		}
	}
}

/**
 * Conditional info
 */

// Preorder item
function monoscopic_preorder_item()
{
	if (has_term('preorder', 'product_tag')) {
	?>
		<details>
			<summary><?php esc_html_e('Preorder Item', 'monoscopic'); ?></summary>
			<?php esc_html_e('Something small enough to escape casual notice.', 'monoscopic'); ?>
		</details>
		<?php
	}
}

// Used item
function monoscopic_used_item()
{
	if (has_term('used', 'product_tag')) {
		echo '<span class="used-item">Used item</span>';
	}
}

// Audio Player
function monoscopic_audio_player()
{
	global $product;

	if ($product->is_in_stock() || $product->is_on_backorder()) {
		if (have_rows('playlist')) : ?>
			<div class="audio-player audio-player-paused">
				<div class="container">
					<div class="audio-playback">
						<div class="audio-player-play-btn">
							<span class="icon"></span>
							<div class="playlist-title"><?php esc_html_e('Listen to:', 'monoscopic'); ?> <?php the_field('product_title'); ?></div>
						</div>
						<div class="audio-player-play-time">0:00</div>
						<div class="audio-player-timebar">
							<div class="audio-player-progress"></div>
						</div>
						<div class="audio-player-duration">0:00</div>
					</div>
					<div class="audio-playlist">
						<?php while (have_rows('playlist')) : the_row(); ?>
							<?php if (get_sub_field('mp3')) : ?>
								<div class="audio-track" data-audio="<?php the_sub_field('mp3'); ?>">
									<span class="icon"></span>
									<div class="audio-track-name"><?php the_sub_field('title'); ?></div>
									<div class="audio-track-length"><?php the_sub_field('time'); ?></div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
<?php endif;
	}
}
