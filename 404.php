<?php get_header(); ?>

<main class="site-main">

	<div class="container">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'monoscopic'); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'monoscopic'); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>

	</div>

</main>

<?php get_footer();