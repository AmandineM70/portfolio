<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$pagination = sambailey_get_theme_mod( 'archive_type_pagination' );
$posts_layout = sambailey_get_theme_mod( 'archive_layout' );

$column_sidebar_class = 'col-lg-4';

if ( is_active_sidebar( 'blog_sidebar' ) ) {
	$column_content_class = 'col-lg-8';
} else {
	$column_content_class = 'col-lg-12';
}

$post_list_class = 'ptf-blog-posts';

?>

<div class="container">

	<div class="row">

		<div class="<?php echo sambailey_sanitize_class( $column_content_class ); ?>">

			<div class="<?php echo sambailey_sanitize_class( $post_list_class ); ?>">

				<?php

					if ( have_posts() ) :

						get_template_part( 'template-parts/loop/loop-blog', $posts_layout );

						echo sambailey_get_page_pagination( null, $pagination );

					else:

						get_template_part( 'template-parts/loop/content-page', 'empty' );

					endif;

					wp_reset_postdata();

				?>

			</div>

		</div>

		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>

			<div class="<?php echo sambailey_sanitize_class( $column_sidebar_class ); ?>">

				<div class="ptf-sidebar ptf-sidebar--right">

					<?php get_sidebar(); ?>

				</div>

			</div>

		<?php endif; ?>

	</div>

</div>