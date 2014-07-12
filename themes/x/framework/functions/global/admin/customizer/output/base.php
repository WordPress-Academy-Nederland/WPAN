<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT/BASE.PHP
// -----------------------------------------------------------------------------
// Base global CSS output.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Body
//   02. Links
//   03. Headings
//   04. Content
//   05. Brand
//   06. Custom Fonts
//   07. Custom Fonts - Colors
// =============================================================================

?>

/* Body
// ========================================================================== */

body {
  font-size: <?php echo $x_body_font_size . 'px'; ?>;
  font-style: <?php echo ( $x_body_font_is_italic ) ? 'italic' : 'normal'; ?>;
  font-weight: <?php echo $x_body_font_weight; ?>;
  <?php if ( $x_body_font_color_enable == 1 ) : ?>
    color: <?php echo $x_body_font_color; ?>;
  <?php endif; ?>
}



/* Links
// ========================================================================== */

a:focus,
select:focus,
input[type="file"]:focus,
input[type="radio"]:focus,
input[type="checkbox"]:focus {
  outline: thin dotted #333;
  outline: 5px auto <?php echo $x_site_link_color; ?>;
  outline-offset: -1px;
}



/* Headings
// ========================================================================== */

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
  font-style: <?php echo ( $x_headings_font_is_italic ) ? 'italic' : 'normal'; ?>;
  font-weight: <?php echo $x_headings_font_weight; ?>;
  letter-spacing: <?php echo $x_headings_letter_spacing . 'px'; ?>;
  <?php if ( $x_headings_uppercase_enable == 1 ) : ?>
    text-transform: uppercase;
  <?php endif; ?>
}



/* Content
// ========================================================================== */

.x-main.full {
  float: none;
  display: block;
  width: auto;
}

@media (max-width: 979px) {
  .x-main.full,
  .x-main.left,
  .x-main.right,
  .x-sidebar.left,
  .x-sidebar.right {
    float: none;
    display: block;
    width: auto !important;
  }
}

.entry-header,
.entry-content {
  font-size: <?php echo $x_content_font_size . 'px'; ?>;
}



/* Brand
// ========================================================================== */

.x-brand {
  font-style: <?php echo ( $x_logo_font_is_italic ) ? 'italic' : 'normal'; ?>;
  font-weight: <?php echo $x_logo_font_weight; ?>;
  letter-spacing: <?php echo $x_logo_letter_spacing . 'px'; ?>;
  <?php if ( $x_logo_uppercase_enable == 1 ) : ?>
    text-transform: uppercase;
  <?php endif; ?>
}

<?php if ( $x_logo_width != '' ) : ?>

  .x-brand img {
    width: <?php echo $x_logo_width / 2 . 'px'; ?>;
  }

<?php endif; ?>



/* Custom Fonts
// ========================================================================== */

<?php if ( $x_custom_fonts == 1 ) : ?>

  body,
  input,
  button,
  select,
  textarea {
    font-family: "<?php echo $x_body_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
  }

  h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: "<?php echo $x_headings_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
  }

  .x-brand {
    font-family: "<?php echo $x_logo_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
  }

  .x-navbar .x-nav > li > a {
    font-family: "<?php echo $x_navbar_font_family; ?>", "Helvetica Neue", Helvetica, sans-serif;
  }

<?php endif; ?>



/* Custom Fonts - Colors
// ========================================================================== */

/*
// Custom font colors that aren't included with declarations above due to their
// slight variances (i.e. targeting h1 and .h1 instead of just h1, et cetera).
*/

<?php if ( $x_headings_font_color_enable == 1 ) : ?>

  h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .h1 a, .h2 a, .h3 a, .h4 a, .h5 a, .h6 a, blockquote {
    color: <?php echo $x_headings_font_color; ?>;
  }

<?php endif; ?>

<?php if ( $x_logo_font_color_enable == 1 ) : ?>

  .x-brand,
  .x-brand:hover {
    color: <?php echo $x_logo_font_color; ?>;
  }

<?php endif; ?>