<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php wp_title(''); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css">
    <?php wp_head(); ?>
</head>

<body>
    <div class="header">
        <div class="wrapper">
            <a href="<?php echo home_url('/'); ?>"></a> <?php _e('Hello there !', 'smoothie'); ?>
            <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'menu',  )); ?>
        </div>
    </div>

    <div class="wrapper">