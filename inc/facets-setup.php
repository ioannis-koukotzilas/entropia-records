<?php

/**
 * Facets Compatibility File
 *
 * @link https://facetwp.com/
 *
 */

// Remove Facet styles.
add_filter('facetwp_assets', function ($assets) {
  unset($assets['front.css']);
  unset($assets['fSelect.css']);
  // unset( $assets['facetwp-flyout.css'] );
  return $assets;
});

// Facets template.
function fwp_wrapper_open()
{
  if (!is_singular()) : echo '<div class="facetwp-template">';
  endif;
}
add_action('woocommerce_before_shop_loop', 'fwp_wrapper_open', 17);

function fwp_wrapper_close()
{
  if (!is_singular()) : echo '</div><!-- end facets -->';
  endif;
}
add_action('woocommerce_after_shop_loop', 'fwp_wrapper_close', 15);

function fwp_add_pager()
{
  echo do_shortcode('[facetwp facet="load_more"]');
}
add_action('woocommerce_after_shop_loop', 'fwp_add_pager', 20);




// Facet results count.
function fwp_results_count()
{
?>
  <div class="results-count">
    <div class="results-count__container">
      <?php echo do_shortcode('[facetwp facet="results_count"]'); ?>
    </div>
  </div>
<?php
}
add_action('woocommerce_before_shop_loop', 'fwp_results_count', 16);







// add_action('woocommerce_no_products_found', 'fwp_wrapper_open', 5);
// add_action('woocommerce_no_products_found', 'fwp_wrapper_close', 15);

// Hide counts from fSelect.
add_filter('facetwp_facet_dropdown_show_counts', '__return_false');

// Customize facets.
// add_filter('facetwp_render_output', function ($output) {
//   $output['settings']['artist']['searchText'] = 'Search artist';
//   $output['settings']['style']['searchText'] = 'Search style';
//   $output['settings']['label']['searchText'] = 'Search label';
//   $output['settings']['format']['searchText'] = 'Search format';
//   return $output;
// });

// Replace 'my_fselect_facet' with your fSelect facet name 3 times, and adapt the text.
add_filter( 'facetwp_render_output', function( $output ) {
  if ( isset( $output['settings']['artist'] ) ) {
    $output['settings']['artist']['overflowText'] = 'Please select a choice';
    $output['settings']['artist']['numDisplayed'] = 0;
  }
  return $output;
});

// Hide the search box
add_filter( 'facetwp_render_output', function( $output ) {
  $facets = FWP()->helper->get_facets();
  foreach ( $facets as $facet ) {
      if ( 'fselect' == $facet['type'] ) {
          $output['settings'][ $facet['name'] ]['showSearch'] = false;
      }
  }
  return $output;
});



// Display facets.
function add_facets()
{
if (is_product_category()) : 
?>
  <div class="facets">
    <div class="container">
      <?php echo do_shortcode('[facetwp facet="artist"]'); ?>
      <?php echo do_shortcode('[facetwp facet="style"]'); ?>
      <?php echo do_shortcode('[facetwp facet="label"]'); ?>
      <?php echo do_shortcode('[facetwp facet="format"]'); ?>
    </div>
    <div class="reset">
      <a href="javascript:void(0)" class="facetwp-reset-button" onclick="FWP.reset()"><?php esc_html_e('Clear all filters', 'eligo'); ?></a>
    </div>
  </div>
<?php endif;
}
add_action('woocommerce_before_shop_loop', 'add_facets', 15);












// Scroll on any facet interaction

add_action('wp_head', function () { ?>
  <script>
    (function($) {
      $(document).on('facetwp-refresh', function() {
        if (FWP.soft_refresh == true) {
          FWP.enable_scroll = false;
        } else {
          FWP.enable_scroll = true;
        }
      });
      $(document).on('facetwp-loaded', function() {
        if (FWP.enable_scroll == true) {
          $('html, body').animate({
            scrollTop: 0
          }, 500);
        }
      });
    })(jQuery);
  </script>
<?php });
