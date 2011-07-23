<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */
?>

	<div class="content-wrap">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    	<?php if(has_post_thumbnail()) { ?>
    	<div class="post-thumbnail">
    		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'foghorn'); ?> <?php the_title_attribute(); ?>"><?php the_post_thumbnail('multiple-thumb'); ?></a>
        </div>
        <?php } ?>
        
        
        <div<?php if(has_post_thumbnail()) { ?> class="post-wrap"<?php } ?>>
		<header class="entry-header">
        	<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'foghorn' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'foghorn' ); ?></h3>
				</hgroup>
			<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'foghorn' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foghorn' ) ); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if categories ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'twentyeleven' ), __( '<b>%</b> Replies', 'twentyeleven' ) ); ?></span>
			<?php endif; // End if comments_open() ?>

			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
        </div>
	</article><!-- #post-<?php the_ID(); ?> -->
    </div>