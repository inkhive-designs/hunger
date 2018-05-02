<?php if(get_theme_mod('hunger_eta_fcenable')): ?>
    <div id="featured-cat" class="container">

        <div class="featured-cat-sec col-md-4 col-sm-4 col-xs-12">
            <?php if (get_theme_mod('hunger_featcat_title')) : ?>
                <div class="section-title title-font">
                    <?php echo esc_html( get_theme_mod('hunger_featcat_title' ) ) ?>
                </div>
            <?php endif; ?>
        </div>

        <?php $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
        );

        $query = new WP_Query( $args );

        $categories = array();
        for($x=1; $x<=6; $x++):
           array_push($categories, get_cat_name(get_theme_mod('hunger_featposts_category_'.$x)));
        endfor;

        $terms = get_terms( $categories );
        var_dump($terms);
        $count = count( $terms );
        ?>

        <div class="item col-md-8 col-sm-8 col-xs-12">
                <?php
                if ( $count > 0 ): ?>
                    <div class="post-cats">
                        <?php
                        foreach ( $terms as $term ) {
                            $term_link = get_term_link( $term );
                            echo '<a href="' . $term_link . '" class="cat-filter" title="' . $term->slug . '">' . $term->name . '</a> ';
                        } ?>
                    </div>
                <?php endif;  ?>
        </div>

        <div class="featured-thumb col-md-12">
            <div class="tab-content">
                <?php
                if ( $query->have_posts() ): ?>
                    <div class="categorized-posts">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>

                        <?php endwhile; ?>
                    </div>

                <?php else: ?>
                    <div class="categorized-posts">
                        <h2>No posts found</h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php endif; ?>


