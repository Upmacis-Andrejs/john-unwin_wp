window.onload=function(){$("body").addClass("content-loaded"),AOS.init({easing:"ease-in-out-quart",offset:70,once:!0})},$(document).ready(function(){"use strict";$(window).trigger("resize");$(".careers-block .title-wrapper").click(function(){var e=$(this),t=e.parents(".careers-block");t.toggleClass("active"),t.siblings(".active").not(this).removeClass("active").find(".content-wrapper").stop(!0,!0).slideUp(),e.siblings(".content-wrapper").stop(!0,!0).slideToggle();var o=e.parents("section");return o.innerHeight()>916?setTimeout(function(){o.addClass("huge")},500):setTimeout(function(){o.removeClass("huge")},500),!1}),$(".wpcf7-validates-as-required").parents("fieldset").addClass("add-required"),$(".get-a-quote-form, a[href='#get-a-quote-form']").click(function(){return $(".get-a-quote-form-block").toggleClass("hidden"),$("body").toggleClass("get-a-quote-form-open"),!1}),$("#close-quote-form").click(function(){return $(".get-a-quote-form-block").addClass("hidden"),$("body").removeClass("get-a-quote-form-open"),!1}),$(document).mouseup(function(e){var t=$(".get-a-quote-form-inner"),o=$("a[href='#get-a-quote-form']");t.is(e.target)||0!==t.has(e.target).length||o.is(e.target)||0!==o.has(e.target).length||($(".get-a-quote-form-block").addClass("hidden"),$("body").removeClass("get-a-quote-form-open"))}),document.querySelector(".get-a-quote-form-block").addEventListener("wpcf7submit",function(e){var t=$(".get-a-quote-form-block"),o=t.find(".get-a-quote-form-inner"),r=o.innerWidth(),s=o.innerHeight();o.css({"min-width":r,"min-height":s}),t.find(".wpcf7").addClass("hidden"),t.find(".success-message").removeClass("hidden")},!1),$("#mobile-menu-icon").click(function(e){return $(this).hasClass("open")&&($(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""})),$(this).toggleClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideToggle(),!1}),$(document).mouseup(function(e){if($("#mobile-menu-icon").hasClass("open")){var t=$("#site-header");if(!t.is(e.target)&&0===t.has(e.target).length)return $(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""}),$("#mobile-menu-icon").removeClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideUp(),!1}});var e=$(window),t=e.scrollTop(),o=$(document),r=$("body");function s(){r.addClass("not--top")}function a(){r.removeClass("not--top")}t>50&&s(),$(window).scroll(function(){var r=e.scrollTop();if(r>t)var i="down";else if(r<t)i="up";t=r,o.scrollTop()>50&&"down"==i?setTimeout(s,150):o.scrollTop()<=100&&"up"==i&&setTimeout(a,150)}),$("#history-inner").niceScroll("#history-inner-wrapper",{autohidemode:!1,cursorcolor:"#134294",cursoropacitymin:1,cursoropacitymax:1,cursorwidth:"30px",cursorborder:"",cursorborderradius:"4px",zindex:9,cursorminheight:150,cursorfixedheight:150,horizrailenabled:!0,grabcursorenabled:!1,spacebarenabled:!1,emulatetouch:!0,cursordragontouch:!0}),$(".nicescroll-cursors").wrapInner("<div class='cursor-inner'></div>");var i=0;$(".lightslider").each(function(){i+=1;$(this);var e=$("#lightslider-"+i);e.find("li").length<2?(e.addClass("one-item"),e.lightSlider({item:1,auto:!1,loop:!1,enableTouch:!1,enableDrag:!1,freeMove:!1,pager:!1,onSliderLoad:function(){e.removeClass("cS-hidden")}})):e.lightSlider({item:1,auto:!0,loop:!0,pauseOnHover:!0,speed:600,pause:3e3,pager:!0,onSliderLoad:function(){e.removeClass("cS-hidden")}})}),$(document).mouseup(function(e){var t=$(".projects-popup"),o=$(".projects-block");if(!t.is(e.target)&&0===t.has(e.target).length&&!o.is(e.target)&&0===o.has(e.target).length&&$("html").hasClass("projects-popups-open")){var r=Math.abs(parseInt($("html").css("top"),10));$("html").css("top",""),$("#projects-popup-wrapper").removeClass("active"),$(".projects-popup").removeClass("active-project"),$("html").removeClass("projects-popups-open scrollbar"),$(window).scrollTop(r)}}),$(".projects-block").click(function(){$("html").css("top",-$(window).scrollTop());var e=$(this).attr("href");return $("html").addClass("projects-popups-open scrollbar"),$("#projects-popup-wrapper").addClass("active"),$(e).addClass("active-project"),!1}),$(".projects-popup .arrow-right").click(function(){var e=$(this).parents(".projects-popup");return $(".projects-popup").removeClass("active-project"),e.is(":last-child")?$(".projects-popup:first-child").addClass("active-project"):e.next().addClass("active-project"),!1}),$(".projects-popup .arrow-left").click(function(){var e=$(this).parents(".projects-popup");return $(".projects-popup").removeClass("active-project"),e.is(":first-child")?$(".projects-popup:last-child").addClass("active-project"):e.prev().addClass("active-project"),!1}),$("#close_announcement").click(function(e){e.preventDefault(),$("#update_browser_container").addClass("hidden")}),Modernizr.svg||$('img[src*="svg"]').attr("src",function(){return $(this).attr("src").replace(".svg",".png")})}),$(window).resize(function(){$("section").each(function(){var e=$(this);e.innerHeight()>916?e.addClass("huge"):e.removeClass("huge")});var e=0;$(".history-block,.main-year-block").each(function(t){e+=parseInt($(this).outerWidth(!0),10)});var t=parseFloat($("#history-inner").css("padding-right")),o=parseFloat($("#history-inner").css("padding-left")),r=e+t+o;$("#history-inner-wrapper").css("width",r);var s=0;$(".testimonial-block").each(function(){s+=parseInt($(this).outerHeight(!0),10)});var a=s/2,i=0;$(".testimonial-block").each(function(){if((i+=parseInt($(this).outerHeight(!0),10))>a)return!1});var n=0;$($(".testimonial-block").get().reverse()).each(function(){if((n+=parseInt($(this).outerHeight(!0),10))>a)return!1}),i<n?$(".testimonials-wrapper").css("height",i):$(".testimonials-wrapper").css("height",n)});