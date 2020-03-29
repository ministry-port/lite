<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lite
 */

get_header(); ?>


	<div class="primary content-area">
		<main class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<div class="content-wrap">
				<?php the_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			</div><!-- .content-wrap -->

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- .primary -->

<?php
get_footer();
