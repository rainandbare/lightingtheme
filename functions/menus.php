<?php

// // Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'visoinc' ),   // Main nav in header
		'footer-links' => __( 'Footer Links', 'visoinc' ), // Main nav in footer
        'sub-footer-links' => __( 'Sub Footer Links', 'visoinc' ),  // Secondary nav in footer
        'social-links' => __( 'Social Links', 'visoinc' ) // Social Links available anywhere
	)
);

// The Main Menu
function suzette_main_menu() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'The Main Menu', 'jointswp' ),     // Nav name
        'menu_class' => 'main-menu menu',                        // Adding custom nav class
        'theme_location' => 'main-nav',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'fallback_cb' => ''                             // Fallback function
    ));
} /* End Footer Menu */


// The Footer Menu
function suzette_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                         // Remove nav container
    	'menu' => __( 'Footer Links', 'jointswp' ),   	// Nav name
    	'menu_class' => 'menu flex',      					// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} /* End Footer Menu */

// The Sub-Footer Menu
function suzette_sub_footer_links() {
    wp_nav_menu(array(
        'container' => 'false',                         // Remove nav container
        'menu' => __( 'Sub Footer Links', 'jointswp' ),     // Nav name
        'menu_class' => 'menu flex',                        // Adding custom nav class
        'theme_location' => 'sub-footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
        'fallback_cb' => ''                             // Fallback function
    ));
} /* End Footer Menu */
