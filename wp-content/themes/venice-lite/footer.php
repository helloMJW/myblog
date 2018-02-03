    <footer id="footer">
        
        <div class="container">
    
            <?php do_action( 'venicelite_footer_sidebar' ); ?>
    
             <div class="row copyright" >
                
                <div class="col-md-12" >
                    
                    <p>
                        <?php if (venicelite_setting('venicelite_copyright_text')): ?>
                           <?php echo esc_html(venicelite_setting('venicelite_copyright_text')); ?>
                        <?php else: ?>
                          <?php esc_html_e('Copyright','venice-lite'); ?> <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> 
                        <?php endif; ?> 
                        | <?php esc_html_e('Theme by','venice-lite'); ?> <a href="<?php echo esc_url('https://www.themeinprogress.com/'); ?>" target="_blank">Theme in Progress</a> |
                        <a href="<?php echo esc_url( 'https://wordpress.org/'); ?>" title="<?php esc_html_e( 'A Semantic Personal Publishing Platform', 'venice-lite' ); ?>" rel="generator"><?php printf( esc_html__( 'Proudly powered by %s', 'venice-lite' ), 'WordPress' ); ?></a>
        
                    </p>
                    
					<?php 
					
                        if ( !venicelite_setting('venicelite_view_back_to_top') || venicelite_setting('venicelite_view_back_to_top') == "on" )
                            echo '<div id="back-to-top">'.esc_html__('Back to top','venice-lite') . '<i class="fa fa-angle-double-up"></i> </div>';
                        
                    ?>
                    
                    <div class="clear"></div>   

                </div>
            
            </div>
            
        </div>
    
    </footer>

</div>

<?php wp_footer(); ?>   

</body>

</html>