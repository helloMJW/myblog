<?php 

if (!function_exists('venicelite_css_custom')) {

	function venicelite_css_custom() { 

	echo '<style type="text/css">';

/* =================== BEGIN PAGE WIDTH =================== */

	if (venicelite_setting('venicelite_screen1')) {
	
		echo "@media (min-width:768px){.container{width:".esc_html(venicelite_setting('venicelite_screen1'))."px}}"; 
		echo "@media (min-width:768px){.container.block{width:" . (esc_html(venicelite_setting('venicelite_screen1'))-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (esc_html(venicelite_setting('venicelite_screen1'))-20) . "px}}"; 
	}
	
	if (venicelite_setting('venicelite_screen2')) {
		
		echo "@media (min-width:992px){.container{width:".esc_html(venicelite_setting('venicelite_screen2'))."px}}"; 
		echo "@media (min-width:992px){.container.block{width:" . (esc_html(venicelite_setting('venicelite_screen2'))-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (esc_html(venicelite_setting('venicelite_screen2'))-20) . "px}}"; 
	}
	
	if (venicelite_setting('venicelite_screen3'))  {
		
		echo "@media (min-width:1200px){.container{width:".esc_html(venicelite_setting('venicelite_screen3'))."px}}"; 
		echo "@media (min-width:1200px){.container.block{width:" . (esc_html(venicelite_setting('venicelite_screen3'))-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (esc_html(venicelite_setting('venicelite_screen3'))-20) . "px}}"; 
	}
	
/* =================== END PAGE WIDTH =================== */

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';

	/* Logo Font Size */
	if (venicelite_setting('venicelite_logo_font_size')) 
		$logostyle .= "font-size:".esc_html(venicelite_setting('venicelite_logo_font_size')).";"; 
	
	if ($logostyle)
		echo '#logo a.logo { '.$logostyle.' } ';

	$logospanstyle = '';

	/* Logo Font Size */
	if (venicelite_setting('venicelite_logo_description_font_size')) 
		$logospanstyle .= "font-size:".esc_html(venicelite_setting('venicelite_logo_description_font_size')).";"; 
	
	if ($logospanstyle)
		echo '#logo a.logo span{ '.$logospanstyle.' } ';

	if ( venicelite_setting('venicelite_logo_text_color') ) :
	
		echo "#logo a.logo { color:" . esc_html(venicelite_setting('venicelite_logo_text_color')) . ";}"; 
	
	endif;

/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	if ( venicelite_setting('venicelite_menu_font_size') ) { 
		echo "nav#mainmenu ul li a, .header-cart a, .social-buttons a, nav#mobilemenu ul li a { font-size:".esc_html(venicelite_setting('venicelite_menu_font_size'))."; }"; 
		echo "nav#mainmenu ul ul li a, nav#mobilemenu ul ul li a { font-size:" . ( str_replace("px", "", esc_html(venicelite_setting('venicelite_menu_font_size'))) - 2 ) . "px;}"; 
	}
	
	if (venicelite_setting('venicelite_menu_font_weight')) :
	
		echo "nav#mainmenu ul li a, nav#mobilemenu ul li a { font-weight:" . esc_html(venicelite_setting('venicelite_menu_font_weight')) . ";}"; 
	
	endif;

	if (venicelite_setting('venicelite_menu_text_transform')) :
	
		echo "nav#mainmenu ul li a, nav#mobilemenu ul li a { text-transform:" . esc_html(venicelite_setting('venicelite_menu_text_transform')) . ";}"; 
	
	endif;

/* =================== END NAV STYLE =================== */


/* =================== START TITLE STYLE =================== */

	if (venicelite_setting('venicelite_h1_font_size')) 
		echo "h1, h1.title, h1.title a  { font-size:".esc_html(venicelite_setting('venicelite_h1_font_size'))."; }"; 
	if (venicelite_setting('venicelite_h2_font_size')) 
		echo "h2, h2.title, h2.title a  { font-size:".esc_html(venicelite_setting('venicelite_h2_font_size'))."; }"; 
	if (venicelite_setting('venicelite_h3_font_size')) 
		echo "h3, h3.title, h3.title a  { font-size:".esc_html(venicelite_setting('venicelite_h3_font_size'))."; }"; 
	if (venicelite_setting('venicelite_h4_font_size')) 
		echo "h4, h4.title, h4.title a  { font-size:".esc_html(venicelite_setting('venicelite_h4_font_size'))."; }"; 
	if (venicelite_setting('venicelite_h5_font_size')) 
		echo "h5, h5.title, h5.title a  { font-size:".esc_html(venicelite_setting('venicelite_h5_font_size'))."; }"; 
	if (venicelite_setting('venicelite_h6_font_size')) 
		echo "h6, h6.title, h6.title a  { font-size:".esc_html(venicelite_setting('venicelite_h6_font_size'))."; }"; 


/* =================== END TITLE STYLE =================== */


	echo '</style>';

	}

	add_action('wp_head', 'venicelite_css_custom');

}

?>