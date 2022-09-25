<?php get_header(); ?>

<main id="primary" class="site-main">

	<div class="site-main__container">

		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'monoscopic') . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'monoscopic') . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile; // End of the loop.
		?>

	</div>

</main>

<?php get_footer();