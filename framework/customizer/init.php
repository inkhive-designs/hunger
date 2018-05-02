<?php
/**
 * hunger Theme Customizer
 *
 * @package hunger
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hunger_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    $wp_customize->add_panel('hunger_fc_panel', array(
        'title' => __('Featured Content Areas', 'hunger'),
        'priority' => 30,
        )
    );
}
add_action( 'customize_register', 'hunger_customize_register' );

require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/_customizer_controls.php';
require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/_miscscripts.php';
require_once get_template_directory().'/framework/customizer/_layouts.php';
require_once get_template_directory().'/framework/customizer/featured-cat.php';
require_once get_template_directory().'/framework/customizer/featured-post.php';
require_once get_template_directory().'/framework/customizer/featured_showcase.php';
require_once get_template_directory().'/framework/customizer/front-page-builder.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hunger_customize_preview_js() {
    wp_enqueue_script( 'hunger_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'hunger_customize_preview_js' );