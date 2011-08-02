<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
            
            	<?php the_post(); ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'foghorn' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>
				</header>
                
                <?php rewind_posts(); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'index' ); ?>

				<?php endwhile; ?>

				<?php foghorn_content_nav( 'nav-below' ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php if ( of_get_option('layout','layout-2cr') != 'layout-1c') {
	get_sidebar();
} ?>
<?php get_footer(); ?>