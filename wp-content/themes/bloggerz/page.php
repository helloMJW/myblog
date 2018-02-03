<?php
/**
 * Template for Pages.
 *
 * This is the template file that shows all pages by default.
 * Learn more about page.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bloggerz
 */

get_header(); ?>
	<div class="banner-section <?php if ( get_theme_mod( 'bloggerz_theme_header_bgColor_2', true ) ||
	checked( get_theme_mod( 'bloggerz_theme_header_bgColor_2' ), true, false ) ) : echo 'banner-bgc';
endif; ?>">
	</div><!-- /.banner-section -->

	<div class="container main-section">
		<div class="left-section <?php bloggerz_layout(); ?>">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template/content', 'page' );

			endwhile; ?>

		</div> <!--  .left-section -->

	<?php bloggerz_sidebar(); ?>
	</div> <!--  .container main-section -->
<?php get_footer(); ?>
