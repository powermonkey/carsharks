<?php
/*
 * Plugin Name: WP Responsive header image slider
 * Plugin URL: https://www.wponlinesupport.com
 * Text Domain: responsive-header-image-slider
 * Domain Path: /languages/
 * Description: A simple Responsive header image slider
 * Version: 3.0.3
 * Author: WP Online Support
 * Author URI: https://www.wponlinesupport.com
 * Contributors: WP Online Support
*/

if( !defined( 'SP_RHIMGS_VERSION' ) ) {
	define( 'SP_RHIMGS_VERSION', '3.0.3' ); // Version of plugin
}
if( !defined( 'SP_RHIMGS_DIR' ) ) {
	define( 'SP_RHIMGS_DIR', dirname( __FILE__ ) );	// Plugin dir
}

add_action('plugins_loaded', 'sp_rhimgs_load_textdomain');
function sp_rhimgs_load_textdomain() {
	load_plugin_textdomain( 'responsive-header-image-slider', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
 * Function to unique number value
 * 
 * @package WP Responsive header image slider
 * @since 1.0.0
 */
function sp_rhimgs_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}

function sp_responsiveslider_setup_post_types() {

	$responsiveslider_labels =  apply_filters( 'sp_responsiveslider_labels', array(
		'name'                => 'Responsive header image slider',
		'singular_name'       => 'Responsive header image slider',
		'add_new'             => __('Add New', 'responsive-header-image-slider'),
		'add_new_item'        => __('Add New Image', 'responsive-header-image-slider'),
		'edit_item'           => __('Edit Image', 'responsive-header-image-slider'),
		'new_item'            => __('New Image', 'responsive-header-image-slider'),
		'all_items'           => __('All Image', 'responsive-header-image-slider'),
		'view_item'           => __('View Image', 'responsive-header-image-slider'),
		'search_items'        => __('Search Image', 'responsive-header-image-slider'),
		'not_found'           => __('No Image found', 'responsive-header-image-slider'),
		'not_found_in_trash'  => __('No Image found in Trash', 'responsive-header-image-slider'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Responsive image slider'),
		'exclude_from_search' => true
	) );


	$responsiveslider_args = array(
		'labels' 			=> $responsiveslider_labels,
		'public' 			=> true,
		'publicly_queryable'		=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> true,
		'hierarchical' 		=> false,
		'menu_icon'   => 'dashicons-format-gallery',
		'supports' => array('title','editor','thumbnail')
		
	);
	register_post_type( 'sp_responsiveslider', apply_filters( 'sp_faq_post_type_args', $responsiveslider_args ) );

}
add_action('init', 'sp_responsiveslider_setup_post_types');

/* Include style and script */
add_action( 'wp_enqueue_scripts','style_rsris_css_script' );
function style_rsris_css_script() {
    wp_enqueue_style( 'respslidercss',  plugin_dir_url( __FILE__ ). 'css/responsiveimgslider.css', array(), SP_RHIMGS_VERSION );
    wp_enqueue_script( 'respsliderjs', plugin_dir_url( __FILE__ ) . 'js/jquery.slides.min.js', array('jquery'), SP_RHIMGS_VERSION );
}

/* Register Taxonomy */
add_action( 'init', 'responsive_slider_taxonomies');
function responsive_slider_taxonomies() {
    $labels = array(
        'name'              => _x( 'Category', 'responsive-header-image-slider' ),
        'singular_name'     => _x( 'Category', 'responsive-header-image-slider' ),
        'search_items'      => __( 'Search Category', 'responsive-header-image-slider' ),
        'all_items'         => __( 'All Category', 'responsive-header-image-slider' ),
        'parent_item'       => __( 'Parent Category', 'responsive-header-image-slider' ),
        'parent_item_colon' => __( 'Parent Category', 'responsive-header-image-slider' ),
        'edit_item'         => __( 'Edit Category', 'responsive-header-image-slider' ),
        'update_item'       => __( 'Update Category', 'responsive-header-image-slider' ),
        'add_new_item'      => __( 'Add New Category', 'responsive-header-image-slider' ),
        'new_item_name'     => __( 'New Category Name', 'responsive-header-image-slider' ),
        'menu_name'         => __( 'Slider Category', 'responsive-header-image-slider' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'responsive_slider-category' ),
    );

    register_taxonomy( 'responsive_slider-category', array( 'sp_responsiveslider' ), $args );
}

function responsive_slider_rewrite_flush() {  
		sp_responsiveslider_setup_post_types();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'responsive_slider_rewrite_flush' );


// Manage Category Shortcode Columns

add_filter("manage_responsive_slider-category_custom_column", 'responsive_slider_category_columns', 10, 3);
add_filter("manage_edit-responsive_slider-category_columns", 'responsive_slider_category_manage_columns'); 
function responsive_slider_category_manage_columns($theme_columns) {
    $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'name' => __('Name'),
            'slider_shortcode' => __( 'Slider Category Shortcode', 'responsive-header-image-slider' ),
            'slug' => __('Slug'),
            'posts' => __('Posts')
			);

    return $new_columns;
}

function responsive_slider_category_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'responsive_slider-category');
    switch ($column_name) {      
        case 'title':
            echo get_the_title();
        break;
        case 'slider_shortcode':
			echo '[sp_responsiveslider cat_id="' . $theme_id. '"]';			  	  

        break;
        default:
            break;
    }
    return $out;   

}



