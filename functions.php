<?php
/**
 * dynamic functions and definitions
 *
 * @package dynamic
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1080; /* pixels */
}

if ( ! function_exists( 'dynamic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dynamic_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dynamic, use a find and replace
	 * to change 'dynamic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dynamic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Add title
    add_theme_support( 'title-tag' );

    //
    add_theme_support( 'custom-header' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu1' => __( 'Menu 1', 'dynamic' ),
        'menu2' => __( 'Menu 2', 'dynamic' ),
        'footer' => __( 'Footer Menu', 'dynamic' ),
        'footer-ml' => __( 'Footer ML', 'dynamic' ),
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dynamic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
    ) ) );
}
endif; // dynamic_setup
add_action( 'after_setup_theme', 'dynamic_setup' );

/**/
function gn_ajouter_styles_editeur() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'gn_ajouter_styles_editeur' );
/**/

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dynamic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dynamic' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
   ) );


	register_sidebar( array(
		'name'          => __( 'Footer', 'dynamic' ),
		'id'            => 'footerbar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-widget-title"><span>',
		'after_title'   => '</span></h3>',
   ) );

}
add_action( 'widgets_init', 'dynamic_widgets_init' );

/**/
if ( ! function_exists( 'et_get_theme_version' ) ) :
function dc_get_theme_version() {
	$theme_info = wp_get_theme();

	if ( is_child_theme() ) {
		$theme_info = wp_get_theme( $theme_info->parent_theme );
	}

	$theme_version = $theme_info->display( 'Version' );

	return $theme_version;
}
endif;
/**
 * Enqueue scripts and styles.
 */
function dynamic_scripts() {
    
    $themeVersion = dc_get_theme_version();
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.css');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style( 'popup', get_template_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style( 'owl_theme', get_template_directory_uri() . '/css/owl.theme.css');
    //wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/styles.css');
    //wp_enqueue_style( 'dynamic-style', get_template_directory_uri() . '/style.css' );
    //wp_enqueue_style('dynamic-style', get_template_directory_uri() . '/style.css',        array(), $themeVersion);
    wp_enqueue_style( 'theme', get_template_directory_uri() . '/theme.css', array(), $themeVersion);
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array(), $themeVersion);
    
    

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'jqueryui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array(), '20120206', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.enllax.min.js', array(), '20160201', true );
    wp_enqueue_script( 'popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '20170405', true );
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20130115', true );
    wp_enqueue_script( 'effects', get_template_directory_uri() . '/js/effects.js', array(), '20120206', true );
    //wp_enqueue_script( 'js.cookie', get_template_directory_uri() . '/js/js.cookie.js');


  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'dynamic_scripts' );


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/paginate.php';
require_once( get_template_directory()  . '/inc/template-tags.php' );

// Other required files
require get_template_directory() . '/aq_resizer.php';

// TRIM CHARACTERS
function trim_characters( $text, $length = 45, $append = '&hellip;' ) {

	$length = (int) $length;
	$text = trim( strip_tags( $text ) );

	if ( strlen( $text ) > $length ) {
		$text = substr( $text, 0, $length + 1 );
		$words = preg_split( "/[\s]|&nbsp;/", $text, -1, PREG_SPLIT_NO_EMPTY );
		preg_match( "/[\s]|&nbsp;/", $text, $lastchar, 0, $length );
		if ( empty( $lastchar ) )
			array_pop( $words );

		$text = implode( ' ', $words ) . $append;
	}

	return $text;
}



/* CUSTOM EDITOR  TINY */

function mce_mod( $init ) {
    //$init['block_formats'] = 'Paragraph=p;';
	//http://wordpress.stackexchange.com/questions/128931/tinymce-adding-css-to-format-dropdown
    //This allows color styles to be inherited from the editor styelsheet.
  unset($init['preview_styles']);

  $style_formats = array (
    array( 'title' => 'SEO H2', 'block' => 'h2', 'classes' => 'seo-h2' ),
    array( 'title' => 'SEO H3', 'block' => 'h3', 'classes' => 'seo-h3' ),
    array( 'title' => 'SEO Orange', 'inline' => 'span', 'classes' => 'seo-orange' ),
    array( 'title' => 'SEO Blanc', 'inline' => 'span', 'classes' => 'seo-blanc' ),
    array( 'title' => 'Semibold', 'inline' => 'span', 'classes' => 'semibold' ),
    );

  $init['style_formats'] = json_encode( $style_formats );

  $init['style_formats_merge'] = false;
  return $init;
}
add_filter('tiny_mce_before_init', 'mce_mod');


/*remove automatic conversion html sur les titres*/
remove_filter( 'the_title', 'wptexturize' );



/* p fix */
function shortcode_empty_paragraph_fix( $content ) {

    // define your shortcodes to filter, '' filters all shortcodes
  $shortcodes = array( 'wpb_childpages' );

  foreach ( $shortcodes as $shortcode ) {

    $array = array (
      '<p>[' . $shortcode => '[' .$shortcode,
      '<p>[/' . $shortcode => '[/' .$shortcode,
      $shortcode . ']</p>' => $shortcode . ']',
      $shortcode . ']<br />' => $shortcode . ']'
      );

    $content = strtr( $content, $array );
  }

  return $content;
}

