<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="header">
    <div class="wrapper">
      <a href="<?php echo home_url('/'); ?>"></a> <?php _e('Hello there !', 'dysign'); ?>
      <?php wp_nav_menu( array('theme_location' => 'main', 'container' => false, 'menu_class' => 'menu')); ?>
    </div>
  </div>