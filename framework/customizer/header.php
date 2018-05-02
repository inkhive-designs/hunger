<?php

function hunger_customize_register_header($wp_customize){
    $wp_customize->remove_control('display_header_text');
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

    $wp_customize->add_setting(
        'hunger_hide_title_tagline',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_hide_title_tagline', array(
            'settings' => 'hunger_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'hunger' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    function hunger_title_visible( $control ) {
        $option = $control->manager->get_setting('hunger_hide_title_tagline');
        return $option->value() == false ;
    }

    //Choices icons, menu, custom text
    $wp_customize->add_section('hunger_right_header_content_section', array(
        'title' => __('Right Header Content', 'hunger'),
        'priority' => 100,
        'panel' => 'hunger_header_panel',
    ));

    $wp_customize->add_setting('hunger_replace_search_bar', array(
        'sanitize_callback' => 'hunger_sanitize_checkbox',
    ));

    $wp_customize->add_control('hunger_replace_search_bar', array(
        'setting' => 'hunger_replace_search_bar',
        'section' => 'hunger_right_header_content_section',
        'label' => __('Replace Search Bar ', 'hunger'),
        'description' => __('You can Replace search bar with your custom short menu or contact text.', 'hunger'),
        'type' => 'checkbox',
        'default' => false
    ));

    $wp_customize->add_setting('hunger_short_menu', array(
        'default' => true,
        'sanitize_callback' => 'hunger_sanitize_checkbox',
    ));

    $wp_customize->add_control('hunger_short_menu', array(
        'setting' => 'hunger_short_menu',
        'section' => 'hunger_right_header_content_section',
        'label' => __('Enable Short Menu', 'hunger'),
        'description' => __('You can add a Short Menu here. Try to avoid menus which have more than 2 items.', 'hunger'),
        'type' => 'checkbox',
        'default' => false,
        'active_callback' => 'hunger_disable_search_bar',
    ));

    $wp_customize->add_setting(
        'hunger_enable_email_mobile',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_enable_email_mobile', array(
            'settings' => 'hunger_enable_email_mobile',
            'label'    => __( 'Enable Mobile & Email','hunger' ),
            'section'  => 'hunger_right_header_content_section',
            'type'     => 'checkbox',
            'default'  => false,
            'active_callback' => 'hunger_disable_search_bar',
        )
    );

    $wp_customize->add_setting('hunger_email_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('hunger_email_text', array(
        'setting' => 'hunger_email_text',
        'section' => 'hunger_right_header_content_section',
        'label' => __('Enter Your Email', 'hunger'),
        'description' => __('Enter email id to display.', 'hunger'),
        'type' => 'text',
        'active_callback' => 'hunger_show_email_mobile_options',
    ));

    $wp_customize->add_setting('hunger_mobile_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('hunger_mobile_text', array(
        'setting' => 'hunger_mobile_text',
        'section' => 'hunger_right_header_content_section',
        'label' => __('Enter Mobile/Phone Number', 'hunger'),
        'description' => __('Enter mobile number or phone number to display.', 'hunger'),
        'type' => 'text',
        'active_callback' => 'hunger_show_email_mobile_options',
    ));

    /* Active Callback Function */
    function hunger_show_email_mobile_options($control) {

        $option = $control->manager->get_setting('hunger_enable_email_mobile');
        $option2 = $control->manager->get_setting('hunger_replace_search_bar');
        return $option->value() == true && $option2->value() == true ;

    }

    /* Active Callback Function */
    function hunger_disable_search_bar($control) {
        $option = $control->manager->get_setting('hunger_replace_search_bar');
        return $option->value() == true ;

    }

}
add_action('customize_register','hunger_customize_register_header');