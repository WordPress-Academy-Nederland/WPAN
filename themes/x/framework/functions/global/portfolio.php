<?php

// =============================================================================
// FUNCTIONS/GLOBAL/PORTFOLIO.PHP
// -----------------------------------------------------------------------------
// Portfolio related functions beyond custom post type setup.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Get the Page Link to First Portfolio Page
//   02. Get the Page Title to First Portfolio Page
//   03. Get Parent Portfolio ID
//   04. Get Parent Portfolio Link
//   05. Get Parent Portfolio Title
//   06. Output Portfolio Filters
//   07. Output Portfolio Item Featured Content
//   08. Output Portfolio Item Project Link
//   09. Output Portfolio Item Tags
//   10. Output Portfolio Item Social
// =============================================================================

// Get the Page Link to First Portfolio Page
// =============================================================================

function x_get_first_portfolio_page_link() {

  $results = get_pages( array(
    'meta_key'    => '_wp_page_template',
    'meta_value'  => 'template-layout-portfolio.php',
    'sort_order'  => 'ASC',
    'sort_column' => 'ID'
  ) );

  return get_page_link( $results[0]->ID );

}



// Get the Page Title to First Portfolio Page
// =============================================================================

function x_get_first_portfolio_page_title() {

  $results = get_pages( array(
    'meta_key'    => '_wp_page_template',
    'meta_value'  => 'template-layout-portfolio.php',
    'sort_order'  => 'ASC',
    'sort_column' => 'ID'
  ) );

  return $results[0]->post_title;

}



// Get Parent Portfolio ID
// =============================================================================

function x_get_parent_portfolio_id() {

  $meta      = get_post_meta( get_the_ID(), '_x_portfolio_parent', true );
  $parent_id = ( $meta ) ? $meta : 'Default';

  return $parent_id;

}



// Get Parent Portfolio Link
// =============================================================================

function x_get_parent_portfolio_link() {

  $parent_id = x_get_parent_portfolio_id();
  $link      = ( $parent_id != 'Default' ) ? get_permalink( $parent_id ) : x_get_first_portfolio_page_link();

  return $link;

}



// Get Parent Portfolio Title
// =============================================================================

function x_get_parent_portfolio_title() {

  $parent_id = x_get_parent_portfolio_id();
  $title     = ( $parent_id != 'Default' ) ? get_the_title( $parent_id ) : x_get_first_portfolio_page_title();

  return $title;

}



// Output Portfolio Filters
// =============================================================================

