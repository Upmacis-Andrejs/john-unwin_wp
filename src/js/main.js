$(document).ready(function() {
	'use strict';

	// Trigger window resize when DOM has been loaded
	$(window).trigger('resize');
	
	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;

	// Toggle mobile menu
	$("#mobile-menu-icon").click(function(e) {
		var $this = $(this);
		if ( $this.hasClass("open") ) {
			$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
			$('.header-menu .menu-item-has-children > a > .menu-item-has-children-ghost').removeClass('hidden');
			$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
		}
		$(this).toggleClass('open');
		$("#site-header .wrapper-for-mobile-menu").stop(true, true).slideToggle();
		return false;
	});

	//hide mobile menu when clicked outside of it
	$(document).mouseup(function (e) {
		if ( $("#mobile-menu-icon").hasClass('open') ) {
		    var container = $("#site-header");	
		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0 ) // ... nor a descendant of the container
		    {
				$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
				$('.header-menu .menu-item-has-children > a > .menu-item-has-children-ghost').removeClass('hidden');
				$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
				$("#mobile-menu-icon").removeClass("open");
				$("#site-header .wrapper-for-mobile-menu").stop(true, true).slideUp();
				return false;
		    }
		}
	});

	// Toggl contact form
	$(".contact-form-btn").click(function() {
		$(".contact-form-outer").toggleClass('hidden');
		$("body").toggleClass("contact-form-open");
	});

	$(".contact-form-close").click(function() {
		$(".contact-form-outer").addClass('hidden');
		$("body").toggleClass("contact-form-open");
	});

	$(document).mouseup(function(e) {
	    var container_1 = $(".contact-form-wrapper");
	    var container_2 = $(".contact-form-btn");

	    if (!container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0 // ... nor a descendant of the container
	        && !container_2.is(e.target) // and if the target of the click isn't the container...
	        && container_2.has(e.target).length === 0) // ... nor a descendant of the container
	    {
			$(".contact-form-outer").addClass('hidden');	
			$("body").removeClass("contact-form-open");        
	    }
	});

	// Add CSS class to Site Header when scrollTop position of the document is not 0
	var $window = $(window);
	var $lastY = $window.scrollTop();
	var $document = $(document);
	var $body = $("body");
	function add_not_top() {
		$body.addClass("not--top");
	}
	function remove_not_top() {
		$body.removeClass("not--top");
	}
	var $timeout_add_not_top;
	var $timeout_remove_not_top;

	if( $lastY > 50 ) {
		add_not_top();
	}

	$(window).scroll(function() {

		var $currentY = $window.scrollTop();
		if ( $currentY > $lastY ) {
			var y = 'down';
		} else if ( $currentY < $lastY ) {
			var y = 'up';
		}
		$lastY = $currentY;
		if ( $document.scrollTop() > 50 && y == 'down' ) {
			$timeout_add_not_top = setTimeout(add_not_top, 150);
		} else if ( $document.scrollTop() <= 100 && y == 'up' ) {
			$timeout_remove_not_top = setTimeout(remove_not_top, 150);
		}

	});

    // Script for deprecated browser notification
    $('#close_announcement').click(function(e) {
        e.preventDefault();
        $('#update_browser_container').addClass('hidden');
    });

	// Replace all .svg to .png, in case the browser does not support the format
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}

	// Google Maps API script
