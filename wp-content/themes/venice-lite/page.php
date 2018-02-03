<?php 

	get_header();

	do_action( 'venicelite_header_sidebar');
	
?>

<div class="container content">
	
    <div class="row">
       
        <div class="<?php echo venicelite_template('span') . " " . venicelite_template('sidebar'); ?>">
        	
            <div class="row">
        
                <article <?php post_class(); ?> >
                
                    <?php 
					
						while ( have_posts() ) : the_post();
						
							do_action('venicelite_postformat');
							wp_link_pages(array('before' => '<div class="wip-pagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>') );
						
						endwhile;
						
					?>
            
                </article>
        
			</div>
        
        </div>

		<?php 	
		
			if ( venicelite_template('span') == "col-md-8" ) : 

				do_action('venicelite_side_sidebar');
	 
			endif; 
		
		?>

    </div>
    
</div>

<?php get_footer(); ?>