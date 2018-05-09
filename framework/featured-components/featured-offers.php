<?php
//Carousel
?>
<?php if (get_theme_mod('hunger_eta_enable') ): ?>
    <?php if (get_theme_mod('hunger_eta_title')) : ?>
        <div class="section-title title-font">
            <?php echo esc_html( get_theme_mod('hunger_eta_title' ) ) ?>
        </div>
    <?php endif; ?>
    <div id="featured-offers" class="featured-section-area">
        <div class="delta-container container">

            <div class="owl-carousel owl-theme">
                <?php
                $count = 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 12,
                    'cat'  => esc_html( get_theme_mod('hunger_eta_cat',0) ),
                    'ignore_sticky_posts' => 1,
                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) :
                    $loop->the_post();
                    ?>
                    <div class="fg-item-container">
                        <div class="fg-item">
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                                <div class="featured-thumb">
                                    <?php if(has_post_thumbnail()):
                                        the_post_thumbnail('offer-thumb');
                                    else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder2.jpg" />
                                    <?php endif; ?>
                                </div>

                            </a>
                        </div>
                    </div>
                    <?php
                    $count++;
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>