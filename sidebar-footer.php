<?php
/*
 * The Footer Widget Area
 * @package hunger
 */
 ?>
 </div><!--.mega-container-->

<?php get_template_part('framework/featured-components/showcase'); ?>

 <?php if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') ) : ?>
	 <div id="footer-sidebar" class="widget-area">

         <div class="foot-logo col-md-12">
             <div id="social-icons">
                 <?php get_template_part('modules/social/social', 'fa'); ?>
             </div>
         </div>

	 	<div class="foot-col container">
            <div class="footer-column col-md-3 col-sm-3">
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
		 	<?php 
				if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="footer-column col-md-3 col-sm-3">
						<?php dynamic_sidebar( 'footer-1'); ?> 
					</div> 
				<?php endif;
					
				if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="footer-column col-md-3 col-sm-3">
						<?php dynamic_sidebar( 'footer-2'); ?> 
					</div> 
				<?php endif;
		
				if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="footer-column col-md-3 col-sm-3"> <?php
						dynamic_sidebar( 'footer-3'); ?> 
					</div>
				<?php endif; ?>
				
				
	 	</div>
	 </div>	<!--#footer-sidebar-->	
<?php endif; ?>