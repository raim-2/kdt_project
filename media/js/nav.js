// var h1 = $('.mainstory').offset().top - 500;

// function headeingani() {
//     if (scroll <= h1) {
//         $('.videoBox div.smoke').addClass('on');
//     } else {
//         $('.videoBox div.smoke').removeClass('on');
//     }
// }

// headeingani();

$(window).on("scroll", function () {
    //스크롤의 거리가 발생하면
    var scroll = $(window).scrollTop();
    var video = $('.videoBox').height();
    var on_off = false;

    if (scroll > video - 250) {
        //스크롤900까지 내리면

        $("#headerArea")
            .css("background", "rgba(0,0,0,.8)")
        $("#headerArea h1 a").css("background", "url(./images/logo4.png) 0 0 no-repeat")
        $("#headerArea h1 a").css("background-size", "contain")
        on_off = true
    } else {
        //스크롤 내리기 전 디폴트
        if (on_off == false) {
            $("#headerArea")
                .css("background", "none")
            $("#headerArea h1 a").css("background", "url(./images/logo.png) 0 0 no-repeat")
            $("#headerArea h1 a").css("background-size", "contain")
        }
    }
});

//nav 리사이즈 처리

$(".btn").click(function () {
    // e.preventDefault();
    var documentHeight = $(document).height();
    $("#gnb").css('height', documentHeight);

    $("#gnb").animate({
        right: 0,
        opacity: 1
    }, 'fast');
});

$(".close").click(function () {
    // e.preventDefault();
    $("#gnb").animate({
        right: '-100%',
        opacity: 0
    }, 'fast');
});

var current = 0;
$(window).resize(function () { //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    var screenSize = $(window).width();
    if (screenSize > 768) {
        current = 1;
        $("#headerArea #gnb").css({
            right: 0,
            opacity: 1
        });
    }
    if (current == 1 && screenSize < 768) {
        $("#headerArea #gnb").css({
            right: '-100%',
            opacity: 0
        });
        current = 0;
    }
});

//topmove 처리

$(".topMove").click(function (e) {
    e.preventDefault();
    $("html,body").stop().animate(
        // 상단으로 스르륵 이동
        {
            scrollTop: 0,
        },
        1500
    );
});