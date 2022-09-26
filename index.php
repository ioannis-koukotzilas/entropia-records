<?php get_header(); ?>

<main class="site-main">
	<div class="container">

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('template-parts/content', get_post_type()); ?>

			<?php endwhile;  ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; ?>

	</div>
</main>

<?php get_footer();
