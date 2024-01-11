<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<article <?php post_class( 'ptf-page ptf-page--empty' ); ?>>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

		<p><?php esc_html_e( 'Ready to publish your first post?', 'sam-bailey' ); ?></p>

		<div class="ptf-gap-30"></div>

		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="ptf-btn ptf-btn--primary">
			<?php esc_html_e( 'Get started here', 'sam-bailey' ); ?>
		</a>

	<?php elseif ( is_search() ): ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'sam-bailey' ); ?></p>

	<?php else: ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'sam-bailey' ); ?></p>

	<?php endif; ?>

</article>
<!-- /.ptf-page -->