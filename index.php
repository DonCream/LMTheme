<?php
/**
 * The main template file
 * @package LamarMcMiller.Me
 */
get_header();
?>

<div class="container-fluid">
	<div class="row">
	   <div id="primary" class="content-area col-md-10">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .row end-->
</div><!-- .container end -->

<?php get_footer();
