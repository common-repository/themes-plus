import 'jquery.jcountdown/src/jquery.jcountdown.js';


(function ($) {
	"use strict";
	
	$(function () {
		var $timer = $("#timer");
		
		$timer.html(""); // clear content on start
		
		$timer.countdown({
			"date": $timer.data("to"),
			"template": '%d <span class="cd-time">%td</span> %h <span class="cd-time">%th</span> %i <span class="cd-time">%ti</span> %s <span class="cd-time">%ts</span>',
			"offset": $timer.data("offset"),
			"isRTL": $timer.data("rtl")
		});
	});
	
}(jQuery));