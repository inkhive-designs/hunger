<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hunger
 */

?>

	</div><!-- #content -->

    <?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer">
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="site-info container">
                <?php printf( __( 'Powered by %1$s.', 'hunger' ), '<a href="'.esc_url("https://inkhive.com/product/hunger/").'" rel="nofollow">Hunger Theme</a>' ); ?>
                <span class="sep"></span>
                <?php echo ( esc_html(get_theme_mod('hunger_footer_text')) == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','hunger')) : esc_html( get_theme_mod('hunger_footer_text') ); ?>
            </div><!-- .site-info -->
        </footer><!-- #colophon -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
