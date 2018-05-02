<nav id="site-navigation" class="mega-navigation" role="navigation">
    <div class="container">
        <?php
        if (has_nav_menu(  'primary' ) && !get_theme_mod('hunger_disable_nav_desc', true) ) :
            $walker = new Hunger_Menu_With_Description;
        elseif( !has_nav_menu(  'primary' ) ):
            $walker = '';
        else :
            $walker = new Hunger_Menu_With_Icon;
        endif;
        wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) );  ?>

        <div class="cat-menu col-md-6">
                <div class="site-branding">
                    <?php if ( hunger_has_logo() ) : ?>
                        <div id="site-logo">
                            <?php hunger_logo(); ?>
                        </div>
                    <?php else: ?>
                    <div id="text-title-desc">
                        <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                    <?php endif; ?>
                </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</nav><!-- #site-navigation -->