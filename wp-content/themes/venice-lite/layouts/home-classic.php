<div class="container">
	
    <div class="row" id="blog" >
    
	<?php if ( ( venicelite_template('sidebar') == "left-sidebar" ) || ( venicelite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo venicelite_template('span') .' '. venicelite_template('sidebar'); ?>"> 
        
        	<div class="row"> 
        
    <?php endif; ?>
        

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div <?php post_class(); ?> >
    
				<?php do_action('venicelite_postformat'); ?>
        
                <div style="clear:both"></div>
            
            </div>
		
		<?php endwhile; else:  ?>

        <div <?php post_class(); ?> >
    
                <article class="post-article category">
                    
                    <h1> Not found </h1>
                    <p><?php esc_html_e( 'Sorry, no posts matched into ',"venice-lite" ) ?> <strong>: <?php the_category(' '); ?></strong></p>
     
                </article>
    
            </div>
	
		<?php endif; ?>
        
	<?php if ( ( venicelite_template('sidebar') == "left-sidebar" ) || ( venicelite_template('sidebar') == "right-sidebar" ) ) : ?>
        
        	</div>
            
        </div>
        
    <?php 
	
		endif;

		if ( venicelite_template('span') == "col-md-8" ) :
			
			do_action( 'venicelite_side_sidebar');
			
		endif; 
		
	?>
           
    </div>

	<?php do_action( 'venicelite_pagination', 'home'); ?>

</div>