<?php
function hunger_customize_register_showcase($wp_customize) {
    /*---- Showcase Area Settings ----*/

    $wp_customize->add_panel(
        'hunger-showcase',
        array(
            'priority'       => 30,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Custom Showcase', 'hunger'),
        )
    );

    $wp_customize-> add_section(
        'hunger-showcase-enable',
        array(
            'title'			=> __('Enable/Disable','hunger'),
            'priority'		=> 1,
            'panel'			=> 'hunger-showcase',
        )
    );

    $wp_customize->add_setting(
        'hunger-showcase-blog',
        array(
            'default' => false,
            'sanitize_callback'	=> 'hunger_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'hunger-showcase-blog',
        array(
            'type' => 'checkbox',
            'label' => __('Enable Showcase Area on the Blog Page','hunger'),
            'section' => 'hunger-showcase-enable',
        )
    );

    $wp_customize->add_setting(
        'hunger-showcase-title',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'hunger_sanitize_text'
        )
    );

    $wp_customize->add_control(
        'hunger-showcase-title',
        array(
            'type'	=> 'text',
            'label'	=> __('Title for the Showcase Area', 'hunger'),
            'section'	=> 'hunger-showcase-enable',
            'active_callback'	=> 'hunger_fa_enable'
        )
    );

    for ( $i = 1 ; $i <= 4 ; $i++ ) :
    $wp_customize->add_section(
        'hunger-showcase'.$i,
        array(
            'title'		=> __('Showcase Item ','hunger').$i,
            'priority'	=> $i,
            'panel'		=> 'hunger-showcase',
            'active_callback'	=> 'hunger_fa_enable'
        )
    );

    $wp_customize->add_setting(
        'hunger-s-img'.$i, array(
            'sanitize_callback'	=> 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'hunger-s-img'.$i,
            array(
                'label' => __('Image Upload ','hunger'),
                'section' => 'hunger-showcase'.$i,
                'settings' => 'hunger-s-img'.$i,
            )
        )
    );

    $wp_customize-> add_setting(
        'hunger-s-title'.$i, array(
            'sanitize_callback'	=> 'hunger_sanitize_text',
        )
    );

    $wp_customize-> add_control(
        'hunger-s-title'.$i, array(
            'label'		=> __('Description','hunger'),
            'section'	=> 'hunger-showcase'.$i,
            'type'		=> 'text',
        )
    );

    $wp_customize-> add_setting(
        'hunger-s-desc'.$i, array(
            'sanitize_callback'	=> 'hunger_sanitize_text',
        )
    );

    $wp_customize-> add_control(
        'hunger-s-desc'.$i, array(
            'label'		=> __('Description','hunger'),
            'section'	=> 'hunger-showcase'.$i,
            'type'		=> 'text',
        )
    );

    $wp_customize-> add_setting(
        'hunger-s-url'.$i, array(
            'sanitize_callback'	=> 'esc_url_raw',
        )
    );

    $wp_customize-> add_control(
        'hunger-s-url'.$i, array(
            'label'		=> __('URL','hunger'),
            'section'	=> 'hunger-showcase'.$i,
            'type'		=> 'text',
        )
    );

    endfor;

    function hunger_fa_enable() {
        if ( get_theme_mod( 'hunger-showcase-blog', false ) ) {
            return true;
        } else {
            return false;
        }
    }

    $wp_customize->add_setting(
        'hunger-sbg-img', array(
            'sanitize_callback'	=> 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'hunger-sbg-img',
            array(
                'label' => __('Image Upload ','hunger'),
                'section' => 'hunger-showcase-enable',
                'settings' => 'hunger-sbg-img',
            )
        )
    );
}
add_action('customize_register', 'hunger_customize_register_showcase');