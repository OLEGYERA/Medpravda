$(document).ready(function () {
    const tagBoxHeight = $('.information-tags-box')[0].scrollHeight;
    if(tagBoxHeight <= 34){
        $('.information-tags-box').addClass('simple')
    }

    $('.open-tag').click(function(){
        const show = $(this).attr('data-show')
        if(show == 'true'){
            $(this).attr('data-show', false);
            $(this).css('transform', 'rotate(0deg)')
            $('.information-tags-box').removeClass('open')
        } else {
            $(this).attr('data-show', true);
            $('.information-tags-box').addClass('open')
            $(this).css('transform', 'rotate(180deg)')
        }
    })
})
