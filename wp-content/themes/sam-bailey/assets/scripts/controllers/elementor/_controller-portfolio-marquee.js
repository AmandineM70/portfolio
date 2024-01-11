/***********************************************
 * WIDGET: PORTFOLIO MARQUEE
 ***********************************************/
(function ($) {

	'use strict';

	PTFJS.portfolioMarquee = {
		init: function ($scope, $) {

			var portfolioMarquee = $scope.find('.ptf-portfolio-marquee'),
				hover = portfolioMarquee.find('.ptf-project-hover'),
				image = portfolioMarquee.find('.ptf-project-hover > a');

			hover.on('mouseout', function (e) {
				$(this).css('opacity', '0');
			});

			hover.on('mousemove', function (e) {

				var $this = $(this),
					pos = $this.offset(),
					elem_left = pos.left,
					elem_top = pos.top;

				$this.css('opacity', '1');

				if (e.pageX < elem_left || e.pageX > elem_left + $this.innerWidth() || e.pageY < elem_top || e.pageY > elem_top + $this.innerHeight()) {
					$this.css('opacity', '0');
					$this.find('>a').css({
						'transform': 'translateY(0) translateX(0)'
					});
				} else {
					$this.css('opacity', '1');
					var Xinner = e.pageX - elem_left - $this.innerWidth() / 2 + 40;
					var Yinner = e.pageY - elem_top - $this.innerHeight() / 2 + 40;
					$this.find('>a').css({
						'transform': 'translateY(' + Yinner + 'px) translateX(' + Xinner + 'px)'
					});
				}

			});

		}

	}

	PTFJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/ptf-portfolio-marquee.default',
			PTFJS.portfolioMarquee.init
		);
	});

})(jQuery);