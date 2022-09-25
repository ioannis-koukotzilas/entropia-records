<?php get_header(); ?>

<main id="primary" class="site-main">

	<div class="site-main__container">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h3 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf(esc_html__('Search Results for: %s', 'monoscopic'), '<span>' . get_search_query() . '</span>');
					?>
				</h3>
			</header>

		<?php
			/* Start the Loop */
			woocommerce_product_loop_start();

			while (have_posts()) :
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action('woocommerce_shop_loop');

				wc_get_template_part('content', 'product');

			endwhile;

			woocommerce_product_loop_end();

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

	</div>

</main>

<?php get_footer();