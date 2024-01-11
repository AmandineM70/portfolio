/***********************************************
 * SITE: ANIMATED BLOCK
 ***********************************************/
(function ($) {

	'use strict';

	PTFJS.animatedBlock = {
		init: function () {

			var animatedBlock = $('.ptf-animate-element'),
				prefix = 'animate__';

			if ($('.ptf-fullpage-slider').length) {

				PTFJS.window.on('ptf.change-slide', function () {
					animatedBlock.each(function () {
						var $this = $(this);
						var animationName = $this.data('animation-name');
						$this.removeClass(prefix + 'animated').removeClass(prefix + animationName);
						if ($this.parents('.ptf-section').hasClass('active')) {
							$this.addClass(prefix + 'animated').addClass(prefix + animationName);
						}
					});
				});

			} else {
				animatedBlock.each(function () {
					var $this = $(this);
					$this.one('inview', function () {
						var animationName = $this.data('animation-name');
						$this.addClass(prefix + 'animated').addClass(prefix + animationName);
					});
				});
			}
		}
	};

	PTFJS.animatedBlock.init();

})(jQuery);
/***********************************************
 * SITE: MENU DEFAULT
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superfish == 'undefined') {
		return;
	}

	PTFJS.menuDefault = {
		init: function () {

			var menu = $('.ptf-default-menu__navigation'),
				navigation = menu.find('ul.sf-menu');

			navigation.superfish({
				popUpSelector: 'ul.sub-menu',
				delay: 0,
				speed: 300,
				speedOut: 300,
				cssArrows: false,
				animation: {
					opacity: 'show',
					marginTop: '0',
					visibility: 'visible'
				},
				animationOut: {
					opacity: 'hide',
					marginTop: '10px',
					visibility: 'hidden'
				}
			});

		}
	}

	PTFJS.menuDefault.init();

})(jQuery);
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
/***********************************************
 * SITE: LOCALES
 ***********************************************/
(function ($) {

	'use strict';

	PTFJS.locales = {

		init: function () {

			var navbarLocales = $('.ptf-language-switcher'),
				navbarLocalesLink = navbarLocales.find('.glink'),
				keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');

			keyValue = keyValue ? keyValue[2].split('/')[2] : null;

			function set_default_locales() {

				navbarLocalesLink.removeClass('is-active');

				navbarLocalesLink.each(function () {

					var currentLink = $(this),
						attribute = currentLink.attr('onclick');

					if (keyValue !== null) {

						if (attribute.indexOf(keyValue) !== -1) {
							currentLink.addClass('is-active');
						}

					} else {

						navbarLocales.each(function () {
							$(this).find('.glink').eq(0).addClass('is-active');
						});

					}

				});

			}

			set_default_locales();

			navbarLocales.on('click', '.glink', function () {
				var text = $(this).text();
				navbarLocalesLink.removeClass('is-active');
				navbarLocales.find('.glink:contains(' + text + ')').addClass('is-active');
			});

		}

	};

	PTFJS.locales.init();

})(jQuery);
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
/***********************************************
 * SITE: MENU OFFCANVAS
 ***********************************************/
