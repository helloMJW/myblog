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

if (!function_exists('venicelite_post_author_function')) {
	
	function venicelite_post_author_function() { ?>
	
	<div class="post-author">
                        
		<div class="author-img">
			<?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
		</div>
                    
		<div class="author-content">
			<h5><?php esc_html_e('Written by ','venice-lite'); the_author_posts_link(); ?></h5>
			<p><?php the_author_meta('description'); ?></p>
		</div>
                    
	</div>

	
<?php
	
	} 

	add_action( 'venicelite_post_author', 'venicelite_post_author_function', 10, 2 );

}

?>