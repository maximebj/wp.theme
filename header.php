<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="header">
    <div class="container">
      <a href="<?php echo home_url( '/' ); ?>"><?php _e('Hello there !', 'dysign'); ?></a> 
      <?php wp_nav_menu( array( 'theme_location' => 'main', 'container' => false, 'menu_class' => 'menu') ); ?>
    </div>
  </div>
