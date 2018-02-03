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

new venicelite_metaboxes ('product', array (

array( "name" => esc_html__( "Navigation","venice-lite"),  
       "type" => "navigation",  

       "item" => array( 
	   	
			"setting" => esc_html__( "Setting","venice-lite") , 
			
		),   

       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	  
	   "tab" => "setting",
	   "element" =>

		array( "name" => esc_html__( "Setting","venice-lite"),
			   "type" => "title",
			  ),

		array( "name" => esc_html__( "Template","venice-lite"),
			   "desc" => esc_html__( "Select a template for this page","venice-lite"),
			   "id" => "venicelite_template",
			   "type" => "select",
			   "options" => array(
				   "full" => esc_html__( "Full Width","venice-lite"),
				   "left-sidebar" =>  esc_html__( "Left Sidebar","venice-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","venice-lite"),
			  ),
			  
			   "std" => "right-sidebar",
		
		),

),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>