<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LamarMcMiller.Me
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
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>./dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>./dist/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>./dist/css/ekko-lightbox.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <link href="https://fonts.googleapis.com/css?family=Abel|Comfortaa|Cormorant+Garamond|Dancing+Script|Didact+Gothic|Poiret+One|Satisfy" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header">
     <nav id="menu" class="navbar navbar-expand-xl mx-auto navbar-dark fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="site-branding navbar-header">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<a class="navbar-brand trackInExpand ml-3"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
				else :
					?>
					<a class="navbar-brand trackInExpand ml-3" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
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
				'menu_class' => 'navbar-nav mx-auto',
				'depth' => 2,
				'fallback_cb' => 'bs4navwalker: :fallback',
				'walker' => new bs4navwalker()

			]);
			?>
			</nav>
	</header><!-- #masthead -->

	<div id="page" class="site container-fluid">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lm' ); ?></a>

	<div id="content" class="site-content row">
