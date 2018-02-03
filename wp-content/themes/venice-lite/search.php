<?php 

	get_header(); 

	do_action('venicelite_searched_item');
	do_action('venicelite_header_sidebar');

	get_template_part('layouts/search','classic');

	get_footer(); 

?>