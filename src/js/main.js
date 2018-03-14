$(document).ready(function() {
	'use strict';

	// Trigger window resize when DOM has been loaded
	$(window).trigger('resize');
	
	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;

	// Add class "active" to clicked career item and slide-toggle contents
	$('.careers-block .title-wrapper').click(function() {
		var $this = $(this);
		var $this_block = $this.parents('.careers-block');
		$this_block.toggleClass('active');
		$this_block.siblings('.active').not(this).removeClass('active').find('.content-wrapper').stop(true, true).slideUp();
		$this.siblings('.content-wrapper').stop(true, true).slideToggle();

		var $this_section = $this.parents('section');;
		var $this_height = $this_section.innerHeight();
		var $timeout_section_height;
		function remove_huge() {
			$this_section.removeClass("huge");
		}
		function add_huge() {
			$this_section.addClass("huge");
		}
		if( $this_height > 916 ) {
			$timeout_section_height = setTimeout(add_huge, 500);
		} else {
			$timeout_section_height = setTimeout(remove_huge, 500);
		}
		return false;
	});

	// Add class "required" to fieldset elements in form, where necessary
	$('.wpcf7-validates-as-required').parents('fieldset').addClass('add-required');

	// Add "Close" buttom to "Get a Quote" form
	$('.get-a-quote-form-block form').prepend('<a id="close-quote-form" href="#"></a>');

	// Toggl contact form
	$(".get-a-quote-form, a[href='#get-a-quote-form']").click(function() {
		$(".get-a-quote-form-block").toggleClass('hidden');
		$("body").toggleClass("get-a-quote-form-open");
		return false;
	});

	$("#close-quote-form").click(function() {
		$(".get-a-quote-form-block").addClass('hidden');	
		$("body").removeClass("get-a-quote-form-open");        
		return false;
	});

	$(document).mouseup(function(e) {
	    var container_1 = $(".get-a-quote-form-block form");
	    var container_2 = $("a[href='#get-a-quote-form']");

	    if (!container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0 // ... nor a descendant of the container
	        && !container_2.is(e.target) // and if the target of the click isn't the container...
	        && container_2.has(e.target).length === 0) // ... nor a descendant of the container
	    {
			$(".get-a-quote-form-block").addClass('hidden');	
			$("body").removeClass("get-a-quote-form-open");        
	    }
	});

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

	// Hide mobile menu when clicked outside of it
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

	// History section custom horizontal scrollbar
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

	// Initialize slider
	$(".lightslider").each(function() {
	var $this = $(this);
	  $this.lightSlider({
	        item      : 1,
	        auto      : true,
	        loop      : true,
	        speed: 600,
	        pause: 3000,
	        pager: true,
	        onSliderLoad: function() {
	      		$('.lightslider').removeClass('cS-hidden');
	        },
	  });     
	});

	// Initialize lightbox
	$('a[data-rel^=lightcase]').lightcase({
	    onStart : {
	      bar: function() {
	        alert('Lightcase process is started');
	        $('body').addClass('this-is-the-class');
	      }
	    }
	});
	
	$(document).mouseup(function(e) {
	    var container_1 = $(".lightbox-contents");

	    if ( !container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0
	        && $('html').hasClass('lightcase-open') ) // ... nor a descendant of the container
	    {
	    	lightcase.close();
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


});


$(window).resize(function() {

	// Add class to section if it's height is over the limit
	$('section').each(function() {
		var $this = $(this);
		var $this_height = $this.innerHeight();
		alert($this_height);
		if( $this_height > 916 ) {
			alert('yes');
			$this.addClass('huge');
		} else {
			$this.removeClass('huge');
		}
	});

	// Calculate div width for horizontal scrollable content
	var totalWidth = 0;
	$('.history-block,.main-year-block').each(function(index) {
	    totalWidth += parseInt($(this).outerWidth(true), 10);
	});
	var $history_padding_r = parseFloat($("#history-inner").css("padding-right"));
	var $history_padding_l = parseFloat($("#history-inner").css("padding-left"));
	var $setWidth = totalWidth + $history_padding_r + $history_padding_l;
	$("#history-inner-wrapper").css("width", $setWidth);

	// Calculate div width for vertical multi column layout
	var totalHeight = 0;
	$('.testimonial-block').each(function() {
	    totalHeight += parseInt($(this).outerHeight(true), 10);
	});
	var halfHeight = totalHeight / 2;
	//alert(halfHeight);

	var setHeight = 0;
	$('.testimonial-block').each(function() {
	    setHeight += parseInt($(this).outerHeight(true), 10);
	    if ( setHeight > halfHeight ) { return false; }
	});
	//alert(setHeight);

	var setHeightReverse = 0;
	$($('.testimonial-block').get().reverse()).each(function() {
	    setHeightReverse += parseInt($(this).outerHeight(true), 10);
	    if ( setHeightReverse > halfHeight ) { return false; }
	});
	//alert(setHeightReverse);

	if ( setHeight < setHeightReverse ) {
		$('.testimonials-wrapper').css('height', setHeight);
	} else {
		$('.testimonials-wrapper').css('height', setHeightReverse);
	}

});