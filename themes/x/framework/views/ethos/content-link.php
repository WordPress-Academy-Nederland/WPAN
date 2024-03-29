<?php

// =============================================================================
// VIEWS/ETHOS/CONTENT-LINK.PHP
// -----------------------------------------------------------------------------
// Link post output for Ethos.
// =============================================================================

$is_index_featured_layout = get_post_meta( get_the_ID(), '_x_ethos_index_featured_post_layout', true ) == 'on' && ! is_single();
$link                     = get_post_meta( get_the_ID(), '_x_link_url',  true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( $is_index_featured_layout ) : ?>
    <?php x_ethos_featured_index(); ?>
  <?php else : ?>
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="entry-featured">
        <?php if ( ! is_single() ) : ?>
          <?php x_ethos_featured_index(); ?>
        <?php else : ?>
          <?php x_featured_image(); ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="entry-wrap">
      <?php x_get_view( 'ethos', '_content', 'post-header' ); ?>
      <?php if ( is_single() ) : ?>
        <div class="link">
          <a href="<?php echo $link; ?>" title="<?php echo esc_attr( sprintf( __( 'Shared link from post: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>" target="_blank"><?php echo $link; ?></a>
        </div>
        <?php x_get_view( 'global', '_content', 'the-content' ); ?>
      <?php else : ?>
        <?php x_get_view( 'ethos', '_content' ); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php x_google_authorship_meta(); ?>
</article>