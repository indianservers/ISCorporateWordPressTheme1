(function () {
	'use strict';

	window.ISCP = window.ISCP || {};

	var ISCP = window.ISCP;
	var body = document.body;
	var header = document.querySelector('.iscp-site-header');
	var toggle = document.querySelector('.iscp-menu-toggle');
	var navigation = document.querySelector('#iscp-site-navigation');
	var backToTop = document.querySelector('.iscp-back-to-top');
	var dropdownItems = document.querySelectorAll('.iscp-primary-menu .menu-item-has-children');
	var progressBar = document.querySelector('.iscp-scroll-progress span');
	var exitModal = document.querySelector('[data-iscp-exit-modal]');
	var exitModalCloseButtons = document.querySelectorAll('[data-iscp-modal-close]');
	var demoModal = document.querySelector('[data-iscp-demo-modal]');
	var demoModalOpenButtons = document.querySelectorAll('[data-iscp-demo-modal-open]');
	var demoModalCloseButtons = document.querySelectorAll('[data-iscp-demo-modal-close]');
	var stickyCta = document.querySelector('.iscp-sticky-cta');
	var lastFocusedElement = null;
	var ticking = false;
	var progressTicking = false;
	var exitModalArmed = true;

	ISCP.setMenuState = function (isOpen) {
		if (!toggle) {
			return;
		}

		toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		body.classList.toggle('iscp-mobile-menu-open', isOpen);
	};

	ISCP.isMenuOpen = function () {
		return toggle && toggle.getAttribute('aria-expanded') === 'true';
	};

	ISCP.closeDropdowns = function () {
		dropdownItems.forEach(function (item) {
			item.classList.remove('iscp-dropdown-open');
		});
	};

	ISCP.updateHeaderScrollState = function () {
		if (!header) {
			return;
		}

		header.classList.toggle('iscp-is-scrolled', window.scrollY > 8);
		ticking = false;
	};

	ISCP.requestHeaderScrollState = function () {
		if (ticking) {
			return;
		}

		ticking = true;
		window.requestAnimationFrame(ISCP.updateHeaderScrollState);
	};

	ISCP.updateScrollProgress = function () {
		if (!progressBar) {
			return;
		}

		var scrollable = document.documentElement.scrollHeight - window.innerHeight;
		var progress = scrollable > 0 ? Math.min(100, Math.max(0, (window.scrollY / scrollable) * 100)) : 0;
		progressBar.style.width = progress + '%';
		progressTicking = false;
	};

	ISCP.requestScrollProgress = function () {
		if (!progressBar || progressTicking) {
			return;
		}

		progressTicking = true;
		window.requestAnimationFrame(ISCP.updateScrollProgress);
	};

	ISCP.initMenu = function () {
		if (!toggle || !navigation) {
			return;
		}

		toggle.addEventListener('click', function () {
			ISCP.setMenuState(!ISCP.isMenuOpen());
		});

		document.addEventListener('click', function (event) {
			if (ISCP.isMenuOpen() && !navigation.contains(event.target) && !toggle.contains(event.target)) {
				ISCP.setMenuState(false);
			}
		});
	};

	ISCP.initActiveNav = function () {
		var links = document.querySelectorAll('.iscp-primary-menu > li > a[href]');
		var currentPath = window.location.pathname.replace(/\/+$/, '') || '/';

		links.forEach(function (link) {
			var linkPath;

			try {
				linkPath = new URL(link.href, window.location.origin).pathname.replace(/\/+$/, '') || '/';
			} catch (error) {
				return;
			}

			if (linkPath === currentPath) {
				link.classList.add('iscp-active-link');
			}
		});
	};

	ISCP.initMegaMenuDescriptions = function () {
		var submenuLinks = document.querySelectorAll('.iscp-primary-menu .sub-menu a');

		submenuLinks.forEach(function (link) {
			if (link.querySelector('.iscp-menu-description')) {
				return;
			}

			var text = link.querySelector('.iscp-menu-text');

			if (!text) {
				return;
			}

			var title = text.textContent.trim();
			var description = document.createElement('span');
			description.className = 'iscp-menu-description';
			description.textContent = 'Explore ' + title + ' planning, delivery and support.';

			if (!text.parentElement.classList.contains('iscp-menu-copy')) {
				var copy = document.createElement('span');
				copy.className = 'iscp-menu-copy';
				text.parentElement.insertBefore(copy, text);
				copy.appendChild(text);
			}

			text.parentElement.appendChild(description);
		});
	};

	ISCP.initDropdowns = function () {
		dropdownItems.forEach(function (item) {
			var link = item.querySelector('a');

			if (!link) {
				return;
			}

			link.setAttribute('aria-haspopup', 'true');
			link.setAttribute('aria-expanded', 'false');

			link.addEventListener('click', function (event) {
				if (window.matchMedia('(max-width: 1020px)').matches) {
					event.preventDefault();
					var isOpen = item.classList.toggle('iscp-dropdown-open');
					link.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
				}
			});

			item.addEventListener('focusin', function () {
				link.setAttribute('aria-expanded', 'true');
			});

			item.addEventListener('focusout', function () {
				window.setTimeout(function () {
					if (!item.contains(document.activeElement)) {
						link.setAttribute('aria-expanded', 'false');
					}
				}, 0);
			});
		});
	};

	ISCP.initBackToTop = function () {
		if (!backToTop) {
			return;
		}

		backToTop.addEventListener('click', function () {
			window.scrollTo({
				top: 0,
				behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
			});
		});
	};

	ISCP.initReveal = function () {
		var revealItems = document.querySelectorAll('.iscp-reveal');

		if (body.classList.contains('iscp-animations-disabled')) {
			revealItems.forEach(function (item) {
				item.classList.add('iscp-is-visible');
			});
			return;
		}

		if (!('IntersectionObserver' in window) || (window.matchMedia('(prefers-reduced-motion: reduce)').matches && !body.classList.contains('iscp-ignore-reduced-motion'))) {
			revealItems.forEach(function (item) {
				item.classList.add('iscp-is-visible');
			});
			return;
		}

		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('iscp-is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12 });

		revealItems.forEach(function (item) {
			observer.observe(item);
		});
	};

	ISCP.initFaq = function () {
		var faqButtons = document.querySelectorAll('.iscp-faq-button');

		faqButtons.forEach(function (button) {
			var panelId = button.getAttribute('aria-controls');
			var panel = panelId ? document.getElementById(panelId) : null;

			if (!panel) {
				return;
			}

			button.addEventListener('click', function () {
				var isExpanded = button.getAttribute('aria-expanded') === 'true';

				button.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
				panel.hidden = isExpanded;
			});
		});
	};

	ISCP.initSliders = function () {
		var sliders = document.querySelectorAll('[data-iscp-slider]');

		sliders.forEach(function (slider) {
			var slides = slider.querySelectorAll('[data-iscp-slide]');
			var prev = slider.querySelector('[data-iscp-slider-prev]');
			var next = slider.querySelector('[data-iscp-slider-next]');
			var dots = slider.querySelectorAll('[data-iscp-slider-dot]');
			var activeIndex = 0;
			var intervalId = null;
			var canAnimate = !body.classList.contains('iscp-animations-disabled') && !(window.matchMedia('(prefers-reduced-motion: reduce)').matches && !body.classList.contains('iscp-ignore-reduced-motion'));

			if (slides.length < 2) {
				return;
			}

			function showSlide(index) {
				activeIndex = (index + slides.length) % slides.length;

				slides.forEach(function (slide, slideIndex) {
					var isActive = slideIndex === activeIndex;
					slide.classList.toggle('iscp-index-slide-active', isActive);
					slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
				});

				dots.forEach(function (dot, dotIndex) {
					var isActive = dotIndex === activeIndex;
					dot.classList.toggle('iscp-slider-dot-active', isActive);
					dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
				});
			}

			function startAutoPlay() {
				if (!canAnimate) {
					return;
				}

				window.clearInterval(intervalId);
				intervalId = window.setInterval(function () {
					showSlide(activeIndex + 1);
				}, 6000);
			}

			function stopAutoPlay() {
				window.clearInterval(intervalId);
			}

			if (prev) {
				prev.addEventListener('click', function () {
					showSlide(activeIndex - 1);
					startAutoPlay();
				});
			}

			if (next) {
				next.addEventListener('click', function () {
					showSlide(activeIndex + 1);
					startAutoPlay();
				});
			}

			dots.forEach(function (dot) {
				dot.addEventListener('click', function () {
					showSlide(parseInt(dot.getAttribute('data-iscp-slider-dot'), 10) || 0);
					startAutoPlay();
				});
			});

			slider.addEventListener('mouseenter', stopAutoPlay);
			slider.addEventListener('mouseleave', startAutoPlay);
			slider.addEventListener('focusin', stopAutoPlay);
			slider.addEventListener('focusout', startAutoPlay);

			showSlide(0);
			startAutoPlay();
		});
	};

	ISCP.openExitModal = function () {
		var hasShown = false;

		try {
			hasShown = sessionStorage.getItem('iscpExitModalShown') === 'true';
		} catch (error) {
			hasShown = false;
		}

		if (!exitModal || hasShown || !exitModalArmed) {
			return;
		}

		exitModalArmed = false;
		lastFocusedElement = document.activeElement;
		exitModal.hidden = false;
		body.classList.add('iscp-modal-open');

		try {
			sessionStorage.setItem('iscpExitModalShown', 'true');
		} catch (error) {
			// Session storage can be unavailable in strict privacy modes.
		}

		var focusTarget = exitModal.querySelector('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');

		if (focusTarget) {
			focusTarget.focus();
		}
	};

	ISCP.closeExitModal = function () {
		if (!exitModal || exitModal.hidden) {
			return;
		}

		exitModal.hidden = true;
		body.classList.remove('iscp-modal-open');

		if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
			lastFocusedElement.focus();
		}
	};

	ISCP.keepFocusInModal = function (event) {
		if (!exitModal || exitModal.hidden || event.key !== 'Tab') {
			return;
		}

		var focusable = exitModal.querySelectorAll('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');

		if (!focusable.length) {
			return;
		}

		var first = focusable[0];
		var last = focusable[focusable.length - 1];

		if (event.shiftKey && document.activeElement === first) {
			event.preventDefault();
			last.focus();
		} else if (!event.shiftKey && document.activeElement === last) {
			event.preventDefault();
			first.focus();
		}
	};

	ISCP.initExitModal = function () {
		if (!exitModal || window.matchMedia('(max-width: 900px)').matches) {
			return;
		}

		document.addEventListener('mouseout', function (event) {
			if (exitModalArmed && event.clientY <= 0) {
				ISCP.openExitModal();
			}
		});

		exitModalCloseButtons.forEach(function (button) {
			button.addEventListener('click', ISCP.closeExitModal);
		});

		exitModal.addEventListener('keydown', ISCP.keepFocusInModal);
	};

	ISCP.openDemoModal = function () {
		if (!demoModal) {
			return;
		}

		lastFocusedElement = document.activeElement;
		demoModal.hidden = false;
		body.classList.add('iscp-modal-open');

		var focusTarget = demoModal.querySelector('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');

		if (focusTarget) {
			focusTarget.focus();
		}
	};

	ISCP.closeDemoModal = function () {
		if (!demoModal || demoModal.hidden) {
			return;
		}

		demoModal.hidden = true;
		body.classList.remove('iscp-modal-open');

		if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
			lastFocusedElement.focus();
		}
	};

	ISCP.keepFocusInDemoModal = function (event) {
		if (!demoModal || demoModal.hidden || event.key !== 'Tab') {
			return;
		}

		var focusable = demoModal.querySelectorAll('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');

		if (!focusable.length) {
			return;
		}

		var first = focusable[0];
		var last = focusable[focusable.length - 1];

		if (event.shiftKey && document.activeElement === first) {
			event.preventDefault();
			last.focus();
		} else if (!event.shiftKey && document.activeElement === last) {
			event.preventDefault();
			first.focus();
		}
	};

	ISCP.initDemoModal = function () {
		if (!demoModal || !demoModalOpenButtons.length) {
			return;
		}

		demoModalOpenButtons.forEach(function (button) {
			button.addEventListener('click', ISCP.openDemoModal);
		});

		demoModalCloseButtons.forEach(function (button) {
			button.addEventListener('click', ISCP.closeDemoModal);
		});

		demoModal.addEventListener('keydown', ISCP.keepFocusInDemoModal);
	};

	ISCP.initStickyCta = function () {
		if (stickyCta) {
			body.classList.add('iscp-has-sticky-cta');
		}
	};

	ISCP.initCounters = function () {
		var counters = document.querySelectorAll('[data-iscp-count]');

		if (!counters.length) {
			return;
		}

		function complete(counter) {
			counter.textContent = counter.getAttribute('data-iscp-count-display') || counter.getAttribute('data-iscp-count') + (counter.getAttribute('data-iscp-count-suffix') || '');
		}

		function animate(counter) {
			var target = parseFloat(counter.getAttribute('data-iscp-count')) || 0;
			var suffix = counter.getAttribute('data-iscp-count-suffix') || '';
			var start = null;
			var duration = 1200;

			function step(timestamp) {
				if (!start) {
					start = timestamp;
				}

				var progress = Math.min((timestamp - start) / duration, 1);
				var eased = 1 - Math.pow(1 - progress, 3);
				counter.textContent = Math.round(target * eased) + suffix;

				if (progress < 1) {
					window.requestAnimationFrame(step);
				} else {
					complete(counter);
				}
			}

			window.requestAnimationFrame(step);
		}

		if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			counters.forEach(complete);
			return;
		}

		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					animate(entry.target);
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.35 });

		counters.forEach(function (counter) {
			counter.textContent = '0' + (counter.getAttribute('data-iscp-count-suffix') || '');
			observer.observe(counter);
		});
	};

	ISCP.initTiltCards = function () {
		var cards = document.querySelectorAll('.iscp-service-card, .iscp-solution-card, .iscp-capability-main-card, .iscp-recent-post-card');

		if (!cards.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches || window.matchMedia('(hover: none)').matches) {
			return;
		}

		cards.forEach(function (card) {
			card.addEventListener('mousemove', function (event) {
				var rect = card.getBoundingClientRect();
				var x = (event.clientX - rect.left) / rect.width - 0.5;
				var y = (event.clientY - rect.top) / rect.height - 0.5;
				card.style.setProperty('--iscp-tilt-x', (-y * 7).toFixed(2) + 'deg');
				card.style.setProperty('--iscp-tilt-y', (x * 7).toFixed(2) + 'deg');
			});

			card.addEventListener('mouseleave', function () {
				card.style.removeProperty('--iscp-tilt-x');
				card.style.removeProperty('--iscp-tilt-y');
			});
		});
	};

	ISCP.initImageSkeletons = function () {
		var mediaItems = document.querySelectorAll('.iscp-card-media img, .iscp-offering-card-media img, .iscp-recent-post-media img, .iscp-section-photo img');

		mediaItems.forEach(function (image) {
			var media = image.closest('.iscp-card-media, .iscp-offering-card-media, .iscp-recent-post-media, .iscp-section-photo');

			if (!media) {
				return;
			}

			media.classList.add('iscp-image-loading');

			function markLoaded() {
				media.classList.remove('iscp-image-loading');
				media.classList.add('iscp-image-loaded');
			}

			if (image.complete) {
				markLoaded();
			} else {
				image.addEventListener('load', markLoaded, { once: true });
				image.addEventListener('error', markLoaded, { once: true });
			}
		});
	};

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			var wasMenuOpen = ISCP.isMenuOpen();
			ISCP.setMenuState(false);
			ISCP.closeDropdowns();
			ISCP.closeExitModal();
			ISCP.closeDemoModal();
			if (wasMenuOpen && toggle) {
				toggle.focus();
			}
		}
	});

	window.addEventListener('scroll', function () {
		ISCP.requestHeaderScrollState();
		ISCP.requestScrollProgress();
	}, { passive: true });

	ISCP.updateHeaderScrollState();
	ISCP.initMenu();
	ISCP.initActiveNav();
	ISCP.initMegaMenuDescriptions();
	ISCP.initDropdowns();
	ISCP.initBackToTop();
	ISCP.initReveal();
	ISCP.initFaq();
	ISCP.initSliders();
	ISCP.initStickyCta();
	ISCP.initExitModal();
	ISCP.initDemoModal();
	ISCP.initCounters();
	ISCP.initTiltCards();
	ISCP.initImageSkeletons();
	ISCP.updateScrollProgress();
}());
