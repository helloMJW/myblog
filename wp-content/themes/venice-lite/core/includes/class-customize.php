<?php

class venicelite_customize {

	public $theme_fields;

	public function __construct( $fields = array() ) {

		$this->theme_fields = $fields;

		add_action ('customize_register' , array( &$this, 'customize_panel' ) );
		add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

	}

	public function customize_scripts() {

		wp_enqueue_style ( 
			'venicelite_panel', 
			get_template_directory_uri() . '/core/admin/assets/css/customize.css', 
			array(), 
			''
		);

	}
	
	public function customize_panel ( $wp_customize ) {

		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			switch ( $element['type'] ) {
					
				case 'panel' :
				
					$wp_customize->add_panel( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'description' => $element['description'],
						'capability' => 'edit_theme_options',

					) );
			 
				break;
				
				case 'section' :
						
					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'panel' => $element['panel'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );
					
				break;

				case 'text' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_text_field',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'url' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'esc_url_raw',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'upload' :
							
					$wp_customize->add_setting( $element['id'], array(

						'default' => $element['std'],
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw'

					) );

					$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $element['id'], array(
					
						'label' => $element['label'],
						'description' => $element['description'],
						'section' => $element['section'],
						'settings' => $element['id'],
						'capability' => 'edit_theme_options',

					)));

				break;

				case 'color' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_hex_color',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'button' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => array( &$this, 'customize_button_sanize' ),
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => 'url',
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'textarea' :
							
					$wp_customize->add_setting( $element['id'], array(
					
						'sanitize_callback' => 'sanitize_textarea_field',
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );
											 
					$wp_customize->add_control( $element['id'] , array(
					
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'select' :
							
					$wp_customize->add_setting( $element['id'], array(

						'sanitize_callback' => array( &$this, 'customize_select_sanize' ),
						'default' => $element['std'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_control( $element['id'] , array(
						
						'type' => $element['type'],
						'section' => $element['section'],
						'label' => $element['label'],
						'description' => $element['description'],
						'choices'  => $element['options'],
						'capability' => 'edit_theme_options',

					) );
							
				break;

				case 'venicelite-customize-info' :

					$wp_customize->add_section( $element['id'], array(
					
						'title' => $element['title'],
						'priority' => $element['priority'],
						'capability' => 'edit_theme_options',

					) );

					$wp_customize->add_setting(  $element['id'], array(
						'sanitize_callback' => 'esc_url_raw'
					) );
					 
					$wp_customize->add_control( new venicelite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
						'section' => $element['section'],
					) ) );		
										
				break;

			}
			
		}

   }

	public function customize_select_sanize ( $value, $setting ) {
		
		$theme_panel = $this->theme_fields ;

		foreach ( $theme_panel as $element ) {
			
			if ( $element['id'] == $setting->id ) :

				if ( array_key_exists($value, $element['options'] ) ) : 
						
					return $value;

				endif;

			endif;
			
		}
		
	}

	public function customize_button_sanize ( $value, $setting ) {
		
		$sanize = array (
		
			'venicelite_footer_email_button' => 'mailto:',
			'venicelite_footer_skype_button' => 'skype:',
			'venicelite_footer_whatsapp_button' => 'tel:',
		
		);
		
		$sanize = array (
		
			'venicelite_footer_email_button' => 'mailto:',
			'venicelite_footer_skype_button' => 'skype:',
			'venicelite_footer_whatsapp_button' => 'tel:',
		
		);
		
		if ( $value ) :
	
			if ( !strstr ( $value, $sanize[$setting->id]) ) {
	
				return $sanize[$setting->id] . $value ;
	
			} else {
	
				return esc_url_raw( $value, array('skype', 'mailto', 'tel'));
	
			}
			
		else:
		
			return '';
		
		endif;

	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class venicelite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "venicelite-customize-info";

		public function render_content() { ?>

			<h2><?php esc_html_e('Upgrade to Venice Pro','venice-lite');?></h2> 
            
            <div class="inside">

                <p><?php esc_html_e("Upgrade to the premium version of Venice, to enable 600+ Google Fonts, the masonry layout, different layout for post formats and much more.","venice-lite");?></p>

                <ul>
                
                    <li><a class="button purchase-button" href="<?php echo esc_url( 'https://www.themeinprogress.com/venice-free-woocommerce-wordpress-blog-theme/?ref=2&campaign=venice-notice' ); ?>" title="<?php esc_attr_e('Upgrade to Venice Pro','venice-lite');?>" target="_blank"><?php esc_html_e('Upgrade to Venice Pro','venice-lite');?></a></li>
                
                </ul>

            </div>

			<h2><?php esc_html_e('Get support','venice-lite');?></h2> 

            <div class="inside">

                <p><?php esc_html_e("If you've opened a new support ticket from WordPress.org, please send a reminder to support@wpinprogress.com, to get a faster reply.","venice-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/theme/'.get_stylesheet() ); ?>" title="<?php esc_attr_e('Open a new ticket','venice-lite');?>" target="_blank"><?php esc_html_e('Open a new ticket','venice-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'mailto:support@wpinprogress.com' ); ?>" title="<?php esc_attr_e('Send a reminder','venice-lite');?>" target="_blank"><?php esc_html_e('Send a reminder','venice-lite');?></a></li>
                
                </ul>
    
                <p><?php esc_html_e("If you like this theme and support, I'd appreciate any of the following:","venice-lite");?></p>

                <ul>
                
                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/'.get_stylesheet().'#postform' ); ?>" title="<?php esc_attr_e('Rate this Theme','venice-lite');?>" target="_blank"><?php esc_html_e('Rate this Theme','venice-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.facebook.com/WpInProgress' ); ?>" title="<?php esc_attr_e('Like on Facebook','venice-lite');?>" target="_blank"><?php esc_html_e('Like on Facebook','venice-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://eepurl.com/SknoL' ); ?>" title="<?php esc_attr_e('Subscribe our newsletter','venice-lite');?>" target="_blank"><?php esc_html_e('Subscribe our newsletter','venice-lite');?></a></li>
                
                </ul>
    
            </div>
    
		<?php

		}
	
	}

}

?>