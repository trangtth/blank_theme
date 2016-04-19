/**
 * Created by ACV.HoaNX.
 * Date: 24/3/2016
 */
function checkCanvas(flag) {
    $('.main-canvas').show();
    if (flag == true) {
        $('.main-canvas').removeClass('animated slideOutLeft slideInLeft').addClass('animated slideInLeft');
        $('.content-canvas').removeClass('contentclose contentopen').addClass('contentopen');
        $('.main-nav').removeClass('navclose navopen').addClass('navopen');
        $('body').css('overflow', 'hidden');
    } else {
        $('.main-canvas').removeClass('animated slideOutLeft slideInLeft').addClass('animated slideOutLeft');
        $('.content-canvas').removeClass('contentclose contentopen').addClass('contentclose');
        $('.main-nav').removeClass('navclose navopen').addClass('navclose');
        $('body').removeAttr("style")
    }
}

function initPage() {
    var scrollTop = $(this).scrollTop();
    if (scrollTop > 100) {
        $('.totop').fadeIn();
    } else {
        $('.totop').fadeOut();
    }
    changeNav();
}

function changeNav() {
    var scroll = $(window).scrollTop();
    flag = scroll > 80;
    if(flag){
        $('.main-nav').removeClass('scroll').addClass('scroll');
        $('#wpadminbar').removeClass('wp-adminbar-invisible').addClass('wp-adminbar-invisible');
    }else{
        $('.main-nav').removeClass('scroll');
        $('#wpadminbar').removeClass('wp-adminbar-invisible');
    }
    scrollNav();
    checkAdminMenu();
}

function scrollNav() {
    $('.service-action, .service-action a').click(function(e){
        e.preventDefault();
        var theClass = $(this).attr("data-anchor");
        if(typeof theClass == 'undefined')
            return;
        //Animate
        $('html, body').stop().animate({
            scrollTop: $( '.'+theClass ).offset().top - 160
        }, 400);
        return false;
    });
}

function checkAdminMenu() {
    if($('#wpadminbar').length <= 0)
        return;
    var _wpbar = $('#wpadminbar');
    _main_nav = $('.main-nav');
    _html = $('html');
    _html.css({
        'margin-top': "0px !important"
    });
    if($(window).scrollTop() <= 0){
        _main_nav.css({
            top: _wpbar.outerHeight()+'px'
        });
    }else{
        _main_nav.css({
            top: '0px'
        });
    }
}

$(window).load(function() {
    $(".loader").fadeOut("slow");
});

$(document).ready(function () {
    initPage();
    $(window).on('resize', function () {
        initPage();
        var window_width = $(this).width();
        if(window_width > 1100)
            checkCanvas();
    });
    $('.toggleNav').click(function () {
        $(this).toggleClass('btnavtive');
        checkCanvas($(this).hasClass('btnavtive'));
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.totop').fadeIn();
        } else {
            $('.totop').fadeOut();
        }
        changeNav();
    });

    $('.totop').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(".fancybox").fancybox({
        beforeShow : function() {
            var alt = this.element.find('img').attr('alt');

            this.inner.find('img').attr('alt', alt);

            this.title = alt;
        },
        prevEffect	: 'none',
        nextEffect	: 'none',
        openEffect	: 'elastic',
        closeEffect	: 'elastic',
        helpers : {
            title : {
                type : 'over'
            }
        }
    });

})