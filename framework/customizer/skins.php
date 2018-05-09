<?php
function hunger_customize_register_skin($wp_customize){
    $wp_customize->get_section('colors')->title = __('Theme Skin & Colors','hunger');
    $wp_customize->get_section('colors')->panel = 'hunger_design_panel';
    $wp_customize->get_control('header_textcolor')->label = __('Site Title Color','hunger');

    $wp_customize->add_setting('hunger_header_desccolor', array(
        'default'     => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'hunger_header_desccolor', array(
            'label' => __('Site Tagline Color','hunger'),
            'section' => 'colors',
            'settings' => 'hunger_header_desccolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting(
        'hunger_skin',
        array(
            'default'=> 'default',
            'sanitize_callback' => 'hunger_sanitize_skin'
        )
    );

    $skins = array( 'default' => __('Default(Hunger)','hunger'),
        'green' => __('Green','hunger'),
        'brown' => __('Brown', 'hunger'),
        'yellow' => __('Yellow', 'hunger'),
    );

    $wp_customize->add_control(
        'hunger_skin',array(
            'settings' => 'hunger_skin',
            'section'  => 'colors',
            'label' => __('Choose Skin','hunger'),
            'description' => __('Free Version of hunger Supports 3 Different Skin Colors.','hunger'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function hunger_sanitize_skin( $input ) {
        if ( in_array($input, array('default', 'green', 'brown', 'yellow') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'hunger_customize_register_skin');