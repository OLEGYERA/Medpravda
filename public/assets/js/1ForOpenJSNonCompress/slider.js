
$(document).ready(function () {
    /*MAIN SLIDER*/
    var main1Slider = $('.main-slider .slider');
    if (main1Slider.length > 0) {

        var main1Paging = $('.main-slider .pagination');
        var lenPadin = $('.main-slider .pagination .slide').length;

        main1Slider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 250,
            fade: true,
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 3000,
            asNavFor: main1Paging,
            pauseOnHover: true,
            pauseOnFocus: true
        });

        main1Paging.slick({
            slidesToShow: lenPadin,
            speed: 250,
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 3000,
            asNavFor: main1Slider,
            focusOnSelect: true,
            pauseOnHover: true,
            pauseOnFocus: true
        });

        var mainSliderCan = true;

        main1Slider.on('afterChange', function () {
            mainSliderCan = true;
        });

    }
});


/*INDEX DOWN SLIDER*/
$(document).ready(function () {
    var mainDownSlider = $('.section-down-slider');
    if (mainDownSlider.length > 0) {
        mainDownSlider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            cssEase: 'linear',
            fade: true,
            arrows: false,
            dots: false,
            dotsClass: 'white-dots',
            focusOnSelect: true
        });
    }
});

/*PRODUCT DOWN SLIDER*/
$(document).ready(function () {
    var prodDownSlider = $('.product-down-slider-go');
    if (prodDownSlider.length > 0) {
        prodDownSlider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
        });
    }
});

/*PRODUCT SLIDER*/
$(document).ready(function () {
    $('.clone-from').each(function () {
        var num = $(this).data('number');
        $(this).clone().appendTo('.clone-to[data-number="' + num + '"]');
    });
    window.onresize = function () {
        sliders()
    }

    function sliders() {
        if (window.matchMedia("(max-width: 767px)").matches) {
            $('.clone-to .product-slider-go').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
            });
        } else {
            $('.product-nav-img .clone-from .product-slider-go').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
            });
        }
    }

    sliders()
});



