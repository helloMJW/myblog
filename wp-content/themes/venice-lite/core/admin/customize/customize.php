<?php

if (!function_exists('venicelite_customize_panel_function')) {

	function venicelite_customize_panel_function() {
		
		$theme_panel = array ( 

			array(
				
				"label" => esc_html__( "Logo color","venice-lite"),
				"description" => esc_html__( "Choose a color for the logo.","venice-lite"),
				"id" => "venicelite_logo_text_color",
				"type" => "color",
				"section" => "colors",
				"std" => "#616161",
			
			),

			/* START SUPPORT SECTION */ 

			array(
			
				"title" => esc_html__( "Upgrade to Venice Pro","venice-lite"),
				"id" => "venicelite-customize-info",
				"type" => "venicelite-customize-info",
				"section" => "venicelite-customize-info",
				"priority" => "08",

			),

			/* START GENERAL SECTION */ 

			array( 
				
				"title" => esc_html__( "General","venice-lite"),
				"description" => esc_html__( "General","venice-lite"),
				"type" => "panel",
				"id" => "general_panel",
				"priority" => "10",
				
			),

			array( 

				"title" => esc_html__( "Load system","venice-lite"),
				"type" => "section",
				"id" => "loadsystem_section",
				"panel" => "general_panel",
				"priority" => "09",

			),

			array(
				
				"label" => esc_html__( "Choose a load system","venice-lite"),
				"description" => esc_html__( "Select a load system, if you've some problems with the theme (for example a blank page).","venice-lite"),
				"id" => "venicelite_loadsystem",
				"type" => "select",
				"section" => "loadsystem_section",
				"options" => array (
				   "mode_a" => esc_html__( "Mode a","venice-lite"),
				   "mode_b" => esc_html__( "Mode b","venice-lite"),
				),
				
				"std" => "mode_a",
			
			),

			/* SKINS */ 

			array( 

				"title" => esc_html__( "Color Scheme","venice-lite"),
				"type" => "section",
				"panel" => "general_panel",
				"priority" => "10",
				"id" => "colorscheme_section",

			),

			array(
				
				"label" => esc_html__( "Predefined Color Schemes","venice-lite"),
				"description" => esc_html__( "Choose your Color Scheme","venice-lite"),
				"id" => "venicelite_skin",
				"type" => "select",
				"section" => "colorscheme_section",
				"options" => array (

				   "cyan" => esc_html__( "Cyan","venice-lite"),
				   "orange" => esc_html__( "Orange","venice-lite"),
				   "blue" => esc_html__( "Blue","venice-lite"),
				   "red" => esc_html__( "Red","venice-lite"),
				   "pink" => esc_html__( "Pink","venice-lite"),
				   "purple" => esc_html__( "Purple","venice-lite"),
				   "yellow" => esc_html__( "Yellow","venice-lite"),
				   "green" => esc_html__( "Green","venice-lite"),

				),
				
				"std" => "orange",
			
			),

			/* PAGE WIDTH */ 

			array( 

				"title" => esc_html__( "Page width",'venice-lite'),
				"type" => "section",
				"id" => "pagewidth_section",
				"panel" => "general_panel",
				"priority" => "11",

			),

			array( 

				"label" => esc_html__( "Screen greater than 768px",'venice-lite'),
				"description" => esc_html__( "Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ",'venice-lite'),
				"id" => "venicelite_screen1",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "750",

			),

			array( 

				"label" => esc_html__( "Screen greater than 992px",'venice-lite'),
				"description" => esc_html__( "Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ",'venice-lite'),
				"id" => "venicelite_screen2",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			array( 

				"label" => esc_html__( "Screen greater than 1200px",'venice-lite'),
				"description" => esc_html__( "Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ",'venice-lite'),
				"id" => "venicelite_screen3",
				"type" => "text",
				"section" => "pagewidth_section",
				"std" => "940",

			),

			/* SETTINGS SECTION */ 

			array( 

				"title" => esc_html__( "Settings","venice-lite"),
				"type" => "section",
				"id" => "settings_section",
				"panel" => "general_panel",
				"priority" => "12",

			),

			array( 
				
				"label" => esc_html__( "Category title","venice-lite"),
				"description" => esc_html__( "Do you want to view the category title, under the black container?","venice-lite"),
				"id" => "venicelite_view_category_title",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "on",
			
			),
				
			array( 
				
				"label" => esc_html__( "Searched item","venice-lite"),
				"description" => esc_html__( "Do you want to view the searched item, under the black container?","venice-lite"),
				"id" => "venicelite_view_searched_item",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "on",
			
			),
				
			array(
				
				"label" => esc_html__( "Read more","venice-lite"),
				"description" => esc_html__( "Do you want to display the read more button?","venice-lite"),
				"id" => "venicelite_view_readmore",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "on",
			
			),

			array(
				
				"label" => esc_html__( "Author","venice-lite"),
				"description" => esc_html__( "Do you want to view the author?","venice-lite"),
				"id" => "venicelite_view_author",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "off",
			
			),
			
			array(
				
				"label" => esc_html__( "Post icon","venice-lite"),
				"description" => esc_html__( "Do you want to display the post icon, of each article?","venice-lite"),
				"id" => "venicelite_view_post_icon",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "on",
			
			),
			
			array(
				
				"label" => esc_html__( "WooCommerce header cart","venice-lite"),
				"description" => esc_html__( "Do you want to display the header cart?","venice-lite"),
				"id" => "venicelite_woocommerce_header_cart",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "on",
			
			),
			
			array(
				
				"label" => esc_html__( "Back to top button.","venice-lite"),
				"description" => esc_html__( "Do you want to display a button to back on the top of the site?","venice-lite"),
				"id" => "venicelite_view_back_to_top",
				"type" => "select",
				"section" => "settings_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "on",
			
			),

			/* LAYOUTS SECTION */ 

			array( 

				"title" => esc_html__( "Layouts","venice-lite"),
				"type" => "section",
				"id" => "layouts_section",
				"panel" => "general_panel",
				"priority" => "14",

			),

			array(
				
				"label" => esc_html__("Home Blog Layout","venice-lite"),
				"description" => esc_html__("If you've set the latest articles, for the homepage, choose a layout.","venice-lite"),
				"id" => "venicelite_home",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","venice-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","venice-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","venice-lite"),
				),
				
				"std" => "right-sidebar",
			
			),
	

			array(
				
				"label" => esc_html__("Category Layout","venice-lite"),
				"description" => esc_html__("Select a layout for category pages.","venice-lite"),
				"id" => "venicelite_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","venice-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","venice-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","venice-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("WooCommerce Category Layout","venice-lite"),
				"description" => esc_html__("Select a layout for the woocommerce categories.","venice-lite"),
				"id" => "venicelite_woocommerce_category_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","venice-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","venice-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","venice-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("Search Layout","venice-lite"),
				"description" => esc_html__("Select a layout for the search section.","venice-lite"),
				"id" => "venicelite_search_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
				   "full" => esc_html__( "Full Width","venice-lite"),
				   "left-sidebar" => esc_html__( "Left Sidebar","venice-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","venice-lite"),
				),
				
				"std" => "right-sidebar",
			
			),

			array(
				
				"label" => esc_html__("Read More Layout","venice-lite"),
				"description" => esc_html__("Select a layout for the readmore button.","venice-lite"),
				"id" => "venicelite_readmore_layout",
				"type" => "select",
				"section" => "layouts_section",
				"options" => array (
					"default" => esc_html__( "Default Button","venice-lite"),
					"nobutton" =>  esc_html__( "Replace with => [...]","venice-lite"),
				),
				
				"std" => "default",
			
			),

			/* THUMBNAILS SECTION */ 

			array( 

				"title" => esc_html__( "Thumbnails",'venice-lite'),
				"type" => "section",
				"id" => "thumbnails_section",
				"panel" => "general_panel",
				"priority" => "15",

			),

			array( 

				"label" => esc_html__( "Blog Thumbnail",'venice-lite'),
				"description" => esc_html__( "Insert the height for blog thumbnail.",'venice-lite'),
				"id" => "venicelite_blog_thumbinal",
				"type" => "text",
				"section" => "thumbnails_section",
				"std" => "690",

			),

			/* FOOTER AREA SECTION */ 

			array( 

				"title" => esc_html__( "Footer & Social Media","venice-lite"),
				"type" => "section",
				"id" => "footer_section",
				"panel" => "general_panel",
				"priority" => "17",

			),

			array( 

				"label" => esc_html__( "Copyright Text","venice-lite"),
				"description" => esc_html__( "Insert your copyright text.","venice-lite"),
				"id" => "venicelite_copyright_text",
				"type" => "textarea",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Facebook Url","venice-lite"),
				"description" => esc_html__( "Insert Facebook Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_facebook_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Twitter Url","venice-lite"),
				"description" => esc_html__( "Insert Twitter Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_twitter_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Flickr Url","venice-lite"),
				"description" => esc_html__( "Insert Flickr Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_flickr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Google Url","venice-lite"),
				"description" => esc_html__( "Insert Google Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_google_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Linkedin Url","venice-lite"),
				"description" => esc_html__( "Insert Linkedin Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_linkedin_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Pinterest Url","venice-lite"),
				"description" => esc_html__( "Insert Pinterest Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_pinterest_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Tumblr Url","venice-lite"),
				"description" => esc_html__( "Insert Tumblr Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_tumblr_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Youtube Url","venice-lite"),
				"description" => esc_html__( "Insert Youtube Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_youtube_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Vimeo Url","venice-lite"),
				"description" => esc_html__( "Insert Vimeo Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_vimeo_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Instagram Url","venice-lite"),
				"description" => esc_html__( "Insert Instagram Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_instagram_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Deviantart Url","venice-lite"),
				"description" => esc_html__( "Insert Deviantart Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_deviantart_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Github Url","venice-lite"),
				"description" => esc_html__( "Insert Github Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_github_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Xing Url","venice-lite"),
				"description" => esc_html__( "Insert Xing Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_xing_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),
			
			array( 

				"label" => esc_html__( "Dribbble Url","venice-lite"),
				"description" => esc_html__( "Insert Dribbble Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_dribbble_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),
			
			array( 

				"label" => esc_html__( "Dropbox Url","venice-lite"),
				"description" => esc_html__( "Insert Dropbox Url (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_dropbox_button",
				"type" => "url",
				"section" => "footer_section",
				"std" => "",

			),
			
			array( 

				"label" => esc_html__( "Whatsapp Number","venice-lite"),
				"description" => esc_html__( "Insert Whatsapp number (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_whatsapp_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Skype Url","venice-lite"),
				"description" => esc_html__( "Insert Skype ID (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_skype_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array( 

				"label" => esc_html__( "Email Address","venice-lite"),
				"description" => esc_html__( "Insert Email Address (leave empty if you want to hide the button)","venice-lite"),
				"id" => "venicelite_footer_email_button",
				"type" => "button",
				"section" => "footer_section",
				"std" => "",

			),

			array(
				
				"label" => esc_html__( "Feed Rss Button","venice-lite"),
				"description" => esc_html__( "Do you want to display the Feed Rss button?","venice-lite"),
				"id" => "venicelite_footer_rss_button",
				"type" => "select",
				"section" => "footer_section",
				"options" => array (
				   "off" => esc_html__( "No","venice-lite"),
				   "on" => esc_html__( "Yes","venice-lite"),
				),
				
				"std" => "off",
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				"title" => esc_html__( "Typography","venice-lite"),
				"description" => esc_html__( "Typography","venice-lite"),
				"type" => "panel",
				"id" => "typography_panel",
				"priority" => "11",
				
			),

			/* LOGO */ 

			array( 

				"title" => esc_html__( "Logo","venice-lite"),
				"type" => "section",
				"id" => "logo_section",
				"panel" => "typography_panel",
				"priority" => "10",

			),

			array( 

				"label" => esc_html__( "Font size","venice-lite"),
				"description" => esc_html__( "Insert a size, for logo font (For example, 60px) ","venice-lite"),
				"id" => "venicelite_logo_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "70px",

			),
			
			array( 

				"label" => esc_html__( "Description font size","venice-lite"),
				"description" => esc_html__( "Insert a size, for logo description (For example, 14px) ","venice-lite"),
				"id" => "venicelite_logo_description_font_size",
				"type" => "text",
				"section" => "logo_section",
				"std" => "14px",

			),
			
			/* MENU */ 

			array( 

				"title" => esc_html__( "Menu","venice-lite"),
				"type" => "section",
				"id" => "menu_section",
				"panel" => "typography_panel",
				"priority" => "11",

			),

			array( 

				"label" => esc_html__( "Font size","venice-lite"),
				"description" => esc_html__( "Insert a size, for menu font (For example, 14px) ","venice-lite"),
				"id" => "venicelite_menu_font_size",
				"type" => "text",
				"section" => "menu_section",
				"std" => "14px",

			),
		
			array( 
				
				"label" => esc_html__( "Menu weight","venice-lite"),
				"description" => esc_html__( "Choose a font weight for the menu","venice-lite"),
				"id" => "venicelite_menu_font_weight",
				"type" => "select",
				"section" => "menu_section",
				"options" => array(
					"400" => esc_html__( "400","venice-lite"),
					"500" => esc_html__( "500","venice-lite"),
					"600" => esc_html__( "600","venice-lite"),
					"700" => esc_html__( "700","venice-lite"),
					"800" => esc_html__( "800","venice-lite"),
				),
				"std" => "400"),
					
			array( 
			
				"label" => esc_html__( "Text transform","venice-lite"),
				"description" => esc_html__( "Choose a font weight for the menu","venice-lite"),
				"id" => "venicelite_menu_text_transform",
				"type" => "select",
				"section" => "menu_section",
				"options" => array(
					"none" => esc_html__( "None","venice-lite"),
					"uppercase" => esc_html__( "Uppercase","venice-lite"),
				),
				"std" => ""),
		
			/* CONTENT */ 

			array( 

				"title" => esc_html__( "Content","venice-lite"),
				"type" => "section",
				"id" => "content_section",
				"panel" => "typography_panel",
				"priority" => "12",

			),

			array( 

				"label" => esc_html__( "Font size","venice-lite"),
				"description" => esc_html__( "Insert a size, for content font (For example, 14px) ","venice-lite"),
				"id" => "venicelite_content_font_size",
				"type" => "text",
				"section" => "content_section",
				"std" => "14px",

			),


			/* HEADLINES */ 

			array( 

				"title" => esc_html__( "Headlines","venice-lite"),
				"type" => "section",
				"id" => "headlines_section",
				"panel" => "typography_panel",
				"priority" => "13",

			),

			array( 

				"label" => esc_html__( "H1 headline","venice-lite"),
				"description" => esc_html__( "Insert a size, for for H1 elements (For example, 24px) ","venice-lite"),
				"id" => "venicelite_h1_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "24px",

			),

			array( 

				"label" => esc_html__( "H2 headline","venice-lite"),
				"description" => esc_html__( "Insert a size, for for H2 elements (For example, 22px) ","venice-lite"),
				"id" => "venicelite_h2_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "22px",

			),

			array( 

				"label" => esc_html__( "H3 headline","venice-lite"),
				"description" => esc_html__( "Insert a size, for for H3 elements (For example, 20px) ","venice-lite"),
				"id" => "venicelite_h3_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "20px",

			),

			array( 

				"label" => esc_html__( "H4 headline","venice-lite"),
				"description" => esc_html__( "Insert a size, for for H4 elements (For example, 18px) ","venice-lite"),
				"id" => "venicelite_h4_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "18px",

			),

			array( 

				"label" => esc_html__( "H5 headline","venice-lite"),
				"description" => esc_html__( "Insert a size, for for H5 elements (For example, 16px) ","venice-lite"),
				"id" => "venicelite_h5_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "16px",

			),

			array( 

				"label" => esc_html__( "H6 headline","venice-lite"),
				"description" => esc_html__( "Insert a size, for for H6 elements (For example, 14px) ","venice-lite"),
				"id" => "venicelite_h6_font_size",
				"type" => "text",
				"section" => "headlines_section",
				"std" => "14px",

			),
		);
		
		new venicelite_customize($theme_panel);
		
	} 
	
	add_action( 'venicelite_customize_panel', 'venicelite_customize_panel_function', 10, 2 );

}

do_action('venicelite_customize_panel');

?>