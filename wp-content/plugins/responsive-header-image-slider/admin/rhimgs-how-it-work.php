<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package WP Header image slider and carousel
 * @since 1.1
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'rhimgs_register_design_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package WP Header image slider and carousel
 * @since 1.1
 */
function rhimgs_register_design_page() {
	add_submenu_page( 'edit.php?post_type=sp_responsiveslider', __('How it works - WP Header image slider and carousel', 'responsive-header-image-slider'), __('How It Works', 'responsive-header-image-slider'), 'manage_options', 'rhimgs-how-it-works', 'rhimgs_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package WP Header image slider and carousel
 * @since 1.1
 */
function rhimgs_designs_page() {

	$wpos_feed_tabs = rhimgs_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work';
?>
		
	<div class="wrap spfaq-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => 'sp_responsiveslider', 'page' => 'rhimgs-how-it-works', 'tab' => $tab_key), admin_url('edit.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="spfaq-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				rhimgs_howitwork_page();
			}
			else if( isset($active_tab) && $active_tab == 'plugins-feed' ) {
				echo rhimgs_get_plugin_design( 'plugins-feed' );
			} else {
				echo rhimgs_get_plugin_design( 'offers-feed' );
			}
		?>
		</div><!-- end .spfaq-tab-cnt-wrp -->

	</div><!-- end .spfaq-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package WP Header image slider and carousel
 * @since 1.1
 */
function rhimgs_get_plugin_design( $feed_type = '' ) {
	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';
	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}

	// Taking some variables
	$wpos_feed_tabs = rhimgs_help_tabs();
	$transient_key 	= isset($wpos_feed_tabs[$active_tab]['transient_key']) 	? $wpos_feed_tabs[$active_tab]['transient_key'] 	: 'spfaq_' . $active_tab;
	$url 			= isset($wpos_feed_tabs[$active_tab]['url']) 			? $wpos_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpos_feed_tabs[$active_tab]['transient_time']) ? $wpos_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'responsive-header-image-slider' ) . '</div>';
		}
	}
	return $cache;	
}

/**
 * Function to get plugin feed tabs
 *
 * @package WP Header image slider and carousel
 * @since 1.1
 */
function rhimgs_help_tabs() {
	$wpos_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'responsive-header-image-slider'),
												),
						'plugins-feed' 	=> array(
													'name' 				=> __('Our Plugins', 'responsive-header-image-slider'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/plugins-data.php',
													'transient_key'		=> 'wpos_plugins_feed',
													'transient_time'	=> 172800
												),
						'offers-feed' 	=> array(
													'name'				=> __('WPOS Offers', 'responsive-header-image-slider'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/wpos-offers.php',
													'transient_key'		=> 'wpos_offers_feed',
													'transient_time'	=> 86400,
												)
					);
	return $wpos_feed_tabs;
}

/**
 * Function to get 'How It Works' HTML
 *
 * @package WP Header image slider and carousel
 * @since 1.1
 */
function rhimgs_howitwork_page() { ?>
	
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.spfaq-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.spfaq-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>

	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and shortcode', 'responsive-header-image-slider' ); ?></span>
								</h3>
								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Getting Started with Responsive Image Slider', 'responsive-header-image-slider'); ?>:</label>
												</th>
												<td>
													<ul>														
														<li><?php _e('Step-1. Go to "Responsive Image Slider --> Add New".', 'responsive-header-image-slider'); ?></li>
														<li><?php _e('Step-2. Add Title, Description, External url(optional) and featured image', 'responsive-header-image-slider'); ?></li>														
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('How Shortcode Works', 'responsive-header-image-slider'); ?>:</label>
												</th>
												<td>
													<ul>														
														<li><?php _e('Step-1. Create a page like Image Slider OR add the shortcode in any page.', 'responsive-header-image-slider'); ?></li>
														<li><?php _e('Step-2. Put below shortcode as per your need.', 'responsive-header-image-slider'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'responsive-header-image-slider'); ?>:</label>
												</th>
												<td>
													<span class="spfaq-shortcode-preview">[sp_responsiveslider]</span> – <?php _e('Display Image slideshow in Page', 'responsive-header-image-slider'); ?>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('Need Support?', 'sphis'); ?>:</label>
												</th>
												<td>
													<span><?php _e('Check plugin document for shortcode parameters and demo for designs.','sphis'); ?></span><br><br>
													<a class="button button-primary" href="https://www.wponlinesupport.com/plugins-documentation/document-wp-responsive-header-image-slider/?utm_source=hp&event=doc" target="_blank"><?php _e('Documentation', 'responsive-header-image-slider'); ?></a>
													<a class="button button-primary" href="http://demo.wponlinesupport.com/image-slider-demo/?utm_source=hp&event=demo" target="_blank"><?php _e('Demo for Designs', 'sphis'); ?></a>
												</td>
											</tr>					
											
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
				
				<!--Upgrad to Pro HTML -->
				<div id="postbox-container-1" class="postbox-container">
					<div class="metabox-holder wpos-pro-box">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox" style="">
									
								<h3 class="hndle">
									<span><?php _e('Upgrate to Pro', 'responsive-header-image-slider'); ?></span>
								</h3>
								<div class="inside">										
									<ul class="wpos-list">
										<li><?php _e('30+ Beautiful Designs', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('Visual composer support', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('Drag & Drop order change', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('24+ Slider designs', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('18+ Carousel and center mode designs', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('18+ Variable width designs', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('Custom css', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('Slider Center Mode Effect', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('Slider RTL support', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('Fully responsive', 'responsive-header-image-slider'); ?></li>
										<li><?php _e('100% Multi language', 'responsive-header-image-slider'); ?></li>
									</ul>
									<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/wp-plugin/wp-slick-slider-and-image-carousel/?utm_source=hp&event=go_premium" target="_blank">Go Premium </a>
									<p><a class="button button-primary wpos-button-full" href="http://demo.wponlinesupport.com/prodemo/pro-wp-slick-slider-and-carousel-demo/?utm_source=hp&event=pro_demo" target="_blank">View PRO Demo </a></p>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->

					<!-- Help to improve this plugin! -->
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									<h3 class="hndle">
										<span><?php _e( 'Help to improve this plugin!', 'responsive-header-image-slider' ); ?></span>
									</h3>									
									<div class="inside">										
										<p><?php _e('Enjoyed this plugin? You can help by rate this plugin', 'responsive-header-image-slider'); ?> <a href="https://wordpress.org/support/plugin/responsive-header-image-slider/reviews/?filter=5" target="_blank">5 stars!</a></p>
									</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-container-1 -->

			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }