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
		<div class="header-menu">
			<div class="header-menu-item"><div><a href="#">OUR DEALS</a></div><div style="clear: both;"></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item"><div><a href="#">SPECIALS</a></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item"><div><a href="#">ABOUT US</a></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item-blog"><div><a href="#">BLOG</a></div></div>
			<div class="header-menu-item-partition">|</div>
			<div class="header-menu-item"><div><a href="#"> CONTACT US</a></div></div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both;"></div>
	</div>
	
	<div class="custom-header-media">
		<?php the_custom_header_markup(); ?>
	</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
