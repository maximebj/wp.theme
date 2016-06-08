<?php


//  ================
//  = Change Query =
//  ================

// Change query if filter set
function dysign_pre_get_posts($wp_query) {

  // if($wp_query->is_main_query() and !is_admin() and (is_home() or is_archive())):
    
  //   // add params
  //   $wp_query->set('meta_key', 'score');
  //   $wp_query->set('orderby', 'meta_value_num');

  //   // add meta_query
  //   $meta_query = array(
  //     'relation' => 'OR',
  //     array(
  //       'key' => 'video',
  //       'value' => '0',
  //     ),
  //     array(
  //       'key' => 'video',
  //       'compare' => 'NOT EXISTS'
  //     )
  //   );
  //   $wp_query->set('meta_query', $meta_query);
  // endif;

  // Save last query for ajax autoload
  // if ($wp_query->is_main_query() and !is_admin() and !defined('DOING_AJAX')):
  //   global $query_vars_ajax;
  //   $query_vars_ajax = $wp_query->query_vars;
  // endif;

}
//add_action('pre_get_posts', 'dysign_pre_get_posts');


// Add rewrite rules for filters
function dysign_url_rewrite() {
  //global $wp_rewrite;

  // # filtres
  // add_rewrite_tag('%filtre%','([^&]+)');

  // # filter home
  // $wp_rewrite->add_rule('filtre-([^/]+)$','index.php?filtre=$matches[1]','top');

  // # filter cats
  // $wp_rewrite->add_rule('categorie/(.+?)/filtre-([^/]+)$','index.php?category_name=$matches[1]&filtre=$matches[2]','top');

  // # filter author
  // $wp_rewrite->add_rule('author/(.+?)/filtre-([^/]+)$','index.php?author_name=$matches[1]&filtre=$matches[2]','top');


  // //$wp_rewrite->flush_rules();
}
//add_action('init', 'dysign_url_rewrite');




//  ==================
//  = Save post hook =
//  ==================

function dysign_save_post($post_id, $post, $update) {

  // If this isn't a post, don't update it.
  if ( $post->post_type != 'post'):
      return;
  endif;

  //if ($field = get_field_object('id_de_la_video', $post_id) and $field['value']):
  //endif;
}
//add_action( 'save_post', 'dysign_save_post', 10, 3 );


