<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Custom Website
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'customwebsite' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'customwebsite' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'customwebsite' ), 'customwebsite', '<a href="http://underscores.me/" rel="designer">Shaun Haddrill</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!--<?php echo $wpdb->num_queries; echo ' queries in '; timer_stop(1); echo ' seconds.';?> -->
</body>
</html>
