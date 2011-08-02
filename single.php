<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */

get_header(); ?>

		<div id="primary">
            
			<div id="content" role="main">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                
                	<div class="content-wrap clearfix">
						<?php get_template_part( 'content', 'single' ); ?>
                    </div>

					<?php foghorn_content_nav( 'nav-below' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
                
			</div><!-- #content -->
		</div><!-- #primary -->

<?php if ( of_get_option('layout','layout-2cr') != 'layout-1c') {
	get_sidebar();
} ?>
<?php get_footer(); ?>