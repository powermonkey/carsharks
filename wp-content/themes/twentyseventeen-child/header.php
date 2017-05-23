<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>
		
		<div class="headerslider"> 
			<div class="header-menu-container">
				<div class="carsharks-logo">
					<img src="http://carsharks:8080/wp-content/uploads/2017/05/Layer-9-copy.png" alt="Carsharks logo">
				</div>
				<div class="header-menu">
					<div class="header-menu-item"><a>OUR DEALS</a><div style="clear: both;"></div></div>
					<div class="header-menu-item-partition">|</div>
					<div class="header-menu-item"><a>SPECIALS</a></div>
					<div class="header-menu-item-partition">|</div>
					<div class="header-menu-item"><a>ABOUT US</a></div>
					<div class="header-menu-item-partition">|</div>
					<div class="header-menu-item"><a>BLOG</a></div>
					<div class="header-menu-item-partition">|</div>
					<div class="header-menu-item"><a> CONTACT US</a></div>
					<div style="clear: both;"></div>
				</div>
				<div style="clear: both;"></div>
			</div>
			
			
			<?php echo do_shortcode('[sp_responsiveslider limit="-1" height="556"  design="design-3" ]'); ?>
		</div>
		
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
		echo '<div class="single-featured-image-header">';
		the_post_thumbnail( 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
