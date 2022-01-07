<?php
/**
 * @package Page Sidebar for TwentySeventeen
 * @author Joachim Jensen <joachim@dev.institute>
 * @license GPLv3
 * @copyright 2022 by Joachim Jensen
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/page/content', 'page' );
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
?>
		</main>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer();
