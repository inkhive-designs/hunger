<?php
/*
 * @package hunger, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/logo_compatibility.php';
require get_template_directory() . '/framework/admin_modules/nav_walkers.php';
require get_template_directory() . '/framework/admin_modules/pagination.php';
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';

/*
** Function to check if Sidebar is enabled on Current Page 
*/

function hunger_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('hunger_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('hunger_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('hunger_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function hunger_primary_class() {
	$sw = esc_html(get_theme_mod('hunger_sidebar_width',4));
	$class = "col-md-".(12-$sw);
	
	if ( !hunger_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('hunger_primary-width', 'hunger_primary_class');

function hunger_secondary_class() {
	$sw = esc_html(get_theme_mod('hunger_sidebar_width',4));
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('hunger_secondary-width', 'hunger_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function hunger_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function hunger_fade($color, $val) {
	return "rgba(".hunger_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function hunger_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('hunger_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('hunger_blog_layout') );
	else :
		get_template_part( $ldir ,'hunger');	
	endif;	
}
add_action('hunger_blog_layout', 'hunger_get_blog_layout');


/*
** Function to load Posts Category by ajax
*/
function hunger_ajax_filter_posts_scripts() {
    wp_localize_script( 'hunger-custom-js', 'afp_vars', array(
            'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
            'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
        )
    );
}
add_action('wp_enqueue_scripts', 'hunger_ajax_filter_posts_scripts', 100);

// Script for getting posts
function hunger_ajax_filter_get_posts( $taxonomy ) {

    // Verify nonce
    if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
        die('Permission denied');

    $taxonomy = $_POST['taxonomy'];

    // WP Query
    $args = array(
        'category_name' => $taxonomy,
        'post_type' => 'post',
        'posts_per_page' => 4,
    );
    //echo $taxonomy;
    // If taxonomy is not set, remove key from array and get all posts
    if( !$taxonomy ) {
        unset( $args['tag'] );
    }

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :  $query->the_post(); ?>

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
    <?php else: ?>
        <h2>No posts found</h2>
    <?php endif;

    die();
}

add_action('wp_ajax_filter_posts', 'hunger_ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'hunger_ajax_filter_get_posts');

//Function to get slug from cat id
function get_cat_slug($cat_id) {
    $cat_id = (int) $cat_id;
    $category = get_category($cat_id);
    return $category->slug;
}
