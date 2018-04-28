<?php
/**
 * The template for displaying the footer
 * @package LamarMcMiller.Me
 */
?>
	</div><!-- #content -->
	</div><!-- #page -->
<footer id="main-footer" class="footer">
	<div class="container-fluid">
	 <div class="row justify-content-between align-items-center">
		 <div class="col-md-3 ">
		 	<?php if(dynamic_sidebar('footer-sidebar-1')) : else : endif; ?>
		 </div>
		 <div class="col-md-3">
		  <?php if(dynamic_sidebar('footer-sidebar-2')) : else : endif; ?>
		</div>
		<div class="col-md-3">
		  <?php if(dynamic_sidebar('footer-sidebar-3')) : else : endif; ?>
		</div>
	  <div class="col-md-3">
		  <?php if(dynamic_sidebar('footer-sidebar-4')) : else : endif; ?>
</div><!--col end -->
</div><!-- row end -->
</div><!-- container end -->
</footer><!-- #colophon -->

</body>
</html>