/* Custom meta box for slider link */
function rsris_add_meta_box() {
		add_meta_box('custom-metabox',__( 'Slider Link URL', 'responsive-header-image-slider' ),'rsris_box_callback','sp_responsiveslider');
}
add_action( 'add_meta_boxes', 'rsris_add_meta_box' );
function rsris_box_callback( $post ) {
	wp_nonce_field( 'rsris_save_meta_box_data', 'rsris_meta_box_nonce' );
	$value = get_post_meta( $post->ID, 'rsris_slide_link', true );
	echo '<input type="url" id="rsris_slide_link" name="rsris_slide_link" value="' . esc_attr( $value ) . '" size="25" /><br />';
	echo 'ie http://www.google.com';
}
function rsris_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['rsris_meta_box_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['rsris_meta_box_nonce'], 'rsris_save_meta_box_data' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'sp_responsiveslider' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	if ( ! isset( $_POST['rsris_slide_link'] ) ) {
		return;
	}
	$link_data = sanitize_text_field( $_POST['rsris_slide_link'] );
	update_post_meta( $post_id, 'rsris_slide_link', $link_data );
}
add_action( 'save_post', 'rsris_save_meta_box_data' );
/*
 * Add [sp_responsiveslider] shortcode
 *
 */
function sp_responsiveslider_shortcode( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		"limit"  => '',
		"cat_id" => '',
		"design" => '',
		"effect" => '',
		"pagination" => '',
		"navigation" => '',
		"speed" => '',
		"autoplay" => '',
		"autoplay_interval" => '',
		"height" => '',
		"width" => '',
		"first_slide" => '',
	), $atts));
	
	if( $limit ) { 
		$posts_per_page = $limit; 
	} else {
		$posts_per_page = '-1';
	}
	if( $cat_id ) { 
		$cat = $cat_id; 
	} else {
		$cat = '';
	}	
	
	if( $design ) { 
		$slidercdesign = $design; 
	} else {
		$slidercdesign = 'design-1';
	}	
	
	if( $effect ) { 
		$effectslider = $effect; 
	} else {
		$effectslider = 'slide';
	}	
	
	if( $width ) { 
		$widthslider = $width; 
	} else {
		$widthslider = '1024';
	}	
	
	if( $height ) { 
		$heightslider = $height; 
	} else {
		$heightslider = '350';
	}	
	
	if( $pagination ) { 
		$paginationslider = $pagination; 
	} else {
		$paginationslider = 'true';
	}	
	
	if( $navigation ) { 
		$navigationslider = $navigation; 
	} else {
		$navigationslider = 'true';
	}

	if( $speed ) { 
		$speedslider = $speed; 
	} else {
		$speedslider = '1000';
	}	

	if( $autoplay ) { 
		$autoplayslider = $autoplay; 
	} else {
		$autoplayslider = 'true';
	}	 	
	
	if( $autoplay_interval ) { 
		$autoplay_intervalslider = $autoplay_interval; 
	} else {
		$autoplay_intervalslider = '2000';
	}
	
	if( $first_slide ) { 
		$first_slideslider = $first_slide; 
	} else {
		$first_slideslider = '1';
	}
	
	ob_start();

	// get defaults
	$unique = sp_rhimgs_get_unique();

	// Create the Query
	$post_type 		= 'sp_responsiveslider';
	$orderby 		= 'post_date';
	$order 			= 'DESC';
				
	 $args = array ( 
            'post_type'      => $post_type, 
            'orderby'        => $orderby, 
            'order'          => $order,
            'posts_per_page' => $posts_per_page,  
           
            );
	if($cat != ""){
            	$args['tax_query'] = array( array( 'taxonomy' => 'responsive_slider-category', 'field' => 'id', 'terms' => $cat) );
            }        
      $query = new WP_Query($args);
	$post_count = $query->post_count;
	$i = 1;
	if( $post_count > 0) :
	?>
	  <div id="slides" class="<?php echo $slidercdesign; ?> sp-rhimgs-slider-<?php echo $unique; ?>">
	<?php	
		// Loop 
		while ($query->have_posts()) : $query->the_post();
		
		
					switch ($slidercdesign) {
				 case "design-1":
					include('designs/design-1.php');
					break;
				 case "design-2":
					include('designs/design-2.php');
					break;
				 case "design-3":
					include('designs/design-3.php');
					break;	
				
				 default:		 

						include('designs/design-1.php');

					}
		
		
		
		$i++;
		endwhile; ?>
		</div>
		
