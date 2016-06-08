<?php

//  ========
//  = AJAX =
//  ========


// Put in Front : 

// $('body').on('change', '#s', function() {
//     var keyword = $(this).val();

//     jQuery.post(
//         ajaxurl,
//         {
//             'action': 'search',
//             'keyword': keyword
//         },
//         function(response){
//             $('.somewhere').html(response);
//         }
//     );
// });




// add_action( 'wp_ajax_search', 'dysign_search' );
// add_action( 'wp_ajax_nopriv_search', 'dysign_search' );

// function search() {
//     // récupération du mot tapé dans la recherche
//     $keyword = $_POST['keyword'];

//     $args = array(
//         's' => $keyword
//     );

//     $ajax_query = new WP_Query($args);

//     if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
//         get_template_part( 'article' );
//     endwhile;
//     endif;

//     die();
// }