<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Woocommerce is active */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'venicelite_is_woocommerce_active' ) ) {
	
	function venicelite_is_woocommerce_active( $type = "" ) {
	
        global $woocommerce;

        if ( isset( $woocommerce ) ) {
			
			if ( !$type || call_user_func($type) ) {
            
				return true;
			
			}
			
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* LOGO */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_get_logo')) {

	function venicelite_get_logo() {
		
		if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) :
		
			the_custom_logo();
						
		else :
		
			echo '<a class="logo" href="' . esc_url(home_url('/')) . '" title="' .  esc_attr(get_bloginfo('name')) . '">';
			
				bloginfo('name');
            
			echo '</a>';

		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET ARCHIVE TITLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_get_the_archive_title')) {

	function venicelite_get_archive_title() {
		
		if ( is_category() ) {
			$title = sprintf( esc_html__( 'Category: %s', "venice-lite" ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( esc_html__( 'Tag: %s', "venice-lite" ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( esc_html__( 'Author: %s', "venice-lite" ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( 'Year: %s', "venice-lite" ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', "venice-lite" ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( esc_html__( 'Month: %s', "venice-lite" ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', "venice-lite" ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( 'Day: %s', "venice-lite" ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', "venice-lite" ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', "venice-lite" );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', "venice-lite" );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( esc_html__( 'Archives: %s', "venice-lite" ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title = sprintf( esc_html__( '%1$s: %2$s', "venice-lite" ), $tax->labels->singular_name, single_term_title( '', false ) );
		}
	
		if ( isset($title) )  :
			return $title;
		else:
			return false;
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* IS SINGLE */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_is_single')) {

	function venicelite_is_single() {
		
		if ( is_single() || is_page() || venicelite_is_woocommerce_active('is_product') ) :
		
			return true;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function venicelite_title( $title, $sep ) {
		
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		$title .= get_bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'venice-lite' ), max( $paged, $page ) );
	
		return $title;
		
	}

	add_filter( 'wp_title', 'venicelite_title', 10, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* Theme settings */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_setting')) {

	function venicelite_setting($id, $default = "" ) {
	
		$venicelite_setting = get_theme_mod($id);
			
		if ( isset($venicelite_setting) ) :
			
			return $venicelite_setting;
			
		else:
		
			return false;
	
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* Post meta */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_postmeta')) {

	function venicelite_postmeta($id) {
	
		global $post, $wp_query;
		
		$content_ID = $post->ID;
	
		if( venicelite_is_woocommerce_active('is_shop') ) {
	
			$content_ID = get_option('woocommerce_shop_page_id');
	
		}

		$val = get_post_meta( $content_ID , $id, TRUE);
		
		if(isset($val)) {
			
			return $val;
			
		} else {
				
			return '';
			
		}
		
	}

}


/*-----------------------------------------------------------------------------------*/
/*RESPONSIVE EMBED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_embed_html')) {
	
	function venicelite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}
	 
	add_filter( 'embed_oembed_html', 'venicelite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'venicelite_embed_html' );
	
}


/*-----------------------------------------------------------------------------------*/
/* POST CLASSES */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_post_classes_function')) {

	function venicelite_post_classes_function( $classes ) {

		if ( venicelite_is_woocommerce_active('is_cart') ) :
		
			$classes[] = 'woocommerce_cart_page';
				
		endif;

		if ( !venicelite_is_woocommerce_active('is_product') ) :

			$classes[] = 'post-container col-md-12';

		endif;

		return $classes;

	}

	add_filter( 'post_class', 'venicelite_post_classes_function' );
	
}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASSES */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_body_classes_function')) {

	function venicelite_body_classes_function( $classes ) {

		global $wp_customize;

		if ( isset( $wp_customize ) ) :

			$classes[] = 'customizer_active';
				
		endif;
	
		return $classes;

	}
	
	add_filter( 'body_class', 'venicelite_body_classes_function' );

}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_template')) {

	function venicelite_template($id) {
	
		$template = array ( 
		
			"full" => "col-md-12" , 
			"left-sidebar" => "col-md-8" , 
			"right-sidebar" => "col-md-8"
		
		);
	
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

		if ( venicelite_is_woocommerce_active('is_woocommerce') && ( venicelite_is_woocommerce_active('is_product_category') || venicelite_is_woocommerce_active('is_product_tag') ) && venicelite_setting('venicelite_woocommerce_category_layout') ) {
		
			$span = $template[esc_attr(venicelite_setting('venicelite_woocommerce_category_layout'))];
			$sidebar =  esc_attr(venicelite_setting('venicelite_woocommerce_category_layout'));

		} else if ( venicelite_is_woocommerce_active('is_woocommerce') && is_search() && venicelite_postmeta('venicelite_template') ) {
					
			$span = $template[esc_attr(venicelite_postmeta('venicelite_template'))];
			$sidebar =  esc_attr(venicelite_postmeta('venicelite_template'));
	
		} else if ( ( is_page() || is_single() || venicelite_is_woocommerce_active('is_shop') ) && venicelite_postmeta('venicelite_template') ) {
					
			$span = $template[esc_attr(venicelite_postmeta('venicelite_template'))];
			$sidebar =  esc_attr(venicelite_postmeta('venicelite_template'));

		} else if ( ! venicelite_is_woocommerce_active('is_woocommerce') && ( is_category() || is_tag() || is_tax() || is_month() ) && venicelite_setting('venicelite_category_layout') ) {

			$span = $template[esc_attr(venicelite_setting('venicelite_category_layout'))];
			$sidebar =  esc_attr(venicelite_setting('venicelite_category_layout'));
						
		} else if ( is_home() && venicelite_setting('venicelite_home') ) {
					
			$span = $template[esc_attr(venicelite_setting('venicelite_home'))];
			$sidebar =  esc_attr(venicelite_setting('venicelite_home'));

		} else if ( ! venicelite_is_woocommerce_active('is_woocommerce') && is_search() && venicelite_setting('venicelite_search_layout') ) {

			$span = $template[esc_attr(venicelite_setting('venicelite_search_layout'))];
			$sidebar =  esc_attr(venicelite_setting('venicelite_search_layout'));
						
		}

		return ${$id};
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_posticon')) {

	function venicelite_posticon() {
	
		$icons = array (
		
			"video" => "fa fa-film" , 
			"gallery" => "fa fa-camera" , 
			"audio" => "fa fa-music" , 
			"chat" => "fa fa-users", 
			"status" => "fa fa-keyboard-o", 
			"image" => "fa fa-file-image-o", 
			"quote" => "fa fa-quote-left", 
			"link" => "fa fa-external-link", 
			"aside" => "fa fa-file-text-o", 
		
		);
	
		if (get_post_format()) { 
		
			$icon = '<span class="post-icon"><i class="'.$icons[get_post_format()].'"></i></span>'; 
		
		} else {
		
			$icon = '<span class="post-icon"><i class="fa fa-pencil-square-o"></i></span>'; 
		
		}

		if ( !venicelite_setting('venicelite_view_post_icon') || venicelite_setting('venicelite_view_post_icon') == "on" ) :
	
			return $icon;
		
		else :

			return false;

		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_paged')) {

	function venicelite_paged() {
		
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		
		return $paged;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_prettyPhoto')) {

	function venicelite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
		
		if ( ! $permalink )
			return str_replace( '<a', '<a class="swipebox"', $html );
		else
			return $html;
	}

	add_filter( 'wp_get_attachment_link', 'venicelite_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('venicelite_hide_excerpt_more')) {

	function venicelite_hide_excerpt_more() {
		return '';
	}

	add_filter('the_content_more_link', 'venicelite_hide_excerpt_more');
	add_filter('excerpt_more', 'venicelite_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* Customize excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('venicelite_customize_excerpt_more')) {

	function venicelite_customize_excerpt_more( $excerpt ) {
	
		global $post;

		if ( venicelite_is_single() ) :

			return $excerpt;

		else:

			$allowed = array(
				'span' => array(
					'class' => array(),
				),
			);
	
			$class = 'button ' . esc_attr(venicelite_setting('venicelite_readmore_layout'));
			$button = esc_html__('Read More','venice-lite');
			$container = 'class="read-more"';
	
			if ( venicelite_setting('venicelite_readmore_layout') == "default" || venicelite_setting('venicelite_readmore_layout') == "sneak" || !venicelite_setting('venicelite_readmore_layout') ) : 
			
				$class = 'button ' . esc_attr(venicelite_setting('venicelite_readmore_layout'));
				$button = esc_html__('Read More','venice-lite');
				$container = 'class="read-more"';
	
			else :
	
				$class = 'nobutton';
				$button = ' [&hellip;] ';
				$container = '';
	
			endif;
		
			if ( $pos=strpos($post->post_content, '<!--more-->') && !has_excerpt( $post->ID )): 
			
				$content = substr(apply_filters( 'the_content', get_the_content()), 0, -5);
			
			else:
			
				$content = $excerpt;
	
			endif;
	
			return $content. '<a '. wp_kses($container, $allowed) . ' href="' . esc_url(get_permalink($post->ID)) . '" title="'.esc_attr__('Read More','venice-lite').'"> <span class="'.esc_attr($class).'">'.$button.'</span></a>';

		endif;

	}
	
	add_filter( 'get_the_excerpt', 'venicelite_customize_excerpt_more' );

}

/*-----------------------------------------------------------------------------------*/
/* Remove category list rel */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_remove_category_list_rel')) {

	function venicelite_remove_category_list_rel($output) {
		$output = str_replace('rel="category"', '', $output);
		return $output;
	}

	add_filter('wp_list_categories', 'venicelite_remove_category_list_rel');
	add_filter('the_category', 'venicelite_remove_category_list_rel');

}

/*-----------------------------------------------------------------------------------*/
/* Remove thumbnail dimensions */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_remove_thumbnail_dimensions')) {

	function venicelite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	
	}

	add_filter( 'post_thumbnail_html', 'venicelite_remove_thumbnail_dimensions', 10, 3 );

}
  
/*-----------------------------------------------------------------------------------*/
/* Remove css gallery */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_my_gallery_style')) {

	function venicelite_my_gallery_style() {
		return "<div class='gallery'>";
	}

	add_filter( 'gallery_style', 'venicelite_my_gallery_style', 99 );

}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAIL WIDTH */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('venicelite_get_width')) {

	function venicelite_get_width() {
		
		if (venicelite_setting('venicelite_screen3')):
		
			return esc_attr(venicelite_setting('venicelite_screen3'));
		
		else:
		
			return "1170";
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* THUMBNAIL HEIGHT */
/*-----------------------------------------------------------------------------------*/         

if (!function_exists('venicelite_get_thumbs')) {

	function venicelite_get_thumbs($type) {
		
		if (venicelite_setting('venicelite_'.$type.'_thumbinal')):
		
			return esc_attr(venicelite_setting('venicelite_'.$type.'_thumbinal'));
		
		else:
		
			return "690";
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* WIDGETS WITHOUT PADDING */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_widget_class')) {

	function venicelite_widget_class( $params ) {
		
		$name = $params[0]['widget_name'];
		
		$check = array(
			"Wip Google Maps Widget",
			"Wip Banner Widget",
			"Wip Biography Widget",
			"Revolution Slider"
		);
		
		foreach ( $check as $value ) {
			
			if ( $value == $name ) : 
			
				$params[0]['before_widget'] = preg_replace( '/class="post-article/', '/class="no-padding', $params[0]['before_widget'], 1 );
			
			endif; 
			
		}
		
		return $params;
	}

	add_filter( 'dynamic_sidebar_params', 'venicelite_widget_class' );

}

/*-----------------------------------------------------------------------------------*/ 
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_scripts_styles')) {

	function venicelite_scripts_styles() {

		wp_enqueue_style( 'venice-style', get_stylesheet_uri(), array() );

		$fonts_args = array(
			'family' => 'Arizonia|Montserrat',
			'subset' => 'latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic'
		);
		
		wp_enqueue_style( 'venicelite_google_fonts', add_query_arg ( $fonts_args, "//fonts.googleapis.com/css" ), array(), null );

		wp_enqueue_style ( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
		wp_enqueue_style ( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
		wp_enqueue_style ( 'swipebox', get_template_directory_uri() . '/assets/css/swipebox.css' );
		wp_enqueue_style ( 'venice-lite-template', get_template_directory_uri() . '/assets/css/template.css' );
		wp_enqueue_style ( 'venice-lite-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );

		if ( get_theme_mod('venicelite_skin') )
			wp_enqueue_style( 'venicelite-' . get_theme_mod('venicelite_skin') , get_template_directory_uri() . '/assets/skins/' . get_theme_mod('venicelite_skin') . '.css' ); 

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
		wp_enqueue_script( 'jquery-ui-core', array('jquery'));
		wp_enqueue_script( 'jquery-ui-tabs', array('jquery'));
		wp_enqueue_script( 'masonry', array('jquery') );
		wp_enqueue_script('imagesloaded', array('jquery'));

		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js' , array('jquery'), FALSE, TRUE );
		wp_enqueue_script( 'jquery-nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.js' , array('jquery'), FALSE, TRUE );
		wp_enqueue_script( 'jquery-scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js' , array('jquery'), FALSE, TRUE );
		wp_enqueue_script( 'jquery-swipebox', get_template_directory_uri() . '/assets/js/jquery.swipebox.js' , array('jquery'), FALSE, TRUE );
		wp_enqueue_script( 'jquery-touchSwipe', get_template_directory_uri() . '/assets/js/jquery.touchSwipe.js' , array('jquery'), FALSE, TRUE );
		wp_enqueue_script( 'venice-lite-jquery-functions', get_template_directory_uri() . '/assets/js/jquery.functions.js' , array('jquery'), FALSE, TRUE );
	
		wp_enqueue_script  ( 'venice-lite-html5',get_template_directory_uri().'/assets/scripts/html5.js');
		wp_script_add_data ( 'venice-lite-html5', 'conditional', 'IE 8' );
		
		wp_enqueue_script  ( 'venice-lite-selectivizr',get_template_directory_uri().'/assets/scripts/selectivizr.js');
		wp_script_add_data ( 'venice-lite-selectivizr', 'conditional', 'IE 8' );
	
	}

	add_action( 'wp_enqueue_scripts', 'venicelite_scripts_styles' );

}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('venicelite_setup')) {

	function venicelite_setup() {
		
		global $content_width;

		if ( ! isset( $content_width ) )
			$content_width = venicelite_get_width();
		
		load_theme_textdomain('venice-lite', get_template_directory() . '/languages');

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'custom-logo');
		add_theme_support( 'title-tag' );
	
		add_image_size( 'venicelite-blog-thumbnail', venicelite_get_width(), venicelite_get_thumbs('blog'), TRUE ); 

		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		) );

		register_nav_menu( 'main-menu', 'Main menu' );

		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-metaboxes.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-plugin-activation.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/general.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/style.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/required-plugins.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/widgets.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/woocommerce.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/after-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/archive-title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/before-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/footer.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/media.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/mobile-menu.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/pagination.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-author.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-formats.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/search-title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/page.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/post.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/product.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/footer-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/header-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/side-sidebar.php' );
			
	}

	add_action( 'after_setup_theme', 'venicelite_setup' );

}

?>