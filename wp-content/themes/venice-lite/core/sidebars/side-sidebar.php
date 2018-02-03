<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('venicelite_side_sidebar_function')) {

	function venicelite_side_sidebar_function() {
	
	?>
    
		<section id="sidebar" class="col-md-4 sidebar-area">
                    
			<div class="post-container">

				<?php 
                
                    if ( is_active_sidebar("side-sidebar-area")) { 
                                        
                        dynamic_sidebar("side-sidebar-area");
                                        
                    } else { 
                                   
                        the_widget( 'WP_Widget_Calendar',
                    
                        array("title"=> esc_html__('Calendar','venice-lite')),
                        array('before_widget' => '<div class="post-article">',
                            'after_widget'  => '</div>',
                            'before_title'  => '<h4 class="title">',
                            'after_title'   => '</h4>'
                        )
                                   
                        );
                            
                        the_widget( 'WP_Widget_Archives','',
                        array('before_widget' => '<div class="post-article">',
                            'after_widget'  => '</div>',
                            'before_title'  => '<h4 class="title">',
                            'after_title'   => '</h4>'
                        )
                            
                        );
                            
                        the_widget( 'WP_Widget_Categories','',
                        array('before_widget' => '<div class="post-article">',
                            'after_widget'  => '</div>',
                            'before_title'  => '<h4 class="title">',
                            'after_title'   => '</h4>'
                        )
                            
                        );
                            
                                        
                    } 
            
                ?>
            
			</div>
                        
		</section>
            
		<?php 
			 

	}

	add_action( 'venicelite_side_sidebar', 'venicelite_side_sidebar_function', 10, 2 );

}

?>