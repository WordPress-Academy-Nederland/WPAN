<?php

// =============================================================================
// VIEWS/GLOBAL/_SLIDER-REVOLUTION-ABOVE.PHP
// -----------------------------------------------------------------------------
// Slider Revolution output above all page content.
// =============================================================================

?>

<?php

if ( class_exists( 'RevSlider' ) ) :

  GLOBAL $post;

  $entry_id      = ( is_home() ) ? get_option( 'page_for_posts' ) : $post->ID;
  $slider_active = get_post_meta( $entry_id, '_x_slider_above', true );
  $slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;

  if ( $slider != 'Deactivated' ) :

    $bg_video           = get_post_meta( $entry_id, '_x_slider_above_bg_video', true );
    $bg_video_poster    = get_post_meta( $entry_id, '_x_slider_above_bg_video_poster', true );
    $anchor             = get_post_meta( $entry_id, '_x_slider_above_scroll_bottom_anchor_enable', true );
    $anchor_alignment   = get_post_meta( $entry_id, '_x_slider_above_scroll_bottom_anchor_alignment', true );
    $anchor_color       = get_post_meta( $entry_id, '_x_slider_above_scroll_bottom_anchor_color', true );
    $anchor_color_hover = get_post_meta( $entry_id, '_x_slider_above_scroll_bottom_anchor_color_hover', true );

    ?>

    <div class="x-slider-revolution-container above<?php if ( $bg_video != '' ) { echo ' bg-video'; } ?>">
      <?php putRevSlider( $slider ); ?>
      <?php if ( $anchor == 'on' ) : ?>
        <style type="text/css">
          .x-slider-scroll-bottom-above {
            color: <?php echo $anchor_color; ?>;
            border-color: <?php echo $anchor_color; ?>;
          }
          .x-slider-scroll-bottom-above:hover {
            color: <?php echo $anchor_color_hover; ?>;
            border-color: <?php echo $anchor_color_hover; ?>;
          }
        </style>
        <a href="#" class="x-slider-scroll-bottom x-slider-scroll-bottom-above <?php echo $anchor_alignment; ?>">
          <i class="x-icon-angle-down"></i>
        </a>
      <?php endif; ?>
    </div>      

    <?php if ( $bg_video != '' ) : ?>

    <script>
      jQuery(function(){
        var BV = new jQuery.BigVideo(); BV.init();
        if ( Modernizr.touch ) {
          BV.show('<?php echo $bg_video_poster; ?>');
          jQuery('#big-video-image').css({
            'max-width' : 'none',
            'position'  : 'relative',
            'left'      : '-50%'
          });
        } else {
          BV.show('<?php echo $bg_video; ?>', { ambient : true });
        }
      });
    </script>

    <?php endif; ?>

  <?php endif;

endif;

?>