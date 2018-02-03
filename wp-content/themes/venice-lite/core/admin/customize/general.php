<?php

if (!function_exists('venicelite_admin_init')) {

	function venicelite_admin_init() {

		global $pagenow;

		if ( $pagenow == "post-new.php" || $pagenow == "post.php" ) :

			$file_dir = get_template_directory_uri()."/core/admin/assets/";
		
			wp_enqueue_style ( 'venicelite_style', $file_dir.'css/theme.css' ); 
			wp_enqueue_script( 'venicelite_script', $file_dir.'js/theme.js',array('jquery'),'',TRUE ); 
			wp_enqueue_style ( 'venicelite_on_off', $file_dir.'css/on_off.css' ); 
			wp_enqueue_script( 'venicelite_on_off', $file_dir.'js/on_off.js',array('jquery'),'',TRUE ); 
			
			wp_enqueue_script( 'jquery-ui-core');
			wp_enqueue_script( 'jquery-ui-tabs');
	
			wp_enqueue_style( "thickbox" );
			add_thickbox();
	
		endif;
		
	}
	
	add_action('admin_init', 'venicelite_admin_init');

}

?>