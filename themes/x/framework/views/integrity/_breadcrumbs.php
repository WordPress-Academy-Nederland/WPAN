<?php

// =============================================================================
// VIEWS/INTEGRITY/_BREADCRUMBS.PHP
// -----------------------------------------------------------------------------
// Breadcrumb output for Integrity.
// =============================================================================

?>

<?php if ( ! is_front_page() ) : ?>
  <?php if ( get_theme_mod( 'x_breadcrumb_display' ) == 1 ) : ?>

    <div class="x-breadcrumb-wrap">
      <div class="x-container-fluid max width cf">

        <?php x_breadcrumbs(); ?>

        <?php if ( is_single() || x_is_portfolio_item() ) : ?>
          <?php x_entry_navigation(); ?>
        <?php endif; ?>

      </div>
    </div>

  <?php endif; ?>
<?php endif; ?>