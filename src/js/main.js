window.onload = function() {
	//add class to body element after page has loaded (including pictures)
	$("body").addClass('content-loaded');
	
	//animate elements
	AOS.init({
		easing: 'ease-in-out-quart',
		offset: 70,
	    once: true
	});
}

$(document).ready(function() {
	'use strict';

	// Trigger window resize when DOM has been loaded
	$(window).trigger('resize');
	
	// Responsive design widths
	var $tablet_width = 1199;
	var $mobile_width = 767;

	(function() {

       /**
        * Set cookie
        *
        * @param string name
        * @param string value
        * @param int days
        * @param string path
        * @see http://www.quirksmode.org/js/cookies.html
        */
       function createCookie(name,value,days,path) {
           if (days) {
               var date = new Date();
               date.setTime(date.getTime()+(days*24*60*60*1000));
               var expires = "; expires="+date.toGMTString();
           }
           else var expires = "";
           document.cookie = name+"="+value+expires+"; path="+path;
       }

       /**
        * Read cookie
        * @param string name
        *@returns {*}
        * @see http://www.quirksmode.org/js/cookies.html
        */
       function readCookie(name) {
           var nameEQ = name + "=";
           var ca = document.cookie.split(';');
           for(var i=0;i < ca.length;i++) {
               var c = ca[i];
               while (c.charAt(0)==' ') c = c.substring(1,c.length);
               if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
           }
           return null;
       }

       var cookieMessage = document.getElementById('cookies');
       if (cookieMessage == null) {
           return;
       }
       var cookie = readCookie('seen-cookie-message');
       if (cookie != null && cookie == 'yes') {
           cookieMessage.style.display = 'none';
       } else {
           cookieMessage.style.display = 'block';
       }
       
       // Set/update cookie
       var cookieExpiry = cookieMessage.getAttribute('data-cookie-expiry');
       if (cookieExpiry == null) {
           cookieExpiry = 30;
       }
       var cookiePath = cookieMessage.getAttribute('data-cookie-path');
       if (cookiePath == null) {
           cookiePath = "/";
       }

       $('#cookies-close').click(function() {
           $('#cookies').remove();
           createCookie('seen-cookie-message','yes',cookieExpiry,cookiePath);
       });

   })();

	// If add-blocks-wrapper has no children, do not display it
	if ( !$('#above-the-fold-section .add-blocks-wrapper').children().length ) {
		$('#above-the-fold-section .add-blocks-wrapper').addClass('hidden');
	}

	// Slide-toggle mobile menu
	$('#mobile-menu-icon').click(function() {
		$('.wrapper-for-mobile-menu').stop(true, true).slideToggle();
		$('body').toggleClass('mobile-menu-open');
		return false;
	});

	$(document).on('mouseup', function(e) {
		if ( $('.mobile-menu-open').length ) {
		    var container_1 = $("#site-header");
		    var container_2 = $(".wrapper-for-mobile-menu");
		    var container_3 = $('#mobile-menu-icon');

		    if (!container_1.is(e.target) // if the target of the click isn't the container...
		        && container_1.has(e.target).length === 0 // ... nor a descendant of the container
		        && !container_2.is(e.target) // and if the target of the click isn't the container...
		        && container_2.has(e.target).length === 0 // ... nor a descendant of the container
		        && !container_3.is(e.target) // and if the target of the click isn't the container...
		        && container_3.has(e.target).length === 0) // ... nor a descendant of the container
		    {
				$('.wrapper-for-mobile-menu').stop(true, true).slideUp();
				$('body').removeClass('mobile-menu-open');
		    }
		}
	});

	// Add class "active" to clicked career item and slide-toggle contents
	$('.careers-block .title-wrapper').click(function() {
		var $this = $(this);
		var $this_block = $this.parents('.careers-block');
		$this_block.toggleClass('active');
		$this_block.siblings('.active').not(this).removeClass('active').find('.content-wrapper').stop(true, true).slideUp();
		$this.siblings('.content-wrapper').stop(true, true).slideToggle();

		var $timeout_section_height;
		var $this_section = $this.parents('section');
		function manage_huge() {
			if( $this_section.innerHeight() > 916 ) {
				$this_section.addClass("huge");
			} else {
				$this_section.removeClass("huge");
			}
		}
		$timeout_section_height = setTimeout(manage_huge, 500);
		return false;
	});

	$(document).mouseup(function(e) {
	    var container_1 = $(".careers-block");
		var $timeout_section_height;
		var $this_section = $('.page-template-page-careers #above-the-fold-section');
		function manage_huge() {
			if( $this_section.innerHeight() > 916 ) {
				$this_section.addClass("huge");
			} else {
				$this_section.removeClass("huge");
			}
		}

	    if (!container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0) // ... nor a descendant of the container
	    {
			$('.careers-block .content-wrapper').stop(true, true).slideUp();
			container_1.removeClass('active');
			$timeout_section_height = setTimeout(manage_huge, 500);
	    }
	});

	// Add class "active" to clicked service section item and slide-toggle contents ( in mobile device )
	$(document).on('click', '.default-content-section-block .title-wrapper', function() {
		var $this = $(this);

		var $timeout_section_height;
		var $this_section = $this.parents('section');
		function manage_huge() {
			if( $this_section.innerHeight() > 916 ) {
				$this_section.addClass("huge");
			} else {
				$this_section.removeClass("huge");
			}
		}
	 	if( $(window).width() <= $mobile_width ) {
			var $this_block = $this.parents('.default-content-section-block');
			$this_block.toggleClass('active');
			$this_block.siblings('.active').not(this).removeClass('active').find('.text').stop(true, true).slideUp();
			$this.siblings('.text').stop(true, true).slideToggle();
			$timeout_section_height = setTimeout(manage_huge, 500);
	 	}
		return false;
	});

	$(document).mouseup(function(e) {
	    var container_1 = $(".default-content-section-block");
		var $timeout_section_height;
		var $this_section = $('.services_section');
		function manage_huge() {
			if( $this_section.innerHeight() > 916 ) {
				$this_section.addClass("huge");
			} else {
				$this_section.removeClass("huge");
			}
		}

	    if (!container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0) // ... nor a descendant of the container
	    {
			$('.default-content-section-block .text').stop(true, true).slideUp();
			container_1.removeClass('active');
			$timeout_section_height = setTimeout(manage_huge, 500);
	    }
	});

	// Add class "required" to fieldset elements in form, where necessary
	$('.wpcf7-validates-as-required').parents('fieldset').addClass('add-required');

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
	    var container_1 = $(".get-a-quote-form-inner");
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

	// Contact Form Success Message for 'Get a Quote' form
	var $get_quote_form = document.querySelector('.get-a-quote-form-block');
	$get_quote_form.addEventListener( 'wpcf7mailsent', function(e) {
		var $form = $('.get-a-quote-form-block');
		var $form_inner = $form.find('.get-a-quote-form-inner');
		var $form_inner_width = $form_inner.innerWidth();
		var $form_inner_height = $form_inner.innerHeight();
		$form_inner.css({
			'min-width' : $form_inner_width,
			'min-height': $form_inner_height
		});
	    $form.find('.wpcf7').addClass('hidden');
	    $form.find('.success-message').removeClass('hidden');
	}, false );

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
	var $header_contacts_wrapper = $('.header-contacts-wrapper');
	var $header_mobile_wrapper = $('#site-header,.wrapper-for-mobile-menu');

	function add_not_top() {
		$body.addClass("not--top");
		if( $window.width() <= $mobile_width ) {
			var $header_contacts_wrapper_h = $header_contacts_wrapper.innerHeight();
			$header_mobile_wrapper.css('transform', 'translateY(-'+$header_contacts_wrapper_h+'px)');
		}
	}
	function remove_not_top() {
		$body.removeClass("not--top");
		var $header_contacts_wrapper_h = $header_contacts_wrapper.innerHeight();
		$header_mobile_wrapper.css('transform', 'translateY(0)');
	}
	var $timeout_add_not_top;
	var $timeout_remove_not_top;

	if( $lastY > 50 ) {
		add_not_top();
	} else {
		remove_not_top();
	}

	$(window).on('scroll', function() {

		var $currentY = $window.scrollTop();
		if ( $currentY > $lastY ) {
			var y = 'down';
		} else if ( $currentY < $lastY ) {
			var y = 'up';
		}
		$lastY = $currentY;
		if ( $document.scrollTop() > 50 && y == 'down' && !$('.not--top').length ) {
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

		scrollspeed: 0, // scrolling speed
		mousescrollstep: 20 // scrolling speed with mouse wheel (pixel)
	});
	$(".nicescroll-cursors").wrapInner("<div class='cursor-inner'></div>");

	// Initialize slider
  	var $slider = 0;
	$(".lightslider").each(function() {
	    $slider += 1;
		var $this = $(this);
    	var $this_slider = $('#lightslider-'+$slider);
		if ( $this_slider.find('li').length < 2 ) {
			$this_slider.addClass('one-item');
			$this_slider.lightSlider({
		        item      : 1,
		        auto      : false,
		        loop      : false,
		        enableTouch: false,
		        enableDrag: false,
		        freeMove: false,
		        pager: false,
		        onSliderLoad: function() {
		          $this_slider.removeClass('cS-hidden');
		        },
		  	});
		} else {
		  $this_slider.lightSlider({
		        item      : 1,
		        auto      : true,
		        loop      : true,
	        	pauseOnHover  : true,
		        speed: 600,
		        pause: 3000,
		        pager: true,
		        onSliderLoad: function() {
		          $this_slider.removeClass('cS-hidden');
		        },
		  });
		}  
	});

	// Open, Close and Switch Projects Popups
	$('#close-projects').click(function() {
		var $html_top = Math.abs(parseInt($('html').css('top'), 10));
		$('html').css("top",  '');
		$('#projects-popup-wrapper').removeClass('active');
		$('.projects-popup').removeClass('active-project');
		$('html').removeClass('projects-popups-open scrollbar');
		$(window).scrollTop( $html_top );
		return false;
	});
	$(document).mouseup(function(e) {
	    var container_1 = $(".projects-popup");
	    var container_2 = $(".projects-block");

	    if ( !container_1.is(e.target) // if the target of the click isn't the container...
	        && container_1.has(e.target).length === 0 // ... nor a descendant of the container
	        && !container_2.is(e.target) // if the target of the click isn't the container...
	        && container_2.has(e.target).length === 0 // ... nor a descendant of the container
	        && $('html').hasClass('projects-popups-open') ) 
	   	{     
        	var $html_top = Math.abs(parseInt($('html').css('top'), 10));
            $('html').css("top",  '');
	    	$('#projects-popup-wrapper').removeClass('active');
	    	$('.projects-popup').removeClass('active-project');
	    	$('html').removeClass('projects-popups-open scrollbar');
            $(window).scrollTop( $html_top );
	    }
	});

	$('.projects-block').click(function() {
        $('html').css("top",  - $(window).scrollTop() );
		var $this_id = $(this).attr('href');
		$('html').addClass('projects-popups-open scrollbar');
	    $('#projects-popup-wrapper').addClass('active');
	    $($this_id).addClass('active-project');
	    return false;
	});
	$('.projects-popup .arrow-right').click(function() {
		var $this_project = $(this).parents('.projects-popup');
	    $('.projects-popup').removeClass('active-project');

		if( $this_project.is(':last-child') ) {
	    	$('.projects-popup:first-child').addClass('active-project');
		} else {
			$this_project.next().addClass('active-project');
		}
		return false;
	});
	$('.projects-popup .arrow-left').click(function() {
		var $this_project = $(this).parents('.projects-popup');
	    $('.projects-popup').removeClass('active-project');
	    
		if( $this_project.is(':first-child') ) {
	    	$('.projects-popup:last-child').addClass('active-project');
		} else {
			$this_project.prev().addClass('active-project');
		}
		return false;
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

	var $tablet_width = 1199;
	var $mobile_width = 767;
	var $window = $(window);
	var $window_width = $window.width();

	// Position header navigation and main content according to header height
	var $header_height = $('#site-header').innerHeight();
	var $site_content = $('#site-content');
	$('.wrapper-for-mobile-menu').css('top', $header_height);
	if( $window_width > $mobile_width ) {
		$site_content.css('margin-top', $header_height);
		$('#above-the-fold-section').css('padding-top', '');
	} else {
		$site_content.css('margin-top', 0);
		$('#above-the-fold-section').css('padding-top', $header_height);
	}

	// Add class to section if it's height is over the limit
	$('section').each(function() {
		var $this = $(this);
		var $this_height = $this.innerHeight();
		alert($this_height);
		if( $this_height > 916 ) {
			$this.addClass('huge');
		} else {
			$this.removeClass('huge');
		}
	});

	// Set height to teammate image blocks
	var $team_block_w = $('.team-block').innerWidth();
	var $team_block_h = Math.round($team_block_w);
	$('.team-block .img-wrapper').css('height', $team_block_h);

	// Set height to projects image blocks
	var $projects_block_w = $('.projects-block').innerWidth();
	var $projects_block_h = Math.round($projects_block_w * 0.712);
	$('.projects-block .inner').css('height', $projects_block_h);

	// Set height to map
	var $map_block_w = $('#google-maps-section').innerWidth();
	if( $window_width < 1440 ) {
		var $map_block_h = Math.round($map_block_w * 0.33);
		$('#google-maps-section').css('height', $map_block_h);
	} else {
		var $map_block_h = Math.round($map_block_w * 0.26);
		$('#google-maps-section').css('height', $map_block_h);
	}

	// Adjust header position according to scroll position
	var $lastY = $window.scrollTop();
	var $body = $("body");
	var $header_contacts_wrapper = $('.header-contacts-wrapper');
	var $header_mobile_wrapper = $('#site-header,.wrapper-for-mobile-menu');

	function add_not_top() {
		$body.addClass("not--top");
		if( $window.width() <= $mobile_width ) {
			var $header_contacts_wrapper_h = $header_contacts_wrapper.innerHeight();
			$header_mobile_wrapper.css('transform', 'translateY(-'+$header_contacts_wrapper_h+'px)');
		}
	}
	function remove_not_top() {
		$body.removeClass("not--top");
		var $header_contacts_wrapper_h = $header_contacts_wrapper.innerHeight();
		$header_mobile_wrapper.css('transform', 'translateY(0)');
	}

	if( $lastY > 50 ) {
		add_not_top();
	} else {
		remove_not_top();
	}

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
	var $testimonials_wrapper = $('.testimonials-wrapper');
	var $testimonial_block = $('.testimonial-block');
	var totalHeight = 0;
	$testimonial_block.each(function() {
	    totalHeight += parseInt($(this).outerHeight(true), 10);
	});
	var halfHeight = totalHeight / 2;
	//alert(halfHeight);

	var setHeight = 0;
	$testimonial_block.each(function() {
	    setHeight += parseInt($(this).outerHeight(true), 10);
	    if ( setHeight > halfHeight ) { return false; }
	});
	//alert(setHeight);

	var setHeightReverse = 0;
	$($testimonial_block.get().reverse()).each(function() {
	    setHeightReverse += parseInt($(this).outerHeight(true), 10);
	    if ( setHeightReverse > halfHeight ) { return false; }
	});
	//alert(setHeightReverse);

	if( $window_width <= $tablet_width ) {
		$testimonials_wrapper.css('height', '');
		AOS.refresh();
	} else {
		if ( setHeight < setHeightReverse ) {
			$testimonials_wrapper.css('height', parseInt(setHeight + 5));
			AOS.refresh();
		} else {
			$testimonials_wrapper.css('height', parseInt(setHeightReverse + 5));
			AOS.refresh();
		}
	}

});