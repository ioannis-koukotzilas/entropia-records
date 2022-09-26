<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header class="site-header">
			<div class="container">
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">Entropia Records</a></h1>
				<?php wp_nav_menu(['theme_location' => 'main-menu', 'menu_id' => 'main-menu', 'container' => '']); ?>
				<?php monoscopic_woocommerce_header_cart(); ?>
			</div>

			<div id="store-flyout" class="flyout inactive">
				<div class="flyout__inner">
					<div class="records-menu">
						<?php wp_nav_menu(['theme_location' => 'records-menu', 'menu_id' => 'records-menu', 'container' => '']); ?>
					</div>
				</div>
			</div>
		</header>