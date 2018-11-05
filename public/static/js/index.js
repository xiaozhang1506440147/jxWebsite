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
$(function(){
    var content_arr=[];
    $('.media p').each(function(){//遍历media p内容
        var content=$(this).text();//去掉前后文空格
        content_arr.push(content);//内容放进数组
    })
    for(var i=0;i<content_arr.length;i++){//遍历循环数组
        if(content_arr[i].length>=190){//如果数组长度（也就是文本长度）大于等于190
            content=content_arr[i].substr(0,185)+'...';//添加省略号并放进media p文字内容后面
            $(".media p").eq(i).text(content);
        }else{
            content=content_arr[i];
            $(".media p").eq(i).text(content);
        }
    }
})
function displayResult(){
    $('#display').addClass('bottom-span-2');
};
$(document).ready(function(){
    $("#logo-ani").hover(function(){
        $('#logo-ani').addClass('animated flip');
    setTimeout(function(){
        $('#logo-ani').removeClass('flip');
    }, 3000);
    });
});
$(document).ready(function(){
    $(".media-info-image-1").hover(function(){
        $('.media-info-image-1').addClass('animated pulse');
    setTimeout(function(){
        $('.media-info-image-1').removeClass('pulse');
    }, 3000);
    });
});
$(document).ready(function(){
    $(".media-info-image-2").hover(function(){
        $('.media-info-image-2').addClass('animated pulse');
    setTimeout(function(){
        $('.media-info-image-2').removeClass('pulse');
    }, 3000);
    });
});
$(document).ready(function(){
    $(".media-info-image-3").hover(function(){
        $('.media-info-image-3').addClass('animated pulse');
    setTimeout(function(){
        $('.media-info-image-3').removeClass('pulse');
    }, 3000);
    });
});
$(document).ready(function(){
    $(".logofoot img").hover(function(){
        $('.logofoot img').addClass('animated flipInY');
    setTimeout(function(){
        $('.logofoot img').removeClass('flipInY');
    }, 3000);
    });
});
Function.prototype.getMultiLine = function () {
    var lines = new String(this);
    lines = lines.substring(lines.indexOf("/*") + 3, lines.lastIndexOf("*/"));
    return lines;
}

var string = function () {
/*
Deloveped by ——
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
　肖璋 & 杨佳 & 张卓文　　　　　　　　
                                                                                           
                                                                              
*/
}
window.console.log(string.getMultiLine());