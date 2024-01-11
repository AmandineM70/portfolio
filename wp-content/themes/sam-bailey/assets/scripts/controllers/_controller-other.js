/***********************************************
 * SAMBAILEY: OTHER SCRIPTS
 ***********************************************/
(function ($) {
	'use strict';

	// Hero parallax
	if ($('.ptf-page-title__inner').length) {
		PTFJS.window.on('scroll', function () {
			$('.ptf-page-title__inner').css({
				'transform': 'translateY(' + PTFJS.window.scrollTop() * 0.3 + 'px)'
			});
		});
	}

	// Widget menu
	if (typeof $.fn.superclick !== 'undefined') {
		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
			delay: 300,
			cssArrows: false,
			animation: {
				opacity: 'show',
				height: 'show'
			},
			animationOut: {
				opacity: 'hide',
				height: 'hide'
			},
		});
	}

	// Fast click
	if (typeof FastClick === 'function') {
		FastClick.attach(document.body);
	}

	// Fitvids
	if (typeof $.fn.fitVids !== 'undefined') {
		PTFJS.body.fitVids();
	}

	// Masonry blog
	$('.masonry').ptf_masonry_grid();

	// Material input
	if ($('.ptf-form-group').length) {

		$('.ptf-form-group .ptf-form-control').each(function () {
			if ($(this).val().length > 0 || $(this).attr('placeholder') !== undefined) {
				$(this).closest('.ptf-form-group').addClass('active');
			}
		});

		$('.ptf-form-group .ptf-form-control').focus(function () {
			$(this).closest('.ptf-form-group').addClass('active');
		});

		$('.ptf-form-group .ptf-form-control').blur(function () {
			if ($(this).val() == '' && $(this).attr('placeholder') == undefined) {
				$(this).closest('.ptf-form-group').removeClass('active');
			}
		});

		$('.ptf-form-group .ptf-form-control').change(function () {
			if ($(this).val() == '' && $(this).attr('placeholder') == undefined) {
				$(this).closest('.ptf-form-group').removeClass('active');
			} else {
				$(this).closest('.ptf-form-group').addClass('active');
			}
		});

	}

})(jQuery);