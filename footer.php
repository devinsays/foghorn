<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
				<a href="http://wordpress.org/" rel="generator">Proudly powered by WordPress</a><span class="sep"> | </span><?php printf( __( 'Theme: %1$s.', 'foghorn' ), 'Foghorn' ); ?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>