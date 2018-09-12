<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Genesis Sample' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Disable admin bar
show_admin_bar(false);

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

    wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'genesis-sample-owl-css', get_stylesheet_directory_uri() . "/css/owl.carousel.min.css", true);
    wp_enqueue_style( 'genesis-sample-owl-css-theme', get_stylesheet_directory_uri() . "/css/owl.theme.default.min.css", true);
    wp_enqueue_style( 'dashicons' );

    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
    wp_enqueue_script( 'genesis-sample-owl-js', get_stylesheet_directory_uri() . "/js/owl.carousel{$suffix}.js", array( 'jquery' ), true);
    wp_enqueue_script( 'genesis-sample-matchheight-js', get_stylesheet_directory_uri() . "/js/jquery.matchHeight{$suffix}.js", array( 'jquery' ), true);
    wp_enqueue_script( 'genesis-sample-isotope-js', get_stylesheet_directory_uri() . "/js/isotope.pkgd{$suffix}.js", array( 'jquery' ), true);
    wp_enqueue_script( 'genesis-sample-imagesloaded-js', get_stylesheet_directory_uri() . "/js/imagesloaded.pkgd{$suffix}.js", array( 'jquery' ), true);
    wp_enqueue_script( 'genesis-sample-custom-js', get_stylesheet_directory_uri() . "/js/custom.js", array( 'jquery' ),CHILD_THEME_VERSION, true );
    wp_localize_script( 'genesis-sample-custom-js', 'adminAjax', admin_url( 'admin-ajax.php' ) );
    wp_localize_script(
        'genesis-sample-responsive-menu',
        'genesis_responsive_menu',
        genesis_sample_responsive_menu_settings()
    );

}

// Define our responsive menu settings.
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'genesis-sample' ), 'secondary' => __( 'Footer Menu', 'genesis-sample' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

//* Modification du nombre de caractère pour un post
add_filter( 'excerpt_length', 'sp_excerpt_length' );
function sp_excerpt_length( $length ) {
    return 25;
}

// add preloader body
add_action( 'genesis_before', 'loading_body');
function loading_body(){ ?>
    <div id="pre-loader">
        <div class="preloader-icon">
            <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 1417.3 1417.3" style="enable-background:new 0 0 1417.3 1417.3;" xml:space="preserve">
            <g>
                <g>
                    <g>
                        <path d="M761.7,1261.4v78.3c66.5-5.6,131.1-21.5,192.5-47.5c75.5-32,143.2-77.6,201.3-135.7c58.2-58.2,103.8-125.9,135.6-201.2
                            c33.1-78.3,49.8-161.2,49.8-246.5c0-85.5-16.8-168.4-49.8-246.4c-32-75.5-77.6-143.2-135.7-201.3
                            c-58.2-58.2-125.9-103.8-201.2-135.6C875.9,92.4,793,75.6,707.7,75.6c-85.5,0-168.4,16.8-246.4,49.8
                            C385.7,157.4,318,203,260,261.1C201.8,319.3,156.1,387,124.3,462.3c-26,61.3-41.9,126-47.5,192.5h78.3
                            c5.4-55.9,19.2-110.4,41.1-162.1c28.1-66.3,68.1-125.7,119.1-176.6c51.1-51.1,110.5-91.1,176.5-119
                            c68.4-28.9,141.1-43.6,216.1-43.6c75,0,147.7,14.7,216.1,43.6c66.3,28.1,125.7,68.1,176.6,119.1c51.1,51.1,91.1,110.5,119,176.5
                            c28.9,68.4,43.6,141.1,43.6,216.1c0,74.9-14.7,147.6-43.6,216.1c-28.1,66.3-68.1,125.7-119.1,176.6
                            c-51.1,51.1-110.5,91.1-176.5,119C871.9,1242.3,817.4,1256,761.7,1261.4z"/>
                    </g>
                </g>
            </g>
        </svg>
        </div>
    </div>
<?php }

// Change the footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$footer = '[footer_copyright] &middot; Infime Architecture - <a href="./mentions-legales">Mentions légales</a> - <a href="./politique-de-confidentialite">RGPD</a> - <a href="https://elle-et-la.com" target="_blank">Réalisation : elle&la ♥</a>';
	return $footer;
}

