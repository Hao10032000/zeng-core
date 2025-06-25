;(function($) {



    "use strict";

    var parallaxSwiper = function() {
        $(".sw-single").each(function (index) {
        var tfSwCategories = $(this);
        var effect = tfSwCategories.data("effect");
        var loop = tfSwCategories.data("loop") || false;

        function setParallaxAttributes(element, duration) {
            element.setAttribute("data-swiper-parallax-x", "-400");
            element.setAttribute("data-swiper-parallax-duration", duration);
        }

        var postContentContainer = ".cs-entry__content";
        var sliders = document.querySelectorAll(".animation-sl");

        sliders.forEach(function (slider) {
            var parallaxValue = slider.getAttribute("data-cs-parallax");
            var parallax = !!parallaxValue ? true : false;
            if (parallax) {
                var postContents =
                    tfSwCategories[0].querySelectorAll(postContentContainer);
                if (postContents.length > 0) {
                    postContents.forEach(function (postContent) {
                        setParallaxAttributes(postContent, "800");
                    });
                }
            }
        });

        var postContents =
            tfSwCategories[0].querySelectorAll(postContentContainer);

        var swiperSlider = {
            slidesPerView: 1,
            spaceBetween: 30,
            speed: 1000,
            loop: loop,
            parallax: true,
            navigation: {
                clickable: true,
                nextEl: `.sw-single-next-${index}`,
                prevEl: `.sw-single-prev-${index}`,
            },
            pagination: {
                el: `.sw-pagination-single-${index}`,
                clickable: true,
            },
            on: {
                init: function init() {
                    var _this = this;
                    setTimeout(function () {
                        var initialSlide = _this.slides[_this.activeIndex];
                        if (initialSlide) {
                            var initialContent =
                                initialSlide.querySelector(
                                    postContentContainer
                                );
                            if (initialContent) {
                                initialContent.style.transform = "none";
                            }
                        }
                    }, 100);
                },
                slideChange: function slideChange() {
                    var currentSlide = this.slides[this.activeIndex];
                    postContents.forEach(function (postContent) {
                        if (
                            postContent ===
                            currentSlide.querySelector(postContentContainer)
                        ) {
                            postContent.style.transform = "none";
                        }
                    });
                },
            },
        };

        if (effect === "fade") {
            swiperSlider.effect = "fade";
            swiperSlider.fadeEffect = {
                crossFade: true,
            };
        }
        if (effect === "creative") {
            swiperSlider.effect = "creative";
            swiperSlider.creativeEffect = {
                prev: {
                    shadow: true,
                    translate: [0, 0, -400],
                },
                next: {
                    translate: ["100%", 0, 0],
                },
            };
        }

        tfSwCategories
            .find(".sw-single-next")
            .addClass(`sw-single-next-${index}`);
        tfSwCategories
            .find(".sw-single-prev")
            .addClass(`sw-single-prev-${index}`);
        tfSwCategories
            .find(".sw-pagination-single")
            .addClass(`sw-pagination-single-${index}`);

        new Swiper(tfSwCategories[0], swiperSlider);
        });
    }

    var mainSlide = function() {
    $(".sw-layout").each(function () {
    var tfSwCategories = $(this);
    var swiperContainer = tfSwCategories.find(".swiper");
    if (swiperContainer.length === 0 || swiperContainer[0].swiper) return;

    var getData = (key, fallback) => {
        let val = swiperContainer.data(key);
        if (val === "auto") return "auto";
        return val !== undefined ? parseInt(val) || fallback : fallback;
    };

    var preview = getData("preview", 1);
    var screenXl = getData("screen-xl", preview);
    var tablet = getData("tablet", 1);
    var mobile = getData("mobile", 1);
    var mobileSm = getData("mobile-sm", mobile);
    var spacing = getData("space", 0);
    var spacingMd = getData("space-md", spacing);
    var spacingLg = getData("space-lg", spacing);
    var spacingXl = getData("space-xl", spacingLg);
    var perGroup = getData("pagination", 1); // => nên đổi key thành `group`
    var perGroupMd = getData("pagination-md", perGroup);
    var perGroupLg = getData("pagination-lg", perGroupMd);
    var center = swiperContainer.data("slide-center")?.toString() === "true";
    var initSlide = parseInt(swiperContainer.data("init-slide")) || 0;
    var autoplay = swiperContainer.data("autoplay")?.toString() === "true";
    var paginationType = swiperContainer.data("pagination-type") || "bullets";
    var loop = swiperContainer.data("loop")?.toString() === "true";

    var nextBtn = tfSwCategories.find(".nav-next-layout")[0] || null;
    var prevBtn = tfSwCategories.find(".nav-prev-layout")[0] || null;
    var progressbar =
        tfSwCategories.find(".sw-pagination-layout")[0] ||
        tfSwCategories.find(".sw-progress-layout")[0] ||
        null;

    new Swiper(swiperContainer[0], {
        slidesPerView: mobile,
        spaceBetween: spacing,
        speed: 1000,
        centeredSlides: center,
        initialSlide: initSlide,
        loop: loop,
        autoplay: autoplay
            ? {
                  delay: 3000,
                  disableOnInteraction: false,
              }
            : false,
        observer: true,
        observeParents: true,
        pagination: progressbar
            ? {
                  el: progressbar,
                  clickable: true,
                  type: paginationType,
              }
            : false,
        navigation:
            nextBtn && prevBtn
                ? {
                      clickable: true,
                      nextEl: nextBtn,
                      prevEl: prevBtn,
                  }
                : false,
        breakpoints: {
            575: {
                slidesPerView: mobileSm,
                spaceBetween: spacing,
                slidesPerGroup: perGroup,
            },
            768: {
                slidesPerView: tablet,
                spaceBetween: spacingMd,
                slidesPerGroup: perGroupMd,
            },
            992: {
                slidesPerView: preview,
                spaceBetween: spacingLg,
                slidesPerGroup: perGroupLg,
            },
            1200: {
                slidesPerView: screenXl,
                spaceBetween: spacingXl,
                slidesPerGroup: perGroupLg,
            },
        },
    });
});

    }

    $(window).on('elementor/frontend/init', function() {        

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-slides.default', parallaxSwiper );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-flex-posts.default', mainSlide );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-popular-posts.default', mainSlide );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-category-list.default', mainSlide );

    });



})(jQuery);

