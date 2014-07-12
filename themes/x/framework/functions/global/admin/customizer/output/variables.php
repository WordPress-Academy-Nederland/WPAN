<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT/VARIABLES.PHP
// -----------------------------------------------------------------------------
// Variables to be used across all Stacks for global CSS output.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. WordPress Setup
//   02. Typography
//   03. Header
//   04. Buttons
//   05. WooCommerce
// =============================================================================

// WordPress Setup
// =============================================================================

$get_template_directory_uri            = get_template_directory_uri();
$x_stack                               = x_get_stack();
$is_ltr                                = ! is_rtl();
$woocommerce_is_active                 = class_exists( 'WC_API' );
$gravity_forms_is_active               = class_exists( 'GFForms' );



// Typography
// =============================================================================

//
// Enable custom fonts.
//

$x_custom_fonts                        = get_theme_mod( 'x_custom_fonts' );
$x_logo_width                          = get_theme_mod( 'x_logo_width' );
$x_logo_font_family                    = get_theme_mod( 'x_logo_font_family' );
$x_logo_font_size                      = ( get_theme_mod( 'x_logo_font_size' )          == '' ) ? '54'      : get_theme_mod( 'x_logo_font_size' );
$x_logo_font_weight_and_style          = ( get_theme_mod( 'x_logo_font_weight' )        == '' ) ? '400'     : get_theme_mod( 'x_logo_font_weight' );
$x_logo_font_color_enable              = get_theme_mod( 'x_logo_font_color_enable' );
$x_logo_font_color                     = get_theme_mod( 'x_logo_font_color' );
$x_logo_letter_spacing                 = ( get_theme_mod( 'x_logo_letter_spacing' )     == '' ) ? '-3'      : get_theme_mod( 'x_logo_letter_spacing' );
$x_logo_uppercase_enable               = get_theme_mod( 'x_logo_uppercase_enable' );
$x_navbar_font_family                  = get_theme_mod( 'x_navbar_font_family' );
$x_navbar_font_size                    = ( get_theme_mod( 'x_navbar_font_size' )        == '' ) ? '12'      : get_theme_mod( 'x_navbar_font_size' );
$x_navbar_font_weight_and_style        = ( get_theme_mod( 'x_navbar_font_weight' )      == '' ) ? '400'     : get_theme_mod( 'x_navbar_font_weight' );
$x_navbar_link_color                   = ( get_theme_mod( 'x_navbar_link_color' )       == '' ) ? '#b7b7b7' : get_theme_mod( 'x_navbar_link_color' );
$x_navbar_link_color_hover             = ( get_theme_mod( 'x_navbar_link_color_hover' ) == '' ) ? '#272727' : get_theme_mod( 'x_navbar_link_color_hover' );
$x_headings_font_family                = get_theme_mod( 'x_headings_font_family' );
$x_headings_font_weight_and_style      = ( get_theme_mod( 'x_headings_font_weight' )    == '' ) ? '400'     : get_theme_mod( 'x_headings_font_weight' );
$x_headings_font_color_enable          = get_theme_mod( 'x_headings_font_color_enable' );
$x_headings_font_color                 = get_theme_mod( 'x_headings_font_color' );
$x_headings_letter_spacing             = ( get_theme_mod( 'x_headings_letter_spacing' ) == '' ) ? '-1'      : get_theme_mod( 'x_headings_letter_spacing' );
$x_headings_uppercase_enable           = get_theme_mod( 'x_headings_uppercase_enable' );
$x_headings_widget_icons_enable        = get_theme_mod( 'x_headings_widget_icons_enable' );
$x_body_font_family                    = get_theme_mod( 'x_body_font_family' );
$x_body_font_size                      = ( get_theme_mod( 'x_body_font_size' )          == '' ) ? '14'      : get_theme_mod( 'x_body_font_size' );
$x_body_font_weight_and_style          = ( get_theme_mod( 'x_body_font_weight' )        == '' ) ? '400'     : get_theme_mod( 'x_body_font_weight' );
$x_body_font_color_enable              = get_theme_mod( 'x_body_font_color_enable' );
$x_body_font_color                     = get_theme_mod( 'x_body_font_color' );
$x_content_font_size                   = ( get_theme_mod( 'x_content_font_size' )       == '' ) ? '14'      : get_theme_mod( 'x_content_font_size' );
$x_site_link_color                     = ( get_theme_mod( 'x_site_link_color' )         == '' ) ? '#ff2a13' : get_theme_mod( 'x_site_link_color' );
$x_site_link_color_hover               = ( get_theme_mod( 'x_site_link_color_hover' )   == '' ) ? '#d80f0f' : get_theme_mod( 'x_site_link_color_hover' );


//
// Remove 'italic' from setting output if it exsists to provide us with just
// the weight to work with.
//

$x_body_font_is_italic                 = strpos( $x_body_font_weight_and_style, 'italic' );
$x_logo_font_is_italic                 = strpos( $x_logo_font_weight_and_style, 'italic' );
$x_navbar_font_is_italic               = strpos( $x_navbar_font_weight_and_style, 'italic' );
$x_headings_font_is_italic             = strpos( $x_headings_font_weight_and_style, 'italic' );

