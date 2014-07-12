<?php

// =============================================================================
// VIEWS/ETHOS/_BREADCRUMBS.PHP
// -----------------------------------------------------------------------------
// Breadcrumb output for Ethos.
// =============================================================================

?>

<?php if ( ! is_front_page() ) : ?>
  <?php if ( get_theme_mod( 'x_breadcrumb_display' ) == 1 ) : ?>

    <div class="x-breadcrumb-wrap">
      <div class="x-container-fluid max width cf">
        <?php x_breadcrumbs(); ?>
      </div>
    </div>

  <?php endif; ?>
<?php endif; ?>