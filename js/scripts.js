window.onload=function(){$("body").addClass("content-loaded"),AOS.init({easing:"ease-in-out-quart",offset:70,once:!0})},$(document).ready(function(){"use strict";$(window).trigger("resize");var e=767;$("#above-the-fold-section .add-blocks-wrapper").children().length||$("#above-the-fold-section .add-blocks-wrapper").addClass("hidden"),$("#mobile-menu-icon").click(function(){return $(".wrapper-for-mobile-menu").stop(!0,!0).slideToggle(),$("body").toggleClass("mobile-menu-open"),!1}),$(document).on("mouseup",function(e){if($(".mobile-menu-open").length){var t=$("#site-header"),o=$(".wrapper-for-mobile-menu"),s=$("#mobile-menu-icon");t.is(e.target)||0!==t.has(e.target).length||o.is(e.target)||0!==o.has(e.target).length||s.is(e.target)||0!==s.has(e.target).length||($(".wrapper-for-mobile-menu").stop(!0,!0).slideUp(),$("body").removeClass("mobile-menu-open"))}}),$(".careers-block .title-wrapper").click(function(){var e=$(this),t=e.parents(".careers-block");t.toggleClass("active"),t.siblings(".active").not(this).removeClass("active").find(".content-wrapper").stop(!0,!0).slideUp(),e.siblings(".content-wrapper").stop(!0,!0).slideToggle();var o=e.parents("section");return setTimeout(function(){o.innerHeight()>916?o.addClass("huge"):o.removeClass("huge")},500),!1}),$(document).mouseup(function(e){var t=$(".careers-block"),o=$(".page-template-page-careers #above-the-fold-section");t.is(e.target)||0!==t.has(e.target).length||($(".careers-block .content-wrapper").stop(!0,!0).slideUp(),t.removeClass("active"),setTimeout(function(){o.innerHeight()>916?o.addClass("huge"):o.removeClass("huge")},500))}),$(document).on("click",".default-content-section-block .title-wrapper",function(){var t=$(this),o=t.parents("section");if($(window).width()<=e){var s=t.parents(".default-content-section-block");s.toggleClass("active"),s.siblings(".active").not(this).removeClass("active").find(".text").stop(!0,!0).slideUp(),t.siblings(".text").stop(!0,!0).slideToggle(),setTimeout(function(){o.innerHeight()>916?o.addClass("huge"):o.removeClass("huge")},500)}return!1}),$(document).mouseup(function(e){var t=$(".default-content-section-block"),o=$(".services_section");t.is(e.target)||0!==t.has(e.target).length||($(".default-content-section-block .text").stop(!0,!0).slideUp(),t.removeClass("active"),setTimeout(function(){o.innerHeight()>916?o.addClass("huge"):o.removeClass("huge")},500))}),$(".wpcf7-validates-as-required").parents("fieldset").addClass("add-required"),$(".get-a-quote-form, a[href='#get-a-quote-form']").click(function(){return $(".get-a-quote-form-block").toggleClass("hidden"),$("body").toggleClass("get-a-quote-form-open"),!1}),$("#close-quote-form").click(function(){return $(".get-a-quote-form-block").addClass("hidden"),$("body").removeClass("get-a-quote-form-open"),!1}),$(document).mouseup(function(e){var t=$(".get-a-quote-form-inner"),o=$("a[href='#get-a-quote-form']");t.is(e.target)||0!==t.has(e.target).length||o.is(e.target)||0!==o.has(e.target).length||($(".get-a-quote-form-block").addClass("hidden"),$("body").removeClass("get-a-quote-form-open"))}),document.querySelector(".get-a-quote-form-block").addEventListener("wpcf7mailsent",function(e){var t=$(".get-a-quote-form-block"),o=t.find(".get-a-quote-form-inner"),s=o.innerWidth(),r=o.innerHeight();o.css({"min-width":s,"min-height":r}),t.find(".wpcf7").addClass("hidden"),t.find(".success-message").removeClass("hidden")},!1),$("#mobile-menu-icon").click(function(e){return $(this).hasClass("open")&&($(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""})),$(this).toggleClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideToggle(),!1}),$(document).mouseup(function(e){if($("#mobile-menu-icon").hasClass("open")){var t=$("#site-header");if(!t.is(e.target)&&0===t.has(e.target).length)return $(".header-menu .sub-menu").stop(!0,!0).slideUp().css("display",""),$(".header-menu .menu-item-has-children > a > .menu-item-has-children-ghost").removeClass("hidden"),$(".header-menu .menu-item-has-children > a").css({color:"","background-color":""}),$("#mobile-menu-icon").removeClass("open"),$("#site-header .wrapper-for-mobile-menu").stop(!0,!0).slideUp(),!1}});var t=$(window),o=t.scrollTop(),s=$(document),r=$("body"),a=$(".header-contacts-wrapper"),n=$("#site-header,.wrapper-for-mobile-menu");function i(){if(r.addClass("not--top"),t.width()<=e){var o=a.innerHeight();n.css("transform","translateY(-"+o+"px)")}}function c(){r.removeClass("not--top");a.innerHeight();n.css("transform","translateY(0)")}o>50?i():c(),$(window).on("scroll",function(){var e=t.scrollTop();if(e>o)var r="down";else if(e<o)r="up";o=e,s.scrollTop()>50&&"down"==r&&!$(".not--top").length?setTimeout(i,150):s.scrollTop()<=100&&"up"==r&&setTimeout(c,150)}),$("#history-inner").niceScroll("#history-inner-wrapper",{autohidemode:!1,cursorcolor:"#134294",cursoropacitymin:1,cursoropacitymax:1,cursorwidth:"30px",cursorborder:"",cursorborderradius:"4px",zindex:9,cursorminheight:150,cursorfixedheight:150,horizrailenabled:!0,grabcursorenabled:!1,spacebarenabled:!1,emulatetouch:!0,cursordragontouch:!0}),$(".nicescroll-cursors").wrapInner("<div class='cursor-inner'></div>");var l=0;$(".lightslider").each(function(){l+=1;$(this);var e=$("#lightslider-"+l);e.find("li").length<2?(e.addClass("one-item"),e.lightSlider({item:1,auto:!1,loop:!1,enableTouch:!1,enableDrag:!1,freeMove:!1,pager:!1,onSliderLoad:function(){e.removeClass("cS-hidden")}})):e.lightSlider({item:1,auto:!0,loop:!0,pauseOnHover:!0,speed:600,pause:3e3,pager:!0,onSliderLoad:function(){e.removeClass("cS-hidden")}})}),$("#close-projects").click(function(){var e=Math.abs(parseInt($("html").css("top"),10));return $("html").css("top",""),$("#projects-popup-wrapper").removeClass("active"),$(".projects-popup").removeClass("active-project"),$("html").removeClass("projects-popups-open scrollbar"),$(window).scrollTop(e),!1}),$(document).mouseup(function(e){var t=$(".projects-popup"),o=$(".projects-block");if(!t.is(e.target)&&0===t.has(e.target).length&&!o.is(e.target)&&0===o.has(e.target).length&&$("html").hasClass("projects-popups-open")){var s=Math.abs(parseInt($("html").css("top"),10));$("html").css("top",""),$("#projects-popup-wrapper").removeClass("active"),$(".projects-popup").removeClass("active-project"),$("html").removeClass("projects-popups-open scrollbar"),$(window).scrollTop(s)}}),$(".projects-block").click(function(){$("html").css("top",-$(window).scrollTop());var e=$(this).attr("href");return $("html").addClass("projects-popups-open scrollbar"),$("#projects-popup-wrapper").addClass("active"),$(e).addClass("active-project"),!1}),$(".projects-popup .arrow-right").click(function(){var e=$(this).parents(".projects-popup");return $(".projects-popup").removeClass("active-project"),e.is(":last-child")?$(".projects-popup:first-child").addClass("active-project"):e.next().addClass("active-project"),!1}),$(".projects-popup .arrow-left").click(function(){var e=$(this).parents(".projects-popup");return $(".projects-popup").removeClass("active-project"),e.is(":first-child")?$(".projects-popup:last-child").addClass("active-project"):e.prev().addClass("active-project"),!1}),$("#close_announcement").click(function(e){e.preventDefault(),$("#update_browser_container").addClass("hidden")}),Modernizr.svg||$('img[src*="svg"]').attr("src",function(){return $(this).attr("src").replace(".svg",".png")})}),$(window).resize(function(){var e=767,t=$(window),o=t.width(),s=$("#site-header").innerHeight(),r=$("#site-content");$(".wrapper-for-mobile-menu").css("top",s),o>e?(r.css("margin-top",s),$("#above-the-fold-section").css("padding-top","")):(r.css("margin-top",0),$("#above-the-fold-section").css("padding-top",s)),$("section").each(function(){var e=$(this);e.innerHeight()>916?e.addClass("huge"):e.removeClass("huge")});var a=t.scrollTop(),n=$("body"),i=$(".header-contacts-wrapper"),c=$("#site-header,.wrapper-for-mobile-menu");a>50?function(){if(n.addClass("not--top"),t.width()<=e){var o=i.innerHeight();c.css("transform","translateY(-"+o+"px)")}}():(n.removeClass("not--top"),i.innerHeight(),c.css("transform","translateY(0)"));var l=0;$(".history-block,.main-year-block").each(function(e){l+=parseInt($(this).outerWidth(!0),10)});var p=parseFloat($("#history-inner").css("padding-right")),d=parseFloat($("#history-inner").css("padding-left")),u=l+p+d;$("#history-inner-wrapper").css("width",u);var h=$(".testimonials-wrapper"),m=$(".testimonial-block"),g=0;m.each(function(){g+=parseInt($(this).outerHeight(!0),10)});var f=g/2,v=0;m.each(function(){if((v+=parseInt($(this).outerHeight(!0),10))>f)return!1});var b=0;$(m.get().reverse()).each(function(){if((b+=parseInt($(this).outerHeight(!0),10))>f)return!1}),o<=1199?h.css("height",""):v<b?h.css("height",v):h.css("height",b)});