function x_portfolio_filters() {

  $stack           = x_get_stack();
  $filters         = get_post_meta( get_the_ID(), '_x_portfolio_category_filters', true );
  $disable_filters = get_post_meta( get_the_ID(), '_x_portfolio_disable_filtering', true );
  $one_filter      = count( $filters ) == 1;
  $all_categories  = in_array( 'All Categories', $filters );


  //
  // 1. If one filter is selected and that filter is "All Categories."
  // 2. If one filter is selected and that filter is a category.
  // 3. If more than one category filter is selected.
  //

  if ( $one_filter && $all_categories ) { // 1

    $terms = get_terms( 'portfolio-category' );

  } elseif ( $one_filter && ! $all_categories ) { // 2

    $terms = array();
    foreach ( $filters as $filter ) {
      $children = get_term_children( $filter, 'portfolio-category' );
      $terms    = array_merge( $children, $terms );
    }
    $terms = get_terms( 'portfolio-category', array( 'include' => $terms ) );

  } else { // 3

    $terms = array();
    foreach ( $filters as $filter ) {
      $parent   = array( $filter );
      $children = get_term_children( $filter, 'portfolio-category' );
      $terms    = array_merge( $parent, $terms );
      $terms    = array_merge( $children, $terms );
    }
    $terms = get_terms( 'portfolio-category', array( 'include' => $terms ) );

  }


  //
  // Main filter button content.
  //

  if ( $stack == 'integrity' ) {
    $button_content = '<i class="x-icon-sort"></i> <span>' . get_theme_mod( 'x_integrity_portfolio_archive_sort_button_text' ) . '</span>';
  } elseif ( $stack == 'ethos' ) {
    $button_content = '<i class="x-icon-chevron-down"></i>';
  } else {
    $button_content = '<i class="x-icon-plus"></i>';
  }


  //
  // Filters.
  //

  if ( $disable_filters != 'on' ) {
    if ( $stack != 'ethos' ) {

    ?>

      <ul class="option-set unstyled" data-option-key="filter">
        <li>
          <a href="#" class="x-portfolio-filters"><?php echo $button_content; ?></a>
          <ul class="x-portfolio-filters-menu unstyled">
            <li><a href="#" data-option-value="*" class="x-portfolio-filter selected"><?php _e( 'All', '__x__' ); ?></a></li>
            <?php foreach ( $terms as $term ) { ?>
              <li><a href="#" data-option-value=".x-portfolio-<?php echo md5( $term->slug ); ?>" class="x-portfolio-filter"><?php echo $term->name; ?></a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>

    <?php } elseif ( $stack == 'ethos' ) { ?>

      <ul class="option-set unstyled" data-option-key="filter">
        <li>
          <a href="#" class="x-portfolio-filters cf">
            <span class="x-portfolio-filter-label">Filter by Category</span>
            <?php echo $button_content; ?>
          </a>
          <ul class="x-portfolio-filters-menu unstyled">
            <li><a href="#" data-option-value="*" class="x-portfolio-filter selected"><?php _e( 'All', '__x__' ); ?></a></li>
            <?php foreach ( $terms as $term ) { ?>
              <li><a href="#" data-option-value=".x-portfolio-<?php echo md5( $term->slug ); ?>" class="x-portfolio-filter"><?php echo $term->name; ?></a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>

    <?php

    }
  }

}



// Output Portfolio Item Featured Content
// =============================================================================

function x_portfolio_item_featured_content() {

  $cropped_thumbs = get_theme_mod( 'x_portfolio_enable_cropped_thumbs' );

  if ( $cropped_thumbs == 1 ) :
    x_featured_portfolio( 'cropped' );
  else :
    x_featured_portfolio();
  endif;

}



// Output Portfolio Item Project Link
// =============================================================================

function x_portfolio_item_project_link() {

  $project_link  = get_post_meta( get_the_ID(), '_x_portfolio_project_link', true );
  $launch_title  = get_theme_mod( 'x_portfolio_launch_project_title' );
  $launch_button = get_theme_mod( 'x_portfolio_launch_project_button_text' );

  if ( $project_link ) :

  ?>

  <h2 class="h-extra launch"><?php echo $launch_title; ?></h2>
  <a href="<?php echo $project_link; ?>" title="Launch Project" class="x-btn x-btn-block" target="_blank"><?php echo $launch_button; ?></a>

  <?php

  endif;

}



// Output Portfolio Item Tags
// =============================================================================

function x_portfolio_item_tags() {

  $stack     = x_get_stack();
  $tag_title = get_theme_mod( 'x_portfolio_tag_title' );

  if ( has_term( NULL, 'portfolio-tag', NULL ) ) :

    echo '<h2 class="h-extra skills">' . $tag_title . '</h2>';
    call_user_func( 'x_' . $stack . '_portfolio_tags');

  endif;

}



// Output Portfolio Item Social
// =============================================================================

function x_portfolio_item_social() {

  $share_project_title = get_theme_mod( 'x_portfolio_share_project_title' );
  $enable_facebook     = get_theme_mod( 'x_portfolio_enable_facebook_sharing' );
  $enable_twitter      = get_theme_mod( 'x_portfolio_enable_twitter_sharing' );
  $enable_google_plus  = get_theme_mod( 'x_portfolio_enable_google_plus_sharing' );
  $enable_linkedin     = get_theme_mod( 'x_portfolio_enable_linkedin_sharing' );
  $enable_pinterest    = get_theme_mod( 'x_portfolio_enable_pinterest_sharing' );
  $enable_reddit       = get_theme_mod( 'x_portfolio_enable_reddit_sharing' );
  $enable_email        = get_theme_mod( 'x_portfolio_enable_email_sharing' );

  $share_url     = urlencode( get_permalink() );
  $share_title   = urlencode( get_the_title() );
  $share_source  = urlencode( get_bloginfo( 'name' ) );
  $share_content = urlencode( get_the_excerpt() );
  $share_media   = wp_get_attachment_thumb_url( get_post_thumbnail_id() );

  $facebook    = ( $enable_facebook == 1 )    ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Facebook', '__x__' ) . "\" onclick=\"window.open('http://www.facebook.com/sharer.php?u={$share_url}&amp;t={$share_title}', 'popupFacebook', 'width=650, height=270, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-facebook\"></i></a>" : '';
  $twitter     = ( $enable_twitter == 1 )     ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Twitter', '__x__' ) . "\" onclick=\"window.open('https://twitter.com/intent/tweet?text={$share_title}&amp;url={$share_url}', 'popupTwitter', 'width=500, height=370, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-twitter\"></i></a>" : '';
  $google_plus = ( $enable_google_plus == 1 ) ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Google+', '__x__' ) . "\" onclick=\"window.open('https://plus.google.com/share?url={$share_url}', 'popupGooglePlus', 'width=650, height=226, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-google-plus\"></i></a>" : '';
  $linkedin    = ( $enable_linkedin == 1 )    ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on LinkedIn', '__x__' ) . "\" onclick=\"window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url={$share_url}&amp;title={$share_title}&amp;summary={$share_content}&amp;source={$share_source}', 'popupLinkedIn', 'width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-linkedin\"></i></a>" : '';
  $pinterest   = ( $enable_pinterest == 1 )   ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Pinterest', '__x__' ) . "\" onclick=\"window.open('http://pinterest.com/pin/create/button/?url={$share_url}&amp;media={$share_media}&amp;description={$share_title}', 'popupPinterest', 'width=750, height=265, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-pinterest\"></i></a>" : '';
  $reddit      = ( $enable_reddit == 1 )      ? "<a href=\"#share\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share\" title=\"" . __( 'Share on Reddit', '__x__' ) . "\" onclick=\"window.open('http://www.reddit.com/submit?url={$share_url}', 'popupReddit', 'width=875, height=450, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0'); return false;\"><i class=\"x-social-reddit\"></i></a>" : '';
  $email       = ( $enable_email == 1 )       ? "<a href=\"mailto:?subject=" . get_the_title() . "&amp;body=" . __( 'Hey, thought you might enjoy this! Check it out when you have a chance:', '__x__' ) . " " . get_permalink() . "\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-trigger=\"hover\" class=\"x-share email\" title=\"" . __( 'Share via Email', '__x__' ) . "\"><span><i class=\"x-icon-envelope\"></i></span></a>" : '';

  if ( $enable_facebook == 1 || $enable_twitter == 1 || $enable_google_plus == 1 || $enable_linkedin == 1 || $enable_pinterest == 1 || $enable_reddit == 1 || $enable_email == 1 ) :

    ?>

    <div class="x-entry-share man">
      <div class="x-share-options">
        <p><?php echo $share_project_title; ?></p>
        <?php echo $facebook . $twitter . $google_plus . $linkedin . $pinterest . $reddit . $email; ?>
      </div>
    </div>

    <?php

  endif;

}