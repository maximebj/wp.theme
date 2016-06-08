<?php 

//  ==================
//  = Yoast Clean up =
//  ==================
 
// add_filter( 'wpseo_metabox_prio', 'dysign_yoast_bottom');
// add_filter( 'manage_edit-post_columns', 'dysign_yoast_columns_clean', 10, 1 );
// add_filter( 'manage_edit-page_columns', 'dysign_yoast_columns_clean', 10, 1 );
// add_action( 'wp_before_admin_bar_render', 'dysign_admin_bar_render' );

// 1. Put Yoast meta box at admin page bottom
function dysign_yoast_bottom() {
  return 'low';
}

// 2. Remove yoast extra columns in admin posts/page list
function dysign_yoast_columns_clean( $columns ) {
  unset($columns['wpseo-title']);
  unset($columns['wpseo-score']);
  unset($columns['wpseo-metadesc']);
  unset($columns['wpseo-focuskw']);
  return $columns;
}

// 3. Remove yoast from admin bar
function dysign_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wpseo-menu');
}


//  =========================
//  = Remove Monarch blocks =
//  =========================

function my_remove_meta_boxes() {
  if (is_admin()) :
    
    // post
    remove_meta_box('et_monarch_settings', 'post', 'advanced');
    remove_meta_box('et_monarch_sharing_stats', 'post', 'advanced');
    
    // page
    remove_meta_box('et_monarch_settings', 'page', 'advanced');
    remove_meta_box('et_monarch_sharing_stats', 'page', 'advanced');
  endif;
}
//add_action( 'add_meta_boxes', 'my_remove_meta_boxes' );
