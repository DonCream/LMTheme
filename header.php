<?php
/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header">
    <nav id="menu" class="navbar navbar-expand-xl navbar-light bg-dark" role="navigation">
			<div class="container-fluid">
				<div class="site-branding navbar-brand">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="navbar-header"><a class=" trackInExpand ml-3"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="navbar-header"><a class=" trackInExpand ml-3"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			endif;
			$lm_description = get_bloginfo( 'description', 'display' );
			if ( $lm_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $lm_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<button class="navbar-toggler" data-toggle="collapse" type="button" data-target="#navbarNav" aria-controls="
		navbarNav" aria-expanded="false" aria-label="toggle navigation"><span class="navbar-toggler-icon"></span>
			</button>

			<?php
         wp_nav_menu( [
				'menu' => 'primary',
				'theme_location' => 'primary',
				'container' => 'div',
				'container_id' => 'bs4navbar',
				'container_class' => 'collapse navbar-collapse',
				'menu_id' => 'menu',
				'menu_class' => 'navbar-nav ml-auto',
				'depth' => 2,
				'fallback_cb' => 'bs4navwalker: :fallback',
				'walker' => new bs4navwalker()
			]);
			?>
			</nav>
	</header><!-- #masthead -->

	<div id="page" class="site container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lm' ); ?></a>

	<div id="content" class="container-fluid row">