<?php	else : ?>
 <div id="slides" class="design-1 sp-rhimgs-slider-<?php echo $unique; ?>">
	 	<img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/img/1.png"  alt="">
	  	<img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/img/2.png"  alt="">
	   	<img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/img/3.png"  alt="">
</div>
	<?php
	endif;
	// Reset query to prevent conflicts
	wp_reset_query();
	?>
	<script type="text/javascript">
	
	 jQuery(function() {
	
      jQuery('.sp-rhimgs-slider-<?php echo $unique; ?>').slidesjs({
		width: <?php echo $widthslider; ?>,
        height: <?php echo $heightslider; ?>,
		start: <?php echo $first_slideslider; ?>,	
        play: {
          active: <?php echo $autoplayslider; ?>,
          auto: <?php if($autoplayslider == "false") { echo 'false';} else { echo 'true'; } ?>,
          interval: <?php echo $autoplay_intervalslider; ?>,
          swap: true,
		  effect: "<?php echo $effectslider; ?>"
        },
     
	 effect: {
      slide: {        
        speed: <?php echo $speedslider; ?>           
      },
      fade: {
        speed: <?php echo $speedslider; ?>,         
        crossfade: true          
      }
    },
	navigation: {
     active: <?php echo $navigationslider; ?>,
	  effect: "<?php echo $effectslider; ?>"
	  },
        
	pagination: {
      active: <?php echo $paginationslider; ?>,
	   effect: "<?php echo $effectslider; ?>"
	  
    }

      });
	  
	
    });
	

	</script>
	
	<?php
	return ob_get_clean();
}
add_shortcode("sp_responsiveslider", "sp_responsiveslider_shortcode");

// Load admin side files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {   
    // Designs file
    include_once( SP_RHIMGS_DIR . '/admin/rhimgs-how-it-work.php' );
}