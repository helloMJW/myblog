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

if (!function_exists('venicelite_postformat_function')) {

	function venicelite_postformat_function() {
		
		if ( get_post_type( get_the_ID()) == "page" ) {
				
			$postformats = "page";
			
		} else if ( get_post_type( get_the_ID()) == "product" ) {
			
			$postformats = "product";
			
		} else {
			
			$postformats = "standard";
			
		}
						
		get_template_part( 'core/post-formats/' . $postformats . '-format' );
	
	}

	add_action( 'venicelite_postformat','venicelite_postformat_function', 10, 2 );

}

?>