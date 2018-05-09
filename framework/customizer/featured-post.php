<?php
function hunger_customize_register_fp_area($wp_customize) {
    $wp_customize->add_section(
        'hunger_eta_section',
        array(
            'title'     => __('Featured Offers','hunger'),
            'priority'  => 10,
            'panel'     => 'hunger_fc_panel'
        )
    );

    $wp_customize->add_setting(
        'hunger_eta_enable',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_eta_enable', array(
            'settings' => 'hunger_eta_enable',
            'label'    => __( 'Enable Featured Posts', 'hunger' ),
            'section'  => 'hunger_eta_section',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'hunger_eta_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'hunger_eta_title', array(
            'settings' => 'hunger_eta_title',
            'label'    => __( 'Title','hunger' ),
            'section'  => 'hunger_eta_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'hunger_eta_cat',
        array( 'sanitize_callback' => 'hunger_sanitize_category' )
    );

    $wp_customize->add_control(
        new Hunger_WP_Customize_Category_Control(
            $wp_customize,
            'hunger_eta_cat',
            array(
                'label'    => __('Posts Category.','hunger'),
                'settings' => 'hunger_eta_cat',
                'section'  => 'hunger_eta_section'
            )
        )
    );
}
add_action('customize_register', 'hunger_customize_register_fp_area');