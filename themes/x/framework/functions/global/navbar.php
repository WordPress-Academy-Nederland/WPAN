<?php

// =============================================================================
// FUNCTIONS/GLOBAL/NAVBAR.PHP
// -----------------------------------------------------------------------------
// Handles all custom functionality for the navbar.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get One Page Navigation Menu
//   02. Is One Page Navigation
//   03. Get Navbar Positioning
//   04. Get Logo and Navigation Layout
//   05. Navbar Search
// =============================================================================

// Get One Page Navigation Menu
// =============================================================================

if ( ! function_exists( 'x_get_one_page_navigation_menu' ) ) :
  function x_get_one_page_navigation_menu() {

    $meta = get_post_meta( get_the_ID(), '_x_page_one_page_navigation', true );
    $menu = ( $meta == '' ) ? 'Deactivated' : $meta;

    return $menu;

  }
endif;



// Is One Page Navigation
// =============================================================================

if ( ! function_exists( 'x_is_one_page_navigation' ) ) :
  function x_is_one_page_navigation() {

    $one_page_navigation = x_get_one_page_navigation_menu();

    if ( $one_page_navigation == 'Deactivated' ) {
      $output = false;
    } else {
      $output = true;
    }

    return $output;

  }
endif;



// Get Navbar Positioning
// =============================================================================

if ( ! function_exists( 'x_get_navbar_positioning' ) ) :
  function x_get_navbar_positioning() {

    $mod         = get_theme_mod( 'x_navbar_positioning' );
    $positioning = ( $mod == '' ) ? 'static-top' : $mod;

    if ( x_is_one_page_navigation() ) {
      $output = 'fixed-top';
    } else {
      $output = $positioning;
    }

    return $output;

  }
  add_action( 'customize_save', 'x_get_navbar_positioning' );
endif;



// Get Logo and Navigation Layout
// =============================================================================

if ( ! function_exists( 'x_get_logo_navigation_layout' ) ) :
  function x_get_logo_navigation_layout() {

    $mod    = get_theme_mod( 'x_logo_navigation_layout' );
    $output = ( $mod == '' ) ? 'inline' : $mod;

    return $output;

  }
endif;



// Navbar Search
// =============================================================================

// if ( ! function_exists( 'x_add_navbar_search' ) ) :
//   function x_add_navbar_search ( $items, $args ) {

//     if ( $args->theme_location == 'primary' ) {
//       // $items .= '<li><a href="#"><i class="x-icon x-icon-search"></i></a></li>';
//       // $items .= '<li><form action="' . site_url() . '" id="searchform" method="get"><input type="text" name="s" id="s" placeholder="Search"></form></li>';
//     }

//     return $items;

//   }
//   add_filter( 'wp_nav_menu_items', 'x_add_navbar_search', 10, 2 );
// endif;