/* -------------------------------------------------------------------------------------- */
	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	function new_map( $el ) {
		
		// var
		var $markers = $el.find('.marker');
		
		
		// vars
		var args = {
			zoom		: 16,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI: true,
			zoomControl: true,
			// gestureHandling: 'greedy',
			// gestureHandling: 'none',
			styles		: [
							{
							    "featureType": "administrative",
							    "elementType": "labels.text.fill",
							    "stylers": [
							        {
							            "color": "#444444"
							        }
							    ]
							},
							{
							    "featureType": "administrative.country",
							    "elementType": "geometry.stroke",
							    "stylers": [
							        {
							            "color": "#787c82"
							        }
							    ]
							},
							{
							    "featureType": "administrative.province",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "administrative.locality",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "administrative.neighborhood",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "administrative.land_parcel",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "landscape",
							    "elementType": "all",
							    "stylers": [
							        {
							            "color": "#c2c0c2"
							        }
							    ]
							},
							{
							    "featureType": "poi",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "poi",
							    "elementType": "labels.text",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road",
							    "elementType": "all",
							    "stylers": [
							        {
							            "saturation": -100
							        },
							        {
							            "lightness": 45
							        },
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road.highway",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road.arterial",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "road.arterial",
							    "elementType": "labels.icon",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "transit",
							    "elementType": "all",
							    "stylers": [
							        {
							            "visibility": "off"
							        }
							    ]
							},
							{
							    "featureType": "water",
							    "elementType": "all",
							    "stylers": [
							        {
							            "color": "#ffffff"
							        },
							        {
							            "visibility": "on"
							        }
							    ]
							}
						]
					};
								
		// create map
		var map = new google.maps.Map( $el[0], args);
		
		
		// add a markers reference
		map.markers = [];
		
		
		// add markers
		$markers.each(function(){
			
	    	add_marker( $(this), map );
			
		});
		
		
		// center map
		center_map( map );
		
		
		// return
		return map;
		
	}

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		if ( $(window).width() > $tablet_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 3;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

			    var $pan_distance = - $(window).width() * 2;
				// change the center of map
				map.panBy($pan_distance,0);
			}

		} else if ( $(window).width() <= $tablet_width && $(window).width() > $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 1;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});
			}

		} else if ( $(window).width() <= $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});
			}
		}
	}

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		var marker_href = $marker.attr('href');
		var marker_img_base = $('#template-dir-uri-img').attr('href');
		var marker_img = {
			url			: marker_img_base + 'marker.png',
			anchor		: new google.maps.Point(18, 48)
		}

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon		: marker_img,
			url			: marker_href,
			optimized	: false
		});

		// create overlay
		var myoverlay = new google.maps.OverlayView();
		    myoverlay.draw = function () {
		        this.getPanes().markerLayer.id='markerLayer';
		    };
		myoverlay.setMap(map);

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				//infowindow.open( map, marker );
				window.location.href = this.url;

			});
		}

	}

	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

	google.maps.event.addDomListener(window, 'resize', function() {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		if ( $(window).width() > $tablet_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 2;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

				// change the center of map
				map.panBy(-800,0);
			}

		} else if ( $(window).width() <= $tablet_width && $(window).width() > $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom - 1;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

				// change the center of map
				map.panBy(0,0);
			}

		} else if ( $(window).width() <= $mobile_width ) {

			// only 1 marker?
			if( map.markers.length == 1 ) {
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			} else {
				// fit to bounds
				map.fitBounds( bounds );

			    var listener = google.maps.event.addListener(map, "idle", function() { 
				  var current_zoom = map.getZoom();			
				  var zoom_out = current_zoom;
				  map.setZoom( zoom_out );
				  google.maps.event.removeListener(listener); 
				});

				// change the center of map
				map.panBy(0,0);
			}
		}

	});

/* -------------------------------------------------------------------------------------- */
	// /Google Maps API script

});


$(window).resize(function() {

	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;
	var $window_width = $(window).width();

	// Mobile Menu For Tablet and Mobile Script
	var	$wrapper_for_mobile_menu = $("#site-header .wrapper-for-mobile-menu");

	if ( $window_width <= $tablet_width ) {
		var $menu_item_has_children = $(".header-menu .menu-item-has-children > a");
		if( !$menu_item_has_children.has('.menu-item-has-children-ghost').length ) {
			$menu_item_has_children.append("<span class='menu-item-has-children-ghost'></span>");
		}
		$("#site-header .wrapper-for-mobile-menu").removeClass('block-important');
	} else {
		$(".menu-item-has-children-ghost").detach();
		$('.header-menu .menu-item-has-children > a').css({'color' : '', 'background-color' : ''});
		$(".header-menu .sub-menu").stop(true, true).slideUp().css("display", '');
		//$('.header-menu > .menu-item-has-children > .sub-menu').css("display", 'none');		
		if ( $wrapper_for_mobile_menu.css("display") == 'none' ) {
			$wrapper_for_mobile_menu.addClass('block-important');
		}
		$("#mobile-menu-icon").removeClass("open");
	}

	// Reduce padding for .full-width-img-video-wrapper if text is not fitting in the div
	function reduce_padding() {
		var $fwivw = $(".full-width-img-video-wrapper");
		var $fwivw_contents = $fwivw.find(".container");
		$fwivw.css("padding-top", '');
		var $fwivw_padding_top = $fwivw.css("padding-top");
		var $fwivw_padding_top = $fwivw_padding_top.replace("px", "");

		if ( $fwivw.height() < $fwivw_contents.outerHeight() ) {
			$fwivw.css("padding-top", $fwivw_padding_top * 0.65);
		} else {
			$fwivw.css("padding-top", "");
		}
		$fwivw.css("opacity", '1');
	}

	if( $(".full-width-img-video-wrapper").length ) {
		reduce_padding();
	}

});