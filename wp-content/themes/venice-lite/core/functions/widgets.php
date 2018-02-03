<?php

if (!function_exists('venicelite_loadwidgets')) {

	function venicelite_loadwidgets() {
	
/*-----------------------------------------------------------------------------------*/
/* 		LOAD ALL SIDEBAR AREAS
/*-----------------------------------------------------------------------------------*/    

		register_sidebar(array(
		
			'name' => esc_html__('Side Sidebar','venice-lite'),
			'id'   => 'side-sidebar-area',
			'description'   => esc_html__('This sidebar will be shown at the side of content.','venice-lite'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(
		
			'name' => esc_html__('Header Sidebar','venice-lite'),
			'id'   => 'header-sidebar-area',
			'description'   => esc_html__('This sidebar will be shown before the content.','venice-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(
		
			'name' => esc_html__('Footer Sidebar','venice-lite'),
			'id'   => 'footer-sidebar-area',
			'description'   => esc_html__('This sidebar will be shown after the content.','venice-lite'),
			'before_widget' => '<div id="%1$s" class="col-md-3 %2$s"><div class="widget-box">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

	}

	add_action( 'widgets_init', 'venicelite_loadwidgets' );

}

?>