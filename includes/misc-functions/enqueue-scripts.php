<?php

/**
 * Enqueue Scripts for the MP Menu
 */
 function mp_menu_enqueue_scripts(){
	 
	 //Animate CSS
	 wp_enqueue_style( 'mp_menu_animate_css', plugins_url( '/css/animate.css', dirname( __FILE__ ) ) );
	 
	 //MP Menu CSS
	 $menu_css = get_theme_mod( 'mp_menu_open_from' ) ;
	 $menu_css = !empty( $menu_css ) ? $menu_css : 'mp-menu-left.css';
	 wp_enqueue_style( 'mp_menu_css', plugins_url( '/css/' . $menu_css, dirname( __FILE__ ) ) );
	 
	  //MP Menu Skin
	 $menu_skin = get_theme_mod( 'mp_menu_skin' ) ;
	 $menu_skin = !empty( $menu_skin ) ? $menu_skin : 'mp-menu-default-skin.css';
	 wp_enqueue_style( 'mp_menu_skin', plugins_url( '/css/skins/' . $menu_skin, dirname( __FILE__ ) ) );
	 
	  //MP Menu Font
	 wp_enqueue_style( 'mp_menu_icon_font_css', plugins_url( '/css/mp-menu-icon-font.css', dirname( __FILE__ ) ) );
	 
	  //Enable Media Queries for JS
	 wp_enqueue_script( 'mp_menu_enquire', plugins_url( '/js/enquire.min.js', dirname( __FILE__ ) ) );
	 
	  //MP Menu JS
	 wp_enqueue_script( 'mp_menu_icon_font_css', plugins_url( '/js/mp-menu.js', dirname( __FILE__ ) ), array( 'jquery', 'mp_menu_enquire' ) );
	 
 }
 add_action( 'wp_enqueue_scripts', 'mp_menu_enqueue_scripts' );
	