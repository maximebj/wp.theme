<?php


//  ========================
//  = Setup theme features =
//  ========================

function dysign_theme_setup() {

  // Text Domain
  load_theme_textdomain('dysign', get_template_directory() . '/languages');

  //  Thumbnails
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(800, 600, false);
  add_image_size('fullwidth', 1920, 0, false);

  //  Page Title
  add_theme_support( 'title-tag' );

  // Menus
  register_nav_menus( array(
    'main' => 'Menu Principal',
    'footer' => 'Pied de page'
  ));

  // Editor Tiny MCE custom styles
  add_editor_style( array( 'css/editor-style.css') );

  // Enable HTML5
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

  // RSS
  add_theme_support( 'automatic-feed-links' );

}
add_action( 'after_setup_theme', 'dysign_theme_setup' );


//  ================
//  = Load scripts =
//  ================

function dysign_add_js_scripts() {

  wp_deregister_script( 'jquery' );
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1', true);
  wp_register_script('theme-js', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );

  wp_enqueue_script('jquery');
  wp_enqueue_script('theme-js');

}
add_action('wp_enqueue_scripts', 'dysign_add_js_scripts');



//  ===========
//  = Widgets =
//  ===========

/*
function dysign_widgets_init() {
  register_sidebar(array(
    'name'=>'Blog',
    'before_widget'  => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title' => '<p>',
    'after_title' => '</p>'
  ));
add_action( 'widgets_init', 'dysign_widgets_init' );
*/

//  ===========
//  = Excerpt =
//  ===========



function dysign_excerpt_length($length) {
  return 20;
}
add_filter('excerpt_length', 'dysign_excerpt_length');


function dysign_excerpt_more($more) {
  return '…';
}
add_filter('excerpt_more', 'dysign_excerpt_more');
*/


//  =======================
//  = Admin custom styles =
//  =======================

// function dysign_admin_theme_style() {
//   wp_enqueue_style('custom-admin', get_template_directory_uri().'/css/admin.css');
// }
// add_action('admin_enqueue_scripts', 'dysign_admin_theme_style');


//  ===========================
//  = Tiny MCE customization  =
//  ===========================

function dysign_custom_tinymce($init) {

  $init['block_formats'] = 'Paragraphe=p;Titre 2=h2;Titre 3=h3;Titre 4=h4';
  return $init;

}
add_filter('tiny_mce_before_init', 'dysign_custom_tinymce' );


//  ===========================
//  = Change author permalink =
//  ===========================

function dysign_change_author_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'auteur';
}
add_action('init','dysign_change_author_permalinks');


// =====================
// = Site Optimization =
// =====================

function dysign_dequeue_script() {
  //wp_dequeue_script('');
  //wp_dequeue_syle('');
}
add_action( 'wp_print_scripts', 'dysign_dequeue_script', 100 );

// USE ONLY to find script and style names. Deactivate then.
// function dysign_inspect_scripts() {
//    global $wp_scripts;
//    foreach( $wp_scripts->queue as $handle ) :
//       echo $handle . ' | ';
//    endforeach; die();
// }
// add_action( 'wp_print_scripts', 'dysign_inspect_scripts' );

//  ====================================
//  = Remove Accents in uploaded files =
//  ====================================

add_filter( 'sanitize_file_name', 'remove_accents' );


//  ====================
//  = Remove Metaboxes =
//  ====================

function dysign_remove_meta_boxes() {
  remove_meta_box('dashboard_primary', 'dashboard', 'normal');
}
add_action( 'admin_menu', 'dysign_remove_meta_boxes' );


//  ======================================
//  = Remove menu entries from Dashboard =
//  ======================================

/*
function dysign_remove_menu_pages() {
  remove_menu_page('tools.php');
  remove_menu_page('edit-comments.php');

  //remove_submenu_page('themes.php', 'widgets.php');
  remove_submenu_page('themes.php', 'theme-editor.php');

  $current_user = wp_get_current_user();

  if($current_user->user_login != "admin") {
    remove_menu_page('users.php');

    remove_menu_page('wpcf7'); // Contact form 7
    remove_menu_page('gf_edit_forms'); // gravity forms
    remove_menu_page('wpseo_dashboard'); // SEO by Yoast

    remove_menu_page('edit.php?post_type=acf'); // Advanced Custom Fields
  }
}
add_action( 'admin_menu', 'dysign_remove_menu_pages' );
*/

//  =================================
//  = Hide Wordpress Update Message =
//  =================================

/*
function dysign_hide_wp_update_nag() {
  remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','dysign_hide_wp_update_nag');
*/


//  ====================================
//  = Allow other mime types on upload =
//  ====================================

/*
function dysign_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'dysign_mime_types' );
*/


//  ============
//  = Clean UP =
//  ============

// Remove XML RPC
add_filter('xmlrpc_enabled', '__return_false');

// Gallery styles
add_filter( 'use_default_gallery_style', '__return_false' );

// Welcome panel
remove_action('welcome_panel', 'wp_welcome_panel');

// Head useless stuff
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// Remove Emojis
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

function dysign_disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_filter( 'tiny_mce_plugins', 'dysign_disable_emojicons_tinymce' );


//  ===========================
//  = Create dysign Metabox =
//  ===========================

function dysign_dashboard_widget_function( $post, $callback_args ) {
  $html = '
    <p>Votre site est géré par <strong>Maxime BERNARD-JACQUET</strong>.</p>
    <p style="text-align: center"><a href="http://dysign.fr"><img src="'.get_bloginfo('template_url').'/img/dysign.png" style="width:150px"></a></p>
    <p><strong>Me contacter :</strong>
    <p>Maxime BERNARD-JACQUET<br>
    06 74 14 03 49<br>
    <a href="mailto:maxime@dysign.fr">maxime@dysign.fr</a>';

  echo $html;
}

function dysign_add_dashboard_widget() {
  wp_add_dashboard_widget('dysign_dashboard_widget', 'Dysign', 'dysign_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'dysign_add_dashboard_widget', 1 );


//  ========================
//  = Changing footer text =
//  ========================

function dysign_change_footer() {
  $html = 'Crée par <a href="http://www.dysign.fr/" target="_blank">Dysign</a>, propulsé par <a href="http://wordpress.org" target="_blank">WordPress</a>';

  echo $html;
}
add_filter('admin_footer_text', 'dysign_change_footer');
