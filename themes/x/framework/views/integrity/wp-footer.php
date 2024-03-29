<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-FOOTER.PHP
// -----------------------------------------------------------------------------
// Footer output for Integrity.
// =============================================================================

?>

    <?php x_get_view( 'global', '_header', 'widget-areas' ); ?>
    <?php x_get_view( 'global', '_footer', 'scroll-top' ); ?>
    <?php x_get_view( 'global', '_footer', 'widget-areas' ); ?>

    <?php if ( get_theme_mod( 'x_footer_bottom_display' ) == 1 ) : ?>

      <footer class="x-colophon bottom" role="contentinfo">
        <div class="x-container-fluid max width">

          <?php if ( get_theme_mod( 'x_footer_menu_display' ) == 1 ) : ?>
            <?php x_get_view( 'global', '_nav', 'footer' ); ?>
          <?php endif; ?>

          <?php if ( get_theme_mod( 'x_footer_social_display' ) == 1 ) : ?>
            <?php x_social_global( 'colophon' ); ?>
          <?php endif; ?>

          <?php if ( get_theme_mod( 'x_footer_content_display' ) == 1 ) : ?>
            <div class="x-colophon-content">
              <?php echo get_theme_mod( 'x_footer_content' ); ?>
            </div>
          <?php endif; ?>

        </div>
      </footer>

    <?php endif; ?>

  </div>

  <!--
  END #top.site
  -->

<?php x_get_view( 'global', '_footer' ); ?>