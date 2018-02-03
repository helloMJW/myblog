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

if (!function_exists('venicelite_thumbnail_function')) {

	function venicelite_thumbnail_function($id) {
		
		if ( has_post_thumbnail() ) :
		
			echo '<div class="pin-container">';
		
				echo venicelite_posticon();
				the_post_thumbnail($id);

			echo '</div>';
	
		endif; 
	
	}

	add_action( 'venicelite_thumbnail', 'venicelite_thumbnail_function', 10, 2 );

}

?>