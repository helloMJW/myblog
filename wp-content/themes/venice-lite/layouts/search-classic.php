<div class="container content">

	<div class="row">
    
	<?php if ( ( venicelite_template('sidebar') == "left-sidebar" ) || ( venicelite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo venicelite_template('span') .' '. venicelite_template('sidebar'); ?>">

            <div class="row"> 
        
    <?php 

		endif;
		
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 

	?>

		<div <?php post_class(); ?> >
    
			<?php do_action('venicelite_postformat'); ?>
			<div style="clear:both"></div>
            
		</div>
		
	<?php 
	
		endwhile; 
		else:  
	
	?>

		<div <?php post_class(); ?> >
    
			<article class="post-article">
                    
				<h2><?php esc_html_e( 'Not found.',"venice-lite" ) ?></h2>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria',"venice-lite" ) ?> <strong>: <?php echo $s; ?> </strong></p>
     
			</article>
    
		</div>
	
	<?php 
		
		endif;
		if ( ( venicelite_template('sidebar') == "left-sidebar" ) || ( venicelite_template('sidebar') == "right-sidebar" ) ) : 
			
	?>
        
            </div>
        
        </div>
        
    <?php 
	
		endif;

		if ( venicelite_template('span') == "col-md-8" ) :
			
			do_action('venicelite_side_sidebar');			
			
		endif; 
	
	?>
           
    </div>
    
    <?php do_action( 'venicelite_pagination', 'archive'); ?>
    
</div>