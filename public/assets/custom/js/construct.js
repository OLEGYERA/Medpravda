$(document).ready(function() {
    currentScreen();
    openHeaders(); //popup / menu
    tabsIcon(); //3 screen
    thirdSlider(); //4screen


});

$(window).resize(function() {
    tabsIcon(); //3 screen
    thirdSlider(); //4screen
});

function currentScreen() {
    var activeClass = 'current-screen',
        sections = $('.section'),
        nav = $('#pagination-screen'),
        nav_height = nav.outerHeight();

    $('.section:first-child').addClass(activeClass);


    $(window).on('scroll', function() {
        var cur_pos = $(this).scrollTop();

        sections.each(function() {
            var top = $(this).offset().top - nav_height,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                nav.removeClass().find('a').removeClass(activeClass);
                sections.removeClass(activeClass);

                $(this).addClass(activeClass);
                nav.addClass($(this).attr('id')).find('a[href="#' + $(this).attr('id') + '"]').addClass(activeClass);
            }
        });
    });
}


$('a[href^="#"]').click(function() {
    var the_id = $(this).attr("href"),
        headerH = $('header').height();
    if (!$(this).hasClass('tab-icon')) {
        $('html, body').animate({
            scrollTop: $(the_id).offset().top - headerH
        }, 'slow');
        return false;
    }

});

function openHeaders() {

    if ($('.warning').length > 0) {
        $('html, body').css('overflow', 'hidden');
        $('.success').click(function() { //first down-popup
            $('.warning').hide();
            $('html, body').css('overflow', 'auto');
        });
        $('.consider .label').click(function() { //first down-popup more text
            $(this).parent().find('.height-block').slideDown("slow");
        });
    }

    $('.nav').click(function() { //open menu
        if ($('header').hasClass('open-lang')) {
            $('.lang').trigger('click');
        }
        $('header, .menu').toggleClass('open-menu');
    });
    $('.menu a').click(function() { //close menu after click
        $('.nav').trigger('click');
    });


    $('.lang').click(function() { //open lang menu
        if ($('header').hasClass('open-menu')) {
            $('.nav').trigger('click');
        }
        $('header, .lang-switch').toggleClass('open-lang');
    });
    $('.lang-switch a').click(function() { //close lang menu after click
        $('.lang').trigger('click');
    });
}


/*---------3 screen slide icon TABS---------*/
function tabsIcon() {
    if ($('.tab-block').length > 0) {

        $('.tab-block').each(function() {
            var _this = $(this),
                $tabIcon = _this.find('.tab-icon'),
                $tabSelect = _this.find('.tab-select'),
                $tabContent = _this.find('.tab-content'),
                activeClass = 'is-active',
                num = $tabIcon.length,
                numW = $tabIcon.width() / 2,
                wrap = $('.tab-block').width(),
                radius = wrap / 2;

            if (window.matchMedia('(min-width: 769px)').matches) {
                for (i = 0; i < num; i++) {
                    var f = 2 / num * i * Math.PI;
                    var left = radius - numW - radius * Math.sin(f) + 'px';
                    var top = radius - numW - radius * Math.cos(f) + 'px';
                    $tabIcon.eq(i).css({ 'top': top, 'left': left });
                }
            }

            $tabIcon.first().addClass(activeClass);
            $tabContent.first().addClass(activeClass);
            $tabContent.not(':first').hide();

            var hoverOrClick = function(e) {
                var target = $(this).attr('href');

                $tabIcon.removeClass(activeClass);
                $(this).addClass(activeClass);
                $tabSelect.val(target);
                $tabContent.hide().removeClass(activeClass);
                $(target).show().addClass(activeClass);
                e.preventDefault();
            };
            $tabSelect.on('change', function() {
                var target = $(this).val();
                var targetSelectNum = $(this).prop('selectedIndex');

                $tabIcon.removeClass(activeClass);
                $tabIcon.eq(targetSelectNum).addClass(activeClass);
                $tabContent.hide().removeClass(activeClass);
                $(target).show().addClass(activeClass);
            });

            $tabIcon.click(hoverOrClick).hover(hoverOrClick);
        });
    }
}

/*---------end 3d slide icon TABS---------*/

/*---------SLIDERS---------*/
function thirdSlider() {
    if ($('.slider').length > 0) { //4section
        $('.slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            pauseOnDotsHover: true,
            prevArrow: '.slider__prev',
            nextArrow: '.slider__next',
            responsive: [{
                breakpoint: 576,
                settings: {
                    centerPadding: '10px',
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }
    if ($('.slider-wrapper-faded').length > 0) { //8section
        $('.slider-wrapper-faded').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnDotsHover: true,
            fade: true,
            arrows: false,
            dots: true,
            dotsClass: 'custom-dots'
                /*,
                            adaptiveHeight: true*/ //if need
        });
    }
}

/*---------end SLIDERS---------*/
/*---------GOOGLE MAP---------*/

if ($('#map').length > 0) {
    var map,
        mapLat = $('#map').data('number-lat'),
        mapLng = $('#map').data('number-lng');


    function initMap() {

        var coordinates = { lat: mapLat, lng: mapLng },
            markerImage = 'img/location.png',

            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: mapLat, lng: mapLng - .002 },
                zoom: 16
            }),

            marker = new google.maps.Marker({
                position: coordinates,
                map: map,
                icon: markerImage
            });

        if (window.matchMedia('(max-width: 767px)').matches) {
            map.setCenter({ lat: mapLat + .003, lng: mapLng });
        }
    }
}
/*---------end GOOGLE MAP---------*/