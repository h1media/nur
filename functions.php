<?php
/**
 * Functions and definitions
 *
 * @package Alternative
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function automech_setup() {
	load_theme_textdomain( 'automech' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'atm-companies', 'thumbnail' );
}

add_action( 'after_setup_theme', 'automech_setup' );

/**
 * Enqueues scripts and styles.
 *
 */
function alternative_scripts() {
	wp_enqueue_style( 'alternative-style', get_stylesheet_uri() );
	wp_enqueue_style( 'alternative-ie', get_template_directory_uri() . '/dist/css/ie.css', array( 'alternative-style' ), '20161017' );
	wp_style_add_data( 'alternative-ie', 'conditional', 'lt IE 10' );
	wp_enqueue_style( 'alternative-ie8', get_template_directory_uri() . '/dist/css/ie8.css', array( 'alternative-style' ), '20161017' );
	wp_style_add_data( 'alternative-ie8', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'alternative-ie7', get_template_directory_uri() . '/dist/css/ie7.css', array( 'alternative-style' ), '20161017' );
	wp_style_add_data( 'alternative-ie7', 'conditional', 'lt IE 8' );
	wp_enqueue_style( 'alternative-app', get_template_directory_uri() . '/dist/css/app.css', array(), '20161017' );
	wp_enqueue_style( 'alternative-fa', get_template_directory_uri() . '/dist/css/font-awesome.min.css', array(), '20161017' );
	wp_enqueue_style( 'video-css', get_template_directory_uri() . '/assets/css/slick.min.css', array(), '20161017' );
	wp_enqueue_style( 'print-css', get_template_directory_uri() . '/assets/css/print.css', array(), '20161017' );
	wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), '20161017' );

	wp_script_add_data( 'alternative-html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'video-js', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '20161017', true );
	wp_enqueue_script( 'print-me', get_template_directory_uri() . '/assets/js/jQuery.print.min.js', array( 'jquery' ), '20161017', true );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/assets/js/cookiebanner.min.js', array( 'jquery' ), '20161017', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '20161017', true );
	wp_enqueue_script( 'alternative-applic', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), '20161017', true );
	wp_localize_script( 'alternative-app', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'alternative_scripts' );

// nav menus
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', 'automech' ),
			'extra-menu'  => __( 'Extra Menu', 'automech' ),
		)
	);
}

add_action( 'init', 'register_my_menus' );

//settings tab
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
	) );
}

// custom image sizes
add_image_size( 'home-company', 560, 300, array( 'center', 'center' ) );
add_image_size( 'expertise-company', 260, 360, array( 'center', 'center' ) );
add_image_size( 'header-bcg', 1400, 670, array( 'center', 'center' ) );

//claen eneque
add_filter( 'style_loader_tag', 'clean_style_tag' );
add_filter( 'script_loader_tag', 'clean_script_tag' );

//Clean up output of stylesheet <link> tags
function clean_style_tag( $input ) {
	preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
	if ( empty( $matches[2] ) ) {
		return $input;
	}
	$media = '' !== $matches[3][0] && 'all' !== $matches[3][0] ? ' media="' . $matches[3][0] . '"' : '';

	return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}

// Clean up output of <script> tags
function clean_script_tag( $input ) {
	$input = str_replace( "type='text/javascript' ", '', $input );

	return str_replace( "'", '"', $input );
}


// footer
function add_in_footer() {
	?>
	<script id="cookiebanner"
	data-height="30px"
	data-close-text="OK"
	data-message="We use cookies to improve your browsing experience.">
	</script>
    <?php }
add_action( 'wp_footer', 'add_in_footer' );

// async sripts
add_filter( 'autoptimize_filter_js_defer','my_ao_override_defer',10,1 );
/**
 * Change flag added to Javascript.
 *
 * @param $defer: default value, "" when forced in head, "defer " when not forced in head
 * @return: new value
 */
function my_ao_override_defer( $defer ) {
	return $defer.'async ';
}

