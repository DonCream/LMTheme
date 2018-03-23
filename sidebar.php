<?php
/**
 * The sidebar containing the main widget area
 *
 * @package LamarMcMiller.Me
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>
<div class="col-md-2 widget-area" id="secondary" role="complementary">
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #secondary -->
</div><!-- #secondary -->
