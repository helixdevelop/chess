$(function(){
    $('.animated').each(function(){
        $(this).show().addClass($(this).data('animation')).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).show();
            $(this).removeClass('animated');
        });
    })
})