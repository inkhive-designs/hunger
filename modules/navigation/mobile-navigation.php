<a href="#menu" class="menu-link"> &#9776;</a>
<nav id="menu" class="panel" role="navigation">
    <div class="mobile-menu-logo col-md-4">
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
        <div id="social-icons">
            <?php get_template_part('modules/social/social', 'fa'); ?>
        </div>
    </div>
    <?php
    // Get the Appropriate Walker First.
    wp_nav_menu( array( 'theme_location' => 'mobile') ); ?>
</nav><!-- #site-navigation -->