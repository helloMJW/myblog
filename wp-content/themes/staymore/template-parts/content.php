<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package staymore
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page-post'); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
                if( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php staymore_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'staymore' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'staymore' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<!-- .entry-content -->
	
	<footer class="entry-footer">
       <?php if(!is_home()) { ?><?php staymore_entry_footer();  	} ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->