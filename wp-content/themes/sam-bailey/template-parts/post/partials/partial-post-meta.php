<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<div class="ptf-post-meta">

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

	<?php if ( sambailey_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

		<span><?php echo sambailey_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>

	<?php endif; ?>

</div>
<!-- /.ptf-post-meta -->