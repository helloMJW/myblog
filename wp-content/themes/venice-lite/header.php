<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'venicelite_mobile_menu' ); ?>

<div id="wrapper">
   
    <div id="overlay-body"></div>

	<div id="header-wrapper">
        
		<header id="header" >
            
			<div class="container">
            
				<div class="row">
                        
					<div class="col-md-12" >
                            
						<nav id="mainmenu">
                                
							<?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                            
						</nav> 
                        
                        <div class="mobile-navigation"><i class="fa fa-bars"></i> </div>

						<?php echo venicelite_header_cart(); ?>

                        <div class="social-buttons">
                        
                            <?php do_action( 'venicelite_socials' ); ?>
                        
                        </div>

                        <div class="clear"></div>

					</div>
                    
				</div>
                
			</div>
                
		</header>
            
	</div>
    
	<div id="logo">
    
		<?php venicelite_get_logo(); ?> 
            
	</div>