<?php
/*
 * Pagination Function. Implements core paginate_links function.
 */
function hunger_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div>';
        echo '<span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span>';
        foreach ( $page_format as $page ) {
            echo $page;
        }
        echo '</div></div>';
    }
}
