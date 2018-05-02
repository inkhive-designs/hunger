<header id="masthead" class="site-header">

    <div class="container">
        <div class="site-branding">
            <?php if ( hunger_has_logo() ) : ?>
                <div id="site-logo">
                    <?php hunger_logo(); ?>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>

        <div class="btn">
            <button class="megamenu-toggle"><i class="fas fa-th-list"></i><?php _e( 'Categories', 'hunger' ); ?></button>
        </div>
        <?php get_template_part('modules/navigation/short', 'navigation'); ?>
    </div>

</header><!-- #masthead -->