$x_body_font_weight                    = ( $x_body_font_is_italic     ) ? str_replace( 'italic', '', $x_body_font_weight_and_style )     : $x_body_font_weight_and_style;
$x_logo_font_weight                    = ( $x_logo_font_is_italic     ) ? str_replace( 'italic', '', $x_logo_font_weight_and_style )     : $x_logo_font_weight_and_style;
$x_navbar_font_weight                  = ( $x_navbar_font_is_italic   ) ? str_replace( 'italic', '', $x_navbar_font_weight_and_style )   : $x_navbar_font_weight_and_style ;
$x_headings_font_weight                = ( $x_headings_font_is_italic ) ? str_replace( 'italic', '', $x_headings_font_weight_and_style ) : $x_headings_font_weight_and_style;



// Header
// =============================================================================

$x_navbar_positioning                  = x_get_navbar_positioning();
$x_logo_adjust_navbar_top              = get_theme_mod( 'x_logo_adjust_navbar_top' );
$x_logo_adjust_navbar_side             = get_theme_mod( 'x_logo_adjust_navbar_side' );
$x_logo_navigation_layout              = ( get_theme_mod( 'x_logo_navigation_layout' )        == '' ) ? 'inline'     : get_theme_mod( 'x_logo_navigation_layout' );
$x_logobar_adjust_spacing_top          = ( get_theme_mod( 'x_logobar_adjust_spacing_top' )    == '' ) ? '15'         : get_theme_mod( 'x_logobar_adjust_spacing_top' );
$x_logobar_adjust_spacing_bottom       = ( get_theme_mod( 'x_logobar_adjust_spacing_bottom' ) == '' ) ? '15'         : get_theme_mod( 'x_logobar_adjust_spacing_bottom' );
$x_navbar_width                        = get_theme_mod( 'x_navbar_width' );
$x_navbar_height                       = ( get_theme_mod( 'x_navbar_height' )                 == '' ) ? '90'         : get_theme_mod( 'x_navbar_height' );
$x_navbar_adjust_links_top             = ( get_theme_mod( 'x_navbar_adjust_links_top' )       == '' ) ? '34'         : get_theme_mod( 'x_navbar_adjust_links_top' );
$x_navbar_adjust_links_side            = get_theme_mod( 'x_navbar_adjust_links_side' );
$x_navbar_adjust_button                = ( get_theme_mod( 'x_navbar_adjust_button' )          == '' ) ? '20'         : get_theme_mod( 'x_navbar_adjust_button' );
$x_navbar_adjust_button_size           = ( get_theme_mod( 'x_navbar_adjust_button_size' )     == '' ) ? '24'         : get_theme_mod( 'x_navbar_adjust_button_size' );
$x_header_widget_areas                 = x_header_widget_areas_count();
$x_widgetbar_button_background         = get_theme_mod( 'x_widgetbar_button_background' );
$x_widgetbar_button_background_hover   = get_theme_mod( 'x_widgetbar_button_background_hover' );



// Buttons
// =============================================================================

$x_button_style                        = ( get_theme_mod( 'x_button_style' )                  == '' ) ? 'real'    : get_theme_mod( 'x_button_style' );
$x_button_shape                        = ( get_theme_mod( 'x_button_shape' )                  == '' ) ? 'rounded' : get_theme_mod( 'x_button_shape' );
$x_button_size                         = ( get_theme_mod( 'x_button_size' )                   == '' ) ? 'regular' : get_theme_mod( 'x_button_size' );
$x_button_color                        = ( get_theme_mod( 'x_button_color' )                  == '' ) ? '#ffffff' : get_theme_mod( 'x_button_color' );
$x_button_background_color             = ( get_theme_mod( 'x_button_background_color' )       == '' ) ? '#ff2a13' : get_theme_mod( 'x_button_background_color' );
$x_button_border_color                 = ( get_theme_mod( 'x_button_border_color' )           == '' ) ? '#ac1100' : get_theme_mod( 'x_button_border_color' );
$x_button_bottom_color                 = ( get_theme_mod( 'x_button_bottom_color' )           == '' ) ? '#a71000' : get_theme_mod( 'x_button_bottom_color' );
$x_button_color_hover                  = ( get_theme_mod( 'x_button_color_hover' )            == '' ) ? '#ffffff' : get_theme_mod( 'x_button_color_hover' );
$x_button_background_color_hover       = ( get_theme_mod( 'x_button_background_color_hover' ) == '' ) ? '#ef2201' : get_theme_mod( 'x_button_background_color_hover' );
$x_button_border_color_hover           = ( get_theme_mod( 'x_button_border_color_hover' )     == '' ) ? '#600900' : get_theme_mod( 'x_button_border_color_hover' );
$x_button_bottom_color_hover           = ( get_theme_mod( 'x_button_bottom_color_hover' )     == '' ) ? '#a71000' : get_theme_mod( 'x_button_bottom_color_hover' );



// WooCommerce
// =============================================================================

$x_woocommerce_widgets_image_alignment = get_theme_mod( 'x_woocommerce_widgets_image_alignment' );

?>