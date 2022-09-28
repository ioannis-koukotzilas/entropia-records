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

			<nav class="navbar">
				<div class="container">
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">Entropia Records</a></h1>
					<?php wp_nav_menu(['theme_location' => 'main-menu', 'menu_id' => 'main-menu', 'container' => '']); ?>
					<?php monoscopic_woocommerce_header_cart(); ?>
				</div>
			</nav>

			<div class="panels">
				<div class="container">
					<div class="panel">
						<div class="container">
							<?php wp_nav_menu(['theme_location' => 'records-menu', 'menu_id' => 'records-menu', 'container' => '']); ?>
						</div>
					</div>
					<div class="panel">
						<div class="container">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Phasellus faucibus scelerisque eleifend donec. Elit at imperdiet dui accumsan sit amet. Sed arcu non odio euismod lacinia at quis risus sed. Convallis convallis tellus id interdum. Proin nibh nisl condimentum id venenatis a. Nunc sed blandit libero volutpat sed cras. Magnis dis parturient montes nascetur ridiculus mus mauris vitae ultricies. Id volutpat lacus laoreet non curabitur gravida arcu ac. Commodo sed egestas egestas fringilla phasellus faucibus. Vel eros donec ac odio tempor orci dapibus ultrices. In aliquam sem fringilla ut morbi tincidunt augue interdum. Consectetur purus ut faucibus pulvinar elementum integer enim neque. Vel turpis nunc eget lorem dolor sed. Enim neque volutpat ac tincidunt vitae semper quis. Sapien et ligula ullamcorper malesuada proin libero. Eget nullam non nisi est.
						</div>
					</div>
					<div class="panel">
						<div class="container">
							Augue eget arcu dictum varius duis at. Scelerisque felis imperdiet proin fermentum leo vel orci. Vulputate ut pharetra sit amet. Sed vulputate mi sit amet. Enim eu turpis egestas pretium aenean pharetra magna. Iaculis nunc sed augue lacus. Egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Pellentesque nec nam aliquam sem. Proin nibh nisl condimentum id venenatis a. Tristique magna sit amet purus gravida quis. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum. Elementum sagittis vitae et leo duis. Dictumst quisque sagittis purus sit amet volutpat consequat mauris. Elementum eu facilisis sed odio morbi quis commodo. Lectus mauris ultrices eros in cursus turpis. Purus in massa tempor nec. Posuere urna nec tincidunt praesent semper feugiat nibh sed pulvinar. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. Mattis molestie a iaculis at.
						</div>
					</div>
				</div>
			</div>

		</header>