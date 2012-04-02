<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<footer>
		<div id="copyright">
			<p>Copyright &copy; 2011 DOT on Campus. All Rights Reserved.</p>
		</div>
		<div id="footer-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="http://assets.dotoncampus.com/images/default-footer-logo.png" /></a>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>