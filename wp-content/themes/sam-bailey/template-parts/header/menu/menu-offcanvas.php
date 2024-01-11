<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<div class="ptf-offcanvas-menu">

	<div class="ptf-offcanvas-menu__header">

		<?php if ( sambailey_get_theme_mod( 'offcanvas_menu_locales' ) == 'show' ) : ?>

			<div class="ptf-language-switcher">

				<?php

					if ( class_exists( 'GTranslate' ) ) {
						echo do_shortcode( '[gtranslate]' );
					}

				?>

			</div>
			<!-- /.ptf-language-switcher -->

		<?php else: ?>

			<span></span>

		<?php endif; ?>

	</div>
	<!-- /.ptf-offcanvas-menu__header -->

	<nav class="ptf-offcanvas-menu__navigation">

		<?php

			$acf_onepage_navigation = sambailey_get_theme_mod( 'onepage_navigation', true );

			if ( $acf_onepage_navigation ) {

				wp_nav_menu( array(
					'theme_location' => 'onepage-menu',
					'container' => false,
					'depth' => 1,
					'menu_class' => 'sf-menu sf-menu-onepage',
					'fallback_cb' => 'sambailey_fallback_menu',
					'walker' => new SamBailey_Custom_Walker_Nav_Menu()
				) );

			} else {

				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'container' => false,
					'depth' => 3,
					'menu_class' => 'sf-menu',
					'fallback_cb' => 'sambailey_fallback_menu',
				) );

			}

		?>

	</nav>
	<!-- /.ptf-offcanvas-menu__navigation -->

	<div class="ptf-offcanvas-menu__footer">

		<?php if ( sambailey_get_theme_mod( 'offcanvas_menu_socials_list' ) ) : ?>

			<div class="ptf-offcanvas-menu__socials">

				<?php
					foreach ( sambailey_get_theme_mod( 'offcanvas_menu_socials_list' ) as $socialItem ) :
						echo '<a class="ptf-social-icon ptf-social-icon--style-1" href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank"><i class="' . esc_attr( $socialItem[ 'social_class' ] ) . '"></i></a>';
					endforeach;
				?>

			</div>
			<!-- /.ptf-offcanvas-menu__socials -->

		<?php endif; ?>

		<?php if ( sambailey_get_theme_mod( 'offcanvas_menu_copyright' ) ) : ?>

			<div class="ptf-offcanvas-menu__copyright"><?php echo wp_kses_post( sambailey_get_theme_mod( 'offcanvas_menu_copyright' ) ); ?></div>
			<!-- /.ptf-offcanvas-menu__copyright -->

		<?php endif; ?>

	</div>
	<!-- /.ptf-offcanvas-menu__footer -->

</div>
<!-- /.ptf-offcanvas-menu -->

<div class="ptf-site-overlay"></div>
<!-- /.ptf-site-overlay -->