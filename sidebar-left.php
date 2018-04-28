<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

 if ( ! is_active_sidebar( 'left-sidebar' ) ) {
 	return;
 }
 ?>
 <div class="col-md-3 widget-area" id="secondary" role="complementary">
 <aside id="secondary" class="widget-area">
 	<?php dynamic_sidebar( 'left-sidebar' ); ?>
 </aside><!-- #secondary -->
 </div><!-- #secondary -->
