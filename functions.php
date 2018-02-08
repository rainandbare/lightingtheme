<?php

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {

	/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(120, 90, true);
  	add_image_size('square', 150, 150, true);

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location.
	* You can allow clients to create multiple menus by
  * adding additional menus to the array. */
	// register_nav_menus( array(
	// 	'primary' => 'Primary Navigation'
	// ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
endif;

add_action( 'after_setup_theme', 'theme_setup' );


/* Add all our JavaScript files here.
We'll let WordPress add them to our templates automatically instead
of writing our own script tags in the header and footer. */

function suzette_scripts() {
	//Don't use WordPress' local copy of jquery, load our own version from a CDN instead
	wp_deregister_script('jquery');

  wp_enqueue_script(
  	'jquery',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

  //   wp_enqueue_script(
  // 	'jquery-migrate',
  // 	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-migrate-1.2.1.min.js",
  // 	false, //dependencies
  // 	null, //version number
  // 	true //load in footer
  // );

  wp_enqueue_script(
  	'font-awesome',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://use.fontawesome.com/a75cef987b.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

    wp_enqueue_script(
  	'slick',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

  wp_enqueue_script(
    'scripts', //handle
    get_template_directory_uri() . '/js/main.min.js', //source
    array( 'jquery' ), //dependencies
    null, // version number
    true //load in footer
  );

}

add_action( 'wp_enqueue_scripts', 'suzette_scripts' );

/* Custom Title Tags */

function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,700', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

function hackeryou_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'hackeryou' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'hackeryou_wp_title', 10, 2 );

/*
  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function hackeryou_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'hackeryou_page_menu_args' );


/*
 * Sets the post excerpt length to 40 characters.
 */
function hackeryou_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'hackeryou_excerpt_length' );



/*
 * Returns a "..." link for excerpts
 */
function hackeryou_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">...</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and hackeryou_continue_reading_link().
 */
function hackeryou_auto_excerpt_more( $more ) {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'hackeryou_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function hackeryou_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= hackeryou_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'hackeryou_custom_excerpt_more' );


/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within hackeryou_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function hackeryou_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'hackeryou_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function hackeryou_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'hackeryou_remove_recent_comments_style' );


if ( ! function_exists( 'hackeryou_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function hackeryou_posted_on() {
	printf('<span class="%1$s">%2$s</span> ',
		'meta-prep meta-prep-author',
		sprintf( '<span title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></span>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><span class="url fn n" title="%2$s">%3$s</span></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr( 'View all posts by %s'), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'hackeryou_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function hackeryou_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	$tag_list = strip_tags( $tag_list );
	if ( $tag_list ) {
		$posted_in = ' | %1$s | %2$s';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = ' | %1$s';
	} else {
		$posted_in = ' |';
	}
	$categories = get_the_category_list( ', ' );
	$categories = strip_tags( $categories );
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		$categories,
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

if ( ! function_exists( 'suzette_custom_taxonomies' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function suzette_custom_taxonomies($id, $tax) {
	// Retrieves tag list of current post, separated by commas.
	$taxonomies = get_the_terms( $id, $tax, '', ', ');
	if(sizeOf($taxonomies) > 0){
		foreach ($taxonomies as $taxonomy) {
			echo $taxonomy->slug . " ";
		}
	}

}
endif;

/* Get rid of junk! - Gets rid of all the crap in the header that you dont need */

function clean_stuff_up() {
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 3 );
}

add_action('init', 'clean_stuff_up');


/* Here are some utility helper functions for use in your templates! */

/* dump() - makes for easy debugging. <?php dump($post); ?> */
function dump($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/* get_post_parent() - Returns the current posts parent, if current post if top level, returns itself */
function get_post_parent($post) {
	if ($post->post_parent) {
		return $post->post_parent;
	}
	else {
		return $post->ID;
	}
}

// include( get_template_directory() . '/acfExport.php' );

// add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args, $depth ) {
//     //if is not home page add home url to front of hastag
//     if(!is_front_page()){
//     	$hash = $atts['href'];
//     	$pos = strpos($hash, "#");
//     	if ($pos !== false){
//     		$atts['href'] = home_url( '/' ) . $hash;
//     	}
//     }
//     return $atts;
// }, 10, 4 ); // 4 so we get all arguments

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// function add_opengraph_doctype($output) {
//     return $output . '
//     xmlns="https://www.w3.org/1999/xhtml"
//     xmlns:og="https://ogp.me/ns#" 
//     xmlns:fb="http://www.facebook.com/2008/fbml"';
// }
// add_filter('language_attributes', 'add_opengraph_doctype');


add_filter( 'wp_revisions_to_keep', 'divi_limit_revisions', 10, 2 );

function divi_limit_revisions( $num ) { 
 $num = 3;
 return $num;
}

require_once( get_template_directory().'/functions/menus.php');

require_once( get_template_directory().'/widgets/recent-post-widget.php');
add_action( 'widgets_init', create_function( '', 'register_widget( "VISO_Recent_Posts" );' ) );

// // My function to modify the main query object
// function my_modify_main_query( $query ) {
// if ( $query->is_home() && $query->is_main_query() ) { // Run only on the homepage
// // $query->query_vars[‘cat’] = -2; // Exclude my featured category because I display that elsewhere
// 	$query->query_vars['posts_per_page'] = 5; // Show only 5 posts on the homepage only
// }
// }

// // Hook my above function to the pre_get_posts action
// add_action( 'pre_get_posts', 'my_modify_main_query');
add_action( 'pre_get_posts', function ( $query ) {
  if ( $query->is_post_type_archive( 'press-release' ) && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'posts_per_page', 8 );
  }
  if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'posts_per_page', 24 );
  }
  $post_types = array('collections', 'projects', 'inspiration', 'partners');
  if ( $query->is_post_type_archive( $post_types ) && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'posts_per_page', -1 );
    $query->set( 'post_status', 'publish' );
  }
} );


function misha_my_load_more_scripts() {
	global $wp_query; 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP

	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	// it is always better to use WP_Query but not here
	query_posts( $args );
	if( have_posts() ) :
		// run the loop
		while( have_posts() ): the_post();
			// look into your theme code how the posts are inserted
			if( get_post_type() !== 'post'){
				get_template_part( 'templates/basic-archive-post', get_post_format() );	
			} else{
				get_template_part( 'templates/post-on-blog-page', get_post_format() );	
			}
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}

function relationship_options_filter($options, $field, $the_post) {
	$options['post_status'] = 'publish';
	return $options;
}

add_filter('acf/fields/post_object/query', 'relationship_options_filter', 10, 3);

update_option( 'link_manager_enabled', 0 );

//remove Divi Page builder button altogether from edit Post Screen
function remove_divi_page_builder_post(){
	$frontpage_id = get_option( 'page_on_front' );
	$postpage_id = get_option( 'page_for_posts' );
	$id = get_the_ID();
	if($id == $frontpage_id || $id == $postpage_id){
		echo '<style>#et_pb_toggle_builder, #et_pb_layout.postbox, .et_pb_layout, .et_pb_toggle_builder_wrapper{display:none !important;}</style>';
	}
}
add_action('admin_head', 'remove_divi_page_builder_post');

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Design Notes';
    $submenu['edit.php'][5][0] = 'Design Notes';
    $submenu['edit.php'][10][0] = 'Add Design Note';
    $submenu['edit.php'][16][0] = 'Design Notes Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Design Notes';
    $labels->singular_name = 'Design Note';
    $labels->add_new = 'Add Design Note';
    $labels->add_new_item = 'Add Design Note';
    $labels->edit_item = 'Edit Design Note';
    $labels->new_item = 'Design Note';
    $labels->view_item = 'View Design Notes';
    $labels->search_items = 'Search Design Notes';
    $labels->not_found = 'No Design Notes found';
    $labels->not_found_in_trash = 'No Design Notes found in Trash';
    $labels->all_items = 'All Design Notes';
    $labels->menu_name = 'Design Notes';
    $labels->name_admin_bar = 'Design Notes';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

add_filter('wpseo_enable_notification_post_trash', '__return_false');
add_filter('wpseo_enable_notification_post_slug_change', '__return_false');
add_filter('wpseo_enable_notification_term_delete','__return_false');
add_filter('wpseo_enable_notification_term_slug_change','__return_false');

