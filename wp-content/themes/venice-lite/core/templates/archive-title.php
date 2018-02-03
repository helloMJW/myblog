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

if (!function_exists('venicelite_archive_title_function')) {

	function venicelite_archive_title_function( $row = "on" ) {

		if ( !venicelite_setting('venicelite_view_category_title') || venicelite_setting('venicelite_view_category_title') == "on" ) :
			
?>

            <section class="archive-box">
            
                <div class="container">
                
                    <div class="row">
                
                        <div class="col-md-12" >
                    
                            <h1> <?php echo venicelite_get_archive_title(); ?></h1>
                    
                        </div>
                        
                    </div>
                        
                </div>
            
            </section>
                
<?php
	
		endif;
		
	} 
	
	add_action( 'venicelite_archive_title', 'venicelite_archive_title_function', 10, 2 );

}

?>