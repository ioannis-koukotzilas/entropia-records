<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,400;8..144,450;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">




	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<h1>Working Branch</h1>

		<header class="site-header">

			<div class="site-header__container">
				
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">Entropia Records</a></h1>
				
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'main-menu',
						'container' 	 => '',
					)
				);
				?>
				
				<?php monoscopic_woocommerce_header_cart(); ?>
				

			</div>

			<div id="store-flyout" class="flyout inactive">
				<div class="flyout__inner">

					<div class="records-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'records-menu',
								'container' => '',
								'menu_id' => 'records-menu',
							)
						);
						?>
					</div>

				</div>
			</div>


		</header>