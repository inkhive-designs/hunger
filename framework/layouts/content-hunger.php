<?php
/**
 * @package Hunger
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid grid_2_column hunger col-md-6 col-sm-6 col-xs-12'); ?>>


    <div class="featured-thumb col-md-12 col-sm-12">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('hunger-pop-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->

    <div class="out-thumb col-md-12 col-sm-12">

        <div class="postedon col-md-3">
            <div class="date"><?php echo get_the_time( 'j' ); ?></div>
            <div class="month"><?php echo get_the_time( 'F' ); ?></div>
        </div>

        <div class="entry-content col-md-9">
            <header class="entry-header">
                <h1 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </header><!-- .entry-header -->
            <span class="entry-excerpt">
                <?php echo substr(get_the_excerpt(), 0, 170)."..."; ?>
            </span>
            <a class="readmore" href="<?php the_permalink() ?>"><?php _e('Read More','hunger'); ?></a></>
        </div>

    </div>

		
</article><!-- #post-## -->