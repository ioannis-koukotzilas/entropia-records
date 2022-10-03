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
	wp_enqueue_style('normalize', get_template_directory_uri() . '/src/css/normalize.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('style', get_stylesheet_uri(), array(), _MONOSCOPIC_VERSION);

	
	wp_enqueue_style('header', get_template_directory_uri() . '/src/css/header.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('woocommerce', get_template_directory_uri() . '/src/css/woocommerce.css', array(), _MONOSCOPIC_VERSION);
	
	wp_enqueue_style('swiper', get_template_directory_uri() . '/src/css/swiper-bundle.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('playlist', get_template_directory_uri() . '/src/css/playlist.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('single-product', get_template_directory_uri() . '/src/css/single-product.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('archive-product', get_template_directory_uri() . '/src/css/archive-product.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('facets', get_template_directory_uri() . '/src/css/facets.css', array(), _MONOSCOPIC_VERSION);

	wp_enqueue_style('app', get_template_directory_uri() . '/src/css/app.css', array(), _MONOSCOPIC_VERSION);

	wp_enqueue_script('dotdotdot', get_template_directory_uri() . '/src/js/dotdotdot.js', array(), _MONOSCOPIC_VERSION, true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/src/js/swiper-bundle.js', array(), _MONOSCOPIC_VERSION, true);
	wp_enqueue_script('playlist', get_template_directory_uri() . '/src/js/playlist.js', array(), _MONOSCOPIC_VERSION, true);
	wp_enqueue_script('navigation', get_template_directory_uri() . '/src/js/navigation.js', array(), _MONOSCOPIC_VERSION, true);
	wp_enqueue_script('app', get_template_directory_uri() . '/src/js/app.js', array(), _MONOSCOPIC_VERSION, true);

	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('wc-blocks-style');

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



