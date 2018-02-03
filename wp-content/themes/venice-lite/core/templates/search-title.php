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

if (!function_exists('venicelite_searched_item_function')) {

	function venicelite_searched_item_function( $row = "on" ) {
		
		global $s;

		if ( !venicelite_setting('venicelite_view_searched_item') || venicelite_setting('venicelite_view_searched_item') == "on" ) :
			
?>

            <section class="archive-box">
            
                <div class="container">
                
                    <div class="row">
                
                        <div class="col-md-12" >
                    
                            <h1><?php esc_html_e( '<span>Search </span> results for', 'venice-lite' ) ?> <strong><?php echo $s; ?> </strong></h1>
                    
                        </div>
                        
                    </div>
                        
                </div>
            
            </section>
	
<?php
	
		endif;
		
	} 
	
	add_action( 'venicelite_searched_item', 'venicelite_searched_item_function', 10, 2 );

}

?>