<?php
/**
 * @package Page Sidebar for TwentySeventeen
 * @author Joachim Jensen <joachim@dev.institute>
 * @license GPLv3
 * @copyright 2022 by Joachim Jensen
 */

get_header();

while ( have_posts() ) :
	the_post();
	if ( has_post_thumbnail() ) :
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail = wp_get_attachment_image_src( $post_thumbnail_id, 'twentyseventeen-featured-image' );
		$thumbnail_attributes = wp_get_attachment_image_src( $post_thumbnail_id, 'twentyseventeen-featured-image' );
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>
		<div class="panel-image twentyseventeen-panel" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div>
	<?php endif; ?>
	<div class="wrap" style="margin-top:88px;">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >
					<div class="panel-content">
						<header class="entry-header">
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
							<?php twentyseventeen_edit_link( get_the_ID() ); ?>
						</header>
						<div class="entry-content">
							<?php
								/* translators: %s: Name of current post */
								the_content( sprintf(
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
									get_the_title()
								) );
							?>
						</div>
					</div>
				</article>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php
	endwhile;

get_footer();
