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
<div class="col-md-3 widget-area" id="secondary" role="complementary">
<aside id="secondary" class="widget-area">
 <?php dynamic_sidebar( 'left-sidebar' ); ?>
</aside><!-- #secondary -->
</div><!-- #secondary -->

<div class="col-md-3 widget-area" id="secondary" role="complementary">
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #secondary -->
</div><!-- #secondary -->
