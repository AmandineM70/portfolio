/***********************************************
 * SITE: NAVBAR
 ***********************************************/
(function ($) {
	'use strict';

	var navbarMain = $('.ptf-navbar--main'),
		navbarHeight = navbarMain.outerHeight(),
		navbarMainOffset = 0;

	// fake navbar
	var navbarFake = $('<div class="ptf-fake-navbar">').hide();

	// fixed navbar
	function _fixed_navbar() {
		navbarMain.addClass('ptf-navbar--fixed');
		navbarFake.show();
		// add solid color
		if (navbarMain.hasClass('ptf-navbar--transparent') && navbarMain.hasClass('ptf-navbar--sticky')) {
			navbarMain.addClass('ptf-navbar--solid');
		}
	}

	function _unfixed_navbar() {
		navbarMain.removeClass('ptf-navbar--fixed');
		navbarFake.hide();
		// remove solid color
		if (navbarMain.hasClass('ptf-navbar--transparent') && navbarMain.hasClass('ptf-navbar--sticky')) {
			navbarMain.removeClass('ptf-navbar--solid');
		}
	}

	function _on_scroll_navbar() {
		if (PTFJS.window.scrollTop() > navbarMainOffset) {
			_fixed_navbar();
		} else {
			_unfixed_navbar();
		}
	}

	if (navbarMain.hasClass('ptf-navbar--sticky')) {
		PTFJS.window.on('scroll resize', _on_scroll_navbar);
		_on_scroll_navbar();
		// append fake navbar
		navbarMain.after(navbarFake);
		// fake navbar height after resize
		navbarFake.height(navbarHeight);
		PTFJS.debounceResize(function () {
			navbarFake.height(navbarHeight);
		});
	}

})(jQuery);