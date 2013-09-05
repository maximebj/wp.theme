<?php

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


//  ================
//  = Prod options =
//  ================

// update_option('siteurl','http://www.site.fr');
// update_option('home','http://www.site.fr');


//  ==============
//  = Thumbnails =
//  ==============

// responsive : 960 to 1140 : pictures sizes x 1,1875
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 380, 230, true );
add_image_size( 'slider', 540, 350, true );


//  ================
//  = Load scripts =
//  ================

function smoothie_scripts() {

	wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/libs/modernizr-2.6.2.min.js', false, '2.6.2', false);

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', false, '1.9.0', true);

	wp_enqueue_script( 'libs', get_template_directory_uri().'/js/libs.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );
}
if (!is_admin()) add_action('wp_enqueue_scripts', 'smoothie_scripts');


//  =========
//  = Menus =
//  =========

function smoothie_menus() {
	register_nav_menus(
		array(
			'main-menu' => 'Menu Principal',
			'footer-menu' => 'Pied de page'
		)
	);
}
add_action( 'init', 'smoothie_menus' );


//  ============
//  = Sidebars =
//  ============

/*
register_sidebar(array(
	'name'=>'Blog',
	'before_widget'  => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));
*/


//  ================
//  = Custom types =
//  ================

/*
function smoothie_create_post_type() {

	$labels = array(
		'name' => 's',
		'all_items' => // affiché dans le sous menu
		'singular_name' => '',
		'add_new_item' => 'Ajouter un',
		'edit_item' => 'Modifier le',
		'menu_name' => 's'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor','thumbnail')
	);

	register_post_type('####',$args);

	// taxonomy
	$labels = array('name' => '####');
	register_taxonomy( '####', '####', array( 'hierarchical' => true, 'public' => true, 'labels' => $labels, 'query_var' => true ));

}
add_action( 'init', 'smoothie_create_post_type' );

*/


//  ===================================
//  = Flush permalink on theme switch =
//  ===================================

function smoothie_rewrite_flush() {
		flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'smoothie_rewrite_flush' );


//  ==============
//  = Shortcodes =
//  ==============

// shortcode : [mail address="me@mail.com"]
function secure_mail( $atts ){
 return "<a href='mailto:".antispambot($atts['address'])."' title='Nous ecrire'>".antispambot($atts['address'])."</a>";
}
add_shortcode( 'mail', 'secure_mail' );


//  ===========
//  = Excerpt =
//  ===========

/*

function smoothie_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'smoothie_excerpt_length');


function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
*/


//  =================
//  = Editor styles =
//  =================

function smoothie_theme_add_editor_styles() {
    add_editor_style();
}
add_action( 'init', 'smoothie_theme_add_editor_styles' );


//  ===========================
//  = Tiny MCE customization  =
//  ===========================

function smoothie_custom_tinymce($init) {

	$init['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';
	$init['theme_advanced_disable'] = 'strikethrough,underline,forecolor';
	#$init['theme_advanced_styles'] = "Mon style=monstyle"; // custom styles

	return $init;
}

add_filter('tiny_mce_before_init', 'smoothie_custom_tinymce' );


//  =====================
//  = Custom background =
//  =====================

//add_theme_support( 'custom-background');


//  =======
//  = RSS =
//  =======

add_theme_support( 'automatic-feed-links' );


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


//  ====================================
//  = Remove Accents in uploaded files =
//  ====================================

add_filter( 'sanitize_file_name', 'remove_accents' );


//  ======================================
//  = Remove menu entries from Dashboard =
//  ======================================

/*

function smoothie_remove_menu_pages() {
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
add_action( 'admin_menu', 'smoothie_remove_menu_pages' );
*/

//  =================================
//  = Hide Wordpress Update Message =
//  =================================

/*
function smoothie_hide_wp_update_nag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','smoothie_hide_wp_update_nag');
*/


