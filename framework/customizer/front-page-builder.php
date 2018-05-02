<?php
function hunger_customize_register_front_page($wp_customize) {
    //HERO 1
$wp_customize->add_section('hunger_hero1_section',
    array(
        'title' => __('HERO', 'hunger'),
        'priority' => 20,
    )
);

    $wp_customize->add_setting('hunger_hero_enable',
        array(
            'sanitize_callback' => 'hunger_sanitize_checkbox'
        ));
    $wp_customize->add_control('hunger_hero_enable',
        array(
            'setting' => 'hunger_hero_enable',
            'section' => 'hunger_hero1_section',
            'label' => __('Enable HERO', 'hunger'),
            'type' => 'checkbox',
            'default' => false,
        )
    );

    $wp_customize->add_setting('hunger_hero_background_image',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'hunger_hero_background_image',
            array (
                'setting' => 'hunger_hero_background_image',
                'section' => 'hunger_hero1_section',
                'label' => __('Background Image', 'hunger'),
                'description' => __('Upload an image to display in background of HERO', 'hunger'),
                'active_callback' => 'hunger_hero_active_callback'
            )
        )
    );

    $wp_customize->add_setting('hunger_hero1_selectpage',
        array(
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('hunger_hero1_selectpage',
        array(
            'setting' => 'hunger_hero1_selectpage',
            'section' => 'hunger_hero1_section',
            'label' => __('Title', 'hunger'),
            'description' => __('Select a Page to display Title', 'hunger'),
            'type' => 'dropdown-pages',
            'active_callback' => 'hunger_hero_active_callback'
        )
    );


    $wp_customize->add_setting('hunger_hero1_full_content',
        array(
            'sanitize_callback' => 'hunger_sanitize_checkbox'
        )
    );

    $wp_customize->add_control('hunger_hero1_full_content',
        array(
            'setting' => 'hunger_hero1_full_content',
            'section' => 'hunger_hero1_section',
            'label' => __('Show Full Content insted of excerpt', 'hunger'),
            'type' => 'checkbox',
            'default' => false,
            'active_callback' => 'hunger_hero_active_callback'
        )
    );

    $wp_customize->add_setting('hunger_hero1_button',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('hunger_hero1_button',
        array(
            'setting' => 'hunger_hero1_button',
            'section' => 'hunger_hero1_section',
            'label' => __('Button Name', 'hunger'),
            'description' => __('Leave blank to disable Button.', 'hunger'),
            'type' => 'text',
            'active_callback' => 'hunger_hero_active_callback'
        )
    );

    function hunger_hero_active_callback( $control ) {
        $option = $control->manager->get_setting('hunger_hero_enable');
        return $option->value() == true;
    }

}
add_action('customize_register', 'hunger_customize_register_front_page');