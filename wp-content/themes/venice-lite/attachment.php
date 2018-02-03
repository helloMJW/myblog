<?php get_header(); ?>

<div class="container content">

	<div class="row" >
    
        <div class="post-container col-md-12">
          
            <article class="post-article attachment">
            
			<?php 
			
				if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				global $post;
			
			?>
    
                <h1 class="title"><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1>
                
				<p> 
				
					<?php 
    
                    if (wp_attachment_is_image($post->id)) {
    
                    ?>
						<a class="swipebox" data-rel="[attachment-image]" href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php echo the_title_attribute(); ?>">
							<?php echo wp_get_attachment_image($post->id, 'blog'); ?>
						</a>
				
					<?php } else { ?>
                    
                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    
                    <?php } ?>
                
				</p>
                
                </article>
                
            <div style="clear:both"></div>
            
        </div>
		
		<?php endwhile; endif;?>

    </div>
    
</div>

<?php get_footer(); ?>