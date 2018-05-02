<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package hunger
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}

if ( hunger_load_sidebar() ) : ?>
    <div id="secondary" class="widget-area <?php do_action('hunger_secondary-width') ?>" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
<?php endif; ?>
