<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Custom Website
 */

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area pure-g" role="complementary">
	<?php dynamic_sidebar( 'sidebar-footer' ); ?>
</div><!-- #secondary -->
