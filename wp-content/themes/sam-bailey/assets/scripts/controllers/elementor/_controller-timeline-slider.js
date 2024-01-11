/***********************************************
 * WIDGET: TIMELINE SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	PTFJS.timelineSlider = {
		init: function ($scope, $) {

			var timelineSlider = $scope.find('.ptf-timeline-slider'),
				container = timelineSlider.find('.swiper-container'),
				anchor = timelineSlider.data('navigation-anchor');

			var swiper = new Swiper(container, {
				init: false,
				resizeObserver: true,
				spaceBetween: 0,
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
			'frontend/element_ready/ptf-timeline-slider.default',
			PTFJS.timelineSlider.init
		);
	});

})(jQuery);