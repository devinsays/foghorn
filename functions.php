<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run foghorn_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'foghorn_setup' );

if ( ! function_exists( 'foghorn_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override foghorn_setup() in a child theme, add your own foghorn_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Foghorn 0.1
 */
function foghorn_setup() {

	/* Make Foghorn available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Foghorn, use a find and replace
	 * to change 'foghorn' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'foghorn', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Load up theme options code
	require( dirname( __FILE__ ) . '/extensions/options-functions.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'foghorn' ) );

	/**
	 * Add support for an Aside Post Format
	 */
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	/**
	 * Add support for custom backgrounds
	 */
	add_custom_background();

	// This theme support for thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Creates an image thumbnail size for multiple displays
	add_image_size( 'multiple-thumb', 360, 200, true );

}
endif; // foghorn_setup

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function foghorn_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'foghorn_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function foghorn_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foghorn' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and foghorn_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function foghorn_auto_excerpt_more( $more ) {
	return ' &hellip;' . foghorn_continue_reading_link();
}
add_filter( 'excerpt_more', 'foghorn_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function foghorn_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= foghorn_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'foghorn_custom_excerpt_more' );

/**
 * Add custom body classes
 */
function foghorn_singular_class( $classes ) {
	if ( is_singular() && ! is_home() )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'foghorn_singular_class' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function foghorn_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'foghorn_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Foghorn 0.1
 */
function foghorn_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'foghorn' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'foghorn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'foghorn' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'foghorn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'foghorn' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'foghorn' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'foghorn_widgets_init' );

/**
 * Display navigation to next/previous pages when applicable
 */
function foghorn_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'foghorn' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'foghorn' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'foghorn' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Grab the first URL from a Link post
 */
function foghorn_url_grabber() {
	global $post, $posts;

	$first_url = '';

	ob_start();
	ob_end_clean();

	$output = preg_match_all('/<a.+href=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

	$first_url = $matches [1] [0];

	if ( empty( $first_url ) )
		return false;

	return $first_url;
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function foghorn_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'foghorn_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own foghorn_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Foghorn 0.1
 */
function foghorn_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'foghorn' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'foghorn' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						printf( __( '%1$s on %2$s%3$s at %4$s%5$s <span class="says">said:</span>', 'foghorn' ),
							sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ),
							'<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '"><time pubdate datetime="' . get_comment_time( 'c' ) . '">',
							get_comment_date(),
							get_comment_time(),
							'</time></a>'
						);
					?>

					<?php edit_comment_link( __( '[Edit]', 'foghorn' ), ' ' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'foghorn' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply &darr;', 'foghorn' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for foghorn_comment()