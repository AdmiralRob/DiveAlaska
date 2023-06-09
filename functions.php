<?php
/**
 * Scaffold functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

define( 'SCAFFOLD_VERSION', '1.2.3' );

if ( ! function_exists( 'scaffold_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function scaffold_setup() {

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
				'menu-1' => esc_html__( 'Primary Menu', 'scaffold' ),
				'menu-upper' => esc_html__( 'Primary Upper Menu', 'scaffold' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'scaffold_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add image size for blog posts, 600px wide (and unlimited height).
		add_image_size( 'scaffold-blog', 600 );
		// Add image size for full width template, 1040px wide (and unlimited height).
		add_image_size( 'scaffold-full-width', 1040 );

		// Add stylesheet for the WordPress editor.
		add_editor_style( '/assets/css/editor-style.css' );

		// Add support for custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		// Add support for WooCommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif;
add_action( 'after_setup_theme', 'scaffold_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scaffold_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scaffold_content_width', 1040 );
}
add_action( 'after_setup_theme', 'scaffold_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scaffold_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'scaffold' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'scaffold' ),
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'scaffold' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add footer widgets here.', 'scaffold' ),
			'before_widget' => '<section class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'scaffold_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scaffold_scripts() {
	wp_enqueue_style( 'scaffold-style', get_stylesheet_uri(), array(), SCAFFOLD_VERSION );

	wp_enqueue_script( 'scaffold-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), SCAFFOLD_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'scaffold-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', 'scaffold-style', SCAFFOLD_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'scaffold_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Customizer Settings.
 */
require get_template_directory() . '/inc/customizer/customizer-helper-settings.php';

/**
 * If the WooCommerce plugin is active, load the related functions.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/woocommerce/functions.php';
}

/**
 * Display the admin notice.
 */
function scaffold_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;

	if ( ! get_user_meta( $user_id, 'scaffold_ignore_customizer_notice' ) ) {
		?>

		<div class="notice notice-info">
			<p>
				<strong>New!</strong> Easily customize your Scaffold theme design with our new settings - <a target="_blank" href="https://docs.olympusthemes.com/kb/scaffold-theme/customizer-settings-scaffold/?utm_source=notice">Learn More</a>
				<span style="float:right">
					<a href="?scaffold_ignore_customizer_notice=0"><?php esc_html_e( 'Hide Notice', 'scaffold' ); ?></a>
				</span>
			</p>
		</div>

		<?php
	}
}
add_action( 'admin_notices', 'scaffold_admin_notice' );

/**
 * Dismiss the admin notice.
 */
function scaffold_dismiss_admin_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['scaffold_ignore_customizer_notice'] ) && '0' === $_GET['scaffold_ignore_customizer_notice'] ) {
		add_user_meta( $user_id, 'scaffold_ignore_customizer_notice', 'true', true );
	}
}
add_action( 'admin_init', 'scaffold_dismiss_admin_notice' );
