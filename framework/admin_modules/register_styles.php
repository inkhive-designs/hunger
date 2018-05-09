<?php

/**
 * Enqueue scripts and styles.
 */
function hunger_scripts() {
    wp_enqueue_style( 'hunger-style', get_stylesheet_uri() );

    wp_enqueue_style('hunger-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('hunger_title_font', 'Raleway')) ).':100,300,400,700' );

    wp_enqueue_style('hunger-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('hunger_body_font', 'Khula') ) ).':100,300,400,700' );

    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/fontawesome-all.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/ext-css/owl.carousel.min.css' );

    wp_enqueue_style( 'hunger-main-theme-style', get_template_directory_uri() . '/assets/theme_styles/css/'.get_theme_mod('hunger_skin', 'default').'.css', array(), null );

    wp_enqueue_script( 'hunger-external', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'hunger-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'hunger-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery-masonry'), false, true );
}
add_action( 'wp_enqueue_scripts', 'hunger_scripts' );
