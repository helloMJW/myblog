<?php
/**
 * Add theme dashboard page
 */

add_action('admin_menu', 'bloggerz_theme_info');
function bloggerz_theme_info() {
	$theme_data = wp_get_theme();
	add_theme_page( sprintf( esc_html__( '%s Dashboard', 'bloggerz' ), $theme_data->Name ), sprintf( esc_html__('%s Theme', 'bloggerz'), $theme_data->Name ), 'edit_theme_options', 'bloggerz', 'bloggerz_theme_info_page');
}

if ( ! function_exists( 'bloggerz_admin_scripts' ) ) :
/**
 * Enqueue scripts for admin page only: Theme info page
 */
function bloggerz_admin_scripts( $hook ) {

	if ( $hook === 'appearance_page_bloggerz'  ) {
		wp_enqueue_style('bloggerz-admin-css', get_template_directory_uri() . '/css/admin.css');
	}
}
endif;
add_action('admin_enqueue_scripts', 'bloggerz_admin_scripts');


function bloggerz_theme_info_page() {

	$theme_data = wp_get_theme();

	// Check for current viewing tab
	$tab = null;
	if ( isset( $_GET['tab'] ) ) {
		$tab = $_GET['tab'];
	} else {
		$tab = null;
	}

	?>
	<div class="wrap about-wrap theme_info_wrapper">
		<h1><?php printf( esc_html__( 'Welcome to %1s - Version %2s', 'bloggerz' ), $theme_data->Name, $theme_data->Version ); ?></h1>
		<div class="about-text"><?php esc_html_e( 'Responsive WordPress theme for Blogging. Bloggerz is easy and joyfull theme for blogging. Bloggerz make some usefull feature in Customizer which can allow you to easily set your theme.', 'bloggerz' ); ?></div>
		<a target="_blank" href="<?php echo esc_url( 'https://wpbrigade.com' ); ?>" class="wpbrigade-themes-badge wp-badge"><span>WPBrigade</span></a>
		<h2 class="nav-tab-wrapper">
			<a href="?page=bloggerz" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
		</h2>

		<?php if ( is_null($tab) ) { ?>
		<div class="theme_info info-tab-content">
			<div class="theme_info_column clearfix">
				<div class="theme_info_left">

					<div class="theme_link">
						<h3><?php esc_html_e( 'Theme Customizer', 'bloggerz' ); ?></h3>
						<p class="about"><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'bloggerz' ), $theme_data->Name ); ?></p>
						<p>
							<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'bloggerz' ); ?></a>
						</p>
					</div>
					<!-- <div class="theme_link">
						<h3><?php //esc_html_e( 'Theme Documentation', 'bloggerz' ); ?></h3>
						<p class="about"><?php //printf(esc_html__( 'Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'bloggerz' ), $theme_data->Name); ?></p>
						<p>
							<a href="<?php //echo esc_url( '#' ); ?>" target="_blank" class="button button-secondary"><?php// esc_html_e( 'Online Documentation', 'bloggerz' ); ?></a>
						</p>
					</div> -->
				</div>

				<div class="theme_info_right">
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
				</div>
			</div>
		</div>
		<?php } ?>

	</div> <!-- END .theme_info -->

<?php
}
?>
