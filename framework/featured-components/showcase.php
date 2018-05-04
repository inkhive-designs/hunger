<?php if ( is_front_page() && get_theme_mod('hunger-showcase-blog') ) : ?>

    <div class="section-title title-font">
        <?php echo get_theme_mod('hunger-showcase-title', ''); ?>
    </div>

    <div id="showcase-wrapper">
        <div class="container">
            <?php for($i = 1; $i <= 4 ; $i++ ) :
                $simg	=	get_theme_mod('hunger-s-img'.$i);
                $stitle 	=	get_theme_mod('hunger-s-title'.$i);
                $sdesc 	=	get_theme_mod('hunger-s-desc'.$i);
                $surl	=	get_theme_mod('hunger-s-url'.$i);
                ?>

                <div class="showcase-box col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <?php if ( $simg  ) : ?>
                        <a href = "<?php echo $surl; ?>">
                            <div class="showcase-image"><img src="<?php echo $simg; ?>"></div>
                            <div class="showcase-title"><?php echo $stitle; ?></div>
                            <div class="showcase-desc"><?php echo $sdesc; ?></div>
                        </a>
                    <?php endif; ?>
                </div>

            <?php endfor; ?>
        </div>
    </div>

<?php endif; ?>
