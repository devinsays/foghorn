<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
            
			<div id="content" role="main">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                
					<?php get_template_part( 'content', 'single' ); ?>

					<?php twentyeleven_content_nav( 'nav-below' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
                
			</div><!-- #content -->
		</div><!-- #primary -->
        
<?php if ( of_get_option('singular_layout','one-column') != 'one-column' ) { get_sidebar(); } ?>
<?php get_footer(); ?>