<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'foghorn' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<h2 class="entry-format"><?php _e( 'Featured', 'foghorn' ); ?></h2>
				</hgroup>
			<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'foghorn' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>
			
			<?php if ( 'post' == $post->post_type && is_singular() ) : ?>
			<div class="entry-meta">
				<?php
					printf( __( '<span class="sep">Posted </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'foghorn' ),
						get_permalink(),
						get_the_date( 'c' ),
						get_the_date(),
						get_author_posts_url( get_the_author_meta( 'ID' ) ),
						sprintf( esc_attr__( 'View all posts by %s', 'foghorn' ), get_the_author() ),
						get_the_author()
					);
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
            
		</header><!-- .entry-header -->

		<?php if ( is_search() || is_home() || !is_singular() ) : // Display Excerpts When There Are Multiple Posts ?>
		<div class="entry-summary">
        	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'foghorn'); ?> <?php the_title_attribute(); ?>" class="thumbnail"><?php the_post_thumbnail('multiple-thumb'); ?></a>
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foghorn' ) ); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foghorn' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( '<span>Pages:</span>', 'foghorn' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php if ( 'post' == $post->post_type ) : // Hide category and tag text for pages on Search ?>
			<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in', 'foghorn' ); ?></span> <?php the_category( ', ' ); ?></span>
			<?php endif; ?>

			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( __( '<span class="leave-reply">Leave a reply</span>', 'foghorn' ), __( '<b>1</b> Reply', 'foghorn' ), __( '<b>%</b> Replies', 'foghorn' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'foghorn' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
