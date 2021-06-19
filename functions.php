<?php
/**
 * plutonWp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package plutonWp
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'plutonwp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function plutonwp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on plutonWp, use a find and replace
		 * to change 'plutonwp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'plutonwp', get_template_directory() . '/languages' );
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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'plutonwp' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'plutonwp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'plutonwp_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function plutonwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'plutonwp_content_width', 640 );
}

add_action( 'after_setup_theme', 'plutonwp_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function plutonwp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'plutonwp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'plutonwp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'plutonwp_widgets_init' );
/**
 * Enqueue scripts and styles.
 * */
function plutonwp_scripts() {
	wp_enqueue_style( 'plutonwp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.css', array(), _S_VERSION );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'pluton-ie7', get_template_directory_uri() . '/css/pluton-ie7.css', array(), _S_VERSION );
	wp_enqueue_style( 'pluton', get_template_directory_uri() . '/css/pluton.css', array(), _S_VERSION );
	wp_enqueue_style( 'jquery.cslider', get_template_directory_uri() . '/css/jquery.cslider.css', array(), _S_VERSION );
	wp_enqueue_style( 'jquery.bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css', array(), _S_VERSION );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), _S_VERSION );
	wp_style_add_data( 'plutonwp-style', 'rtl', 'replace' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'plutonwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery.mixitup', get_template_directory_uri() . '/js/jquery.mixitup.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery.bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'cslider', get_template_directory_uri() . '/js/jquery.cslider.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery.placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery.inview', get_template_directory_uri() . '/js/jquery.inview.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'plutonwp_scripts' );
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
function wp_slider_post_type() {
	$labels = array(
		'name'                  => _x( 'sliders', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'slider', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Slider', 'Admin Menu text', 'textdomain' ),
		'add_new'               => __( 'Add new', 'textdomain' ),
		'add_new_item'          => __( 'Add New Slider', 'textdomain' ),
		'new_item'              => __( 'New Slider', 'textdomain' ),
		'edit_item'             => __( 'Edit Slider', 'textdomain' ),
		'view_item'             => __( 'View Slider', 'textdomain' ),
		'all_items'             => __( 'All Sliders', 'textdomain' ),
		'search_items'          => __( 'Search Sliders', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Sliders:', 'textdomain' ),
		'not_found'             => __( 'No sliders found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Sliders found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Sliders Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Slider archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insertt into slider', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this slider', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter sliders list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Sliders list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Sliders list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);
	$args   = array(
		'labels'            => $labels,
		'public'            => true,
		'publicly_querable' => true,
		'show_ui'           => true,
		'show_in_menu'      => true,
		'query_bar'         => true,
		'rewrite'           => array( 'slug' => 'slider' ),
		'capability_type'   => 'post',
		'has_archive'       => true,
		'hierarchical'      => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);
	register_post_type( 'slider', $args );
}

add_action( 'init', 'wp_slider_post_type' );
function your_php_code( $wp_customize ) {
	// Theme Options Panel
	$wp_customize->add_panel( 'nd_dosth_theme_options', array(
			//'priority'       => 100,
			'title'       => __( 'Theme Options', 'nd_dosth' ),
			'description' => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'nd_dosth' ),
		) );
	// Text Options Section Inside Theme
	$wp_customize->add_section( 'nd_dosth_text_options', array(
			'title'    => __( 'Text Options', 'nd_dosth' ),
			'priority' => 1,
			'panel'    => 'nd_dosth_theme_options'
		) );
// Setting for Copyright text.
	$wp_customize->add_setting( 'nd_dosth_copyright_text', array(
			'default'           => __( 'All rights reserved ', 'nd_dosth' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
// Control for Copyright text
	$wp_customize->add_control( 'nd_dosth_copyright_text',
		array(
			'type'        => 'text',
			'priority'    => 10,
			'section'     => 'nd_dosth_text_options',
			'label'       => 'Copyright text',
			'description' => 'Text put here will be outputted in the footer',
		)
	);
}

add_action( 'customize_register', 'your_php_code' );

