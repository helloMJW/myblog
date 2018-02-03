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

if (!function_exists('venicelite_footer_sidebar_function')) {

	function venicelite_footer_sidebar_function() {

		if ( is_active_sidebar( "footer-sidebar-area" ) ) : ?>
			
			<section class="row widget sidebar-area">
			
				<?php dynamic_sidebar( "footer-sidebar-area" ) ?>
			
			</section>
				
<?php 
	
		endif;
		
	}

	add_action( 'venicelite_footer_sidebar', 'venicelite_footer_sidebar_function', 10, 2 );

}

?>