<?php
function hunger_customize_register_social_icons($wp_customize){
    // Social Icons
    $wp_customize->add_section('hunger_social_section', array(
        'title' => __('Social Icons','hunger'),
        'priority' => 44,
        'panel' => 'hunger_header_panel'
    ));

    $social_icon_styles = array(
        'default' => __('Default', 'hunger'),
        'style1' => __('Style 1', 'hunger'),
        'style2' => __('Style 2', 'hunger'),
    );

    $wp_customize->add_setting('hunger_social_icon_style', array(
        'default' => 'default',
        'sanitize_callback' => 'hunger_sanitize_social_style'
    ) );

    function hunger_sanitize_social_style($input) {
        $social_icon_styles = array(
            'default',
            'style1',
            'style2',
        );
        if ( in_array($input, $social_icon_styles))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control('hunger_social_icon_style', array(
            'setting' => 'hunger_social_icon_style',
            'section' => 'hunger_social_section',
            'label' => __('Social Icon Effects', 'hunger'),
            'type' => 'select',
            'choices' => $social_icon_styles,
        )
    );

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','hunger'),
        'facebook' => __('Facebook','hunger'),
        'twitter' => __('Twitter','hunger'),
        'google-plus' => __('Google Plus','hunger'),
        'instagram' => __('Instagram','hunger'),
        'rss' => __('RSS Feeds','hunger'),
        'vine' => __('Vine','hunger'),
        'vimeo-square' => __('Vimeo','hunger'),
        'youtube' => __('Youtube','hunger'),
        'flickr' => __('Flickr','hunger'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'hunger_social_'.$x, array(
            'sanitize_callback' => 'hunger_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'hunger_social_'.$x, array(
            'settings' => 'hunger_social_'.$x,
            'label' => __('Icon ','hunger').$x,
            'section' => 'hunger_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'hunger_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'hunger_social_url'.$x, array(
            'settings' => 'hunger_social_url'.$x,
            'description' => __('Icon ','hunger').$x.__(' Url','hunger'),
            'section' => 'hunger_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function hunger_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'hunger_customize_register_social_icons');