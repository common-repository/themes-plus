import 'jquery-countTo';


(function ($) {
	"use strict";
	
	var $window = $(window);
	
	function isElementInViewport (el) {
		if (el.length === 0) {
			return false;
		} else {
			el = el[0];
		}
		
		var rect = el.getBoundingClientRect();
		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= $window.height() &&
			rect.right <= $window.width()
		);
	}
	
	function startCountTo () {
		var $timer = $('.countup');
		
		if (isElementInViewport($timer) && $timer.is(':empty')) {
			$timer.countTo({
				formatter: function (value, options) {
					// If browser supports ECMAScript Internationalization API
					if ( typeof Intl === 'object' ) {
						var lng = navigator.languages ? navigator.languages[0] : (navigator.language || navigator.userLanguage);
						return new Intl.NumberFormat(lng).format(value.toFixed(0));
					} else {
						return value.toFixed(0);
					}
				}
			});
		} else {
			$timer.html(""); // clear content if not in viewport
		}
	}
	
	$(function () {
		$('.countup').html(""); // clear content on start
		
		startCountTo();
	});
	
	// Initialize countTo on scroll/touchmove, if in viewport
	$window.on('scroll touchmove', function () {
		startCountTo();
	});
	
}(jQuery));