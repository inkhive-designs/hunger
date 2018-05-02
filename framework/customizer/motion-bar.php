<?php
function hunger_customize_register_motion_bar($wp_customize){
    //MOTION BAR

    $wp_customize->add_section(
        'hunger_motionbar_section',
        array(
            'title'     => __('Motion Bar','hunger'),
            'priority'  => 35,
            'panel' => 'hunger_fc_panel'
        )
    );

    $wp_customize->add_setting(
        'hunger_motionbar_enable',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_motionbar_enable', array(
            'settings' => 'hunger_motionbar_enable',
            'label'    => __( 'Enable Motion Bar.','hunger' ),
            'section'  => 'hunger_motionbar_section',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'hunger_motionbar_title_set',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'hunger_motionbar_title_set', array(
            'settings' => 'hunger_motionbar_title_set',
            'section'  => 'hunger_motionbar_section',
            'label'    => __( 'Enter Title Text', 'hunger' ),
            'type'     => 'text',
            'active_callback' => 'hunger_show_motionbar_options',
        )
    );

    $wp_customize->add_setting(
        'hunger_motionbar_content_cat',
        array( 'sanitize_callback' => 'hunger_sanitize_category' )
    );


    $wp_customize->add_control(
        new Hunger_WP_Customize_Category_Control(
            $wp_customize,
            'hunger_motionbar_content_cat',
            array(
                'label'    => __('Category For Motion Bar Contents','hunger'),
                'settings' => 'hunger_motionbar_content_cat',
                'section'  => 'hunger_motionbar_section',
                'active_callback' => 'hunger_show_motionbar_options',
            )
        )
    );

    $wp_customize->add_setting(
        'hunger_motionbar_separator_fa',
        array(
            'default' => 'star',
            'sanitize_callback' => 'hunger_separator_sanitize' )
    );

    $wp_customize->add_control(
        'hunger_motionbar_separator_fa', array(
            'settings' => 'hunger_motionbar_separator_fa',
            'section'  => 'hunger_motionbar_section',
            'label'    => __( 'Select A Separator Icon', 'hunger' ),
            'description' => __('Default: Star', 'hunger'),
            'type'     => 'select',
            'choices' => array(
                'star' => __('Default','hunger'),
                'circle' => __('Disc', 'hunger'),
                'bookmark' => __('Bookmark', 'hunger'),
                'newspaper-o' => __('Newspaper', 'hunger'),
            ),
            'active_callback' => 'hunger_show_motionbar_options',
        )
    );

    function hunger_separator_sanitize($input) {
        if( in_array($input, array('star', 'circle','bookmark', 'newspaper-o')))
            return $input;
        else
            return '';
    }

    /* Active Callback Function */
    function hunger_show_motionbar_options($control) {

        $option = $control->manager->get_setting('hunger_motionbar_enable');
        return $option->value() == true ;

    }
}
add_action('customize_register', 'hunger_customize_register_motion_bar');