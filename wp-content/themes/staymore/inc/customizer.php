<?php
/**
 * staymore Theme Customizer.
 *
 * @package staymore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function staymore_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'staymore_customize_partial_blogname',
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'staymore_customize_partial_blogdescription',
) );



       
    $wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'staymore'),
			'priority' => 1,
            'description' => __('This is the Social Media Section.Add URL to display Social Icons in footer.','staymore')
	) );
    

    $wp_customize->add_setting( 'Facebook', array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( 'Facebook', array(
				'label'    => __( "Facebook url:", 'staymore' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => 1,
		) );
    $wp_customize->add_setting( 'Google_plus', array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( 'Google_plus', array(
				'label'    => __( "Google plus url:", 'staymore' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => 2,
		) );
     $wp_customize->add_setting( 'Linkedin', array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control('Linkedin', array(
				'label'    => __( "Linkedin url:", 'staymore' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => 3,
		) );
     $wp_customize->add_setting( 'Twitter', array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( 'Twitter', array(
				'label'    => __( "Twitter url:", 'staymore' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => 4,
		) );



}
add_action( 'customize_register', 'staymore_customize_register' );

function staymore_customize_partial_blogname() {
	bloginfo( 'name' );
}
	
function staymore_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function staymore_customize_preview_js() {
    wp_enqueue_script( 'staymore-customizer', get_template_directory_uri() . '/js/customizer.js', array(), '20160824', true );
}
add_action( 'customize_preview_init', 'staymore_customize_preview_js' );