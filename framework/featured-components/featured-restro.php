<?php if(get_theme_mod('hunger_eta_fcenable')): ?>
    <div id="featured-restro" class="container">

        <div class="featured-restro-sec col-md-4 col-sm-4 col-xs-12">
            <?php if (get_theme_mod('hunger_featcat_title')) : ?>
                <div class="section-title title-font">
                    <?php echo esc_html( get_theme_mod('hunger_featcat_title' ) ) ?>
                </div>
            <?php endif; ?>
        </div>

        <?php
        $categories = array();
        for($x=1; $x<=6; $x++):
            array_push($categories, get_cat_name(get_theme_mod('hunger_featposts_category_'.$x)));
        endfor;
        ?>

        <div class="item col-md-8 col-sm-8 col-xs-12">
            <div class="item-container">
                <ul class="nav nav-tabs">
                    <?php for( $i=0; $i<=count($categories) - 1; $i++ ) : ?>
                        <li id="click<?php echo $i; ?>" class="<?php echo $categories[$i]; ?> "><a data-toggle="tab" href="#menu<?php echo $i; ?>"><?php echo $categories[$i]; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>

        <div class="featured-thumb col-md-12">
            <div class="tab-content">
                <?php for($z=0; $z<=5; $z++): ?>
                <div id="menu<?php echo $z; ?>" class="tab-pane fade">
                    <?php
                    $args=array(
                        'posts_per_page' => 4,
                    );
                    $the_query = new WP_Query($args);
                    while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        get_template_part('framework/layouts/content', 'restro');
                        ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"></a>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <?php endfor; ?>
            </div>
        </div>

    </div>
<?php endif; ?>