<?php

// =============================================================================
// VIEWS/ETHOS/_LANDMARK-HEADER.PHP
// -----------------------------------------------------------------------------
// Handles content output of large headers for key pages such as the blog or
// search results.
// =============================================================================

$disable_page_title = get_post_meta( get_the_ID(), '_x_entry_disable_page_title', true );

?>

<?php if ( ! x_is_blank( 1 ) && ! x_is_blank( 2 ) && ! x_is_blank( 4 ) && ! x_is_blank( 5 ) ) : ?>
  <?php if ( is_page() && $disable_page_title == 'on' ) : ?>
  <?php else : ?>

    <?php if ( x_is_shop() || x_is_product() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_ethos_shop_title' ); ?></span></h1>
      </header>

    <?php elseif ( is_page() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark entry-title"><span><?php the_title(); ?></span></h1>
      </header>

    <?php elseif ( x_is_portfolio_item() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php the_title(); ?></span></h1>
      </header>

    <?php elseif ( is_search() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php _e( 'Search Results', '__x__' ); ?></span></h1>
      </header>

    <?php elseif ( is_category() || x_is_portfolio_category() || x_is_product_category() ) : ?>

      <?php

      $queried_object = get_queried_object();
      $term_meta      = get_option( 'taxonomy_' . $queried_object->term_id );
      $title          = ( $term_meta['archive-title'] != '' ) ? $term_meta['archive-title'] : __( 'Category Archive', '__x__' );

      ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php echo $title; ?></span></h1>
      </header>

    <?php elseif ( is_tag() || x_is_portfolio_tag() || x_is_product_tag() ) : ?>

      <?php

      $queried_object = get_queried_object();
      $term_meta      = get_option( 'taxonomy_' . $queried_object->term_id );
      $title          = ( $term_meta['archive-title'] != '' ) ? $term_meta['archive-title'] : __( 'Tag Archive', '__x__' );

      ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php echo $title ?></span></h1>
      </header>

    <?php elseif ( is_404() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php _e( 'Oops!', '__x__' ); ?></span></h1>
      </header>

    <?php elseif ( is_year() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php _e( 'Post Archive by Year', '__x__' ); ?></span></h1>
      </header>

    <?php elseif ( is_month() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php _e( 'Post Archive by Month', '__x__' ); ?></span></h1>
      </header>

    <?php elseif ( is_day() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php _e( 'Post Archive by Day', '__x__' ); ?></span></h1>
      </header>

    <?php elseif ( x_is_portfolio() ) : ?>

      <header class="x-header-landmark x-container-fluid max width">
        <h1 class="h-landmark"><span><?php echo get_theme_mod( 'x_portfolio_title' ); ?></span></h1>
      </header>

    <?php endif; ?>

  <?php endif; ?>
<?php endif; ?>