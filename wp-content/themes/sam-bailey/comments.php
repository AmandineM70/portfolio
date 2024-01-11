<?php

/**
 * @author: ptfhemes
 * @version: 1.0.0
 */

if ( post_password_required() ) {
	return;
}

?>

<div class="ptf-page-comments" id="comments">

	<div class="container">

		<?php if ( comments_open() || have_comments() ) : ?>

			<?php if ( have_comments() ) : ?>

				<div class="ptf-page-comments__list">

					<h2 class="ptf-page-comments__title">
						<?php esc_html_e( 'Comments', 'sam-bailey' ); ?>
					</h2>

					<ul class="ptf-comments">

						<?php

							wp_list_comments( array(
								'avatar_size' => 80,
								'style' => 'ul',
								'max_depth' => 3,
								'short_ping' => true,
								'reply_text' => esc_html__( 'Reply', 'sam-bailey' ),
								'callback' => 'sambailey_callback_custom_comment',
							) );

						?>

					</ul>

					<?php echo sambailey_get_comment_navigation(); ?>

				</div>
				<!-- /.ptf-page-comments__list -->

			<?php endif; ?>

			<?php if ( comments_open() ) : ?>

				<div class="ptf-page-comments__form">

					<?php

						$commenter = wp_get_current_commenter();

						$args = array(
							'title_reply' => esc_html__( 'Add comment:', 'sam-bailey' ),
							'title_reply_before' => '<h4 class="ptf-page-comments__title">',
							'title_reply_after' => '</h4>',
							'cancel_reply_before' => '',
							'cancel_reply_after' => '',
							'comment_notes_before' => '',
							'comment_notes_after' => '',
							'title_reply_to' => esc_html__( 'Leave a Reply', 'sam-bailey' ),
							'cancel_reply_link' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
							'submit_button' => '<button type="submit" id="%2$s" class="%3$s">%4$s</button>',
							'class_submit' => 'ptf-btn ptf-btn--primary',
							'label_submit' => esc_html__( 'Post a Comment', 'sam-bailey' ),
							'fields' => array(
								'cookies' => false,
								'author' => '<div class="ptf-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="ptf-form-control"><label for="author" class="ptf-form-label">' . esc_attr__( 'Your Name*', 'sam-bailey' ) . '</label></div>',
								'email' => '<div class="ptf-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="ptf-form-control"><label for="email" class="ptf-form-label">' . esc_attr__( 'Email Address*', 'sam-bailey' ) . '</label></div>',
							),
						);

						$args['comment_field'] = '<div class="ptf-form-group"><textarea id="comment" name="comment" rows="5" class="ptf-form-control"></textarea><label for="comment" class="ptf-form-label">' . esc_attr__( 'Comment', 'sam-bailey' ) . '</label></div>';

						comment_form( $args );

					?>

				</div>
				<!-- /.ptf-page-comments__form -->

			<?php endif; ?>

		<?php endif; ?>

	</div>

</div>