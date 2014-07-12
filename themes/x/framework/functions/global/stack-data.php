<?php

// =============================================================================
// FUNCTIONS/GLOBAL/STACK-DATA.PHP
// -----------------------------------------------------------------------------
// Get stack information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get View
//   02. Get Stack
//   03. Get Site Layout
//   04. Get Content Layout
// =============================================================================

// Get View
// =============================================================================

if ( ! function_exists( 'x_get_view' ) ) :
  function x_get_view( $stack, $base, $extension = '' ) {

    get_template_part( 'framework/views/' . $stack . '/' . $base, $extension );

  }
endif;



// Get Stack
// =============================================================================

if ( ! function_exists( 'x_get_stack' ) ) :
  function x_get_stack() {

    $mod   = get_theme_mod( 'x_stack' );
    $stack = ( $mod == '' ) ? 'integrity' : $mod;

    return $stack;

  }
  add_action( 'customize_save', 'x_get_stack' );
endif;



// Get Site Layout
// =============================================================================

if ( ! function_exists( 'x_get_site_layout' ) ) :
  function x_get_site_layout() {

    $stack  = x_get_stack();
    $mod    = get_theme_mod( 'x_' . $stack . '_layout_site' );
    $layout = ( $mod == '' ) ? 'full-width' : $mod;

    return $layout;

  }
  add_action( 'customize_save', 'x_get_site_layout' );
endif;



// Get Content Layout
// =============================================================================

//
// First checks if the global content layout is "full-width." If the global
// content layout is not "full-width," (i.e. displays a sidebar) then it runs
// through all possible pages to determine the correct layout for that template.
//

if ( ! function_exists( 'x_get_content_layout' ) ) :
  function x_get_content_layout() {

    $stack          = x_get_stack();
    $mod            = get_theme_mod( 'x_' . $stack . '_layout_content' );
    $content_layout = ( $mod == '' ) ? 'content-sidebar' : $mod;

    if ( $content_layout != 'full-width' ) {
      if ( is_home() ) {
        $mod    = get_theme_mod( 'x_blog_layout' );
        $layout = ( $mod == 'sidebar' ) ? $content_layout : $mod;
      } elseif ( is_singular( 'post' ) ) {
        $meta   = get_post_meta( get_the_ID(), '_x_post_layout', true );
        $layout = ( $meta == 'on' ) ? 'full-width' : $content_layout;
      } elseif ( x_is_portfolio_item() ) {
        $layout = 'full-width';
      } elseif ( x_is_product() ) {
        $layout = 'full-width';
      } elseif ( x_is_portfolio() ) {
        $meta   = get_post_meta( get_the_ID(), '_x_portfolio_layout', true );
        $layout = ( $meta == 'sidebar' ) ? $content_layout : $meta;
      } elseif ( is_page_template( 'template-layout-content-sidebar.php' ) ) {
        $layout = 'content-sidebar';
      } elseif ( is_page_template( 'template-layout-sidebar-content.php' ) ) {
        $layout = 'sidebar-content';
      } elseif ( is_page_template( 'template-layout-full-width.php' ) ) {
        $layout = 'full-width';
      } elseif ( is_archive() ) {
        if ( x_is_shop() ) {
          $mod    = get_theme_mod( 'x_woocommerce_shop_layout_content' );
          $layout = ( $mod == 'sidebar' ) ? $content_layout : $mod;
        } else {
          $mod    = get_theme_mod( 'x_archive_layout' );
          $layout = ( $mod == 'sidebar' ) ? $content_layout : $mod;
        }
      } elseif ( x_is_product() ) {
        $layout = 'full-width';
      } elseif ( is_404() ) {
        $layout = 'full-width';
      } else {
        $layout = $content_layout;
      }
    } else {
      $layout = $content_layout;
    }

    return $layout;

  }
  add_action( 'customize_save', 'x_get_content_layout' );
endif;