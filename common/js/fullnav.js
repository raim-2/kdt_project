$(document).ready(function () {
  var smh = $(".visual").height(); //비주얼 이미지의 높이 리턴
  var on_off = false; //false(안오버)  true(오버)

  $("#headerArea").mouseenter(function () {
    var scroll = $(window).scrollTop();
    $(this)
      .css("background", "#fff")
      .css("box-shadow", "1px 1px 6px 1px rgba(0,0,0,0.1");
    $("h1 a").addClass("on");
    $(".dropdownmenu li a.depth1").css("color", "#333");
    $(".dropdownmenu li ul li a").css("color", "#333");
    $(".topMenu a").css("color", "#666");
    on_off = true;
  });

  $("#headerArea").mouseleave(function () {
    var scroll = $(window).scrollTop(); //스크롤의 거리 (scrollTop)

    if (scroll < smh - 50) {
      $(this).css("background", "rgba(0,0,0,.3").css("box-shadow", "none");
      $(".dropdownmenu li a.depth1").css("color", "#fff");
      $(".dropdownmenu li ul li a").css("color", "#fff");
      $(".topMenu a").css("color", "#fff");
      $("h1 a").removeClass("on");
    } else {
      $(this).css("background", "#fff");
      $(".dropdownmenu li a.depth1").css("color", "#333");
      $(".dropdownmenu li ul li a").css("color", "#333");
      $(".topMenu a").css("color", "#666");
      $("h1 a").addClass("on");
    }
    on_off = false;
  });

  $(window).on("scroll", function () {
    //스크롤의 거리가 발생하면
    var scroll = $(window).scrollTop(); //스크롤의 거리 (scrollTop)

    if (scroll > smh - 160) {
      //스크롤900까지 내리면

      $("#headerArea")
        .css("background", "#fff")
        .css("box-shadow", "1px 1px 6px 1px rgba(0,0,0,0.1");
      $(".dropdownmenu li a.depth1").css("color", "#333");
      $(".dropdownmenu li ul li a").css("color", "#333");
      $(".topMenu a").css("color", "#666");
      $("h1 a").addClass("on");
    } else {
      //스크롤 내리기 전 디폴트
      //마우스가 헤더에 hover되어 있지 않을 때
      if (on_off == false) {
        $("#headerArea")
          .css("background", "rgba(0,0,0,.3)")
          .css("box-shadow", "none");
        $(".dropdownmenu li a.depth1").css("color", "#fff");
        $(".dropdownmenu li ul li a").css("color", "#fff");
        $(".topMenu a").css("color", "#fff");
        $("h1 a").removeClass("on");
      }
    }
  });

  //2depth 열기/닫기
  $("ul.dropdownmenu").hover(
    function () {
      $("ul.dropdownmenu li.menu ul").fadeIn("normal", function () {
        $(this).stop();
      }); //모든 서브 다 열어라
      $("#headerArea")
        .animate({
            height: 420,
          },
          "fast"
        )
        .clearQueue();
    },
    function () {
      $("ul.dropdownmenu li.menu ul").hide(); //모든 서브 다 닫아라
      $("#headerArea")
        .animate({
            height: 218,
          },
          "fast"
        )
        .clearQueue();
    }
  );

  //1depth 효과
  $("ul.dropdownmenu li.menu").hover(
    function () {
      $(".depth1", this).css("color", "#01abce");
    },
    function () {
      $(".depth1", this).css("color", "#333");
    }
  );

  //2depth 효과
  $("ul.dropdownmenu li.menu ul li a").hover(
    function () {
      $(this).css("color", "#01abce");
    },
    function () {
      $(this).css("color", "#333");
    }
  );

  //tab 처리
  $("ul.dropdownmenu li.menu .depth1").on("focus", function () {
    $("ul.dropdownmenu li.menu ul").slideDown("normal");

    $("#headerArea")
      .animate({
          height: 420,
        },
        "fast"
      )
      .clearQueue();
  });

  $("ul.dropdownmenu li.m6 li:last")
    .find("a")
    .on("blur", function () {
      $("ul.dropdownmenu li.menu ul").slideUp("fast");

      $("#headerArea")
        .animate({
            height: 218,
          },
          "normal"
        )
        .clearQueue();
    });
});

//topmove 처리

$(".top").hide();

$(window).on("scroll", function () {
  var scroll = $(window).scrollTop();

  //$('.text').text(Math.floor(scroll));

  if (scroll > 400) {
    //400이상의 거리가 발생되면
    $(".top").fadeIn("slow"); //top보여라
  } else {
    $(".top").fadeOut("fast"); //top안보여라
  }
});

$(".top").click(function (e) {
  e.preventDefault();
  $("html,body").stop().animate(
    // 상단으로 스르륵 이동
    {
      scrollTop: 0,
    },
    1500
  );
});

// 하단 family site 클릭 이벤트
$(".family .arrow").toggle(
  function (e) {
    e.preventDefault();
    $(".select .aList").fadeIn("slow");
    $(this).find(".icon").html('<i class="fa-solid fa-chevron-down"></i>');
  },
  function (e) {
    e.preventDefault();
    $(".select .aList").fadeOut("fast");
    $(this).find(".icon").html('<i class="fa-solid fa-chevron-up"></i>');
  }
);

//tab키 처리
$(".family .arrow").on("focus", function () {
  $(".family .aList").fadeIn("slow");
});
$(".family .aList li:last a").on("blur", function () {
  $(".family .aList").fadeOut("fast");
});