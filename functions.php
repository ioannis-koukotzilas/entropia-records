<?php

if (!defined('_MONOSCOPIC_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_MONOSCOPIC_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function monoscopic_setup()
{

	// Make theme available for translation.
	load_theme_textdomain('monoscopic', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Let WordPress manage the document title.
	add_theme_support('title-tag');

	// Enable support for Post Thumbnails on posts and pages.	
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'monoscopic'),
			'store-menu' => esc_html__('Store Menu', 'monoscopic'),
			'records-menu' => esc_html__('Records Menu', 'monoscopic'),
			'info-menu' => esc_html__('Info Menu', 'monoscopic'),
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.	
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'monoscopic_setup');

// Set the content width in pixels, based on the theme's design and stylesheet.
function monoscopic_content_width()
{
	$GLOBALS['content_width'] = apply_filters('monoscopic_content_width', 2560);
}
add_action('after_setup_theme', 'monoscopic_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function monoscopic_scripts()
{
	// Global Styles
	wp_enqueue_style('normalize', get_template_directory_uri() . '/src/css/normalize.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('style', get_stylesheet_uri(), array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('app', get_template_directory_uri() . '/src/css/app.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('woocommerce', get_template_directory_uri() . '/src/css/woocommerce.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('products', get_template_directory_uri() . '/src/css/products.css', array(), _MONOSCOPIC_VERSION);

	// Global Scripts
	wp_enqueue_script('products', get_template_directory_uri() . '/src/js/products.js', array(), _MONOSCOPIC_VERSION, true);

	// Swiper
	wp_enqueue_style('swiper', get_template_directory_uri() . '/src/css/swiper.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/src/js/swiper-bundle.js', array(), _MONOSCOPIC_VERSION, true);

	wp_enqueue_script('app', get_template_directory_uri() . '/src/js/app.js', array(), _MONOSCOPIC_VERSION, true);
	wp_enqueue_script('navigation', get_template_directory_uri() . '/src/js/navigation.js', array(), _MONOSCOPIC_VERSION, true);


	if (is_front_page()) {
		wp_enqueue_style('home', get_template_directory_uri() . '/src/css/home.css', array(), _MONOSCOPIC_VERSION);
	}

	if (is_product()) {
		// DotDotDot
		wp_enqueue_script('dotdotdot', get_template_directory_uri() . '/src/js/dotdotdot.js', array(), _MONOSCOPIC_VERSION, true);

		// Product
		wp_enqueue_style('product', get_template_directory_uri() . '/src/css/product.css', array(), _MONOSCOPIC_VERSION);
		wp_enqueue_script('product', get_template_directory_uri() . '/src/js/product.js', array(), _MONOSCOPIC_VERSION, true);

		// Product Gallery
		wp_enqueue_style('product-gallery', get_template_directory_uri() . '/src/css/product-gallery.css', array(), _MONOSCOPIC_VERSION);

		// Audio Player
		wp_enqueue_style('audio-player', get_template_directory_uri() . '/src/css/audio-player.css', array(), _MONOSCOPIC_VERSION);
		wp_enqueue_script('audio-player', get_template_directory_uri() . '/src/js/audio-player.js', array(), _MONOSCOPIC_VERSION, true);
	}

	if (!is_singular() && is_woocommerce()) {
		// Facets
		wp_enqueue_style('facets', get_template_directory_uri() . '/src/css/facets.css', array(), _MONOSCOPIC_VERSION);
	}

	if (is_cart()) {
		// Cart
		wp_enqueue_style('cart', get_template_directory_uri() . '/src/css/cart.css', array(), _MONOSCOPIC_VERSION);
	}

	wp_enqueue_style('event', get_template_directory_uri() . '/src/css/event.css', array(), _MONOSCOPIC_VERSION);

	// wp_dequeue_style('wp-block-library');
	// wp_dequeue_style('wp-block-library-theme');
	// wp_dequeue_style('global-styles');
	// wp_dequeue_style('wc-blocks-style');

	// wp_dequeue_script( 'wc-cart-fragments' ); 

	// Remove CSS on the front end.
	wp_dequeue_style('wp-block-library');

	// Remove Gutenberg theme.
	wp_dequeue_style('wp-block-library-theme');

	// Remove inline global CSS on the front end.
	wp_dequeue_style('global-styles');

	// Remove select 2.
	wp_dequeue_script('select2');
	wp_dequeue_style('select2');
	wp_dequeue_script('selectWoo');
	wp_dequeue_style('selectWoo');
}
add_action('wp_enqueue_scripts', 'monoscopic_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce-setup.php';
	require get_template_directory() . '/inc/woocommerce-functions.php';
	require get_template_directory() . '/inc/woocommerce-actions.php';
}

/**
 * Facets compatibility file.
 */
require get_template_directory() . '/inc/facets-setup.php';




add_filter('perfmatters_fade_in_speed', function ($speed) {
	return 10000; //speed in ms
});




/**
 * Change Posts Per Page for Event Archive
 * 
 * @link https://www.billerickson.net/customize-the-wordpress-query/
 * @param object $query data
 *
 */
function be_change_event_posts_per_page($query)
{

	if ($query->is_main_query() && !is_admin() && is_post_type_archive('event')) {
		$query->set('posts_per_page', '8');
	}
}
add_action('pre_get_posts', 'be_change_event_posts_per_page');





/**
 * Archive title.
 */
function monoscopic_archive_title($title)
{
	if (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
}
add_filter('get_the_archive_title', 'monoscopic_archive_title');
