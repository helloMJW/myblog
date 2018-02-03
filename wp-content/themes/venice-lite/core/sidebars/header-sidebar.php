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

if (!function_exists('venicelite_header_sidebar_function')) {

	function venicelite_header_sidebar_function() {
	
		if ( is_active_sidebar("header-sidebar-area") ) : ?>
			
			<section id="header_sidebar" class="container sidebar-area">
			
				<div class="row">
				
					<div class="col-md-12">
						
						<?php dynamic_sidebar("header-sidebar-area") ?>
												
					</div>
	
				</div>
				
			</section>
				
<?php 
	
		endif;
		
	}

	add_action( 'venicelite_header_sidebar', 'venicelite_header_sidebar_function', 10, 2 );

}

?>