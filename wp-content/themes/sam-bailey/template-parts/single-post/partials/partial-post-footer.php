<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<?php if ( get_the_tags() ) : ?>

	<div class="ptf-post-tags">

		<h5><?php esc_html_e( 'Tags:', 'sam-bailey' ); ?></h5>

		<div>
			<?php the_tags( '', ', ' ); ?>
		</div>

	</div>
	<!-- /.ptf-post-tags -->

<?php endif; ?>

<?php if ( function_exists( 'paul_tf_get_post_share_buttons' ) && sambailey_get_theme_mod( 'show_share_post' ) == 'show' ) : ?>

	<div class="ptf-post-share">

		<h5><?php esc_html_e( 'Share:', 'sam-bailey' ); ?></h5>

		<?php echo paul_tf_get_post_share_buttons( get_the_ID() ); ?>

	</div>
	<!-- /.ptf-social-share -->

<?php endif; ?>