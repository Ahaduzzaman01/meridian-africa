(function ($) {
	"use strict";

	/*--------------------------------------------
		Image Lazy Load
	---------------------------------------------*/
	$('body').imagesLoaded()
		.progress(function (instance, image) {
			var result = image.isLoaded ? 'loaded' : 'broken';
			if (!image.isLoaded) {
				console.log( 'image is ' + result + ' for ' + image.img.src );
			}
		});

	/*--------------------------------------------
		Search Popup
	---------------------------------------------*/
	var bodyOvrelay = $('#body-overlay');
	var searchPopup = $('#search-popup');

	$(document).on('click', '#body-overlay', function (e) {
		e.preventDefault();
		bodyOvrelay.removeClass('active');
		searchPopup.removeClass('active');
	});
	$(document).on('click', '.search-box-btn', function (e) {
		e.preventDefault();
		searchPopup.addClass('active');
		bodyOvrelay.addClass('active');
	});

	/* ----------------------------------------------------------- */
	/*  Back to top
	/* ----------------------------------------------------------- */

	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('.backto').fadeIn();
		} else {
			$('.backto').fadeOut();
		}
	});

	// scroll body to 0px on click
	$('.backto').on('click', function () {
		$('.backto').tooltip('hide');
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	jQuery('.mainmenu ul.theme-main-menu').slicknav({
		allowParentLinks: true,
		prependTo: '.kristo-responsive-menu',
		closedSymbol: "&#8594",
		openedSymbol: "&#8595",
	});

	jQuery(window).load(function () {
		jQuery("#preloader").fadeOut();
	});

	/* ----------------------------------------------------------- */
	/*  Sticky Header
/* ----------------------------------------------------------- */

	$(window).on('scroll', function (event) {
		var scroll = $(window).scrollTop();
		if (scroll < 86) {
			$(".stick-top").removeClass("sticky");
		} else {
			$(".stick-top").addClass("sticky");
		}
	});

	/* ----------------------------------------------------------- */
	/*  Dark Mode
	/* ----------------------------------------------------------- */

	$(document).ready(function () {

		/**
		* Light & Dark Mode jQuery Toggle Using localStorage
		*/

		// Check for saved 'switchMode' in localStorage
		let switchMode = localStorage.getItem('switchMode');

		// Get selector
		const switchModeToggle = $(' .mode-switcher ');

		// Dark mode function
		const enableDarkMode = function () {
			// Add the class to the body
			$('body').addClass('likhun-dark');
			// Update switchMode in localStorage
			localStorage.setItem('switchMode', 'enabled');
		}

		// Light mdoe function
		const disableDarkMode = function () {
			// Remove the class from the body
			$('body').removeClass('likhun-dark');
			// Update switchMode in localStorage value
			localStorage.setItem('switchMode', null);
		}

		// If the user already visited and enabled switchMode
		if (switchMode === 'enabled') {
			enableDarkMode();
			// Dark icon enabled
			$('.mode-icon-change').addClass('icofont-moon');
			$('.mode-icon-change').removeClass('icofont-sun-alt');
		} else {
			// Light icon enabled
			$('.mode-icon-change').addClass('icofont-sun-alt');
			$('.mode-icon-change').removeClass('icofont-moon');
		}

		// When someone clicks the button
		switchModeToggle.on('click', function () {
			// Change switch icon
			$('.mode-icon-change').toggleClass('icofont-sun-alt');
			$('.mode-icon-change').toggleClass('icofont-moon');

			// get their switchMode setting
			switchMode = localStorage.getItem('switchMode');

			// if it not current enabled, enable it
			if (switchMode !== 'enabled') {
				enableDarkMode();
				// if it has been enabled, turn it off  
			} else {
				disableDarkMode();
			}
		});

	}); // End load document

	/* ----------------------------------------------------------- */
	/*  Video Popup
	/* ----------------------------------------------------------- */
	if ($('.video-play-btn').length > 0) {
		$('.video-play-btn').magnificPopup({
			type: 'iframe',
			mainClass: 'mfp-with-zoom',
			zoom: {
				enabled: true, // By default it's false, so don't forget to enable it

				duration: 300, // duration of the effect, in milliseconds
				easing: 'ease-in-out', // CSS transition easing function

				opener: function (openerElement) {
					return openerElement.is('img') ? openerElement : openerElement.find('img');
				}
			}
		});
	}

	/* ----------------------------------------------------------- */
	/*  Wow JS
	/* ----------------------------------------------------------- */
	$(document).ready(function () {
		new WOW().init();
	});


})(jQuery);