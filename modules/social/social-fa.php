<?php
/*
** Template to Render Social Icons on Top Bar
*/

for ($i = 1; $i < 8; $i++) : 
	$social = esc_html(get_theme_mod('hunger_social_'.$i));
	if ( ($social != 'none') && ($social != '') ) : ?>

                <a class="common" href="<?php echo esc_url( get_theme_mod('hunger_social_url'.$i) ); ?>">
                    <i class="fab fa-fw fa-<?php echo $social; ?>"></i>
                </a>

	<?php endif;

endfor; ?>