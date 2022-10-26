<?php

/**
 * Template Name: Index
 */

get_header();
?>

<main class="site-main">

	<?php if (have_rows('spotlight')) : ?>
		<div class="spotlight">
			<div class="container swiper-wrapper">
				<?php while (have_rows('spotlight')) : the_row(); ?>
					<div class="slide">
						<div class="left-area">
							<?php $spotlight_image = get_sub_field('spotlight_image'); ?>
							<?php if ($spotlight_image) : ?>
								<?php echo wp_get_attachment_image($spotlight_image, 'full'); ?>
							<?php endif; ?>
						</div>
						<div class="right-area">
							<div class="container">
								<?php $spotlight_link = get_sub_field('spotlight_link'); ?>
								<?php if ($spotlight_link) : ?>
									<h1 class="title"><a href="<?php echo esc_url($spotlight_link['url']); ?>" target="<?php echo esc_attr($spotlight_link['target']); ?>"><?php echo esc_html($spotlight_link['title']); ?></a></h1>
								<?php endif; ?>

								<?php if (get_sub_field('spotlight_description')) : ?>
									<p class="description"><?php the_sub_field('spotlight_description'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			
			<div class="navigation">
				<div class="prev icon"></div>
				<div class="next icon"></div>
			</div>
			

		</div>
	<?php endif; ?>

	<section class="new-arrivals products-section">
		<div class="container">
			<h2 class="section-title"><?php esc_html_e('New Arrivals', 'monoscopic'); ?></h2>
			<?php echo do_shortcode('[products class="products-slider" limit="12" orderby="menu_order" visibility="visible" category="records" cat_operator="AND" tag="preorder" tag_operator="NOT IN"]'); ?>
		</div>
	</section>

	<section class="featured products-section">
		<div class="container">
			<h2 class="section-title"><?php esc_html_e('Recommended Releases', 'monoscopic'); ?></h2>
			<?php echo do_shortcode('[products class="products-slider" limit="12" orderby="menu_order" visibility="featured" category="records" cat_operator="AND"]'); ?>
		</div>
	</section>

</main>

<?php
get_footer();
