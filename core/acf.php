<?php


//  ===================================
//  = ACF Auto save Json group fields =
//  ===================================

function dysign_acf_json_save_point( $path ) {
    
  $path = get_stylesheet_directory() . '/acf-json';
  
  return $path;
    
}

add_filter('acf/settings/save_json', 'dysign_acf_json_save_point');

//  =====================
//  = ACF Options pages =
//  =====================

/*
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'    => 'SFly Options',
    'menu_title'    => 'SFly Options',
    'menu_slug'     => 'sfly-options',
    'capability'    => 'edit_posts',
    'position'      => 3,
    'icon_url'      => 'dashicons-welcome-widgets-menus'
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Header',
    'menu_title'    => 'Header',
    'parent_slug'   => 'sfly-options',
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Blog',
    'menu_title'    => 'Blog',
    'parent_slug'   => 'sfly-options',
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Footer',
    'menu_title'    => 'Footer',
    'parent_slug'   => 'sfly-options',
  ));
}
*/