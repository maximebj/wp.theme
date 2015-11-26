<?php 

  // trick for custom queries
  // default wp query - call this page with :    get_template_part( 'parts/navigation' );
  // wp_query - call this page with :    $custom = true; get_template_part( 'parts/navigation' );
  global $custom, $my_query;

  $max_pages = ($custom) ? $my_query->max_num_pages : 0;

?>
  
  <nav class="navigation">
    <div class="prev">
      <?php previous_posts_link('Articles plus récents', $max_pages); ?> 
    </div>

    <div class="next">
      <?php next_posts_link('Articles plus anciens', $max_pages); ?> 
    </div>
  </nav>
