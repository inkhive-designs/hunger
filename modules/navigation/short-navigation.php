<nav id="short-navigation" class="main-navigation" role="navigation">
        <?php
        if (has_nav_menu(  'short' ) && !get_theme_mod('hunger_disable_nav_desc', true) ) :
            $walker = new Hunger_Menu_With_Description;
        elseif( !has_nav_menu(  'short' ) ):
            $walker = '';
        else :
            $walker = new Hunger_Menu_With_Icon;
        endif;
        wp_nav_menu( array( 'theme_location' => 'short', 'walker' => $walker ) );  ?>
</nav><!-- #site-navigation -->