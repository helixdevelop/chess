$(function(){
    $('.animated').each(function(){
        $(this).show().addClass($(this).data('animation')).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).show();
            $(this).removeClass('animated');
        });
    })
    
    var redirectUrl;
    $('.show-modal').on('click', function(){
        redirectUrl = $(this).data('url');
    });

    $('.show-modal').on('loading.tools.modal', function(modal){
        var buttonAction = this.createActionButton('Yes');
        this.createCancelButton('Cancel');

        buttonAction.on('click', $.proxy(function()
        {
            window.location.href = redirectUrl;

        }, this));
    });
    
    if($('.tools-message').length > 0) {
        setTimeout(function(){
            $('.tools-message').message({'delay' : 4});
        }, 1000);
        
    }

})