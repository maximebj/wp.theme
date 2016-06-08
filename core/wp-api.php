<?php 
/*
// Add authorized filters for API

function dysign_json_api_addfilters($filters){
  $metaparts = array('meta_key', 'meta_value', 'meta_compare', 'date_query');
  $filters = array_merge($filters, $metaparts);
  return $filters;
}
add_filter('json_query_vars', 'dysign_json_api_addfilters');


// Add custom fields to json response
function dysign_json_api_addcustomfields($data, $post, $context) {

  $metas = get_post_meta( $post['ID'] );

  $meta_to_keep = array(
    "id_de_la_video" => $metas['id_de_la_video'],
    "mise_en_avant" => $metas['mise_en_avant'],
    "creation_gm" => $metas['creation_gm'],
    "auteurs" => $metas['auteurs'],
  );

  $data['post_meta'] = $meta_to_keep;
  return $data;

}
add_filter( 'json_prepare_post', 'dysign_json_api_addcustomfields', 10, 3 );
*/