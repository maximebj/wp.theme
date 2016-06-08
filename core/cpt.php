<?php

//  ================
//  = Custom types =
//  ================

/*
function dysign_create_post_type() {

  $labels = array(
    'name' => 's',
    'all_items' => '',  // affiché dans le sous menu
    'singular_name' => '',
    'add_new_item' => 'Ajouter un',
    'edit_item' => 'Modifier le',
    'menu_name' => 's'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor','thumbnail'),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-portfolio', // https://developer.wordpress.org/resource/dashicons/
  );

  register_post_type('#1#',$args);

  // taxonomy
  $labels = array('name' => '#2#');
  register_taxonomy( '#2#', '#1#', array( 'hierarchical' => true, 'public' => true, 'labels' => $labels, 'query_var' => true ));

}
add_action( 'init', 'dysign_create_post_type' );

*/