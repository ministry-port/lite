<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'lite' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'lite' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'lite' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'lite' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'lite' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'lite');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'lite');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'lite' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'lite' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'lite' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'lite' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'lite' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'lite' );

						elseif ( is_post_type_archive( 'jetpack-lite' ) ) :
							_e( 'lite', 'lite' );

						elseif ( is_tax( 'portfolio-category' ) || is_tax( 'portfolio-tag' ) ) :
							single_term_title();

						else :
							_e( 'Archives', 'lite' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<div class="post-wrap">
			<?php
				while ( have_posts() ) : the_post();

					if ( is_post_type_archive( 'portfolio' ) || is_tax( 'portfolio-category' ) || is_tax( 'portfolio-tag' ) ) : ?>

						<div class="post-container">
							<?php get_template_part( 'template-parts/content-portfolio', 'lite' ); ?>
						</div>

					<?php else :
						get_template_part( 'template-parts/content', get_post_format() );
					endif;

				endwhile;
			?>
			</div>

			<?php // lite_paging_nav( $post->max_num_pages ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>


		</main><!-- #main -->
	</div><!-- .primary -->

<?php
get_footer();
