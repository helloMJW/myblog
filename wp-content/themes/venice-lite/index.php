<?php 

	get_header();
	
	do_action('venicelite_header_sidebar');
	
	get_template_part('layouts/home','classic');

	get_footer(); 
	
?>