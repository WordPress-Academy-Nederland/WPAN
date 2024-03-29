<?php

// =============================================================================
// VIEWS/GLOBAL/_NAVBAR.PHP
// -----------------------------------------------------------------------------
// Outputs the navbar.
// =============================================================================

$navbar_position = get_theme_mod( 'x_navbar_positioning' );
$logo_nav_layout = get_theme_mod( 'x_logo_navigation_layout' );
$is_one_page_nav = x_is_one_page_navigation();

?>

<?php if ( ( $navbar_position == 'static-top' || $navbar_position == 'fixed-top' || $is_one_page_nav ) && $logo_nav_layout == 'stacked' ) : ?>

  <div class="x-logobar">
    <div class="x-logobar-inner x-container-fluid max width">
      <?php x_get_view( 'global', '_brand' ); ?>
    </div> <!-- end .x-logobar-inner -->
  </div> <!-- end .x-logobar -->

  <div class="x-navbar-wrap">
    <div class="<?php x_navbar_class(); ?>">
      <div class="x-navbar-inner x-container-fluid max width">
        <?php x_get_view( 'global', '_nav', 'primary' ); ?>
      </div> <!-- end .x-navbar-inner -->
    </div> <!-- end .x-navbar -->
  </div> <!-- end .x-navbar-wrap -->

<?php else : ?>

  <div class="x-navbar-wrap">
    <div class="<?php x_navbar_class(); ?>">
      <div class="x-navbar-inner x-container-fluid max width">
        <?php x_get_view( 'global', '_brand' ); ?>
        <?php x_get_view( 'global', '_nav', 'primary' ); ?>
      </div> <!-- end .x-navbar-inner -->
    </div> <!-- end .x-navbar -->
  </div> <!-- end .x-navbar-wrap -->

<?php endif; ?>