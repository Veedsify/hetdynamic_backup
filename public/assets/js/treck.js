!function(e){"use strict";if(e(".custom-cursor").length){var t=document.querySelector(".custom-cursor__cursor"),n=document.querySelector(".custom-cursor__cursor-two"),a=document.querySelectorAll("a");document.addEventListener("mousemove",(function(e){e.clientX,e.clientY;t.style.transform=`translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`})),document.addEventListener("mousemove",(function(e){var t=e.clientX,a=e.clientY;n.style.left=t+"px",n.style.top=a+"px"})),document.addEventListener("mousedown",(function(){t.classList.add("click"),n.classList.add("custom-cursor__innerhover")})),document.addEventListener("mouseup",(function(){t.classList.remove("click"),n.classList.remove("custom-cursor__innerhover")})),a.forEach((e=>{e.addEventListener("mouseover",(()=>{t.classList.add("custom-cursor__hover")})),e.addEventListener("mouseleave",(()=>{t.classList.remove("custom-cursor__hover")}))}))}var i;(e(".listing-details__contact-info-phone").length&&e(".listing-details__contact-info-phone").on("click",(function(t){t.preventDefault();var n=e(this).find(".text h5"),a=n.data("number"),i=n.data("toggle-number");n.text()===a?n.text(i):n.text(a)})),e(".listing-top__map-show-hide").length&&e(".listing-top__map-show-hide").on("click",(function(){e(this).toggleClass("hidden");var t=e(this).find(".listing-top__map-show-hide-text span");t.text()==t.data("text")?t.text(t.data("toggle-text")):t.text(t.data("text")),e(".listing__map").toggleClass("hidden"),e(".listing__content").toggleClass("hidden")})),e("#datepicker").length&&e("#datepicker").datepicker(),e("#datepicker2").length&&e("#datepicker2").datepicker(),e("#datepicker-inline").length&&e("#datepicker-inline").datepicker(),e('input[name="time"]').length&&e('input[name="time"]').ptTimeSelect(),e(".banner-bg-slide").length&&e(".banner-bg-slide").each((function(){var t=e(this),n=t.data("options");t.vegas(n)})),e(".pricing-tabs").length&&e(".pricing-tabs .tab-btns .tab-btn").on("click",(function(t){t.preventDefault();var n=e(e(this).attr("data-tab"));if(e(n).hasClass("actve-tab"))return!1;e(".pricing-tabs .tab-btns .tab-btn").removeClass("active-btn"),e(this).addClass("active-btn"),e(".pricing-tabs .pr-content .pr-tab").removeClass("active-tab"),e(n).addClass("active-tab")})),e(".typed-effect").length&&e(".typed-effect").each((function(){var t=e(this).data("strings"),n=e(this).attr("id");new Typed("#"+n,{typeSpeed:100,backSpeed:100,fadeOut:!0,loop:!0,strings:t.split(",")})})),e(".count-bar").length&&e(".count-bar").appear((function(){var t=e(this),n=t.data("percent");e(t).css("width",n).addClass("counted")}),{accY:-50}),e(".progress-levels .progress-box .bar-fill").length&&e(".progress-box .bar-fill").each((function(){e(".progress-box .bar-fill").appear((function(){var t=e(this).attr("data-percent");e(this).css("width",t+"%")}))}),{accY:0}),e(".count-box").length&&e(".count-box").appear((function(){var t=e(this),n=t.find(".count-text").attr("data-stop"),a=parseInt(t.find(".count-text").attr("data-speed"),10);t.hasClass("counted")||(t.addClass("counted"),e({countNum:t.find(".count-text").text()}).animate({countNum:n},{duration:a,easing:"linear",step:function(){t.find(".count-text").text(Math.floor(this.countNum))},complete:function(){t.find(".count-text").text(this.countNum)}}))}),{accY:0}),e(".accrodion-grp").length)&&e(".accrodion-grp").each((function(){var t=e(this).data("grp-name"),n=e(this),a=n.find(".accrodion");n.addClass(t),n.find(".accrodion .accrodion-content").hide(),n.find(".accrodion.active").find(".accrodion-content").show(),a.each((function(){e(this).find(".accrodion-title").on("click",(function(){!1===e(this).parent().hasClass("active")&&(e(".accrodion-grp."+t).find(".accrodion").removeClass("active"),e(".accrodion-grp."+t).find(".accrodion").find(".accrodion-content").slideUp(),e(this).parent().addClass("active"),e(this).parent().find(".accrodion-content").slideDown())}))}))}));if(e(".scroll-to-target").length&&e(".scroll-to-target").on("click",(function(){var t=e(this).attr("data-target");return e("html, body").animate({scrollTop:e(t).offset().top},1e3),!1})),e(".contact-form-validated").length&&e(".contact-form-validated").validate({rules:{name:{required:!0},email:{required:!0,email:!0},phone:{required:!0},message:{required:!0},subject:{required:!0}},submitHandler:function(e){return e.submit(),!1}}),e(".mc-form").length&&e(".mc-form").each((function(){var t=e(this),n=t.data("url"),a=t.parent().find(".mc-form__response");t.ajaxChimp({url:n,callback:function(e){a.append((function(){return'<p class="mc-message">'+e.msg+"</p>"})),"success"===e.result&&(t.removeClass("errored").addClass("successed"),a.removeClass("errored").addClass("successed"),t.find("input").val(""),a.find("p").fadeOut(1e4)),"error"===e.result&&(t.removeClass("successed").addClass("errored"),a.removeClass("successed").addClass("errored"),t.find("input").val(""),a.find("p").fadeOut(1e4))}})})),e(".video-popup").length&&e(".video-popup").magnificPopup({type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!0,fixedContentPos:!1}),e(".img-popup").length){var r={};e(".img-popup").each((function(){var t=parseInt(e(this).attr("data-group"),10);r[t]||(r[t]=[]),r[t].push(this)})),e.each(r,(function(){e(this).magnificPopup({type:"image",closeOnContentClick:!0,closeBtnInside:!1,gallery:{enabled:!0}})}))}function o(t){let n=window.location.href.split("/").reverse()[0];t.find("li").each((function(){let t=e(this).find("a");e(t).attr("href")===n&&e(this).addClass("current")})),t.children("li").each((function(){e(this).find(".current").length&&e(this).addClass("current")})),""===n&&t.find("li").eq(0).addClass("current")}if(e(".main-menu__list").length){o(e(".main-menu__list"))}if(e(".service-details__sidebar-service-list").length){o(e(".service-details__sidebar-service-list"))}if(e(".main-menu__list").length&&e(".mobile-nav__container").length){let e=document.querySelector(".main-menu__list").outerHTML;document.querySelector(".mobile-nav__container").innerHTML=e}if(e(".sticky-header__content").length){let e=document.querySelector(".main-menu").innerHTML;document.querySelector(".sticky-header__content").innerHTML=e}if(e(".mobile-nav__container .main-menu__list").length){e(".mobile-nav__container .main-menu__list .dropdown > a").each((function(){let t=e(this),n=document.createElement("BUTTON");n.setAttribute("aria-label","dropdown toggler"),n.innerHTML="<i class='fa fa-angle-down'></i>",t.append((function(){return n})),t.find("button").on("click",(function(t){t.preventDefault();let n=e(this);n.toggleClass("expanded"),n.parent().toggleClass("expanded"),n.parent().parent().children("ul").slideToggle()}))}))}(e(".mobile-nav__toggler").length&&e(".mobile-nav__toggler").on("click",(function(t){t.preventDefault(),e(".mobile-nav__wrapper").toggleClass("expanded"),e("body").toggleClass("locked")})),e(".search-toggler").length&&e(".search-toggler").on("click",(function(t){t.preventDefault(),e(".search-popup").toggleClass("active"),e(".mobile-nav__wrapper").removeClass("expanded"),e("body").toggleClass("locked")})),e(".odometer").length)&&e(".odometer").each((function(){e(this).appear((function(){var t=e(this).attr("data-count");e(this).html(t)}))}));if(e(".dynamic-year").length){let t=new Date;e(".dynamic-year").html(t.getFullYear())}e(".wow").length&&new WOW({boxClass:"wow",animateClass:"animated",mobile:!0,live:!0}).init();if(e("#donate-amount__predefined").length){let t=e("#donate-amount");e("#donate-amount__predefined").find("li").on("click",(function(n){n.preventDefault();let a=e(this).find("a").text();t.val(a),e("#donate-amount__predefined").find("li").removeClass("active"),e(this).addClass("active")}))}if(e(".thm-accordion").length){e(".thm-accordion").each((function(){let t=e(this),n=t.attr("id"),a=t.find(".thm-accordion__title");t.addClass(n);let i=t.find(".thm-accordion__content").hide();t.find(".active-item .thm-accordion__content").show(),a.on("click",(function(t){t.preventDefault();e(this);let a=e(this).parent();!1===a.hasClass("active-item")&&(e("#"+n).find(".thm-accordion__item").removeClass("active-item"),a.addClass("active-item"),i.slideUp(),a.find(".thm-accordion__content").slideDown())}))}))}if(e(".add").on("click",(function(){e(this).prev().val()<999&&e(this).prev().val(+e(this).prev().val()+1)})),e(".sub").on("click",(function(){e(this).next().val()>1&&e(this).next().val()>1&&e(this).next().val(+e(this).next().val()-1)})),e(".tabs-box").length&&e(".tabs-box .tab-buttons .tab-btn").on("click",(function(t){t.preventDefault();var n=e(e(this).attr("data-tab"));if(e(n).is(":visible"))return!1;n.parents(".tabs-box").find(".tab-buttons").find(".tab-btn").removeClass("active-btn"),e(this).addClass("active-btn"),n.parents(".tabs-box").find(".tabs-content").find(".tab").fadeOut(0),n.parents(".tabs-box").find(".tabs-content").find(".tab").removeClass("active-tab"),e(n).fadeIn(300),e(n).addClass("active-tab")})),e(".range-slider-price").length){var l=document.getElementById("range-slider-price");noUiSlider.create(l,{start:[30,150],limit:200,behaviour:"drag",connect:!0,range:{min:10,max:200}});var s=document.getElementById("min-value-rangeslider"),c=document.getElementById("max-value-rangeslider");l.noUiSlider.on("update",(function(t,n){e(n?c:s).text(t[n])}))}if(e(".testimonial-three__carousel").length&&e(".testimonial-three__thumb-carousel").length){var d=e(".testimonial-three__carousel"),u=e(".testimonial-three__thumb-carousel");function t(e){var t=e.item.count-1,n=Math.round(e.item.index-e.item.count/2-.5);n<0&&(n=t),n>t&&(n=0),u.find(".owl-item").removeClass("current").eq(n).addClass("current");var a=u.find(".owl-item.active").length-1,i=u.find(".owl-item.active").first().index();n>u.find(".owl-item.active").last().index()&&u.data("owl.carousel").to(n,500,!0),n<i&&u.data("owl.carousel").to(n-a,500,!0)}function n(e){if(1){var t=e.item.index;d.data("owl.carousel").to(t,500,!0)}}d.owlCarousel({items:1,slideSpeed:2e3,nav:!0,autoplay:!0,dots:!1,loop:!0,navText:['<i class="icon-left-arrow" aria-hidden="true"></i>','<i class="icon-right-arrow" aria-hidden="true"></i>']}).on("changed.owl.carousel",t),u.on("initialized.owl.carousel",(function(){u.find(".owl-item").eq(0).addClass("current")})).owlCarousel({items:3,dots:!0,nav:!0,navText:['<i class="icon-left-arrow" aria-hidden="true"></i>','<i class="icon-right-arrow" aria-hidden="true"></i>'],smartSpeed:700,slideBy:3}).on("changed.owl.carousel",n),u.on("click",".owl-item",(function(t){t.preventDefault();var n=e(this).index();d.data("owl.carousel").to(n,500,!0)}))}e(".checkout__payment__title").length&&(e(".checkout__payment__item").find(".checkout__payment__content").hide(),e(".checkout__payment__item--active").find(".checkout__payment__content").show(),e(".checkout__payment__title").on("click",(function(t){t.preventDefault(),e(this).parents(".checkout__payment").find(".checkout__payment__item").removeClass("checkout__payment__item--active"),e(this).parents(".checkout__payment").find(".checkout__payment__content").slideUp(),e(this).parent().addClass("checkout__payment__item--active"),e(this).parent().find(".checkout__payment__content").slideDown()}))),e(".single-vertical-carousel").length&&e(".single-vertical-carousel").slick({dots:!0,autoplay:!1,loop:!0,autoplaySpeed:5e3,infinite:!0,responsive:!0,slidesToShow:2,vertical:!0,slidesToScroll:1,prevArrow:"<div class='prev-btn'><span class='fa fa-angle-up'></span></div>",nextArrow:"<div class='next-btn'><span class='fa fa-angle-down'></span></div>"}),e(".circle-progress").length&&e(".circle-progress").appear((function(){e(".circle-progress").each((function(){let t=e(this),n=t.data("options");t.circleProgress(n)}))})),(i=e(".scrollToLink")).length&&i.children("a").bind("click",(function(t){if(e(window).scrollTop()>10)var n="90";else n="90";var a=e(this);e("html, body").stop().animate({scrollTop:e(a.attr("href")).offset().top-n+"px"},1200,"easeInOutExpo"),i.removeClass("current"),i.removeClass("current-menu-ancestor"),i.removeClass("current_page_item"),i.removeClass("current-menu-parent"),a.parent().addClass("current"),t.preventDefault()})),e(window).on("load",(function(){if(e(".preloader").length&&e(".preloader").fadeOut(),e(".thm-swiper__slider").length&&e(".thm-swiper__slider").each((function(){let t=e(this),n=t.data("swiper-options");new Swiper(t,n)})),e(".thm-owl__carousel").length&&e(".thm-owl__carousel").each((function(){let t=e(this),n=t.data("owl-options");t.owlCarousel(n)})),e(".thm-owl__carousel--custom-nav").length&&e(".thm-owl__carousel--custom-nav").each((function(){let t=e(this),n=t.data("owl-nav-prev"),a=t.data("owl-nav-next");e(n).on("click",(function(e){t.trigger("prev.owl.carousel"),e.preventDefault()})),e(a).on("click",(function(e){t.trigger("next.owl.carousel"),e.preventDefault()}))})),e(".masonary-layout").length&&e(".masonary-layout").isotope({layoutMode:"masonry"}),e(".post-filter").length&&e(".post-filter li").children(".filter-text").on("click",(function(){var t=e(this),n=t.parent().attr("data-filter");return e(".post-filter li").removeClass("active"),t.parent().addClass("active"),e(".filter-layout").isotope({filter:n,animationOptions:{duration:500,easing:"linear",queue:!1}}),!1})),e(".post-filter.has-dynamic-filters-counter").length&&e(".post-filter.has-dynamic-filters-counter").find("li").each((function(){var t=e(this).data("filter"),n=e(".filter-layout").find(t).length;e(this).children(".filter-text").append('<span class="count">'+n+"</span>")})),e(".price-ranger").length&&(e(".price-ranger #slider-range").slider({range:!0,min:50,max:500,values:[11,300],slide:function(t,n){e(".price-ranger .ranger-min-max-block .min").val("$"+n.values[0]),e(".price-ranger .ranger-min-max-block .max").val("$"+n.values[1])}}),e(".price-ranger .ranger-min-max-block .min").val("$"+e(".price-ranger #slider-range").slider("values",0)),e(".price-ranger .ranger-min-max-block .max").val("$"+e(".price-ranger #slider-range").slider("values",1))),e("#polyglot-language-options").length&&e("#polyglotLanguageSwitcher").polyglotLanguageSwitcher({effect:"slide",animSpeed:500,testMode:!0,onChange:function(e){alert("The selected language is: "+e.selectedItem)}}),e(".curved-circle--item").length&&e(".curved-circle--item").circleType(),e(".quantity-spinner").length&&e("input.quantity-spinner").TouchSpin({verticalbuttons:!0}),e(".post-filter").length){var t=e(".post-filter li");e(".filter-layout").isotope({filter:".filter-item",animationOptions:{duration:500,easing:"linear",queue:!1}}),t.on("click",(function(){var n=e(this),a=n.attr("data-filter");return t.removeClass("active"),n.addClass("active"),e(".filter-layout").isotope({filter:a,animationOptions:{duration:500,easing:"linear",queue:!1}}),!1}))}e(".post-filter.has-dynamic-filter-counter").length&&e(".post-filter.has-dynamic-filter-counter").find("li").each((function(){var t=e(this).data("filter"),n=e(".filter-layout").find(t).length;e(this).append("<sup>["+n+"]</sup>")}));if(e(".listing-details__gallery .bxslider").length&&e(".listing-details__gallery .bxslider").bxSlider({nextSelector:".listing-details__gallery #slider-next",prevSelector:".listing-details__gallery #slider-prev",nextText:'<i class="icon-right-arrow1"></i>',prevText:'<i class="icon-right-arrow1 icon-prev"></i>',mode:"horizontal",auto:"true",speed:"1000",pagerCustom:".listing-details__gallery .slider-pager .listing-details__thumb-box"}),e("#testimonials-one__thumb").length){let e=new Swiper("#testimonials-one__thumb",{slidesPerView:4,spaceBetween:0,speed:1400,watchSlidesVisibility:!0,watchSlidesProgress:!0,loop:!0,autoplay:{delay:5e3}});new Swiper("#testimonials-one__carousel",{observer:!0,observeParents:!0,speed:1400,mousewheel:!0,slidesPerView:1,autoplay:{delay:5e3},thumbs:{swiper:e},pagination:{el:"#testimonials-one__carousel-pagination",type:"bullets",clickable:!0}})}})),e(window).on("scroll",(function(){if(e(".stricked-menu").length){var t=e(".stricked-menu");e(window).scrollTop()>130?t.addClass("stricky-fixed"):e(this).scrollTop()<=130&&t.removeClass("stricky-fixed")}if(e(".scroll-to-top").length){e(window).scrollTop()>100?e(".scroll-to-top").fadeIn(500):e(this).scrollTop()<=100&&e(".scroll-to-top").fadeOut(500)}var n;(n=e(window).scrollTop())>=117?e(".one-page-scroll-menu .scrollToLink").children("a").each((function(){var t=e(this).attr("href");e(t).each((function(){if(e(this).offset().top<=n+100){var a=e(t).attr("id");e(".one-page-scroll-menu").find("li").removeClass("current"),e(".one-page-scroll-menu").find("li").removeClass("current-menu-ancestor"),e(".one-page-scroll-menu").find("li").removeClass("current_page_item"),e(".one-page-scroll-menu").find("li").removeClass("current-menu-parent"),e(".one-page-scroll-menu").find("a[href*=\\#"+a+"]").parent().addClass("current")}}))})):(e(".one-page-scroll-menu li.current").removeClass("current"),e(".one-page-scroll-menu li:first").addClass("current"))})),e(".before-after-twentytwenty").length&&e(".before-after-twentytwenty").each((function(){var t=e(this).attr("id");e("#"+t).twentytwenty(),e(document).on("shown.bs.tab",'a[data-toggle="tab"]',(function(n){var a=e(n.target).attr("data-target"),i=e(".tab-pane"+a),r="#"+t;0===i.find(r).height()&&i.find(r).trigger("resize")}))}));(()=>{const e=document.querySelectorAll('[data-remove_alert="1"]');e&&e.forEach((e=>{setTimeout((()=>{e.style.opacity=0,setTimeout((()=>{e.style.padding="0px",e.style.height="0px"}),600)}),3e3)}))})()}(jQuery);