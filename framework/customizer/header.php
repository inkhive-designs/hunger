<?php

function hunger_customize_register_header($wp_customize){
    //$wp_customize->remove_control('display_header_text');
    $wp_customize->get_section('title_tagline')->panel = 'hunger_header_panel';
    //Logo Setting
    $wp_customize->add_panel('hunger_header_panel', array(
            'title' => __('Header Settings', 'hunger'),
            'priority' => 20,
        )
    );

    //Settings for Header Image
    $wp_customize->get_section('header_image')->panel = 'hunger_header_panel';

    $wp_customize->add_setting( 'hunger_himg_style' , array(
        'default'     => 'cover',
        'sanitize_callback' => 'hunger_sanitize_himg_style'
    ) );

    /* Sanitization Function */
    function hunger_sanitize_himg_style( $input ) {
        if (in_array( $input, array('contain','cover') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'hunger_himg_style', array(
        'label' => __('Header Image Arrangement','hunger'),
        'section' => 'header_image',
        'settings' => 'hunger_himg_style',
        'type' => 'select',
        'choices' => array(
            'contain' => __('Contain','hunger'),
            'cover' => __('Cover Completely (Recommended)','hunger'),
        )
    ) );

    $wp_customize->add_setting( 'hunger_himg_align' , array(
        'default'     => 'center',
        'sanitize_callback' => 'hunger_sanitize_himg_align'
    ) );

    /* Sanitization Function */
    function hunger_sanitize_himg_align( $input ) {
        if (in_array( $input, array('center','left','right') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'hunger_himg_align', array(
        'label' => __('Header Image Alignment','hunger'),
        'section' => 'header_image',
        'settings' => 'hunger_himg_align',
        'type' => 'select',
        'choices' => array(
            'center' => __('Center','hunger'),
            'left' => __('Left','hunger'),
            'right' => __('Right','hunger'),
        )
    ) );

    $wp_customize->add_setting( 'hunger_himg_repeat' , array(
        'default'     => true,
        'sanitize_callback' => 'hunger_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'hunger_himg_repeat', array(
        'label' => __('Repeat Header Image','hunger'),
        'section' => 'header_image',
        'settings' => 'hunger_himg_repeat',
        'type' => 'checkbox',
    ) );


    //Settings For Logo Area

//    $wp_customize->add_setting(
//        'hunger_hide_title_tagline',
//        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
//    );
//
//    $wp_customize->add_control(
//        'hunger_hide_title_tagline', array(
//            'settings' => 'hunger_hide_title_tagline',
//            'label'    => __( 'Hide Title and Tagline.', 'hunger' ),
//            'section'  => 'title_tagline',
//            'type'     => 'checkbox',
//        )
//    );
//
//    function hunger_title_visible( $control ) {
//        $option = $control->manager->get_setting('hunger_hide_title_tagline');
//        return $option->value() == false ;
//    }

}
add_action('customize_register','hunger_customize_register_header');