(function () {//for all brow
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame']
            || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function (callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function () {
                    callback(currTime + timeToCall);
                },
                timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function (id) {
            clearTimeout(id);
        };
}());

function loadedadr() {
    if ($('.body-promotion a').length || $('.body-promotion iframe').length) {
        $('body').addClass('has-promo');
        $('.fixed-wrap').css('position', 'absolute');
        $('.div-adriver').removeAttr('style');
        scroller();
        $(window).scroll(function () {
            var nav = $('header');
            if (window.matchMedia('(min-width: 768px)').matches) {

                if ($(this).scrollTop() > 150) {
                    if (!nav.hasClass('fixed')) {
                        nav.addClass('fixed');
                        $('.top-meta-section, .full-content, .content, .right-section').addClass('fixed');
                        $('.fixed-wrap').css({'position': 'fixed', 'top': '0'})
                    }
                }
                if ($(this).scrollTop() < 150 && window.matchMedia('(min-width: 1081px)').matches) {
                    if (nav.hasClass('fixed')) {
                        nav.removeClass('fixed');
                        $('.top-meta-section, .full-content, .content, .right-section').removeClass('fixed');
                        $('.fixed-wrap').css({'position': 'absolute', 'top': '150px'})
                    }
                }
                if ($(this).scrollTop() < 150 && window.matchMedia('(min-width: 767px)').matches && window.matchMedia('(max-width: 1080px)').matches) {
                    if (nav.hasClass('fixed')) {
                        nav.removeClass('fixed');
                        $('.top-meta-section, .full-content, .content, .right-section').removeClass('fixed');
                        $('.fixed-wrap').css({'position': 'absolute', 'top': '150px'})
                    }
                }
            }
        })
    } else {
        requestAnimationFrame(loadedadr);
    }
}

function scroller() {
    var nav = $('header');
    $(window).scroll(function () {

        if (window.matchMedia('(min-width: 768px)').matches) {

            if ($(this).scrollTop() > 150) {
                if (!nav.hasClass('fixed')) {
                    nav.addClass('fixed');
                    $('.top-meta-section, .full-content, .content, .right-section').addClass('fixed');
                    $('.fixed-wrap').css({'position': 'fixed', 'top': '0'})
                }
            }
        }
        if (window.matchMedia('(max-width: 767px)').matches) {
            if ($('body').hasClass('has-promo')) {
                if ($(this).scrollTop() > 200) {
                    if (!nav.hasClass('scroll-nav')) {
                        nav.addClass('scroll-nav');
                        // $('.top-meta-section').fadeOut(100);
                    }
                }
                if ($(this).scrollTop() < 200) {
                    if (nav.hasClass('scroll-nav')) {
                        nav.removeClass('scroll-nav');
                        // $('.top-meta-section').fadeIn(100);
                    }
                }
            } else {
                if ($(this).scrollTop() > 50) {
                    if (!nav.hasClass('scroll-nav')) {
                        nav.addClass('scroll-nav');
                        // $('.top-meta-section').fadeOut(100);
                    }
                }
                if ($(this).scrollTop() < 50) {
                    if (nav.hasClass('scroll-nav')) {
                        nav.removeClass('scroll-nav');
                        // $('.top-meta-section').fadeIn(100);
                    }
                }
            }
        }
    })
}

$(document).ready(function () {
    scroller();
    loadedadr();

    /*OPEN_CLOSE BADS*/
    $('.bad-sort').find('li:has(ul)').addClass('haspointer');
    $('.bad-sort > li > ul').addClass('hidd').slideUp();
    $('.product-analog > div > .bad-sort').click(function (e) {
        var _this = e.target;
        _this = $(_this).children('ul');
        if (_this.hasClass('hidd')) {
            _this.slideDown(200).removeClass('hidd')
        } else {
            _this.slideUp(200).addClass('hidd')
        }
    });
    /*OPEN_CLOSE BADS*/


    /*MOBILE MENU*/
    $('.burgerBtn').click(function () {
        $('.main-menu').toggleClass('mobile-menu');
        if ($('.main-menu').hasClass('mobile-menu')) {
            $('body').addClass('stop-scroll');
        } else {
            $('body').removeClass('stop-scroll');
        }
    });

    /*Search In site */
    var timeOut;
    $('.search-placeholder').bind('keypress focus', searchAjax);

    function searchAjax() {
        _this = $(this);

        if (_this.val().length >= 2) {
            if (_this.siblings('input[name="stats"]').val().length == 0) {
                clearTimeout(timeOut);
                timeOut = setTimeout(function () {
                    console.log(_this.val());
                    $.ajax({
                        url: '/presearch',
                        type: 'post',
                        data: {search: _this.val()},
                        success: function (resp) {
                            if (!$(resp).hasClass('result')) {
                                return false;
                            }
                            _this.siblings('.wrap-search')
                                .css({
                                    top: _this.position().top + _this.height() + 'px',
                                    'position': 'absolute',
                                    width: _this.width + 'px',
                                    'z-index': 15,
                                    'background-color': '#fff'
                                })
                                .html(resp)
                                .insertAfter(_this);
                            $('<div class="bg-search" />')
                                .css({
                                    top: 0,
                                    'position': 'fixed',
                                    width: _this.width + 'px',
                                    'z-index': 14,
                                    left: 0,
                                    width: '100vw',
                                    height: '100vh'
                                })
                                .appendTo('.search');
                            $('.bg-search').click(function () {
                                _this.siblings('.wrap-search').html(' ');
                                $('.bg-search').remove()
                            })
                        }
                    })

                }, 100)
            }
        } else {
            _this.siblings('.wrap-search').html(' ');
            $('.bg-search').remove()
        }
    }

    /* OPEN_list*/
    var listEl = $('.ware-sort'),
        hasPoint = 'haspointer',
        classHide = 'hidd';

    listEl.find('li:has(ul)').addClass(hasPoint);
    listEl.find('li > ul').addClass(classHide).slideUp();
    listEl.click(function (e) {
        var _this = e.target;
        _this = $(_this).children('ul');
        if (_this.find('li').length != 0) {
            if (_this.hasClass(classHide)) {
                _this.slideDown(200);
                setTimeout(function () {
                    _this.removeClass(classHide)
                }, 210);
            } else {
                _this.slideUp(200);
                setTimeout(function () {
                    _this.addClass(classHide)
                }, 210);
            }
        }

    });
    /* end OPEN_list*/

});


/*УДАЛЕНИЕ КЛАССА ДЛЯ БОЛЬШИХ НОВОСТЕЙ НА МОБИЛЬНЫХ*/

function myFunction() {
    if ($(window).width() < 767) {
        $('div').removeClass('big-news');//Если ширина меньше делаем это
    } else {
        //Если больше это
    }
}

//вызываем
myFunction();

//ну и при ресайзе перепроверяем
$(window).resize(function () {
    myFunction();
});

$('a[href^="#"]').click(function () { //Anchor top
    var target = $(this).attr('href');
    $('html, body').animate({scrollTop: $(target).offset().top - 70}, 800);
    $('html, body').css('overflow', 'auto');
    return false;
});


// выделить текущую ссылку меню 
if (window.matchMedia('(max-width: 768px)').matches) {
    $('.primary-menu a').each(function () {
        let item = $(this).attr('href');
        if (item === undefined || item === false) {
            $(this).addClass('active-menu');
        }
    });
}

// сделать баннер на весь экран
setTimeout(function () {
    if (window.matchMedia('(max-width: 451px)').matches) {
        $('.div-adriver').css({
            'width': 'auto'
        });
    }
}, 2000);






