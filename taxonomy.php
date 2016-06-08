<?php

  // search for a archive-[custom-type].php instead of trying to load taxonomy-[taxo].php and if not found, goes to standard archive.php
  // this code check if a archive-[custom-type].php exists where [custom-type] is the type which [taxo] belongs to.

  // get queried object
  $queried_object = $wp_query->get_queried_object();

  // get actual taxonomy from object
  $taxonomy = $queried_object->taxonomy;

  // all taxonomy datas
  $tax_object = get_taxonomy($taxonomy);

  // among the datas, the custom type
  $custom_type = $tax_object->object_type[0];

  // check if archive type template exists, else go to standard archive
  if (locate_template('archive-'.$custom_type.'.php') != '') {
    get_template_part('archive-'.$custom_type);
  }  else {
    get_template_part('archive');
  }