$(document).ready(function(){
    // $('.react-scroller').scrollbar();
    var header = $(".fixed-wrap"),
        headerLastTop = $(document).scrollTop(),
        asideBar = $(".aside-fixed");
    asideBarTop = asideBar.length ? asideBar[0].offsetTop : null,
        asideBarHeight = asideBar.outerHeight(!0),
        adaptiveTop = $("#adaptive_instruction").length ? $("#adaptive_instruction")[0].offsetTop : null,
        footerTop = $("footer").offset().top,
        scrollPostion = $(document).scrollTop(),
        $sections = $('.mp-anchor'),
        section_position = {},
        screen_height = $(window).height();

//init Main function
    Main();
    adriverPlateWidth();
    if($('.body-promotion a').length || $('.body-promotion iframe').length){
        $('body').addClass('has-promo');
    }
//scroll watcher
    $(window).scroll(function () {
        scrollPostion = $(this).scrollTop();
        screen_height = $(this).height();
        Main();
    })

//resize watcher
    $(window).resize(function(){
        scrollPostion = $(this).scrollTop();
        screen_height = $(this).height();
        Main();
        adriverPlateWidth();
    });




//functions
    function Main() {
        if($('.body-promotion a').length || $('.body-promotion iframe').length){
            floatHeader(true);
            floatAside(true);
        }else{
            floatHeader(false);
            floatAside(false);
        }
        checkPosition();
    }

    // if(true){
    //     floatHeader(true);
    // }

    function floatHeader(adriver){
        var headerStartPosition = adriver ?  150 : 0;
        if(scrollPostion < headerStartPosition){
            $('.fixed-wrap.reactive').css({top: headerStartPosition - scrollPostion})
        }else{
            $('.fixed-wrap.reactive').css({top: 0})
        }
    }

    function floatAside(adriver) {
        var distance = footerTop - (asideBarTop + asideBarHeight + scrollPostion),
            asideStartPosition = adriver ?  150 : 0,
            headerHeight = scrollPostion <= 30 + asideStartPosition ? 95 : 65;
        asideBar.css({transition: 'none'})
        if(scrollPostion < asideStartPosition){
            asideBar.css({top: headerHeight + asideStartPosition - scrollPostion})
        }else{
            asideBar.css({transition: '0.3s top ease'})
            asideBar.css({top: headerHeight})
        }
    }

    function checkPosition(){
        $sections.each(function(i, el) {
            section_position[i] = $(el).offset().top - 65;
        });
        for (key in section_position) {
            if (scrollPostion >= section_position[key] && section_position[Number(key) + 1] ? scrollPostion <= section_position[Number(key) + 1] : true) {
                var id = $($sections[key]).attr('id');
                toggleActiveClass(id);
                break;
            }
        }
    }

    function toggleActiveClass(id) {
        setTimeout(function () {
            $('.list-anchors a').removeClass('active');
            $('a[href="#' + id + '"]').addClass('active');
        }, 50);
    }

    function adriverPlateWidth(){
        if($(window).width() > 768){
            $(".mp-advertisement").each(function (el, x) {
                $(x).css('display', 'none')
                if($(x).children('.mp-adriver')[0].firstChild){
                    $(this).css('display', 'block')
                }
            })
            $('.mp-adriver').css({'width': "100%"})
            var height = $('.mp-adriver').width() * 400 / 240;
            $('.mp-adriver').css({'height': height})
            $('.mp-adriver').css({'opacity': 1})
        } else {
            $(".mp-advertisement").each(function (el, x) {
                $(x).css('display', 'none')
                if($(x).children('.mp-adriver')[0].firstChild){
                    $(this).css('display', 'block')
                }
            })
            $('.mp-adriver').css({'opacity': 1})
        }
    }

    $('.row-drug-accordion').on('click', '.accordion-title svg', function () {
        var itemType = $(this).attr('class'),
            accordionObj = $(this).parent('.accordion-title').parent('.accordion-item');
        if(accordionObj.hasClass('open') && itemType == 'arrow-up'){
            accordionObj.removeClass('open');
        }
        if(!accordionObj.hasClass('open') && itemType == 'arrow-down'){
            accordionObj.addClass('open');
        }
    })




    //якорный скроллер

    $('a[href^="#"]').click(function (e) { //Anchor top
        if($(e.target).hasClass('un-clickable')){
            return false;
        }
        // Скрытие навигации
        asideBar.addClass('unBind');
        setTimeout(function () {
            asideBar.removeClass('unBind');
        }, 50)
        var target = $(this).attr('href'),
            targetPosition = $(target).offset().top,
            willScroll = null;
        willScroll = targetPosition - 63;
        window.scrollTo({
            top: willScroll, // scroll so that the element is at the top of the view
            behavior: 'smooth' // smooth scroll
        })
        return false;
    });





    //adriver frame engine
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


    $(function() {
        if(document.cookie.search('_accept_cookie') == -1){
            $('#cookies-alert').css('display', 'flex')

            $('#cookie-accept').change(function () {
                if($(this).attr('ch-status') == 'true'){
                    $(this).attr('ch-status', false);
                    $('.cookie-btns .accept').removeClass('active');
                }else{
                    $(this).attr('ch-status', true);
                    $('.cookie-btns .accept').addClass('active');
                }
            });

            $('.cookie-btns .accept').click(function () {
                if($(this).hasClass('active')){
                    var expire_accept = new Date();
                    expire_accept.setDate(expire_accept.getDate() + 7);
                    document.cookie = "_accept_cookie=7days;expires=" + expire_accept.toUTCString() + ";path=/;";
                    $('#cookies-alert').css('display', 'none')
                }else{
                    return 0;
                }
            })

            $('.cookie-btns .cancel').click(function () {
                var expire_accept = new Date();
                expire_accept.setHours(expire_accept.getHours() + 1);
                document.cookie = "_cancel_cookie=1hours;expires=" + expire_accept.toUTCString() + ";path=/;";
                $('#cookies-alert').css('display', 'none')
            })

        }

        if(document.cookie.search('_cancel_cookie') != -1){
            $('#cookies-alert').css('display', 'none')
        }

    });





    $(document).on('click',function (e) {
        if($('.menu-box').hasClass('active')){
            if($(e.target).closest('.menu-box').length == 0 && $(e.target).closest('.mb').length == 0){
                $('.toggle-box svg').replaceWith('<span class="glyph burger mb"></span>')
                $('.toggle-box').removeClass('active');
                $('.menu-box').removeClass('active');
            }
        }
    });

    $('.menu').on('click', '.toggle-box', function () {
        if($(this).hasClass('active')){
            $(this).children('svg').replaceWith('<span class="glyph burger mb"></span>')
            $(this).removeClass('active');
            $('.menu-box').removeClass('active');
            $('#floatHeader').removeClass('react-true')
        } else{
            $(this).addClass('active');
            $(this).children('.glyph').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="clear mb"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>')
            $('.menu-box').addClass('active');
        }
    })
});

