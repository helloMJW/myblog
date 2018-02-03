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

if (!function_exists('venicelite_after_content_function')) {

	function venicelite_after_content_function() { 

		if ( venicelite_get_archive_title() || is_page_template() || is_search() || is_home() ) {

			if ( !venicelite_setting('venicelite_view_readmore') || venicelite_setting('venicelite_view_readmore') == "on" ) {

				the_excerpt();
			
			} else if (venicelite_setting('venicelite_view_readmore') == "off" ) {

				the_content(); 
			
			}

		} else {
		
			the_content();

			the_tags( '<footer class="tags"><strong>Tags:</strong> ', ', ', '</footer>' );
	
			if ( ( !venicelite_setting('venicelite_view_author') || venicelite_setting('venicelite_view_author') == "on") && is_singular('post') ) : 
	
				do_action('venicelite_post_author');
	
			endif;

			if ( ( !venicelite_setting('venicelite_view_comments') || venicelite_setting('venicelite_view_comments') == "on" ) && comments_open() ) : 
	
				comments_template();
	
			endif;
		
		}
		

	} 

	add_action( 'venicelite_after_content', 'venicelite_after_content_function', 10, 2 );

}

?>