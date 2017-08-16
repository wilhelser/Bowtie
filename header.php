<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bowtie
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<header class="main" role="banner">
      <div class="row small-12 columns">
				<a href="<?php esc_attr_e( home_url( '/' ) ); ?>" rel="home">
            <?php print do_shortcode('[logo]'); ?>
				</a>

        <div class="site-title">
          <h1 class="site-name"><?php bloginfo( 'name' ); ?></h1>
          <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>

				<nav class="main" role="navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
          <button class="hamburger" type="button" data-menu><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
				</nav><!-- #site-navigation -->
      </div>

      <nav class="responsive">
        <?php
    		 $args = array (
    			 'theme_location' 	=> 'responsive',
    			 'container' 				=> 'nav',
    			 'container_class'	=> 'offcanvas-navigation',
    			 'menu_class' 			=> 'mobile-menu',
    		 );
    			wp_nav_menu( $args );
    		?>
      </nav>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
