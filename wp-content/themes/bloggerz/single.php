<?php
/**
 * Template for Single posts.
 *
 * @package Bloggerz
 */

get_header(); ?>


	<div class="banner-section <?php if ( get_theme_mod( 'bloggerz_theme_header_bgColor_2', true ) ||
	checked( get_theme_mod( 'bloggerz_theme_header_bgColor_2' ), true, false ) ) : echo 'banner-bgc';
endif; ?>">
	<?php bloggerz_single_banner(); ?><!--  .banner_txt_section -->
	</div><!-- /.banner-section -->

	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">
		<?php while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */

			get_template_part( 'template/content', get_post_format() );
			?>

		   <!--  .comment-formwrapper -->
			<?php

		endwhile; ?>

		</div> <!--  .left-section -->

	<?php bloggerz_sidebar(); ?>
	</div> <!--  .container main-section -->
<?php get_footer(); ?>
