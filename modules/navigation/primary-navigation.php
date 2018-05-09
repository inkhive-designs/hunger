<nav id="site-navigation" class="mega-navigation" role="navigation">
    <div class="container">
        <div class="mega-item col-md-4 col-sm-4">
            <?php
            if (has_nav_menu(  'primary' ) && !get_theme_mod('hunger_disable_nav_desc', true) ) :
                $walker = new Hunger_Menu_With_Description;
            elseif( !has_nav_menu(  'primary' ) ):
                $walker = '';
            else :
                $walker = new Hunger_Menu_With_Icon;
            endif;
            wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) );  ?>
        </div>

        <div class="cat-menu col-md-8 col-sm-8">
            <div class="menu-category col-md-8 col-sm-8">
                <?php
                $catname = get_categories();
                $newCatname = array_slice($catname, 0, 6);
                ?>
                <?php foreach($newCatname as $cat): ?>
                    <div class="item col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"></a>
                            <?php
                                $args=array(
                                    'cat' => $cat->cat_ID,
                                    'orderby' => 'post_date',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 1,
                                );
                                $the_query = new WP_Query ( $args );
                                if($the_query->have_posts()) :
                                    while ($the_query -> have_posts()) :
                                        $the_query -> the_post(); ?>

                                        <div class="featured-thumb">
                                            <div class="layer"></div>
                                            <?php if(has_post_thumbnail()): ?>
                                            <a href="<?php echo esc_url( get_category_link($cat->cat_ID) ); ?>"><?php the_post_thumbnail();?></a>
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder2.jpg" />
                                            <?php endif; ?>
                                            <h3><a href="<?php echo esc_url( get_category_link($cat->cat_ID) ); ?>"><?php echo $cat->name; ?></a></h3>
                                        </div>

                                    <?php endwhile;
                                endif;
                                /* Restore original Post Data */
                                wp_reset_postdata(); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="menu-logo col-md-4 col-sm-4">
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
        </div>
    </div>
</nav><!-- #site-navigation -->