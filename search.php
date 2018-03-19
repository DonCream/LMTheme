<?php
/**
 * The template for displaying search results pages
 * @package LamarMcMiller.Me
 */
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
	<section id="primary" class="content-area ">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'lm' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

		<?php get_sidebar(); ?>
	
</div><!-- .row end-->
</div><!-- .container end -->
	<?php get_footer();
