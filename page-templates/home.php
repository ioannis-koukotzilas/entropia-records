<?php

/**
 * The template for displaying the Home page
 *
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Monoscopic
 */

get_header();
?>

<main class="site-main">

	<?php if (have_rows('spotlight')) : ?>
		<div class="spotlight">
			<div class="container">
				<?php while (have_rows('spotlight')) : the_row(); ?>
					<div class="slide">
						<div class="left">
							<?php $spotlight_image = get_sub_field('spotlight_image'); ?>
							<?php if ($spotlight_image) : ?>
								<?php echo wp_get_attachment_image($spotlight_image, 'full'); ?>
							<?php endif; ?>
						</div>
						<div class="right color-secondary">
							<div class="container">
								<div class="inner">
									<?php the_sub_field('spotlight_text'); ?>
									<h1>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries</h1>
									<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>

		</div>
	<?php endif; ?>


	<div class="container">

		<h1>This is a development site.</h1>
		<p>Please hold on or mail at webmaster AT monoscopic DOT net</p>

		<div class="featured">
			<div class="container">
				<div class="block-header">
					<h2 class="headline">Featured</h2>
				</div>
				<?php echo do_shortcode('[products class="products-slider" limit="12" orderby="menu_order" visibility="featured" category="records" cat_operator="IN" tag="preorder" tag_operator="NOT IN"]'); ?>
			</div>

		</div>

		

		

	</div>

</main>

<?php
get_footer();
