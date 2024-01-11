<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$acf_navbar = sambailey_get_theme_mod( 'page_custom_navigation', true );

if ( sambailey_get_theme_mod( 'navigation_show', $acf_navbar ) == 'hide' ) {
	return;
}

$header_class = 'ptf-header';
$navbar_class = 'ptf-navbar ptf-navbar--main';

if ( sambailey_get_theme_mod( 'navigation_opaque', $acf_navbar ) == 'enable' ) {
	$header_class .= ' ptf-header--opaque';
}

if ( sambailey_get_theme_mod( 'navigation_transparent', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' ptf-navbar--transparent';
}

if ( sambailey_get_theme_mod( 'navigation_transparent_always', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' ptf-navbar--transparent-always';
}

if ( sambailey_get_theme_mod( 'navigation_sticky', $acf_navbar ) == 'enable' ) {
	$navbar_class .= ' ptf-navbar--sticky';
}

?>

<header class="<?php echo sambailey_sanitize_class( $header_class ); ?>">

	<div class="<?php echo sambailey_sanitize_class( $navbar_class ); ?>">

		<div class="ptf-navbar-background"></div>

		<div class="ptf-navbar-inner">

			<div class="ptf-navbar-inner--left">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ptf-navbar-logo">
					<?php if ( sambailey_get_theme_mod( 'navigation_logo' ) ) : ?>
						<img src="<?php echo esc_url( sambailey_get_theme_mod( 'navigation_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="black">
					<?php else: ?>
						<h2><?php bloginfo( 'name' ); ?></h2>
					<?php endif; ?>
				</a>
				<!-- .ptf-navbar-logo -->

			</div>

			<div class="ptf-navbar-inner--center">

				<div class="container">

					<nav class="ptf-default-menu__navigation">

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

				</div>

			</div>

			<div class="ptf-navbar-inner--right">

				<div class="d-flex align-items-center">

					<?php

						if ( has_nav_menu( 'navbar-menu' ) ) {

							echo '<nav class="ptf-navbar-contacts">';

							wp_nav_menu( array(
								'theme_location' => 'navbar-menu',
								'container' => false,
								'depth' => 1,
							) );

							echo '</nav>';

						}
					?>

					<a class="ptf-menu-burger js-offcanvas-menu-toggle" href="#">
						<span class="line"></span><span class="line"></span><span class="line"></span>
					</a>

				</div>

			</div>

			<?php get_template_part( 'template-parts/header/menu/menu', 'offcanvas' ); ?>

		</div>

	</div>

</header>
<!-- .ptf-header -->