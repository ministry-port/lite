<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<?php global $is_IE; if ( $is_IE ) : ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<?php endif; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'lite' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-wrap">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<div class="nav-wrap">
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'lite' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- .nav-wrap -->
		</div><!-- .header-wrap -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

	<?php lite_welcome_message(); ?>
