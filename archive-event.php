<?php get_header(); ?>

<main class="site-main">

	<div class="container">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header>

			<?php /* Start the Loop */ while (have_posts()) : the_post(); ?>

				<a href="<?php echo esc_url(get_permalink()); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<article>

						<div class="entry-meta">

							<?php $event_date = get_field('event_date'); ?>
							<?php if ($event_date) : ?>
								<div class="date"><?php echo esc_html($event_date); ?></div>
							<?php endif; ?>

							<?php $event_location = get_field('event_location'); ?>
							<?php if ($event_location) : ?>
								<div class="location"><?php echo esc_html($event_location['title']); ?></div>
							<?php endif; ?>

						</div>

						<header class="entry-header">
							<?php the_title('<h1 class="title">', '</h1>'); ?>
						</header>

						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>

					</article>

				</a>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif; ?>

	</div>

</main>

<?php get_footer();
