<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hunger
 */

get_header();
?>

	<div id="primary" class="content-area col-md-12 col-sm-12 col-xs-12">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
                    <h2><i class="fas fa-exclamation-triangle"></i><?php esc_html_e('404', 'hunger'); ?></h2>
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hunger' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>
                        <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hunger' ); ?>
                    </p>

				</div><!-- .page-content -->

                <div class="search">
                    <?php
                    get_search_form();
                    ?>
                </div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

    <div id="secondary" class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php
            the_widget( 'WP_Widget_Recent_Posts' );
            ?>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="widget widget_categories">
                <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'hunger' ); ?></h2>
                <ul>
                    <?php
                    wp_list_categories( array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                    ) );
                    ?>
                </ul>
            </div><!-- .widget -->
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php
            /* translators: %1$s: smiley */
            $hunger_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'hunger' ), convert_smilies( ':)' ) ) . '</p>';
            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$hunger_archive_content" );
            ?>
        </div>
    </div>

<?php
get_footer();
