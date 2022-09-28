<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 *  Menus
 */

// Replace has-submenu with 
// function nomadsland_mobile_menu_replace_atts($item_output, $menu_item)
// {
//     $menu_item_class = $menu_item->classes;
//     if (in_array('has-submenu', $menu_item_class)) {
//         return $menu_item->title;
//     }
//     return $item_output;
// }
// add_filter('walker_nav_menu_start_el', 'nomadsland_mobile_menu_replace_atts', 10, 2);
