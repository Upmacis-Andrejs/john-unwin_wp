$(document).ready(function(){"use strict";$(window).trigger("resize");$("section").each(function(){var e=$(this);e.innerHeight()>916&&e.addClass("huge")}),$(".wpcf7-validates-as-required").parents("fieldset").addClass("add-required"),$(".get-a-quote-form-block form").prepend('<a id="close-quote-form" href="#"></a>'),$(".get-a-quote-form, a[href='#get-a-quote-form']").click(function(){return $(".get-a-quote-form-block").toggleClass("hidden"),$("body").toggleClass("get-a-quote-form-open"),!1}),$("#close-quote-form").click(function(){return $(".get-a-quote-form-block").addClass("hidden"),$("body").removeClass("get-a-quote-form-open"),!1}),$(document).mouseup(function(e){var o=$(".get-a-quote-form-block form"),r=$("a[href='#get-a-quote-form']");o.is(e.target)||0!==o.has(e.target).length||r.is(e.target)||0!==r.has(e.target).length||($(".get-a-quote-form-block").addClass("hidden"),$("body").removeClass("get-a-quote-form-open"))}),$("#mobile-menu-icon").click(function(e){return $(this).hasClass("open")&&($(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""})),$(this).toggleClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideToggle(),!1}),$(document).mouseup(function(e){if($("#mobile-menu-icon").hasClass("open")){var o=$("#site-header");if(!o.is(e.target)&&0===o.has(e.target).length)return $(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""}),$("#mobile-menu-icon").removeClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideUp(),!1}});var e=$(window),o=e.scrollTop(),r=$(document),s=$("body");function t(){s.addClass("not--top")}function n(){s.removeClass("not--top")}o>50&&t(),$(window).scroll(function(){var s=e.scrollTop();if(s>o)var a="down";else if(s<o)a="up";o=s,r.scrollTop()>50&&"down"==a?setTimeout(t,150):r.scrollTop()<=100&&"up"==a&&setTimeout(n,150)}),$("#history-inner").niceScroll("#history-inner-wrapper",{autohidemode:!1,cursorcolor:"#134294",cursoropacitymin:1,cursoropacitymax:1,cursorwidth:"30px",cursorborder:"",cursorborderradius:"4px",zindex:9,cursorminheight:150,cursorfixedheight:150,horizrailenabled:!0,grabcursorenabled:!1,spacebarenabled:!1,emulatetouch:!0,cursordragontouch:!0}),$(".nicescroll-cursors").wrapInner("<div class='cursor-inner'></div>"),$("#close_announcement").click(function(e){e.preventDefault(),$("#update_browser_container").addClass("hidden")}),Modernizr.svg||$('img[src*="svg"]').attr("src",function(){return $(this).attr("src").replace(".svg",".png")})}),$(window).resize(function(){var e=0;$(".history-block,.main-year-block").each(function(o){e+=parseInt($(this).outerWidth(!0),10)});var o=parseFloat($("#history-inner").css("padding-right")),r=parseFloat($("#history-inner").css("padding-left")),s=e+o+r;$("#history-inner-wrapper").css("width",s)});