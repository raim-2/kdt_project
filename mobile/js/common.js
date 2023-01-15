//header_top on/off

$(window).on("scroll", function () {
  //스크롤의 거리가 발생시
  var smh = $(".visual").height(); //비주얼 이미지의 높이 리턴
  var on_off = false; //false(안오버)  true(오버)
  var scroll = $(window).scrollTop(); //스크롤의 거리 (scrollTop)

  if (scroll > smh - 250) {
    //스크롤400까지 내리면

    $("#headerArea")
      .css("background", "#fff")
      .css("box-shadow", "1px 1px 6px 1px rgba(0,0,0,0.1");
    $(".dropdownmenu li a.depth1").css("color", "#333");
    $(".dropdownmenu li ul li a").css("color", "#333");
    $(".topMenu a").css("color", "#666");
    $("h1 a").addClass("on");
    $(".bar").css("color", "#333");
  } else {
    //스크롤 내리기 전 디폴트
    //마우스가 헤더에 hover되어 있지 않을 때
    if (on_off == false) {
      $("#headerArea")
        // .css("background", "rgba(0,0,0,.3)")
        .css("background", "none")
        .css("box-shadow", "none");
      $(".dropdownmenu li a.depth1").css("color", "#fff");
      $(".dropdownmenu li ul li a").css("color", "#fff");
      $(".topMenu a").css("color", "#fff");
      $("h1 a").removeClass("on");
      $(".bar").css("color", "#fff");
    }
  }
});

//nav onoff 처리
$(".bar").click(function () {
  //메뉴버튼 클릭시

  var documentHeight = $(document).height();
  //실제 페이지의 높이 = $(document).height();
  $(".box").css("height", documentHeight);
  $("#gnb").css("height", documentHeight);
  //반투명박스와 네비의 높이를 실제 페이지 높이로 변환

  $("#gnb").animate({
      right: 0,
      opacity: 1,
    },
    "slow"
  );
  $(".box").show();
});

$(".box,.close").click(function () {
  //닫기버튼 클릭시
  $("#gnb").animate({
      right: "-100%",
      opacity: 0,
    },
    "fast"
  );
  $(".box").hide();
  $('#gnb .depth1').find("ul").slideUp("fast");
  $('#gnb .depth1 a').find('span').html('<i class="fas fa-chevron-down" aria-hidden="true"></i>')
});

//2depth 메뉴 교대로 열기 처리
var onoff = [false, false, false, false];
var arrcount = onoff.length; //4개

$("#gnb .depth1>a").click(function () {
  var ind = $(this).parents(".depth1").index(); // 0 ~ 3

  if (onoff[ind] == false) {
    //$('#gnb .depth1 ul').hide();
    $(this).next("ul").stop().slideDown("slow");
    $(this).parents(".depth1").siblings("li").find("ul").slideUp("fast");
    for (var i = 0; i < arrcount; i++) onoff[i] = false;

    onoff[ind] = true;

    $(this).find('span').stop().html('<i class="fas fa-chevron-up" aria-hidden="true"></i>')

  } else {
    $(this).next("ul").stop().slideUp("fast");
    onoff[ind] = false;

    $(this).find('span').stop().html('<i class="fas fa-chevron-down" aria-hidden="true"></i>')
  }
});

// 하단 family site 클릭 이벤트
$(".family .arrow").toggle(
  function (e) {
    e.preventDefault();
    // $(".select .aList").show("slow");
    $(".select .aList").stop().slideDown("slow");
    $(this).find(".icon").stop().html('<i class="fa-solid fa-chevron-down"></i>');
  },
  function (e) {
    e.preventDefault();
    // $(".select .aList").hide("fast");
    $(".select .aList").stop().slideUp("fast");
    $(this).find(".icon").stop().html('<i class="fa-solid fa-chevron-up"></i>');
  }
);

//topmove 처리

$(".top").hide();

$(window).on("scroll", function () {
  var scroll = $(window).scrollTop();

  $(".topText").text(Math.floor(scroll));

  if (scroll > 300) {
    //300이상 거리 발생시
    $(".top").fadeIn("slow"); //top on
  } else {
    $(".top").fadeOut("fast"); //top off
  }
});

$(".top").click(function (e) {
  e.preventDefault();
  $("html,body").stop().animate(
    // 상단으로 스르륵 이동
    {
      scrollTop: 0,
    },
    1000
  );
});