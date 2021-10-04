$(document).ready(function(){
    $('.react-scroller').scrollbar();
    var header = $(".fixed-wrap"),
        headerLastTop = $(document).scrollTop(),
        headerFloatStatus = 1,
        asideBar = $(".aside-fixed");
        asideBarTop = asideBar.length != 0 ? asideBar[0].offsetTop : '',
        asideBarHeight = asideBar.outerHeight(!0),
        adaptiveTop = $("#adaptive_instruction")[0].offsetTop,
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
            switchClassHeader();
            floatAside(true);
        }else{
            floatHeader(false);
            switchClassHeader();
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
            header.css({top: headerStartPosition - scrollPostion})
        }else{
            header.css({top: 0})
        }
    }

    function switchClassHeader(){
        // if()mp-search-results
        console.log(!$('#floatHeader').hasClass('react-true'))
        if(headerLastTop < scrollPostion && !$('#floatHeader').hasClass('react-true')){
            if(headerFloatStatus != 0 && scrollPostion > adaptiveTop - 160){
                headerFloatStatus = 0;
                $('#floatHeader').addClass('active');
                asideBar.children('.list-anchors').css('height', 'calc(100vh - 75px)');
            }
        }
        if(headerLastTop > scrollPostion){ //if вместо else из-за наведение на сайдбар и пререндер нового скроллера
            if(headerFloatStatus != 1){
                headerFloatStatus = 1;
                $('#floatHeader').removeClass('active');
                asideBar.children('.list-anchors').css('height', 'calc(100vh - 160px)');
            }
        }
        headerLastTop = scrollPostion;
    }

    function floatAside(adriver) {
        var distance = footerTop - (asideBarTop + asideBarHeight + scrollPostion),
            asideStartPosition = adriver ?  150 : 0,
            headerHeight = headerFloatStatus ? 160 : 75;
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
            section_position[i] = $(el).offset().top - (headerFloatStatus ? 160 : 75);
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
        $(".mp-advertisement").each(function (el) {
            if($(this).children('.mp-adriver')[0].firstChild){
                $(this).css('display', 'block')
            }

        })
        if(window.matchMedia('(max-width: 1500px)').matches){
            $('.mp-adriver').css({'width': "100%"})
            var height = $('.mp-adriver').width() * 400 / 240;
            $('.mp-adriver').css({'height': height})
            $('.mp-adriver').css({'opacity': 1})
        }else{
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
        if(targetPosition > scrollPostion + (headerFloatStatus ? 160 : 75)){
            console.log('bottom', targetPosition, scrollPostion, targetPosition > scrollPostion)
            willScroll = targetPosition - 73;
        }else{
            console.log('top')
            willScroll = targetPosition - 158;

        }
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
});

