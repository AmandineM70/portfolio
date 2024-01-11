<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$post_class = 'ptf-post ptf-post--single';

while ( have_posts() ) : the_post();

?>

<article <?php post_class( $post_class ); ?>>

	<div class="container">

		<div class="ptf-post-header">

			<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'meta' ); ?>

		</div>

		<div class="ptf-post-content clearfix">

			<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'content' ); ?>

		</div>
		<!-- /.ptf-post-content -->

		<?php if ( ( function_exists( 'ptfhemes_get_post_share_buttons' ) && sambailey_get_theme_mod( 'show_share_post' ) == 'show' ) || get_the_tags() ) : ?>

			<footer class="ptf-post-footer">

				<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'footer' ); ?>

			</footer>
			<!-- /.ptf-post-footer -->

		<?php endif; ?>

	</div>

</article>
<!-- /.ptf-post -->

<?php endwhile;