// add widget
genesis_register_sidebar( array(
    'id' => 'widget-rs-header',
    'name' => __( 'Réseaux Sociaux Header', 'genesis' ),
    'description' => __( 'Blablabla', 'childtheme' ),
));

genesis_register_sidebar( array(
    'id' => 'widget-offers',
    'name' => __( 'Offers Header', 'genesis' ),
    'description' => __( 'Offers description', 'childtheme' ),
));

genesis_register_sidebar( array(
    'id' => 'widget-offers-mobile',
    'name' => __( 'Offers Header Mobile', 'genesis' ),
    'description' => __( 'Offers mobile description', 'childtheme' ),
));

add_action('genesis_after_header','offers_header');
add_action('genesis_after_header','offers_header_mobile');

function offers_header() {
    genesis_widget_area('widget-offers', array(
        'before' => '<section id="plus-offres" class="hide-offers">
                <div id="bloc-offre-images" class="bloc-offre"><span>Images</span><a href="/infime/image" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-videos" class="bloc-offre"><span>Vidéos</span><a href="/infime/video" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-interactive" class="bloc-offre"><span>Interactif 360°</span><a href="/infime/interactif-360" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-tempsreel" class="bloc-offre"><span>Temps réel</span><a href="/infime/temps-reel" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-apprim" class="bloc-offre"><span>APPRIM</span><a href="/infime/apprim" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-interface" class="bloc-offre"><span>Interface digitale</span><a href="/infime/interface-digitale" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-stockstaging" class="bloc-offre"><span>Stock staging</span><a href="/infime/stock-staging" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-vip" class="bloc-offre"><span>VIP</span><a href="/infime/vip" class="hover-bloc-offre"></a></div>',
        'after' => '</section>'
    ));
}

function offers_header_mobile() {
    genesis_widget_area('widget-offers-mobile', array(
        'before' => '<section id="plus-offres-mobile" class="hide-offers-mobile">
            <img src="http://localhost:8888/infime/wp-content/themes/genesis-sample/images/cross.png" alt="cross" id="hideOfferNav">
            <div class="owl-carousel owl-theme">
                <div id="bloc-offre-images" class=" bloc-offre"><span>Images</span><a href="/infime/image" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-videos" class=" bloc-offre"><span>Vidéos</span><a href="/infime/video" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-interactive" class=" bloc-offre"><span>Interactif 360°</span><a href="/infime/interactif-360" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-tempsreel" class=" bloc-offre"><span>Temps réel</span><a href="/infime/temps-reel" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-apprim" class="bloc-offre"><span>APPRIM</span><a href="/infime/apprim" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-interface" class=" bloc-offre"><span>Interface digitale</span><a href="/infime/interface-digitale" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-stockstaging" class=" bloc-offre"><span>Stock staging</span><a href="/infime/stock-staging" class="hover-bloc-offre"></a></div>
                <div id="bloc-offre-vip" class="bloc-offre"><span>VIP</span><a href="/infime/vip" class="hover-bloc-offre"></a></div>
            </div>',
        'after' => '</section>'
    ));
}

add_action('genesis_header_right','mon_test');
function mon_test(){
    genesis_widget_area('widget-rs-header', array(
        'before' => '<div class="widget-rs-header">',
        'after' => '</div>'
    ));
}

// modal Ajax
add_action( 'wp_ajax_fetch_modal_content', 'fetch_modal_content' );
add_action( 'wp_ajax_nopriv_fetch_modal_content', 'fetch_modal_content' );

function fetch_modal_content() {

    echo '<div class="modal-body">';

    echo include(locate_template('template/modal-project.php'));

    echo '</div>';

    wp_die();
}

function display_header_page($classes ){

    $headerConfig = get_field('display_header');

    if ($headerConfig == 'header-transparent'){
        $classes[] = 'header-transparent';
    } elseif ($headerConfig == 'header-normal'){
        $classes[] = 'header-normal';
    }

    return $classes;

}

add_filter('body_class', 'display_header_page');