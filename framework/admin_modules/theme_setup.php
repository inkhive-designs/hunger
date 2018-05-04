<?php
/**
 * hunger functions and definitions
 *
 * @package hunger
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'hunger_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function hunger_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on hunger, use a find and replace
         * to change 'hunger' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'hunger', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         *
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        //Custom Logo
        add_theme_support( 'custom-logo' );


        //RT Slider Support
        add_theme_support( 'rt-slider' );


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'hunger' ),
            'short' => __( 'Short Menu', 'hunger' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );


        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'hunger_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        add_image_size('hunger-pop-thumb',542, 340, true );
        add_image_size('hunger-cat-thumb',260, 180, true );
        add_image_size('hunger-featpost-thumb',542, 542, true );
        add_image_size('hunger-thumb',670, 430, true );
        add_image_size('offer-thumb',300, 300, true );
        add_image_size('hunger-slider-thumb',910, 430, true );
    }
endif; // hunger_setup
add_action( 'after_setup_theme', 'hunger_setup' );