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
			<span class="copyright">
			<?php printf(__('Copyright &copy; %1$s %2$s All Right&#27;s reserved', 'customwebsite'),
				date('Y'), // 1
				get_bloginfo('name')
			); ?>
			</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!--<?php echo $wpdb->num_queries; echo ' queries in '; timer_stop(1); echo ' seconds.';?> -->
</body>
</html>
