<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ENQUEUE/STYLES.PHP
// -----------------------------------------------------------------------------
// Enqueue all styles for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register and Enqueue Site Styles
//   02. Register and Enqueue Post Meta Styles
//   03. Register and Enqueue Customizer Styles
//   04. Register and Enqueue Visual Composer Styles
//   05. Deregister WooCommerce Styles
//   06. Deregister Contact Form 7 Styles
// =============================================================================

// Register and Enqueue Site Styles
// =============================================================================

//
// Register and enqueue all styles for the site with the exception of custom
// output generated by the Customizer.
//

if ( ! function_exists( 'x_enqueue_site_styles' ) ) :
  function x_enqueue_site_styles() {

    if ( ! is_admin() ) {

      //
      // Get current stack.
      //

      $stack = x_get_stack();


      //
      // Font data.
      //

      $custom_fonts                   = get_theme_mod( 'x_custom_fonts' );

      $custom_font_subsets            = get_theme_mod( 'x_custom_font_subsets' );
      $subset_cyrillic                = get_theme_mod( 'x_custom_font_subset_cyrillic' );
      $subset_greek                   = get_theme_mod( 'x_custom_font_subset_greek' );
      $subset_vietnamese              = get_theme_mod( 'x_custom_font_subset_vietnamese' );

      $body_font_family               = get_theme_mod( 'x_body_font_family' );
      $body_font_family_query         = str_replace( ' ', '+', $body_font_family );
      $body_font_weight_and_style     = get_theme_mod( 'x_body_font_weight' );
      $body_font_weight               = ( strpos( $body_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $body_font_weight_and_style ) : $body_font_weight_and_style;

      $headings_font_family           = get_theme_mod( 'x_headings_font_family' );
      $headings_font_family_query     = str_replace( ' ', '+', $headings_font_family );
      $headings_font_weight_and_style = get_theme_mod( 'x_headings_font_weight' );
      $headings_font_weight           = ( strpos( $headings_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $headings_font_weight_and_style ) : $headings_font_weight_and_style;

      $logo_font_family               = get_theme_mod( 'x_logo_font_family' );
      $logo_font_family_query         = str_replace( ' ', '+', $logo_font_family );
      $logo_font_weight_and_style     = get_theme_mod( 'x_logo_font_weight' );
      $logo_font_weight               = ( strpos( $logo_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $logo_font_weight_and_style ) : $logo_font_weight_and_style;

      $navbar_font_family             = get_theme_mod( 'x_navbar_font_family' );
      $navbar_font_family_query       = str_replace( ' ', '+', $navbar_font_family );
      $navbar_font_weight_and_style   = get_theme_mod( 'x_navbar_font_weight' );
      $navbar_font_weight             = ( strpos( $navbar_font_weight_and_style, 'italic' ) ) ? str_replace( 'italic', '', $navbar_font_weight_and_style ) : $navbar_font_weight_and_style;

      $protocol                       = is_ssl() ? 'https' : 'http';

      $subsets                        = 'latin,latin-ext';

      if ( $custom_font_subsets == 1 ) {
        if ( $subset_cyrillic == 1   ) { $subsets .= ',cyrillic,cyrillic-ext'; }
        if ( $subset_greek == 1      ) { $subsets .= ',greek,greek-ext'; }
        if ( $subset_vietnamese == 1 ) { $subsets .= ',vietnamese'; }
      }

      $custom_font_args = array(
        'family' => $body_font_family_query . ':' . $body_font_weight . ',' . $body_font_weight . 'italic,700,700italic| ' . $navbar_font_family_query . ':' . $navbar_font_weight_and_style . '|' . $headings_font_family_query . ':' . $headings_font_weight_and_style . '|' . $logo_font_family_query . ':' . $logo_font_weight_and_style,
        'subset' => $subsets,
      );

      $standard_font_args = array(
        'family' => 'Lato:' . $body_font_weight . ',' . $body_font_weight . 'italic,' . $navbar_font_weight_and_style . ',' . $headings_font_weight_and_style . ',' . $logo_font_weight_and_style . ',700,700italic',
        'subset' => $subsets,
      );

      $get_custom_font_family   = add_query_arg( $custom_font_args,   $protocol . '://fonts.googleapis.com/css' );
      $get_standard_font_family = add_query_arg( $standard_font_args, $protocol . '://fonts.googleapis.com/css' );


      //
      // URI variables.
      //

      $get_stylesheet_directory_uri = get_stylesheet_directory_uri();
      $get_template_directory_uri   = get_template_directory_uri();


      //
      // Enqueue styles.
      //
      // 1. Main stylesheet.
      // 2. Stack specific styles.
      // 3. Right to left styles.
      // 4. WooCommerce styles.
      // 5. Gravity Forms styles.
      // 6. Font styles.
      //

      wp_register_style( 'x-style', $get_stylesheet_directory_uri . '/style.css', NULL, NULL, 'all' ); // 1

      if ( is_child_theme() ) {
        wp_register_style( 'x-integrity-light', $get_stylesheet_directory_uri . '/style.css', NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-integrity-dark',  $get_stylesheet_directory_uri . '/style.css', NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-renew',           $get_stylesheet_directory_uri . '/style.css', NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-icon',            $get_stylesheet_directory_uri . '/style.css', NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-ethos',           $get_stylesheet_directory_uri . '/style.css', NULL, NULL, 'all' ); // 2
      } else {
        wp_register_style( 'x-integrity-light', $get_stylesheet_directory_uri . '/framework/css/site/stacks/integrity-light.css', NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-integrity-dark',  $get_stylesheet_directory_uri . '/framework/css/site/stacks/integrity-dark.css',  NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-renew',           $get_stylesheet_directory_uri . '/framework/css/site/stacks/renew.css',           NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-icon',            $get_stylesheet_directory_uri . '/framework/css/site/stacks/icon.css',            NULL, NULL, 'all' ); // 2
        wp_register_style( 'x-ethos',           $get_stylesheet_directory_uri . '/framework/css/site/stacks/ethos.css',           NULL, NULL, 'all' ); // 2
      }

      wp_register_style( 'x-rtl-integrity', $get_template_directory_uri . '/framework/css/site/rtl/integrity.css', NULL, NULL, 'all' ); // 3
      wp_register_style( 'x-rtl-renew',     $get_template_directory_uri . '/framework/css/site/rtl/renew.css',     NULL, NULL, 'all' ); // 3
      wp_register_style( 'x-rtl-icon',      $get_template_directory_uri . '/framework/css/site/rtl/icon.css',      NULL, NULL, 'all' ); // 3
      wp_register_style( 'x-rtl-ethos',     $get_template_directory_uri . '/framework/css/site/rtl/ethos.css',     NULL, NULL, 'all' ); // 3

      wp_register_style( 'x-woocommerce-integrity-light', $get_template_directory_uri . '/framework/css/site/woocommerce/integrity-light.css', NULL, NULL, 'all' ); // 4
      wp_register_style( 'x-woocommerce-integrity-dark',  $get_template_directory_uri . '/framework/css/site/woocommerce/integrity-dark.css',  NULL, NULL, 'all' ); // 4
      wp_register_style( 'x-woocommerce-renew',           $get_template_directory_uri . '/framework/css/site/woocommerce/renew.css',           NULL, NULL, 'all' ); // 4
      wp_register_style( 'x-woocommerce-icon',            $get_template_directory_uri . '/framework/css/site/woocommerce/icon.css',            NULL, NULL, 'all' ); // 4
      wp_register_style( 'x-woocommerce-ethos',           $get_template_directory_uri . '/framework/css/site/woocommerce/ethos.css',           NULL, NULL, 'all' ); // 4

      wp_register_style( 'x-gravity-forms-integrity-light', $get_template_directory_uri . '/framework/css/site/gravity_forms/integrity-light.css', NULL, NULL, 'all' ); // 5
      wp_register_style( 'x-gravity-forms-integrity-dark',  $get_template_directory_uri . '/framework/css/site/gravity_forms/integrity-dark.css',  NULL, NULL, 'all' ); // 5
      wp_register_style( 'x-gravity-forms-renew',           $get_template_directory_uri . '/framework/css/site/gravity_forms/renew.css',           NULL, NULL, 'all' ); // 5
      wp_register_style( 'x-gravity-forms-icon',            $get_template_directory_uri . '/framework/css/site/gravity_forms/icon.css',            NULL, NULL, 'all' ); // 5
      wp_register_style( 'x-gravity-forms-ethos',           $get_template_directory_uri . '/framework/css/site/gravity_forms/ethos.css',           NULL, NULL, 'all' ); // 5

      wp_register_style( 'x-font-custom',   $get_custom_font_family,   NULL, NULL, 'all' ); // 6
      wp_register_style( 'x-font-standard', $get_standard_font_family, NULL, NULL, 'all' ); // 6

      switch ( $stack ) {
        case 'integrity':
          if ( get_theme_mod( 'x_integrity_design' ) == 'dark' ) {
            wp_enqueue_style( 'x-integrity-dark' );
          } else {
            wp_enqueue_style( 'x-integrity-light' );
          }
          break;
        case 'renew':
          wp_enqueue_style( 'x-renew' );
          break;
        case 'icon':
          wp_enqueue_style( 'x-icon' );
          break;
        case 'ethos':
          wp_enqueue_style( 'x-ethos' );
          break;
      }

      if ( is_rtl() ) {
        switch ( $stack ) {
          case 'integrity':
            wp_enqueue_style( 'x-rtl-integrity' );
            break;
          case 'renew':
            wp_enqueue_style( 'x-rtl-renew' );
            break;
          case 'icon':
            wp_enqueue_style( 'x-rtl-icon' );
            break;
          case 'ethos':
            wp_enqueue_style( 'x-rtl-ethos' );
            break;
        }
      }

      if ( class_exists( 'WC_API' ) ) {
        switch ( $stack ) {
          case 'integrity':
            if ( get_theme_mod( 'x_integrity_design' ) == 'dark' ) {
              wp_enqueue_style( 'x-woocommerce-integrity-dark' );
            } else {
              wp_enqueue_style( 'x-woocommerce-integrity-light' );
            }
            break;
          case 'renew':
            wp_enqueue_style( 'x-woocommerce-renew' );
            break;
          case 'icon':
            wp_enqueue_style( 'x-woocommerce-icon' );
            break;
          case 'ethos':
            wp_enqueue_style( 'x-woocommerce-ethos' );
            break;
        }
      }

      if ( class_exists( 'GFForms' ) ) {
        if ( x_has_shortcode( 'gravityform' ) ) {
          switch ( $stack ) {
            case 'integrity':
              if ( get_theme_mod( 'x_integrity_design' ) == 'dark' ) {
                wp_enqueue_style( 'x-gravity-forms-integrity-dark' );
              } else {
                wp_enqueue_style( 'x-gravity-forms-integrity-light' );
              }
              break;
            case 'renew':
              wp_enqueue_style( 'x-gravity-forms-renew' );
              break;
            case 'icon':
              wp_enqueue_style( 'x-gravity-forms-icon' );
              break;
            case 'ethos':
              wp_enqueue_style( 'x-gravity-forms-ethos' );
              break;
          }
        }
      }

      if ( $custom_fonts == 1 ) {
        wp_enqueue_style( 'x-font-custom' );
      } else {
        wp_enqueue_style( 'x-font-standard' );
      }
    }

  }
  add_action( 'wp_enqueue_scripts', 'x_enqueue_site_styles' );
endif;



// Register and Enqueue Post Meta Styles
// =============================================================================

if ( ! function_exists( 'x_enqueue_post_meta_styles' ) ) :
  function x_enqueue_post_meta_styles() {

    wp_register_style( 'x-meta-css', get_template_directory_uri()     . '/framework/css/admin/meta.css',     NULL, NULL, 'all' );
    wp_register_style( 'x-sidebars-css', get_template_directory_uri() . '/framework/css/admin/sidebars.css', NULL, NULL, 'all' );

    wp_enqueue_style( 'x-meta-css' );
    wp_enqueue_style( 'x-sidebars-css' );
    wp_enqueue_style( 'wp-color-picker' );

  }
  add_action( 'admin_enqueue_scripts', 'x_enqueue_post_meta_styles' );
endif;



// Register and Enqueue Customizer Styles
// =============================================================================

if ( ! function_exists( 'x_enqueue_customizer_controls_styles' ) ) :
  function x_enqueue_customizer_controls_styles() {

    wp_register_style( 'x-customizer-controls', get_template_directory_uri() . '/framework/css/admin/customizer-controls.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'x-customizer-controls' );

  }
  add_action( 'customize_controls_print_styles', 'x_enqueue_customizer_controls_styles' );
endif;



// Register and Enqueue Visual Composer Styles
// =============================================================================

if ( class_exists( 'WPBakeryVisualComposer' ) ) :
  if ( ! function_exists( 'x_enqueue_visual_composer_styles' ) ) :
    function x_enqueue_visual_composer_styles() {

      wp_register_style( 'x-visual-composer', get_template_directory_uri() . '/framework/css/admin/visual-composer.css', NULL, NULL, 'all' );
      wp_enqueue_style( 'x-visual-composer' );

    }
    add_action( 'admin_enqueue_scripts', 'x_enqueue_visual_composer_styles' );
  endif;
endif;



// Deregister WooCommerce Styles
// =============================================================================

if ( class_exists( 'WC_API' ) ) :
  if ( ! function_exists( 'x_deregister_woocommerce_styles' ) ) :
    function x_deregister_woocommerce_styles() {

      wp_deregister_style( 'woocommerce-layout' );
      wp_deregister_style( 'woocommerce-general' );
      wp_deregister_style( 'woocommerce-smallscreen' );

    }
    add_action( 'wp_enqueue_scripts', 'x_deregister_woocommerce_styles' );
  endif;
endif;



// Deregister Contact Form 7 Styles
// =============================================================================
 
if ( class_exists( 'WPCF7_ContactForm' ) ) :
  if ( ! function_exists( 'x_deregister_contact_form_7_styles' ) ) :
    function x_deregister_contact_form_7_styles() {

      wp_deregister_style( 'contact-form-7' );

    }
    add_action( 'wp_enqueue_scripts', 'x_deregister_contact_form_7_styles' );
  endif;
endif;