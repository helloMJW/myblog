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

do_action('venicelite_thumbnail', 'venicelite-blog-thumbnail'); 

?>
    
<div class="post-article">

    <?php 
	
		do_action('venicelite_before_content', 'post');
		do_action('venicelite_after_content'); 
		
	?>

</div>