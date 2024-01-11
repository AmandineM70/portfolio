<?php

/**
 * Template Name: Fullpage Slider
 * @author: VLThemes
 * @version: 1.0.0
 */

get_header();

$loop_top = sambailey_get_field( 'slider_loop_top' );
$loop_bottom = sambailey_get_field( 'slider_loop_bottom' );
$speed = sambailey_get_field( 'slider_speed' );
$progress_bar = sambailey_get_field( 'slider_progress_bar' );

// prepend query
$args = array(
	'post_type' => 'slide',
	'posts_per_page' => -1,
	'post_status' => 'publish',
);

$new_query = new WP_Query( $args );

?>

<main class="ptf-main">

	<div class="ptf-fullpage-slider" data-loop-top="<?php echo esc_attr( $loop_top ); ?>" data-loop-bottom="<?php echo esc_attr( $loop_bottom ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>">

		<?php

			if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post();

				$slide_ID = get_the_title();

				// slide settings
				$section_background_color = sambailey_get_field( 'section_background_color' );
				$section_background_image = sambailey_get_field( 'section_background_image' );
				$section_background_overlay = sambailey_get_field( 'section_background_overlay' );
				$section_background_overlay_opacity = sambailey_get_field( 'section_background_overlay_opacity' );

				// portfolio
				$section_portfolio = sambailey_get_field( 'section_portfolio' );

				$section_style = '';

				if ( $section_background_color ) {
					$section_style .= ' background-color: ' . $section_background_color . ';';
				}

				if ( $section_background_image ) {
					$section_style .= ' background-image: url(' . wp_get_attachment_image_src( $section_background_image[ 'id' ], 'sambailey-1920x1080_crop' )[0] . ');';
				}

				if ( $section_background_overlay ) {
					$section_style .= ' --ptf-background-overlay: ' . $section_background_overlay . ';';
				}

				if ( $section_background_overlay_opacity ) {
					$section_style .= ' --ptf-background-overlay-opacity: ' . $section_background_overlay_opacity . ';';
				}

				?>

				<div class="ptf-section pp-scrollable" data-anchor="<?php echo esc_attr( $slide_ID ); ?>" style="<?php echo sambailey_sanitize_style( $section_style ); ?>">

					<div class="ptf-section__content">

						<div class="container p-0">

							<?php the_content(); ?>

						</div>
						<!-- /.container -->

					</div>
					<!-- /.ptf-section__content -->

				</div>
				<!-- /.ptf-section -->

			<?php

			endwhile; endif; wp_reset_postdata();

			// show progress bar
			if ( $progress_bar ) {
				echo '<div class="ptf-fullpage-slider-progress-bar"><span></span></div>';
			}

		?>

	</div>

</main>
<!-- /.ptf-main -->

<?php get_footer(); ?>