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
    
    	<?php if( has_post_thumbnail() ) { ?>
    	<div class="post-thumbnail">
    		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'foghorn'); ?> <?php the_title_attribute(); ?>"><?php the_post_thumbnail('multiple-thumb'); ?></a>
            <?php if ( is_sticky() ) { ?>
				<span class="entry-format"><?php _e( 'Featured', 'foghorn' ); ?></span>
			<?php } ?>
        </div>
        <?php } ?>
        
        
        <div<?php if( has_post_thumbnail() ) { ?> class="post-wrap"<?php } ?>>
		<header class="entry-header">
        	<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'foghorn' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="entry-meta">
				<?php
				printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'foghorn' ),
                    esc_url( get_permalink() ),
                    esc_attr( get_the_time() ),
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date() )
                );
                ?>
            </div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foghorn' ) ); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'foghorn' ) );
				if ( $categories_list ):
			?>
			<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'foghorn' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
			$show_sep = true; ?>
			<?php endif; // End if categories ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="leave-reply"><?php comments_popup_link( __( '<span class="reply">Reply</span>', 'foghorn' ), __( '<span class="reply">Replies:</span> 1', 'foghorn' ), __( '<span class="reply">Replies:</span> %', 'foghorn' ) ); ?></span>
			<?php endif; // End if comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'foghorn' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
        </div>
	</article><!-- #post-<?php the_ID(); ?> -->
    </div>