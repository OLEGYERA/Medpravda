/*
blue #00bbd5
red #f93a43

изначально цвет синий, по мере прокрутки вниз снизу вверх поднимается красная полоска
*/
jQuery(document).ready(function() {

    totop = jQuery('.totop');
    line = $(".line");

    setTimeout(function () { // размеры body меняются по ходу загрузки сайта

        d = $('body').height(), //высота
        c = window.innerHeight //высота окна

        jQuery('.totop').fadeOut(0);
        // Show or hide the sticky footer button
        jQuery(window).scroll(function() {
            let s = $(window).scrollTop(); //точка на сколько проскролл0
            if (s > c/2) {
                jQuery(totop).fadeIn(0);
            } else {
                jQuery(totop).fadeOut(0);
                return ;
            }

            let position = Math.round((s * 100)/ (d-c));
            $(line).css('height', position + '%');

        });

        // Animate the scroll to top
        jQuery('.totop').click(function(event) {
            event.preventDefault();

            jQuery('html, body').animate({scrollTop: 0}, 300);
        });
        window.onresize = function(){
            gradus();
        };
        function gradus() {
            offEl = $('.main-wrapper').offset().left;
            wEl = $('.main-wrapper').width();
            $('.totop').css({'left': offEl + wEl - 25 + 'px'})
        };
        gradus();
    }, 2000);




    // blockquote
    var quoteEl = $('blockquote');
    if(quoteEl.length) {
        quoteEl.wrapInner("<div class='blockquote-inner'></div>");
    }
    // end blockquote
});
