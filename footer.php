<?php
/**
 * The template for displaying the footer
 * @package LamarMcMiller.Me
 */

?>

	</div><!-- #content -->
	<div class="container">
	 <div class="row">
	  <div class="col-md-12">
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lm' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Powered by %s', 'lm' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'lm' ), 'LM', '<a href="http://webjelly.net">Web Jelly</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!--col end -->
</div><!-- row end -->
</div><!-- container end -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
