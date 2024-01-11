/***********************************************
 * WIDGET: SIMPLE IMAGE
 ***********************************************/
(function ($) {

	'use strict';

	PTFJS.simpleImage = {
		init: function ($scope, $) {

			var simpleImage = $scope.find('.ptf-simple-image'),
				mask = simpleImage.find('.ptf-simple-image__mask');

			simpleImage.on('inview', function () {
				mask.addClass('active');
			});

		}
	}

	PTFJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/ptf-simple-image.default',
			PTFJS.simpleImage.init
		);
	});

})(jQuery);