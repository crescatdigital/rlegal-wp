<?php
/**
 * Theme functions and definitions
 * 
 * @package RI_Legal_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function ri_legal_theme_setup() {
    // Add support for title tag.
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails.
    add_theme_support( 'post-thumbnails' );

    // Register navigation menu.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'ri-legal-theme' ),
    ) );
}

add_action( 'after_setup_theme', 'ri_legal_theme_setup' );

/**
 * Get theme image URL
 */
function ri_legal_image_url( $filename ) {
    return get_template_directory_uri() . '/assets/images/' . $filename;
}

/**
 * Safe wrapper for ACF `get_field` used across the theme.
 * Returns the ACF value when ACF is active, otherwise returns the provided default.
 * Supports an optional $post_id parameter to fetch option fields via `get_field( $key, $post_id )`.
 *
 * @param string $key Field name/key
 * @param mixed  $default Default value when ACF is not available or field is empty
 * @param mixed  $post_id Optional post ID or 'option' to fetch from options
 * @return mixed
 */
function get_ri_field( $key, $default = '', $post_id = false ) {
    if ( function_exists( 'get_field' ) ) {
        $val = $post_id ? get_field( $key, $post_id ) : get_field( $key );
        if ( $val !== null && $val !== false && $val !== '' ) {
            return $val;
        }
    }
    return $default;
} 

/**
 * Enqueue scripts and styles.
 */
function ri_legal_theme_scripts() {

    $theme_version = time();

    // Enqueue fonts
    wp_enqueue_style( 'ri-legal-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array(), $theme_version, 'all' );

    // Enqueue main stylesheet
    wp_enqueue_style( 'ri-legal-theme-style', get_template_directory_uri() . '/assets/css/style.css', array( 'ri-legal-fonts' ), $theme_version, 'all' );

    // Enqueue header stylesheet
    wp_enqueue_style( 'ri-legal-header-style', get_template_directory_uri() . '/assets/css/header.css', array( 'ri-legal-theme-style' ), $theme_version, 'all' );

    // Enqueue footer stylesheet
    wp_enqueue_style( 'ri-legal-footer-style', get_template_directory_uri() . '/assets/css/footer.css', array( 'ri-legal-theme-style' ), $theme_version, 'all' );

    // Enqueue mobile navigation script
    wp_enqueue_script( 'ri-legal-mobile-nav', get_template_directory_uri() . '/assets/js/mobileNav.js', array(), $theme_version, true );

    // Enqueue accordion script
    wp_enqueue_script( 'ri-legal-accordion', get_template_directory_uri() . '/assets/js/accordion.js', array(), $theme_version, true );

    // Enqueue reviews carousel script
    wp_enqueue_script( 'ri-legal-carousel', get_template_directory_uri() . '/assets/js/reviewsCarrousel.js', array(), $theme_version, true );

    // Enqueue reviews carousel script
    wp_enqueue_script( 'ri-legal-load-more', get_template_directory_uri() . '/assets/js/loadmore.js', array(), $theme_version, true );

    // Enqueue global stylesheet
    wp_enqueue_style( 'ri-legal-global-style', get_template_directory_uri() . '/assets/css/global.css', array(), $theme_version, 'all');

    wp_enqueue_style( 'callout-style', get_template_directory_uri() . '/assets/css/callout.css', array(), $theme_version, 'all');
    

    // Enqueue simple page template stylesheet
    if ( is_page_template('page-simple.php') ) {
        wp_enqueue_style( 'page-simple', get_template_directory_uri() . '/assets/css/simple-page.css', array(), $theme_version, 'all');
    }

    if(is_page_template('page-about.php')) {
        wp_enqueue_style( 'page-about', get_template_directory_uri() . '/assets/css/about.css', array(), $theme_version, 'all');
    }
    // Enqueue service page template stylesheet
    if ( is_singular('service') ) {
        wp_enqueue_style( 'page-single-service', get_template_directory_uri() . '/assets/css/services.css', array(), $theme_version, 'all');
    }
    
    if ( is_singular('post') ) {
        wp_enqueue_style( 'page-single-post', get_template_directory_uri() . '/assets/css/single-post.css', array(), $theme_version, 'all');
    }

    // Enqueue page-category template stylesheet
    if ( is_page_template('page-category.php') ) {
    wp_enqueue_style( 'page-category', get_template_directory_uri() . '/assets/css/category-page.css', array(), $theme_version, 'all');
    }

    // Enqueue free consultation template assets (layout + booking calendar)
    if ( is_page_template('page-free-consultation.php') ) {
        wp_enqueue_style( 'page-free-consultation', get_template_directory_uri() . '/assets/css/free-consultation.css', array(), $theme_version, 'all');
        wp_enqueue_script( 'ri-legal-booking-calendar', get_template_directory_uri() . '/assets/js/booking-calendar.js', array(), $theme_version, true );
    }

}

add_action( 'wp_enqueue_scripts', 'ri_legal_theme_scripts' );

include('custom-functions.php');
// Load theme ACF homepage fields if present
if ( file_exists( get_template_directory() . '/includes/acf-homepage.php' ) ) {
    require_once get_template_directory() . '/includes/acf-homepage.php';
}

// Load theme ACF page-specific fields if present
if ( file_exists( get_template_directory() . '/includes/acf-pages.php' ) ) {
    require_once get_template_directory() . '/includes/acf-pages.php';
}
// Load global ACF options fields (Custom Options)
if ( file_exists( get_template_directory() . '/includes/acf-options.php' ) ) {
    require_once get_template_directory() . '/includes/acf-options.php';
}
// Load global ACF FAQ fields 
if ( file_exists( get_template_directory() . '/includes/acf-faq.php' ) ) {
    require_once get_template_directory() . '/includes/acf-faq.php';
}
if ( file_exists( get_template_directory() . '/includes/acf-contact.php' ) ) {
    require_once get_template_directory() . '/includes/acf-contact.php';
}

// Load review platform helpers (badge links + rating tooltip)
if ( file_exists( get_template_directory() . '/includes/reviews.php' ) ) {
    require_once get_template_directory() . '/includes/reviews.php';
}

if ( file_exists( get_template_directory() . '/security.php' ) ) {
    require_once get_template_directory() . '/security.php';
}
