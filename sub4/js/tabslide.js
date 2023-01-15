//sub4_3 tab slide

var cnt = 0;
$(".tab_menu li:eq(0)").find("a").addClass("spy");
//첫번째 서브메뉴 활성화

//첫번째 내용글 애니메이션 처리
var smh = $(".visual").height(); //메인 비주얼의 높이
//console.log(smh);
var h1 = $("#sectionBox section:eq(1)").offset().top - 250

//스크롤의 좌표가 변하면.. 스크롤 이벤트
$(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    //스크롤top의 좌표를 담는다

    $(".text").text(scroll);
    //스크롤 좌표의 값을 찍는다.

    //sticky menu 처리
    if (scroll > smh + 150) {
        $(".tab_menu").addClass("tabOn");
        //스크롤의 거리가 150px 이상이면 서브메뉴 고정
        $("header").hide();
    } else {
        $(".tab_menu").removeClass("tabOn");
        //스크롤의 거리가 150px 보다 작으면 서브메뉴 원래 상태로
        $("header").show();
    }

    $(".tab_menu li").find("a").removeClass("spy");
    //모든 서브메뉴 비활성화~ 불꺼!!!0

    //스크롤의 거리의 범위를 처리
    if (scroll >= 0 && scroll < h1) {
        cnt = 0;
    } else if (scroll >= h1) {
        cnt = 1;
    }


    $(".tab_menu li:eq(" + cnt + ")")
        .find("a")
        .addClass("spy");
    //첫번째 서브메뉴 활성화

});


//tab 메뉴 클릭시 해당 탭으로 이동
$('.tab_menu a').click(function (e) {
    e.preventDefault(); //href="#" 속성을 막아주는..메소드

    var value = 0; //이동할 스크롤의 거리

    //탭 메뉴 클릭시, 해당 탭으로 이동
    if ($(this).hasClass('tab1')) { //첫번째 메뉴를 클릭시, 
        value = $('#content .sec01').offset().top; // 해당 콘텐츠 상단의 거리
    } else if ($(this).hasClass('tab2')) {
        value = $('#content .sec02').offset().top;
    }

    $('html,body').stop().animate({
        "scrollTop": value - 145
    }, 1000);

    //탭 메뉴 클릭시, 탑 메인 변경



});