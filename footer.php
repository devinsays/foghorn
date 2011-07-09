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
				<?php _e( 'Powered by ', 'foghorn' ); ?><a href="<?php echo esc_url( __( 'http://www.wordpress.org', 'foghorn' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'foghorn' ); ?>" rel="generator"><?php _e( 'WordPress', 'foghorn' ); ?></a>
                	<?php _e( 'and ', 'foghorn' ); ?><a href="<?php echo esc_url( __( 'https://github.com/devinsays/foghorn', 'foghorn' ) ); ?>" title="<?php esc_attr_e( 'Download the Foghorn Theme', 'foghorn' ); ?>" rel="generator"><?php _e( 'Foghorn', 'foghorn' ); ?></a>
                
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>