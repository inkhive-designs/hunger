<?php
function hunger_customize_register_fp_cat( $wp_customize ) {
    //FEATURED POSTS
    $wp_customize->add_section(
        'hunger_featposts_cat',
        array(
            'title'     => __('Featured Posts Categories','hunger'),
            'priority'  => 20,
            'panel' => 'hunger_fc_panel',
        )
    );

    $wp_customize->add_setting(
        'hunger_eta_fcenable',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_eta_fcenable', array(
            'settings' => 'hunger_eta_fcenable',
            'label'    => __( 'Enable Featured Posts', 'hunger' ),
            'section'  => 'hunger_featposts_cat',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'hunger_featcat_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'hunger_featcat_title', array(
            'settings' => 'hunger_featcat_title',
            'label'    => __( 'Title', 'hunger' ),
            'section'  => 'hunger_featposts_cat',
            'type'     => 'text',
        )
    );

    for( $x = 1; $x <= 6; $x++ ):

        $wp_customize->add_setting(
            'hunger_featposts_category_'.$x,
            array( 'sanitize_callback' => 'hunger_sanitize_category' )
        );

        $wp_customize->add_control(
            new Hunger_WP_Customize_Category_Control(
                $wp_customize,
                'hunger_featposts_category_'.$x,
                array(
                    'label'    => __('Select Featured Category ','hunger').$x,
                    'settings' => 'hunger_featposts_category_'.$x,
                    'section'  => 'hunger_featposts_cat'
                )
            )
        );

    endfor;
}
add_action( 'customize_register', 'hunger_customize_register_fp_cat' );