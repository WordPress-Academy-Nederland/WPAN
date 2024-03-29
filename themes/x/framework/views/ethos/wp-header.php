<?php

// =============================================================================
// VIEWS/ETHOS/WP-HEADER.PHP
// -----------------------------------------------------------------------------
// Header output for Ethos.
// =============================================================================

?>

<?php x_get_view( 'global', '_header' ); ?>

  <!--
  BEGIN #top.site
  -->

  <div id="top" class="site">

    <?php x_get_view( 'global', '_slider-revolution-above' ); ?>

    <header class="<?php x_masthead_class(); ?>" role="banner">
      <?php x_get_view( 'ethos', '_post', 'carousel' ); ?>
      <?php x_get_view( 'global', '_topbar' ); ?>
      <?php x_get_view( 'global', '_navbar' ); ?>
      <?php x_get_view( 'ethos', '_breadcrumbs' ); ?>
    </header>

    <?php x_get_view( 'global', '_slider-revolution-below' ); ?>
    <?php x_get_view( 'ethos', '_landmark-header' ); ?>