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

//  ==============
//  = Thumbnails =
//  ==============

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 380, 230, true );
//add_image_size( 'slider', 540, 350, true );


//  ================
//  = Load scripts =
//  ================

function smoothie_add_js_scripts() {

	wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/modernizr-2.7.1.min.js', false, '2.7.1', false);
	wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'smoothie_add_js_scripts');


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
		'all_items' => ,// affiché dans le sous menu
		'singular_name' => '',
		'add_new_item' => 'Ajouter un',
		'edit_item' => 'Modifier le',
		'menu_name' => 's'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor','thumbnail'),
		'menu_position' => 5,
		'menu_icon' => 'dashicons-portfolio',
	);

	register_post_type('#1#',$args);

	// taxonomy
	$labels = array('name' => '#2#');
	register_taxonomy( '#2#', '#1#', array( 'hierarchical' => true, 'public' => true, 'labels' => $labels, 'query_var' => true ));

}
add_action( 'init', 'smoothie_create_post_type' );

*/


//  =================================
//  = Admin meta boxes optimization =
//  =================================

function smoothie_hidden_meta_boxes($hidden, $screen) {
	if ( 'post' == $screen->base || 'page' == $screen->base ):
		$hidden = array('slugdiv', 'trackbacksdiv', 'commentstatusdiv', 'postcustom', 'commentsdiv', 'authordiv', 'revisionsdiv');
		// showed : postexcerpt
	endif;
	return $hidden;
}
add_filter('default_hidden_meta_boxes', 'smoothie_hidden_meta_boxes', 10, 2);


//  ================================
//  = Display tiny MCE second line =
//  ================================

function smoothie_enhance_editor($in) {

	$in['wordpress_adv_hidden'] = FALSE;

	return $in;
}
add_filter('tiny_mce_before_init', 'smoothie_enhance_editor');


//  =========================
//  = The Yoast big cleanup =
//  =========================

// remove yoast columns in admin table
function smoothie_clean_posts_column( $columns ) {
    unset($columns['wpseo-title']);
    unset($columns['wpseo-score']);
    unset($columns['wpseo-metadesc']);
    unset($columns['wpseo-focuskw']);
    return $columns;
}
add_filter( 'manage_edit-post_columns', 'smoothie_clean_posts_column', 10, 1 );

// Move Yoast metabox to bottom
function smoothie_yoast_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'smoothie_yoast_bottom');


//  ======================================
//  = Text domain for Multilingual theme =
//  ======================================

// when creating a translatable string use this : _e('Ma Chaine', 'smoothie');

function smoothie_theme_setup(){
    load_theme_textdomain('smoothie', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'smoothie_theme_setup');


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

/* shortcode : mailto:<?php echo do_shotcode('[mail address="me@mail.com"]'); ?> */
function secure_mail( $atts ){
 return antispambot($atts['address']);
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
	return '…';
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

	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
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


//  ================================
//  = Admin Clean and improvements =
//  ================================


// remove welcome panel and metaboxes
remove_action('welcome_panel', 'wp_welcome_panel');

function smoothie_remove_meta_boxes() {
	remove_meta_box('dashboard_primary', 'dashboard', 'normal');
}
add_action( 'admin_menu', 'smoothie_remove_meta_boxes' );

// Add meta box with Smoothie Datas
function smoothie_dashboard_widget_function( $post, $callback_args ) {
	echo "<p>Votre site est géré par l'agence <strong>Smoothie Creative</strong>.</p>";

	echo '<p style="text-align: center"><a href="http://smoothie-creative.com"><img src="'.get_bloginfo('template_url').'/img/smoothie.png" style="width:150px"></a></p>';

	echo "<p><strong>Nous contacter :</strong>";
	echo "<p>Maxime BERNARD-JACQUET<br>";
	echo "06 74 14 03 49<br>";
	echo '<a href="mailto:contact@smoothie-creative.com">contact@smoothie-creative.com</a>';
}

function smoothie_add_dashboard_widget() {
	wp_add_dashboard_widget('smoothie_dashboard_widget', 'Smoothie Creative', 'smoothie_dashboard_widget_function');

 	global $wp_meta_boxes;
 	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
 	$example_widget_backup = array( 'smoothie_dashboard_widget' => $normal_dashboard['smoothie_dashboard_widget'] );
 	unset( $normal_dashboard['smoothie_dashboard_widget'] );
 	$sorted_dashboard = array_merge( $example_widget_backup, $normal_dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup', 'smoothie_add_dashboard_widget', 1 );


function smoothie_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wpseo-menu');
}
add_action( 'wp_before_admin_bar_render', 'smoothie_admin_bar_render' );


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


//  ====================================
//  = Allow other mime types on upload =
//  ====================================

/*
function smoothie_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'smoothie_mime_types' );
*/

//  ========================
//  = Changing footer text =
//  ========================

function smoothie_change_footer() {
	echo "Crée par <a href='http://www.smoothie-creative.com/' target='_blank'>Smoothie Creative</a>, propulsé par <a href='http://wordpress.org' target='_blank'>WordPress</a>";
}
add_filter('admin_footer_text', 'smoothie_change_footer');
