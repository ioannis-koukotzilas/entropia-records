<?php get_header(); ?>

<main id="primary" class="site-main">

	<div class="site-main__container">

		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'page');

		endwhile; // End of the loop.
		?>

	</div>

</main>

<?php get_footer();