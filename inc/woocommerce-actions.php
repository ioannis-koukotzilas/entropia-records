<?php

/**
 * 
 * WooCommerce Actions
 * 
 */

/**
 * 
 * Global
 * 
 */

// Remove default WooCommerce wrapper.
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Wraps all WooCommerce content in wrappers which match the theme markup.
function monoscopic_woocommerce_wrapper_before()
{
    echo '<main class="site-main">';
}
add_action('woocommerce_before_main_content', 'monoscopic_woocommerce_wrapper_before');

// Close the wrapping div.
function monoscopic_woocommerce_wrapper_after()
{
    echo '</main>';
}
add_action('woocommerce_after_main_content', 'monoscopic_woocommerce_wrapper_after');

// Site main wrapper open.
function archive_site_main_wrapper_open()
{
    if (!is_singular()) : echo '<div class="container">';
    endif;
}
add_action('woocommerce_before_main_content', 'archive_site_main_wrapper_open', 15);

// Site main wrapper close.
function archive_site_main_wrapper_close()
{
    if (!is_singular()) : echo '</div>';
    endif;
}
add_action('woocommerce_after_main_content', 'archive_site_main_wrapper_close', 5);

// 
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Remove demo store notification.
remove_action('wp_footer', 'woocommerce_demo_store');

/**
 * 
 * Single product
 * 
 */

// Remove notices.
// remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);

// Remove default product title.
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

// Remove product meta.
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Remove product tabs.
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

// Wrap single product content.
function monoscopic_product_container_open()
{
    echo '<div class="product__container">';
}
add_action('woocommerce_before_single_product_summary', 'monoscopic_product_container_open', 1);

// Close the wrapper.
function monoscopic_product_container_close()
{
    echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'monoscopic_product_container_close', 1);

// Add breadcrumb
add_action('woocommerce_single_product_summary', 'woocommerce_breadcrumb', 4);

// Add product header wrapper.
function monoscopic_product_header_open()
{
    echo '<header class="product-header">';
}
add_action('woocommerce_single_product_summary', 'monoscopic_product_header_open', 5);

// Add artist link
add_action('woocommerce_single_product_summary', 'monoscopic_attribute_link_artist', 7);

// Add product title.
add_action('woocommerce_single_product_summary', 'monoscopic_product_title', 8);

// Add preorder item info.
add_action('woocommerce_single_product_summary', 'monoscopic_preorder_item', 9);

// Add used item info.
add_action('woocommerce_single_product_summary', 'monoscopic_used_item', 10);

// Close product header wrapper.
function monoscopic_product_header_close()
{
    echo '</header>';
}
add_action('woocommerce_single_product_summary', 'monoscopic_product_header_close', 15);

// Add product meta wrapper.
function monoscopic_product_meta_wrapper_open()
{
    echo '<div class="product-meta">';
}
add_action('woocommerce_single_product_summary', 'monoscopic_product_meta_wrapper_open', 20);

// Add Product Meta
add_action('woocommerce_single_product_summary', 'monoscopic_attributes_link', 22);
add_action('woocommerce_single_product_summary', 'monoscopic_attributes_name', 23);

// Close product meta wrapper.
function monoscopic_product_meta_wrapper_close()
{
    echo '</div>';
}
add_action('woocommerce_single_product_summary', 'monoscopic_product_meta_wrapper_close', 25);

// Add product cart wrapper.
function monoscopic_product_cart_wrapper_open()
{
    echo '<div class="product-cart">';
}
add_action('woocommerce_before_add_to_cart_form', 'monoscopic_product_cart_wrapper_open', 1);

// Reposition product price
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_before_add_to_cart_form', 'woocommerce_template_single_price', 2);

// Close product cart wrapper.
function monoscopic_product_cart_wrapper_close()
{
    echo '</div>';
}
add_action('woocommerce_after_add_to_cart_form', 'monoscopic_product_cart_wrapper_close', 100);

// Reposition product short description.
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 40);

add_action('woocommerce_single_product_summary', 'monoscopic_audio_player', 45);

/**
 * 
 * Products Archive
 * 
 */

// Remove breadcrumb.
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Remove Catalog Ordering.
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Remove result count.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Remove pagination.
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
