<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Foghorn
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
           
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'index' ); ?>

				<?php endwhile; ?>

				<?php foghorn_content_nav( 'nav-below' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->
        
<?php if ( of_get_option('layout','layout-2cr') != 'layout-1c') {
	get_sidebar();
} ?>
<?php get_footer(); ?>