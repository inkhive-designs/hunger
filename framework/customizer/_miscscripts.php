<?php
function hunger_customize_register_miscscripts($wp_customize){
    $wp_customize->add_section(
        'hunger_sec_pro',
        array(
            'title'     => __('Important Links','hunger'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'hunger_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Hunger_WP_Customize_Upgrade_Control(
            $wp_customize,
            'hunger_pro',
            array(
                'description'	=> '<a class="hunger-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'hunger').'</a>
                                    <a class="hunger-important-links" href="https://inkhive.com/documentation/hunger" target="_blank">'.__('Hunger Documentation', 'hunger').'</a>
                                    <a class="hunger-important-links" href="https://demo.inkhive.com/hunger-plus/" target="_blank">'.__('Hunger Plus Live Demo', 'hunger').'</a>
                                    <a class="hunger-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'hunger').'</a>
                                    <a class="hunger-important-links" href="https://wordpress.org/support/theme/hunger/reviews" target="_blank">'.__('Review Hunger on WordPress', 'hunger').'</a>',
                'section' => 'hunger_sec_pro',
                'settings' => 'hunger_pro',
            )
        )
    );
}
add_action('customize_register', 'hunger_customize_register_miscscripts');