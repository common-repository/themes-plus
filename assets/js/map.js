/**
 * Google Maps
 * /inc/map.php: Don't forget to load Google Maps API (https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false) before enqueuing this script
 * // <div id="map" data-latlng="##.####,##.####" data-zoom="##" data-marker="##"></div>
 */

/*global jQuery:false, google:false, styles:false */

(function ($) {
	"use strict";

	function initialize() {
		var map, coords, mapOptions, marker, image, mapdata = $("#map-canvas"), latlng = mapdata.data("latlng"), latlngStr = latlng.replace(/\s+/g, "").split(",", 2), latitude = parseFloat(latlngStr[0]), longitude = parseFloat(latlngStr[1]), zoomfactor = mapdata.data("zoom"), markerurl = mapdata.data("marker");

		if (typeof zoomfactor !== 'undefined') {
			zoomfactor = parseInt(zoomfactor);
		} else {
			zoomfactor = 5;
		}
		
		coords = {
			lat: latitude,
			lng: longitude
		};
		mapOptions = {
			zoom: zoomfactor,
			center: coords,
			mapTypeControl: false,
			panControl: false,
			zoomControl: true,
			zoomControlOptions: {
				//style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			streetViewControl: false,
			scrollwheel: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		if (typeof markerurl !== 'undefined' && markerurl !== '' && (markerurl.match(/\.(jpeg|jpg|gif|png)$/) !== null)) {
			image = {
				url: markerurl,
				size: new google.maps.Size(128, 128),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(32, 64),
				scaledSize: new google.maps.Size(64, 64)
			};
			marker = new google.maps.Marker({
				position: coords,
				icon: image,
				map: map
			});
		} else {
			marker = new google.maps.Marker({
				position: coords,
				map: map
			});
		}
		
		google.maps.event.addListener(marker, 'click', function () {
			map.setZoom(14);
			map.setCenter(marker.getPosition());
		});

		if (typeof styles !== 'undefined') {
			map.setOptions({ styles: styles }); // Check if Map styles have been defined as JSON-string https://developers.google.com/maps/documentation/javascript/styling (needs to be supported by theme e.g. in Customizer API)
		}

	}
	google.maps.event.addDomListener(window, 'load', initialize);
	
}(jQuery));