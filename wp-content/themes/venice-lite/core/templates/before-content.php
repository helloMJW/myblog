<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('venicelite_before_content_function')) {

	function venicelite_before_content_function( $type = "post" ) {
		
		if ( $type == "post" ) :
			
			echo '<span class="entry-category">'; 
			the_category(' . '); 
			echo '</span>';
		
		endif;
		
		if ( ! venicelite_is_single() ) {

			do_action('venicelite_get_title', 'blog' ); 

		} else {

			if ( !venicelite_is_woocommerce_active('is_cart') ) :
	
				if ( venicelite_is_single() && !is_page_template() ) :
							 
					do_action('venicelite_get_title','single');
							
				else :
					
					do_action('venicelite_get_title','blog'); 
							 
				endif;
	
			endif;

		}

		if ( $type == "post" ) :
			
			echo '<span class="entry-date">' . esc_html__('On ','venice-lite') . get_the_date() . esc_html__(' by ','venice-lite') . get_the_author_posts_link() . '</span>';
		
		endif;

	} 
	
	add_action( 'venicelite_before_content', 'venicelite_before_content_function', 10, 2 );

}

?>