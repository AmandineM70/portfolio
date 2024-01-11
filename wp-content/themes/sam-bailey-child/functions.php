<?php
/*
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */
function sambailey_child_enqueue_styles() {
    wp_enqueue_style( 'sambailey-style' , get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sambailey-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'sambailey-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'sambailey_child_enqueue_styles' );

add_action('wp_head', 'your_function_name');

function your_function_name(){
	
	if(is_front_page()) {  ?>
				
		<style>
			/* Styling for preloader background (adjust as needed) */
			.preloader {
				position: sticky;
				z-index: 99999;
				display: flex;
				height: 100vh;
				align-items: center;
				/* Centers the logo vertically */
				justify-content: center;
				/* Centers the logo horizontally */
				background-image: url("http://portfolio.test/wp-content/uploads/2021/04/fond2.png");
				background-repeat:no-repeat;
				background-size:cover;
				/* Change this to your desired background color */
				animation: hidePreloader 1.5s ease-in-out forwards 3.5s;
			}

			/* Style for the logo */
			.logo {
				max-width: 200px;
				z-index: 9999999999999999999999;
				/* Adjust the size as needed */
				animation: fadeInAndGrow 3s ease-in forwards;
			}

			@keyframes hidePreloader {
				0% {
					background-image: url("http://portfolio.test/wp-content/uploads/2021/04/fond2.png");
				}

				50% {
					background-image: url("http://portfolio.test/wp-content/uploads/2023/12/fond-noir.png");
				}
				
				100% {
					display:none;
				}
			}

			/* Keyframes for logo animation */
			@keyframes fadeInAndGrow {
				0% {
					opacity: 0;
					transform: scale(0);
				}

				50% {
					opacity: 1;
					transform: scale(1);
				}

				100% {
					transform: scale(0.5) translate(-92.2vw, -87.4vh);
				}
			}
		</style>
					
		<div class="preloader">
			<div class="logo">
				<!-- Insert your logo image here -->
				<img src="http://portfolio.test/wp-content/uploads/2023/12/cropped-monlogo-1.png" alt="Your Logo">
			</div>
		</div>
			
			<?php  }
	
		};

