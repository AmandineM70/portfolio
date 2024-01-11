/***********************************************
 * SITE: FULLPAGE SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.pagepiling == 'undefined') {
		return;
	}

	PTFJS.fullpageSlider = {

		init: function () {

			var fullpageSlider = $('.ptf-fullpage-slider'),
				progressBar = fullpageSlider.find('.ptf-fullpage-slider-progress-bar'),
				loopTop = fullpageSlider.data('loop-top') ? true : false,
				loopBottom = fullpageSlider.data('loop-bottom') ? true : false,
				speed = fullpageSlider.data('speed') || 800,
				anchors = [];

			if (!fullpageSlider.length) {
				return;
			}

			// Progress bar height
			function progress_bar_height() {

				progressBar.css({
					height: PTFJS.window.innerHeight() / 2
				});

			}
			progress_bar_height();

			PTFJS.debounceResize(function () {
				progress_bar_height();
			});

			$('.ptf-offcanvas-menu ul.sf-menu > li:first-of-type, .ptf-default-menu__navigation ul.sf-menu > li:first-of-type').addClass('active');

			PTFJS.body.css('overflow', 'hidden');
			PTFJS.html.css('overflow', 'hidden');

			fullpageSlider.find('[data-anchor]').each(function () {
				anchors.push($(this).data('anchor'));
			});

			// function ptfhemes_navbar_solid() {
			// 	if (fullpageSlider.find('.pp-section.active').scrollTop() > 0) {
			// 		$('.ptf-navbar').addClass('ptf-navbar--solid');
			// 	} else {
			// 		$('.ptf-navbar').removeClass('ptf-navbar--solid');
			// 	}
			// }
			// ptfhemes_navbar_solid();

			// fullpageSlider.find('.pp-scrollable').on('scroll', function () {
			// 	var scrollTop = $(this).scrollTop();
			// 	if (scrollTop > 0) {
			// 		$('.ptf-navbar').addClass('ptf-navbar--solid');
			// 	} else {
			// 		$('.ptf-navbar').removeClass('ptf-navbar--solid');
			// 	}
			// });

			function ptfhemes_navigation() {
				var total = fullpageSlider.find('.ptf-section').length,
					current = fullpageSlider.find('.ptf-section.active').index(),
					scale = (current + 1) / total;
				progressBar.find('span').css({
					'transform': 'scaleY(' + scale + ')'
				});
			}

			fullpageSlider.pagepiling({
				menu: '.ptf-offcanvas-menu ul.sf-menu, .ptf-default-menu__navigation ul.sf-menu',
				scrollingSpeed: speed,
				loopTop: loopTop,
				loopBottom: loopBottom,
				anchors: anchors,
				sectionSelector: '.ptf-section',
				navigation: false,
				afterRender: function () {
					ptfhemes_navigation();
					PTFJS.window.trigger('ptf.change-slide');
				},
				onLeave: function () {
					ptfhemes_navigation();
					PTFJS.window.trigger('ptf.change-slide');
				},
				afterLoad: function () {
					// ptfhemes_navbar_solid();
				}
			});

		}
	};

	PTFJS.fullpageSlider.init();

})(jQuery);