<?php
/**
 * Enqueue Scripts for Admin
 */
function hunger_custom_wp_admin_style() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/fontawesome-all.css' );
    wp_enqueue_style( 'hunger-admin_css', get_template_directory_uri() . '/assets/ext-css/admin.css' );
}
add_action( 'customize_controls_print_styles', 'hunger_custom_wp_admin_style' );