<?php
/**
 * @package lite
 */
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'showcase' ); ?>>
	<div class="content-hentry" <?php  if ( '' != get_the_post_thumbnail() ) : ?>style="background: url( '<?php echo esc_url( $feat_image ); ?>' ) no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-position: center;" <?php endif; ?>>

		<a href="<?php the_permalink(); ?>" rel="bookmark" class="content-link"></a>

		<div class="content-entry">
			<div class="title-wrap">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<div class="content-date">
					<?php lite_posted_on(); ?>
				</div>
			</div>
		</div>
	</div><!-- .content-wrap -->
</article><!-- #post-## -->
