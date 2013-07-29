<?php

/**
 * Add search to menu
 */
function mp_menu_add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return "<li class='mp-menu-header-search'><form action='' id='searchform' method='get'><input type='text' name='s' id='s' placeholder='Search'></form></li>" . $items;

    return $items;
}
//add_filter('wp_nav_menu_items','mp_menu_add_search_box_to_menu', 10, 2);