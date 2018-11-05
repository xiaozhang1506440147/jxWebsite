$(function(){   
    var winHeight = $(document).scrollTop();
    $(window).scroll(function() {
        var scrollY = $(document).scrollTop();
        if (scrollY > 0){
            $('.img-size').addClass('img-size2');
            $('.nav-bar').addClass('nav-bar2');
            $('.navbar-content img').css("vertical-align","-50%");
            $('.navbar-content img').css("margin-top","0");
            $('.bottom-span').css("height","27px");
            $('.bottom-span2').css("height","27px");
            $('.bottom-span-2').css("height","27px");
            $('iframe').css("display","inline-block");
            $('#wea').addClass('animated flipInY');
        } 
        else {
            $('.img-size').removeClass('img-size2');
            $('.nav-bar').removeClass('nav-bar2');
            $('.navbar-content img').css("vertical-align","-100%");
            $('.navbar-content img').css("margin-top","17px");
            $('.bottom-span').css("height","52px");
            $('.bottom-span2').css("height","52px");
            $('.bottom-span-2').css("height","52px");
            $('iframe').css("display","none");
            $('#wea').removeClass('animated flipInY');
        }
     });
});