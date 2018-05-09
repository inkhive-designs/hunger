<?php
function hunger_customize_register_googlefonts($wp_customize){
    $wp_customize->add_section(
        'hunger_typo_options',
        array(
            'title'     => __('Google Web Fonts','hunger'),
            'priority'  => 41,
            'panel' => 'hunger_design_panel'
        )
    );

    $font_array = array('Nunito','Hind','Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'hunger_title_font',
        array(
            'default'=> 'Nunito',
            'sanitize_callback' => 'hunger_sanitize_gfont'
        )
    );

    function hunger_sanitize_gfont( $input ) {
        if ( in_array($input, array('Nunito','Hind','Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'hunger_title_font',array(
            'label' => __('Title','hunger'),
            'settings' => 'hunger_title_font',
            'section'  => 'hunger_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'hunger_body_font',
        array(	'default'=> 'Khula',
            'sanitize_callback' => 'hunger_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'hunger_body_font',array(
            'label' => __('Body','hunger'),
            'settings' => 'hunger_body_font',
            'section'  => 'hunger_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'hunger_customize_register_googlefonts');