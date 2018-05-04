<?php
function hunger_customize_register_design_layouts( $wp_customize ){
    // Layout and Design
    $wp_customize->get_section('background_image')->panel = 'hunger_design_panel';
    $wp_customize->add_panel( 'hunger_design_layouts_panel', array(
        'priority'       => 40,
        'title'          => __('Design & Layout','hunger'),
    ) );

    $wp_customize->add_section(
        'hunger_design_options',
        array(
            'title'     => __('Blog Layout','hunger'),
            'priority'  => 0,
            'panel'     => 'hunger_design_layouts_panel'
        )
    );


    $wp_customize->add_setting(
        'hunger_blog_layout',
        array(
            'default'   => 'hunger',
            'sanitize_callback' => 'hunger_sanitize_blog_layout' )
    );

    function hunger_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','grid_3_column','hunger') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'hunger_blog_layout',array(
            'label' => __('Select Layout','hunger'),
            'settings' => 'hunger_blog_layout',
            'section'  => 'hunger_design_options',
            'type' => 'select',
            'choices' => array(
                'hunger' => __('Hunger Theme Layout','hunger'),
                'grid' => __('Basic Blog Layout','hunger'),
                'grid_2_column' => __('Grid - 2 Column','hunger'),
                'grid_3_column' => __('Grid - 3 Column','hunger'),

            )
        )
    );

    $wp_customize->add_section(
        'hunger_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','hunger'),
            'priority'  => 0,
            'panel'     => 'hunger_design_layouts_panel'
        )
    );

    $wp_customize->add_setting(
        'hunger_disable_sidebar',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_disable_sidebar', array(
            'settings' => 'hunger_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','hunger' ),
            'section'  => 'hunger_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'hunger_disable_sidebar_home',
        array(
            'default' => true,
            'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_disable_sidebar_home', array(
            'settings' => 'hunger_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','hunger' ),
            'section'  => 'hunger_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'hunger_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'hunger_disable_sidebar_front',
        array( 'sanitize_callback' => 'hunger_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'hunger_disable_sidebar_front', array(
            'settings' => 'hunger_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','hunger' ),
            'section'  => 'hunger_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'hunger_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'hunger_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'hunger_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'hunger_sidebar_width', array(
            'settings' => 'hunger_sidebar_width',
            'label'    => __( 'Sidebar Width','hunger' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','hunger'),
            'section'  => 'hunger_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'hunger_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function hunger_show_sidebar_options($control) {

        $option = $control->manager->get_setting('hunger_disable_sidebar');
        return $option->value() == false ;

    }

    $wp_customize-> add_section(
        'hunger_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','hunger'),
            'description'	=> __('Enter your Own Copyright Text.','hunger'),
            'priority'		=> 11,
            'panel'			=> 'hunger_design_layouts_panel'
        )
    );

    $wp_customize->add_setting(
        'hunger_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'hunger_footer_text',
        array(
            'section' => 'hunger_custom_footer',
            'settings' => 'hunger_footer_text',
            'type' => 'text'
        )
    );
}
add_action('customize_register', 'hunger_customize_register_design_layouts');