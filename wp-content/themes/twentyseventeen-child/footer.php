<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div id="custom-footer" >
				<div class="custom-footer-wrap">
					<div class="carsharks-logo-footer">
						<img src="http://carsharks:8080/wp-content/uploads/2017/05/Layer-9-copy.png" alt="Carsharks logo">
					</div>
					<div class="footer-menu">
						<div class="footer-menu-item"><div><a href="#">OUR DEALS</a></div><div style="clear: both;"></div></div>
						<div class="footer-menu-item-partition">|</div>
						<div class="footer-menu-item"><div><a href="#">SPECIALS</a></div></div>
						<div class="footer-menu-item-partition">|</div>
						<div class="footer-menu-item"><div><a href="#">ABOUT US</a></div></div>
						<div class="footer-menu-item-partition">|</div>
						<div class="footer-menu-item-blog"><div><a href="#">BLOG</a></div></div>
						<div class="footer-menu-item-partition">|</div>
						<div class="footer-menu-item"><div><a href="#"> CONTACT US</a></div></div>
						<div style="clear: both;"></div>
					</div>
					<?php 
						$post   = get_post( 243 );
						$output =  apply_filters( 'the_content', $post->post_content );
					?>
					<div class="footer-copyright"><?php echo $output; ?></div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
