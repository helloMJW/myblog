<?php 

	get_header();

	do_action('venicelite_archive_title'); 
	do_action('venicelite_header_sidebar'); 
	
	get_template_part('layouts/archive','classic');

	get_footer(); 

?>