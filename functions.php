<?php

// Thumbnails, Scripts, admin cleanup, site optimization...
include('core/theme-config.php');

// CPT
include('core/cpt.php');

// ACF Options pages
include('core/acf.php');

// Filters, Templates helpers...
include('core/theme-features.php');

// Ajax
include('core/ajax.php');

// Plugins
include('core/plugins.php');

// WP API mods
//include('core/wp-api.php');


//  ====================
//  = Maintenance mode =
//  ====================

/*
function smoothie_maintenance_mode() {
  if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
    wp_die('Site en maintenance, merci de revenir dans un moment.');
  }
}
add_action('get_header', 'smoothie_maintenance_mode');
*/