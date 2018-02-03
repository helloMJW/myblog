<?php


/*-----------------------------------------------------------------------------------*/
/* Woocommerce Hooks */
/*-----------------------------------------------------------------------------------*/ 
	
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

/*-----------------------------------------------------------------------------------*/
/* Woocommerce remove breadcrumbs */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'venicelite_remove_breadcrumbs' ) ) {

	function venicelite_remove_breadcrumbs() {
    	
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	
	}

	add_action( 'init', 'venicelite_remove_breadcrumbs' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce header cart */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'venicelite_header_cart' ) ) {

	function venicelite_header_cart() {

		if ( venicelite_is_woocommerce_active() && ( !venicelite_setting('venicelite_woocommerce_header_cart') || venicelite_setting('venicelite_woocommerce_header_cart') == "on" ) ) :
		$count = WC()->cart->cart_contents_count;
		
	?>
            <section class="header-cart">
            
                <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'venice-lite' ); ?>">
                    <i class="fa fa-shopping-cart"></i>
					<span class="cart-count"><?php echo esc_html( $count ); ?></span>  
                </a>
                            
            </section>
    
	<?php

		endif;

	}
	
}

if ( ! function_exists( 'venicelite_cart_link_fragment' ) ) {

	function venicelite_cart_link_fragment( $fragments ) {
	
		ob_start();
		$count = WC()->cart->cart_contents_count;

?>
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'venice-lite' ); ?>">
			<i class="fa fa-shopping-cart"></i>
			<span class="cart-count"><?php echo esc_html( $count ); ?></span>  
		</a>
        
<?php

		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'venicelite_cart_link_fragment' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_woocommerce_before_main_content')) {

	function venicelite_woocommerce_before_main_content() { 
	
		if ( is_product() ) {
			
			$classes = "product-wrapper" ;
	
		} else {
	
			$classes = "product-wrapper products-list" ;
	
		}
		
		do_action( 'venicelite_header_sidebar');
				
?>
	
	<div class="container">
	
		<div class="row">
		
			<div class="<?php echo venicelite_template('span') . " " . venicelite_template('sidebar') . " " . $classes; ?>" >
	
<?php
	
	}
	
	add_action('woocommerce_before_main_content', 'venicelite_woocommerce_before_main_content', 10);

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce template */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('venicelite_woocommerce_after_main_content')) {
	
	function venicelite_woocommerce_after_main_content() { ?>
	
			</div>
			
			<?php 
			
				if ( venicelite_template('span') == "col-md-8" ) :

					do_action('venicelite_side_sidebar');
					
				endif;
				
			?>
	
		</div>
		
	</div>

<?php
	
	}
	
	add_action('woocommerce_after_main_content', 'venicelite_woocommerce_after_main_content', 10);

}

?>