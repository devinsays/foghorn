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

					<nav id="nav-single">
						<h1 class="section-heading"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h1>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '&larr; Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next &rarr;', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php twentyeleven_content_nav( 'nav-below' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
            
            <aside id="entry-meta" role="complementary">
                <p><?php
                    printf( __( '<span class="sep">Posted on </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'twentyeleven' ),
                        get_permalink(),
                        get_the_date( 'c' ),
                        get_the_date(),
                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        sprintf( esc_attr__( 'View all posts by %s', 'twentyeleven' ), get_the_author() ),
                        get_the_author()
                    );
                ?></p>
                <p>More on that in a minute.</p>
                <p><?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
            </aside> <!-- #entry-meta -->
        
		</div><!-- #primary -->
        
<?php get_sidebar(); ?>
<?php get_footer(); ?>