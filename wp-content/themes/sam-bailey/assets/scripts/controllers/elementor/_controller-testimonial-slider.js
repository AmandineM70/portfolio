/***********************************************
 * WIDGET: TESTIMONIAL SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	PTFJS.testimonialSlider = {
		init: function ($scope, $) {

			var testimonialSlider = $scope.find('.ptf-testimonial-slider'),
				container = testimonialSlider.find('.swiper-container'),
				anchor = testimonialSlider.data('navigation-anchor');

			var swiper = new Swiper(container, {
				init: false,
				resizeObserver: true,
				spaceBetween: 30,
				grabCursor: true,
				loop: false,
				navigation: {
					nextEl: $(anchor).find('.ptf-swiper-button-next'),
					prevEl: $(anchor).find('.ptf-swiper-button-prev'),
				}
			});

			swiper.init();

		}
	}

	PTFJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/ptf-testimonial-slider.default',
			PTFJS.testimonialSlider.init
		);
	});

})(jQuery);