(function ($) {

	'use strict';

	var menuIsOpen = false;

	PTFJS.menuOffcanvas = {
		config: {
			easing: 'power2.out'
		},
		init: function () {
			var menu = $('.ptf-offcanvas-menu'),
				navigation = menu.find('ul.sf-menu'),
				navigationItem = navigation.find('> li'),
				header = $('.ptf-offcanvas-menu__header'),
				footer = $('.ptf-offcanvas-menu__footer > div'),
				menuToggle = $('.js-offcanvas-menu-toggle'),
				siteOverlay = $('.ptf-site-overlay');

			if (typeof $.fn.superclick !== 'undefined') {

				navigation.superclick({
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

			menuToggle.on('click', function (e) {
				e.preventDefault();
				if (!menuIsOpen) {
					menuToggle.addClass('ptf-menu-burger--opened');
					PTFJS.menuOffcanvas.open_menu(menu, siteOverlay, navigationItem, header, footer);
				} else {
					menuToggle.removeClass('ptf-menu-burger--opened');
					PTFJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
				}
			});

			siteOverlay.on('click', function (e) {
				e.preventDefault();
				if (menuIsOpen) {
					PTFJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
				}
			});

			PTFJS.document.keyup(function (e) {
				if (e.keyCode === 27 && menuIsOpen) {
					e.preventDefault();
					PTFJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
				}
			});

			// Close after click to anchor.
			navigationItem.filter('[data-menuanchor]').on('click', 'a', function () {
				if (menuIsOpen) {
					PTFJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
				}
			});

		},
		open_menu: function (menu, siteOverlay, navigationItem, header, footer) {
			menuIsOpen = true;
			if (typeof gsap != 'undefined') {
				gsap.timeline({
						defaults: {
							ease: this.config.easing
						}
					})
					// set overflow for html
					.set(PTFJS.html, {
						overflow: 'hidden'
					})
					// overlay animation
					.to(siteOverlay, .3, {
						autoAlpha: 1,
					})
					// menu animation
					.fromTo(menu, .6, {
						x: '100%',
					}, {
						x: 0,
						visibility: 'visible'
					}, '-=.3')
					// header animation
					.fromTo(header, .3, {
						x: 50,
						autoAlpha: 0
					}, {
						x: 0,
						autoAlpha: 1
					}, '-=.3')
					// navigation item animation
					.fromTo(navigationItem, .3, {
						x: 50,
						autoAlpha: 0
					}, {
						x: 0,
						autoAlpha: 1,
						stagger: {
							each: .1,
							from: 'start',
						}
					}, '-=.15')
					// footer animation
					.fromTo(footer, .3, {
						x: 50,
						autoAlpha: 0
					}, {
						x: 0,
						autoAlpha: 1,
						stagger: {
							each: .1,
							from: 'start',
						}
					}, '-=.15');
			}
		},
		close_menu: function (menu, siteOverlay, navigationItem, header, footer) {
			menuIsOpen = false;
			if (typeof gsap != 'undefined') {
				gsap.timeline({
						defaults: {
							ease: this.config.easing
						}
					})
					// set overflow for html
					.set(PTFJS.html, {
						overflow: 'inherit'
					})
					// footer animation
					.to(footer, .3, {
						x: 50,
						autoAlpha: 0,
						stagger: {
							each: .1,
							from: 'end',
						}
					})
					// navigation item animation
					.to(navigationItem, .3, {
						x: 50,
						autoAlpha: 0,
						stagger: {
							each: .1,
							from: 'end',
						},
					}, '-=.15')
					// header animation
					.to(header, .3, {
						x: 50,
						autoAlpha: 0,
					}, '-=.15')
					// menu animation
					.to(menu, .6, {
						x: '100%',
					}, '-=.15')
					// set visibility menu after animation
					.set(menu, {
						visibility: 'hidden'
					})
					// overlay animation
					.to(siteOverlay, .3, {
						autoAlpha: 0
					}, '-=.6');
			}
		}
	};

	PTFJS.menuOffcanvas.init();

})(jQuery);
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
/***********************************************
 * SITE: PRELOADER
 ***********************************************/
(function ($) {
	'use strict';

	// check if plugin defined
	if (typeof $.fn.animsition == 'undefined') {
		return;
	}

	var preloader = $('.animsition');

	preloader.animsition({
		inDuration: 500,
		outDuration: 500,
		loadingParentElement: 'html',
		linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([rel="nofollow"]):not([href~="#"]):not([href^=mailto]):not([href^=tel]):not(.sf-with-ul)',
		loadingClass: 'animsition-loading-2',
		loadingInner: '<div class="spinner"><span class="double-bounce-one"></span><span class="double-bounce-two"></span></div>',
	});

	preloader.on('animsition.inEnd', function () {
		PTFJS.window.trigger('ptf.preloader_done');
		PTFJS.html.addClass('ptf-is-page-loaded');
	});

})(jQuery);
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