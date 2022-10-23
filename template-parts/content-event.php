<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="featured-image">
			<div class="container">
			<?php the_post_thumbnail(); ?>
			</div>
		</div>
		
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</article>