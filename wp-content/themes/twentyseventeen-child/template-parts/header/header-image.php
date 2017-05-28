<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">
	<div class="header-menu-container">
		<div class="carsharks-logo-header">
			<img src="http://carsharks:8080/wp-content/uploads/2017/05/Layer-9-copy.png" alt="Carsharks logo">
		</div>
		<?php 
			$domain =  "http://" . $_SERVER['HTTP_HOST']; 
		?>
		<div class="header-menu">
			<div class="header-menu-item"><div><a href="<?php echo $domain; ?>#">OUR DEALS</a></div><div style="clear: both;"></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item"><div><a href="<?php echo $domain; ?>#specials-jump">SPECIALS</a></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item"><div><a href="<?php echo $domain; ?>#about-us-jump">ABOUT US</a></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item-blog"><div><a href="#<?php echo $domain; ?>">BLOG</a></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item"><div><a href="<?php echo $domain; ?>#contact-us-jump"> CONTACT US</a></div></div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both;"></div>
	</div>
	
	<div class="custom-header-media">
		<?php the_custom_header_markup(); ?>
	</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
