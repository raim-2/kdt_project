$(document).ready(function () {
  //sticky scroll 연혁처리

  var cnt = 0;
  $(".contentNav li:eq(0)").find("a").addClass("spy");
  //첫번째 서브메뉴 활성화

  //$("#sectionBox section:eq(0)").find(".bottom").addClass("boxMove");
  //첫번째 내용글 애니메이션 처리
  var smh = $(".visual").height(); //메인 비주얼의 높이
  var h0 = $("#sectionBox section:eq(0)").offset().top - 250; //1003
  var h1 = $("#sectionBox section:eq(1)").offset().top - 500; //3821
  console.log(h0, h1)
  var h2 = $("#sectionBox section:eq(2)").offset().top - 500; //8217

  //스크롤의 좌표가 변하면.. 스크롤 이벤트
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    //스크롤top의 좌표를 담는다

    $(".text").text(scroll);
    //스크롤 좌표의 값을 찍는다.

    //sticky menu 처리
    if (scroll > smh + 350) {
      $(".navBox").addClass("navOn");
      //스크롤의 거리가 350px 이상이면 서브메뉴 고정
      $("header").hide();
    } else {
      $(".navBox").removeClass("navOn");
      //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
      $("header").show();
    }

    //모든 서브메뉴 비활성화
    $(".contentNav li").find("a").removeClass("spy");

    //스크롤의 거리의 범위를 처리
    if (scroll >= h0 && scroll < h1) {
      cnt = 0;
    } else if (scroll >= h1 && scroll < h2) {
      cnt = 1;
    } else if (scroll >= h2) {
      cnt = 2;
    }

    //첫번째 서브메뉴 활성화
    $(".contentNav li:eq(" + cnt + ")")
      .find("a")
      .addClass("spy");


    //첫번째 내용 콘텐츠 애니메이션
    $("#sectionBox section:eq(" + cnt + ")")
      .find(".yleft")
      .addClass("boxLMove");
    $("#sectionBox section:eq(" + cnt + ")")
      .find(".yright")
      .addClass("boxRMove");

  });


  // 연혁 tab 처리
  //슬라이드 메뉴 클릭시 해당 콘텐츠로 스스륵 이동

  $(".contentNav li a").click(function (e) {
    e.preventDefault(); //href="#" 속성을 막아주는..메소드

    var value = 0;
    //var ind = $(this).index(".contentNav li a") + 1; // 0,1,2
    //var value = $("#content .sec:eq(" + ind + ")").offset().top; //이동할 스크롤의 거리

    if ($(this).hasClass("link1")) {
      //첫번째 메뉴를 클릭
      value = $("#content .sec1").offset().top - 100; // 1070; 
      //console.log(value) // 해당 콘텐츠 상단의 거리
    } else if ($(this).hasClass("link2")) {
      value = $("#content .sec2").offset().top - 100; //4140;
    } else if ($(this).hasClass("link3")) {
      value = $("#content .sec3").offset().top - 100; //8215;
    }

    $("html,body").stop().animate({
        scrollTop: value,
      },
      1000
    );
  });

});