<?php

// =============================================================================
// VIEWS/ETHOS/_CONTENT.PHP
// -----------------------------------------------------------------------------
// Display of the_excerpt() or the_content() for various entries.
// =============================================================================

$is_full_post_content_blog = is_home() && get_theme_mod( 'x_blog_enable_full_post_content' ) == 1;

?>

<?php

if ( is_singular() || $is_full_post_content_blog ) :
  x_get_view( 'global', '_content', 'the-content' );
else :
  x_get_view( 'global', '_content', 'the-excerpt' );
endif;

?>