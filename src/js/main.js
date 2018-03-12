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

	// History section custom horizontal scrollbat
	$("#history-inner").niceScroll("#history-inner-wrapper",{
	    autohidemode: false,
	    cursorcolor: "#134294",
	    cursoropacitymin: 1,
	    cursoropacitymax: 1,
	    cursorwidth: "30px",
	    cursorborder: "",
	    cursorborderradius: "4px",
	    zindex: 9,
	    cursorminheight: 150,
	    cursorfixedheight: 150,

	    horizrailenabled: true,
	    grabcursorenabled: false,
	    spacebarenabled: false,

	    emulatetouch: true,
	    cursordragontouch: true,
	});
	$(".nicescroll-cursors").wrapInner("<div class='cursor-inner'></div>");

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


});


$(window).resize(function() {

	// Calculate div width for horizontal scrollable content
	var totalWidth = 0;
	$('.history-block,.main-year-block').each(function(index) {
	    totalWidth += parseInt($(this).outerWidth(true), 10);
	});
	var $history_padding_r = parseFloat($("#history-inner").css("padding-right"));
	var $history_padding_l = parseFloat($("#history-inner").css("padding-left"));
	var $setWidth = totalWidth + $history_padding_r + $history_padding_l;
	$("#history-inner-wrapper").css("width", $setWidth);

});