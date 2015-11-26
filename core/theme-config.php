<?php


//  ========================
//  = Setup theme features =
//  ========================

function dysign_theme_setup() {

  // Text Domain
  load_theme_textdomain('dysign', get_template_directory() . '/languages');


  //  Thumbnails
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size( 380, 230, true );
  //add_image_size( 'slider', 540, 350, true );


  //  Page Title
  add_theme_support( 'title-tag' );


  // Menus
  register_nav_menus( array(
    'main-menu' => 'Menu Principal',
    'footer-menu' => 'Pied de page'
  ) );


  // Editor Tiny MCE custom styles
  add_editor_style( array( 'css/editor-style.css') );


  // Enable HTML5
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );


  // RSS
  add_theme_support( 'automatic-feed-links' );

}
add_action( 'after_setup_theme', 'dysign_theme_setup' );


//  ================
//  = Load scripts =
//  ================

function dysign_add_js_scripts() {
  // goodbye jquery migrate
  wp_deregister_script( 'jquery' ); 
  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4', true);

  wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );
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
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
add_action( 'widgets_init', 'dysign_widgets_init' );
*/

//  ===========
//  = Excerpt =
//  ===========

/*

function dysign_excerpt_length($length) {
  return 20;
}
add_filter('excerpt_length', 'dysign_excerpt_length');


function dysign_excerpt_more($more) {
  return '…';
}
add_filter('excerpt_more', 'dysign_excerpt_more');
*/


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
    $wp_rewrite->author_base = 'redacteur';
}
add_action('init','dysign_change_author_permalinks');


// ===============
// = Enhancement =
// ===============

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

add_filter( 'use_default_gallery_style', '__return_false' );


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


//  ==================================
//  = Remove Dashboard welcome panel =
//  ==================================

remove_action('welcome_panel', 'wp_welcome_panel');

//  ====================
//  = Remove Metaboxes =
//  ====================

function dysign_remove_meta_boxes() {
  remove_meta_box('dashboard_primary', 'dashboard', 'normal');
}
add_action( 'admin_menu', 'dysign_remove_meta_boxes' );


//  =================================
//  = Force second line on Tiny MCE =
//  =================================

function dysign_enhance_editor($in) {

  $in['wordpress_adv_hidden'] = FALSE;

  return $in;
}
add_filter('tiny_mce_before_init', 'dysign_enhance_editor');


//  =================
//  = Remove emojis =
//  =================

function dysign_disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'dysign_disable_wp_emojicons' );

function dysign_disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_filter( 'tiny_mce_plugins', 'dysign_disable_emojicons_tinymce' );


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


//  ===========================
//  = Create dysign Metabox =
//  ===========================

function dysign_dashboard_widget_function( $post, $callback_args ) {
  echo "<p>Votre site est géré par <strong>Maxime BERNARD-JACQUET</strong>.</p>";

  echo '<p style="text-align: center"><a href="http://dysign.fr"><img src="'.get_bloginfo('template_url').'/img/dysign.png" style="width:150px"></a></p>';

  echo "<p><strong>Me contacter :</strong>";
  echo "<p>Maxime BERNARD-JACQUET<br>";
  echo "06 74 14 03 49<br>";
  echo '<a href="mailto:maxime@dysign.fr">maxime@dysign.fr</a>';
}

function dysign_add_dashboard_widget() {
  wp_add_dashboard_widget('dysign_dashboard_widget', 'Dysign', 'dysign_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'dysign_add_dashboard_widget', 1 );


//  ========================
//  = Changing footer text =
//  ========================

function dysign_change_footer() {
  echo "Crée par <a href='http://www.dysign.fr/' target='_blank'>Dysign</a>, propulsé par <a href='http://wordpress.org' target='_blank'>WordPress</a>";
}
add_filter('admin_footer_text', 'dysign_change_footer');

