<?php if(get_theme_mod('hunger_eta_fcenable')): ?>
    <div id="featured-cat" class="container">
        <div class="cat-top">

            <div class="featured-cat-sec col-md-4 col-sm-4 col-xs-12">
                <?php if (get_theme_mod('hunger_featcat_title')) : ?>
                    <div class="section-title title-font">
                        <?php echo esc_html( get_theme_mod('hunger_featcat_title' ) ) ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
            );

            $query = new WP_Query( $args );

            $cname = array();
            $cslug = array();
            for($x=1; $x<=6; $x++):
                array_push($cname, get_cat_name(get_theme_mod('hunger_featposts_category_'.$x)));

                array_push($cslug, get_cat_slug(get_theme_mod('hunger_featposts_category_'.$x)));
            endfor;

            $count = count( $cname );
            ?>

            <div class="item col-md-8 col-sm-8 col-xs-12">
                    <?php
                    if ( $count > 0 ): ?>
                        <div class="post-cats">
                            <?php
                            for($x=0; $x<=$count - 1; $x++):
                                echo '<a href="" class="cat-filter" title="' . $cslug[$x] . '">' . $cname[$x] . '</a> ';
                            endfor; ?>
                        </div>
                    <?php endif;  ?>
            </div>
        </div>


        <div class="featured-thumb col-md-12">
                <?php
                if ( $query->have_posts() ): ?>
                    <div class="categorized-posts">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                            <div class="feat-thumb col-md-3 col-sm-6 col-xs-12">
                                <?php if(has_post_thumbnail()):
                                    the_post_thumbnail('hunger-cat-thumb');
                                else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder2.jpg" />
                                <?php endif; ?>
                                <div class="out-thumb">

                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php echo substr(get_the_excerpt(), 0, 170)."..."; ?>

                                </div>
                            </div>


                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="categorized-posts">
                        <h2>No posts found</h2>
                    </div>
                <?php endif; ?>
        </div>

    </div>
<?php endif; ?>