add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );



/*SCHEMA GOOGLE ADDRESS*/
function shortcode_printaddress($atts)
{
  $val.= '<div itemscope itemtype="http://schema.org/LocalBusiness">';
  $val.= '<a itemprop="url" href="' . site_url() . '">';
  $val.= '<div itemprop="name" class="semibold titre">'. $atts["name"] . '</div>';
  $val.= '</a>';
  $val.= '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
  $val.= '<span itemprop="streetAddress">';
  $val.= $atts["address1"];
  if(!empty($atts["address2"])) {
    $val.= '<br/>' . $atts["address2"];
  }
  $val.= '</span><br/>';
  $val.= '<span itemprop="postalCode">' . $atts["zip"] . '</span> <span itemprop="addressLocality">' . $atts["city"] . '</span>' ;
  $val.= '</div>';
  $val.= '</div>';
  return $val;
}
add_shortcode('printaddress', 'shortcode_printaddress');


/*security*/
remove_action('wp_head', 'wp_generator');
add_filter('login_errors',create_function('$a', "return null;"));
remove_action('wp_head', 'wlwmanifest_link');
define('DISALLOW_FILE_EDIT',true); // cacher editeur de fichier
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/*default theme options*/
// set the options to change
$option = array(
    // we don't want no description
    //'blogdescription'               => '',
    // change category base
    //'category_base'                 => '/cat',
    // change tag base
    //'tag_base'                      => '/label',
    // disable comments
    'default_comment_status'        => 'closed',
    // disable trackbacks
    //'use_trackback'                 => '',
    // disable pingbacks
    //'default_ping_status'           => 'closed',
    // disable pinging
    //'default_pingback_flag'         => '',
    // change the permalink structure
    'permalink_structure'           => '/%postname%/',
    // dont use year/month folders for uploads 
    //'uploads_use_yearmonth_folders' => '',
    // don't use those ugly smilies
    //'use_smilies'                   => ''
);
 
// change the options!
foreach ( $option as $key => $value ) {  
    update_option( $key, $value );
}
 
// flush rewrite rules because we changed the permalink structure
global $wp_rewrite;
$wp_rewrite->flush_rules();


/*installation de plugin*/
function activate_plugin_first() {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $result = activate_plugin( 'advanced-custom-fields-pro/acf.php' );
	$result = activate_plugin( 'siteorigin-panels/siteorigin-panels.php' );
    if ( is_wp_error( $result ) ) {
        // Process Error
    }
}
add_action( 'after_setup_theme', 'activate_plugin_first' );

/*ACF THEME OPTIONS*/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'    =>  'Theme Options',
      'menu_title'    =>  'Theme Options',
      'menu_slug'     =>  'theme-options',
      'capability'    =>  'edit_posts',
      'parent_slug'   =>  '',
      'position'      =>  false,
      'icon_url'      =>  false,
      'redirect'      =>  false
      ));
    
    if( function_exists('acf_add_local_field_group') ):
        acf_add_local_field_group(array(
            'key' => 'group_setting',
            'title' => 'Parametres',
            'fields' => array (
                array (
                    'key' => 'apikey',
                    'label' => 'API key Google Map',
                    'name' => 'api_key',
                    'type' => 'text',
                ),
				array (
                    'key' => 'excerpt',
                    'label' => 'Nombre de mots Introduction',
                    'name' => 'excerpt',
                    'type' => 'text',
                ),
                array (
                    'key' => 'slider',
                    'label' => 'Slider',
                    'name' => 'slider',
                    'type' => 'gallery',
                ),
                array (
                    'key' => 'logo',
                    'label' => 'Logo',
                    'name' => 'logo',
                    'type' => 'image',
                )
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options',
                    ),
                ),
            ),
        ));
        endif;
}

// Short excerpt
function custom_excerpt_length( $length ) {
	$nb = get_field('excerpt', 'option');
	if ($nb) { return $nb; }
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/*nom des images uploadés renommés*/
add_filter('sanitize_file_name', 'remove_accents' );
//
/* ACF Google Maps */
function wpc_acf_init() {
    $api = get_field('api_key', 'option');
    if ($api) acf_update_setting('google_api_key', $api);
}
add_action('acf/init', 'wpc_acf_init');

/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set other options for Custom Post Type
     
    $args = array(
        'labels' => array(
                'name' => __( 'Layouts' ),
                'singular_name' => __( 'Layout' )
		),
        // Features this CPT supports in Post Editor
        //'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        //'show_in_menu'        => false,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        //'publicly_queryable'  => true,
        //'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'layouts', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );
function superpower_superpageinit(){
	$post_types = SiteOrigin_Panels_Settings::single()->get( 'post-types' );
	$post_types	= array( 'post', 'page', 'layouts' );
	SiteOrigin_Panels_Settings::single()->set( 'post-types', $post_types );
}
add_action('init', 'superpower_superpageinit', 15);
