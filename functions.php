<?php
/**
 * rmhettinga functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rmhettinga
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'rmhettinga_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rmhettinga_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rmhettinga, use a find and replace
		 * to change 'rmhettinga' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rmhettinga', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rmhettinga' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'rmhettinga_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'rmhettinga_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rmhettinga_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rmhettinga_content_width', 640 );
}
add_action( 'after_setup_theme', 'rmhettinga_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rmhettinga_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rmhettinga' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rmhettinga' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rmhettinga_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rmhettinga_scripts() {
	wp_enqueue_style( 'rmhettinga-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rmhettinga-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rmhettinga-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rmhettinga_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }


function custom_post_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
    'name'                => _x( 'Portfolio', 'Post Type General Name' ),
    'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name' ),
    'menu_name'           => __( 'Portfolio' ),
    'parent_item_colon'   => __( 'Parent Portfolio' ),
    'all_items'           => __( 'All Portfolio Items' ),
    'view_item'           => __( 'View Portfolio Item' ),
    'add_new_item'        => __( 'Add New Portfolio Item' ),
    'add_new'             => __( 'Add New' ),
    'edit_item'           => __( 'Edit Portfolio Item' ),
    'update_item'         => __( 'Update Portfolio Item' ),
    'search_items'        => __( 'Search Portfolio Item' ),
    'not_found'           => __( 'Not Found' ),
    'not_found_in_trash'  => __( 'Not found in Trash' ),
	);

	// Set other options for Custom Post Type

	$args = array(
    'label'               => __( 'Portfolio' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', ),
    'taxonomies'          => array( 'media' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-welcome-view-site',
    'can_export'          => true,
    'has_archive'         => true,
		'taxonomies' 	      => array('post_tag'),
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
);

register_post_type( 'Portfolio', $args );


// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Resume', 'Post Type General Name' ),
	'singular_name'       => _x( 'Resume', 'Post Type Singular Name' ),
	'menu_name'           => __( 'Resume' ),
	'parent_item_colon'   => __( 'Parent Resume' ),
	'all_items'           => __( 'All Resume Items' ),
	'view_item'           => __( 'View Resume Item' ),
	'add_new_item'        => __( 'Add New Resume Item' ),
	'add_new'             => __( 'Add New' ),
	'edit_item'           => __( 'Edit Resume Item' ),
	'update_item'         => __( 'Update Resume Item' ),
	'search_items'        => __( 'Search Resume Item' ),
	'not_found'           => __( 'Not Found' ),
	'not_found_in_trash'  => __( 'Not found in Trash' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'Resume' ),
	'labels'              => $labels,
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', ),
	'taxonomies'          => array( 'media' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 4,
	'menu_icon'           => 'dashicons-welcome-view-site',
	'can_export'          => true,
	'has_archive'         => true,
	'taxonomies' 	      => array('post_tag'),
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'page',
);

register_post_type( 'Resume', $args );

}

add_action( 'init', 'custom_post_type', 0 );

// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'custom_taxonomy', 0 );

function custom_taxonomy() {
	$labels = array(
    'name' => _x( 'Media', 'taxonomy general name' ),
    'singular_name' => _x( 'Media', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Media Type' ),
    'all_items' => __( 'All Media Types' ),
    'parent_item' => __( 'Parent Media Types' ),
    'parent_item_colon' => __( 'Parent Media Types:' ),
    'edit_item' => __( 'Edit Media Types' ),
    'update_item' => __( 'Update Media Types' ),
    'add_new_item' => __( 'Add New Media Type' ),
    'new_item_name' => __( 'New Media Type' ),
    'menu_name' => __( 'Media Types' ),
  );

  register_taxonomy('media', array('portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'media' ),
  ));


	$labels = array(
    'name' => _x( 'Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Resume Type' ),
    'all_items' => __( 'All Resume Types' ),
    'parent_item' => __( 'Parent Resume Types' ),
    'parent_item_colon' => __( 'Parent Resume Types:' ),
    'edit_item' => __( 'Edit Resume Types' ),
    'update_item' => __( 'Update Resume Types' ),
    'add_new_item' => __( 'Add New Resume Type' ),
    'new_item_name' => __( 'New Resume Type' ),
    'menu_name' => __( 'Resume Types' ),
  );

  register_taxonomy('type', array('resume'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}
