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

	<main id="primary" class="site-main">

		<div class="site-main__inner">

			<h1>This is a development site.</h1>
			<p>Please hold on or mail at webmaster AT monoscopic DOT net</p>

			<?php print_r( get_intermediate_image_sizes() ); ?>

		</div>

	</main>

<?php
get_footer();