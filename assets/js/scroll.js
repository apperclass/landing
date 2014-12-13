function scrollUpdate()
{
    $('.animation-section').each(function(index, el){
        if ( ($('body').scrollTop()+ ($(window).height())/(1.1)) > $(el).offset().top){
            $(el).addClass('animation-active');
        }
    });
}

$(document).ready(function(){
    scrollUpdate();
    $( window ).scroll(function() {
        scrollUpdate();
    });
});