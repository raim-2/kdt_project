$(document).ready(function () {
  //v2
  // visual move 비주얼이미지

  var timeonoff; //타이머 처리
  var imageCount = $(".gallery ul li").size(); //이미지 총개수
  var cnt = 1; //이미지 순서 1 2 3 1 2 3 ....(주인공!!=>현재 이미지 순서)
  var onoff = true; // true=>타이머 동작중 , false=>동작하지 않을때

  /* 최초 상태 셋팅*/
  $(".btn1").css("background", "rgba(31, 65, 92, .8)"); //첫번째 불켜
  $(".btn1").css("width", "90"); // 버튼의 너비 증가
  $(".btn1").css("text-indent", "50px");
  $(".ps").html('<i class="fa-solid fa-pause"></i>'); //정지

  $(".gallery .link1").fadeIn("slow"); //첫번째 이미지 보여줌
  $(".gallery .link1 .text").delay(1500).animate({
      top: 340, //위로 올라옴
      opacity: 1,
    },
    "slow"
  );

  function moveg() {
    //맨 처음에 cnt = 1로 시작하므로, 조건을 나눠둔것
    if (cnt == imageCount + 1) cnt = 1; 
    if (cnt == imageCount) cnt = 0; //카운트 초기화

    cnt++; //카운트 1씩 증가 5되면 초기화, 0 1 2 3 1 2 3...

    $(".gallery li").hide(); //이미지 모두 off
    $(".gallery .link" + cnt).fadeIn("slow"); // 자신만 보임

    $(".mbutton").css("background", "rgba(0,0,0,.1)"); //버튼불다꺼!!
    $(".mbutton").css("width", "25"); // 버튼 원래의 너비
    $(".mbutton").css("text-indent", "0");

    $(".btn" + cnt).css("background", "rgba(31, 65, 92, .8)"); //자신만 불켜
    $(".btn" + cnt).css("width", "90");
    $(".btn" + cnt).css("text-indent", "50px");

    $(".gallery li .text").css("top", 380).css("opacity", 0);
    $(".gallery .link" + cnt)
      .find(".text")
      .delay(1000)
      .animate({
          top: 340,
          opacity: 1,
        },
        "slow"
      );

    if (cnt == imageCount) cnt = 0; //카운트의 초기화 0
  }

  timeonoff = setInterval(moveg, 4000);
  // 타이머를 동작 1~5이미지를 순서대로 자동 처리
  //var 변수 = setInterval( function(){처리코드} , 4000);  //정보를 담아놓는다

  $(".mbutton").click(function (event) {
    //각각의 버튼 클릭시
    var $target = $(event.target); //클릭한 버튼 $target == $(this)
    clearInterval(timeonoff); //타이머 중지

    $(".gallery li").hide(); //모든 이미지 안보인다.

    if ($target.is(".btn1")) {
      //첫번째 버튼 클릭??
      cnt = 1; //클릭한 해당 카운트를 담아놓는다
    } else if ($target.is(".btn2")) {
      //두번째 버튼 클릭??
      cnt = 2;
    } else if ($target.is(".btn3")) {
      cnt = 3;
    }

    $(".gallery .link" + cnt).fadeIn("slow"); //자기 자신만 이미지가 보인다

    $(".mbutton").css("background", "rgba(0,0,0,.1)"); //버튼 모두불꺼
    $(".mbutton").css("width", "25");
    $(".mbutton").css("text-indent", "0");

    $(".btn" + cnt).css("background", "rgba(31, 65, 92, .8)"); //자신 버튼만 불켜
    $(".btn" + cnt).css("width", "90");
    $(".btn" + cnt).css("text-indent", "50px");

    $(".gallery li .text").css("top", 380).css("opacity", 0);
    $(".gallery .link" + cnt)
      .find(".text")
      .delay(1000)
      .animate({
          top: 340,
          opacity: 1,
        },
        "slow"
      );

    if (cnt == imageCount) cnt = 0; //카운트 초기화

    timeonoff = setInterval(moveg, 4000); //타이머의 부활!!!

    if (onoff == false) {
      //중지상태?
      onoff = true; //동작~~
      $(".ps").html('<i class="fa-solid fa-pause"></i>');
    }
  });

  //stop + play 버튼 클릭시 타이머 동작/중지
  $(".ps").click(function () {
    if (onoff == true) {
      // 타이머가 동작 중이면,
      clearInterval(timeonoff); //stop버튼 클릭시
      $(this).html('<i class="fa-solid fa-play"></i>');
      onoff = false;
    } else {
      // false 타이머가 중지 상태면,
      timeonoff = setInterval(moveg, 4000); //play버튼 클릭시  부활
      $(this).html('<i class="fa-solid fa-pause"></i>');
      onoff = true;
    }
  });

  //왼쪽 + 오른쪽 버튼 처리
  $(".visual .btn").click(function () {
    clearInterval(timeonoff); //살인마

    if ($(this).is(".btnRight")) {
      // 오른쪽 버튼 클릭
      if (cnt == imageCount) cnt = 0; //카운트가 마지막 번호(5)라면 초기화 0
      //if(cnt==imageCount+1)cnt=1;
      cnt++; //카운트 1씩증가
    } else if ($(this).is(".btnLeft")) {
      //왼쪽 버튼 클릭
      if (cnt == 1) cnt = imageCount + 1; // 1->6  최초..
      if (cnt == 0) cnt = imageCount;
      cnt--; //카운트 감소
    }

    $(".gallery li").hide(); //모든 이미지를 보이지 않게.
    $(".gallery .link" + cnt).fadeIn("slow"); //자신만 이미지가 보인다..

    $(".mbutton").css("background", "rgba(0,0,0,.1)"); //버튼 모두불꺼
    $(".mbutton").css("width", "25");
    $(".mbutton").css("text-indent", "0");

    $(".btn" + cnt).css("background", "rgba(31, 65, 92, .8)"); //자신 버튼만 불켜
    $(".btn" + cnt).css("width", "90");
    $(".btn" + cnt).css("text-indent", "50px");

    $(".gallery li .text").css("top", 380).css("opacity", 0);
    $(".gallery .link" + cnt)
      .find(".text")
      .delay(1000)
      .animate({
          top: 340,
          opacity: 1,
        },
        "slow"
      );

    // if($(this).is('.btnRight')){
    //   if(cnt==imageCount)cnt=0;
    // }else if($(this).is('.btnLeft')){
    //   if(cnt==1)cnt=imageCount+1;
    // }

    timeonoff = setInterval(moveg, 4000); //부활

    if (onoff == false) {
      onoff = true;
      $(".ps").html('<i class="fa-solid fa-pause"></i>');
    }
  });


  //제품검색 클릭 이벤트

  var search = document.querySelector('#search_box');
  var input = search.querySelector('.searchInner input')

  $('#search_box dl dd').click(function (e) {
    e.preventDefault();

    input.value = this.innerText
    //input.value = $(this).attr('value',);
  })


  //신제품영역 슬라이드

  $(".rightBtn").click(function (e) {
    e.preventDefault();
    $(".new ul").show().fadeIn("fast");
    $(".new li").first().appendTo(".new ul");
    // ul(부모)의 자식  li중에서 첫번째 li를 마지막으로 위치 이동.
  });
  $(".leftBtn").click(function (e) {
    e.preventDefault();
    $(".new ul").show().fadeIn("fast");
    $(".new li").last().prependTo(".new ul");
    // ul(부모)의 자식  li중에서 마지막번째 li를 첫번째로 위치 이동.
  });


  //정도경영 hover
  $(".management li").hover(
    function () {
      //$(".manageCaption", this).animate({ top: 0 }, "5000").clearQueue();
      $(".manageCaption", this)
        .css("opacity", "1")
        .css("background", "rgba(0, 0, 0, 0.5)");
    },
    function () {
      // $(".manageCaption", this).animate({ top: 100 }, "5000").clearQueue();
      $(".manageCaption", this).css("opacity", "0").css("background", "none");
    }
  );

  //정도경영 tab 처리
  var ind = $(".management li").index(".management li");

  $(".management li a").on("focus", function () {
    //$(".management li .manageTitle span").css("opacity", "1");
    $(this).find(".manageTitle span").css("opacity", "0");
    $(".manageCaption", this)
      .css("opacity", "1")
      .css("background", "rgba(0, 0, 0, 0.5)");
  });

  $(".management li a").on("blur", function () {
    $(this).find(".manageTitle span").css("opacity", "1");
    $(".manageCaption", this).css("opacity", "0").css("background", "none");
  });

  //동아위드 슬라이드
  var position = 0; //최초위치
  var movesize = $(".news ul li").width() + 40; // 이미지 1개 너비 +40 리턴
  //console.log(movesize);

  // 갤러리 복제
  $(".newsInner ul").after($(".newsInner ul").clone());

  //동아위드 방향키 클릭시
  $(".btn").click(function (e) {
    e.preventDefault();

    if ($(this).is(".newsLeftBtn")) {
      //이전버튼 클릭
      if (position == -2000) {
        // 맨처음에 오른쪽 버튼을 클릭했을 때 발생하는 오류 막아줌
        $(".newsInner").css("left", 0);
        position = 0;
      }


      position -= movesize; // 400씩 감소
      //console.log(position);
      $(".newsInner")
        .stop()
        .animate({
            left: position,
          },
          "fast",
          function () {
            if (position <= -2000) {
              $(".newsInner").css("left", 0);
              position = 0;
            }
          }
        );
      //.clearQueue();
    } else if ($(this).is(".newsRightBtn")) {
      //다음버튼 클릭
      if (position == 0) {
        // 맨처음에 오른쪽 버튼을 클릭했을 때 발생하는 오류 막아줌
        $(".newsInner").css("left", -2000);
        position = -2000;
      }

      position += movesize; // 400씩 증가
      //console.log(position);
      $(".newsInner")
        .stop()
        .animate({
            left: position,
          },
          "fast",
          function () {
            if (position >= 0) {
              $(".newsInner").css("left", -2000);
              position = -2000;
            }
          }
        );
      //.clearQueue();
    }
  });

  //window스크롤 transition
  //var cnt = 0;
  //var smh = $(".visual").height(); //메인 비주얼의 높이
  var s1 = $("#content section:eq(1)").offset().top - 520;
  var s2 = $("#content section:eq(2)").offset().top - 550;
  var s3 = $("#content section:eq(3)").offset().top - 400;
  var s4 = $("#content section:eq(4)").offset().top - 400;
  var s5 = $("#content section:eq(5)").offset().top - 800;
  //console.log(s5);

  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop(); //스크롤 top의 높이

    $(".topText").text(scroll); //스크롤 좌표의 값

    //스크롤의 거리의 범위를 처리

    // 신제품영역
    if (scroll >= s1) {
      $(".new").addClass("newMove");
    } else if (scroll < s1) {
      $(".new").removeClass("newMove");
    }

    // 사업분야영역

    if (scroll >= s2) {
      $("ul.blist").addClass("bizMove");
    } else if (scroll < s2) {
      $("ul.blist").removeClass("bizMove");
    }

    // 정도경영영역

    if (scroll >= s3) {
      $(".management ul li").addClass("manageMove");
    } else if (scroll < s3) {
      $(".management ul li").removeClass("manageMove");
    }

    // 위드동아영역

    if (scroll >= s4) {
      $(".newsInner").addClass("newsMove");
    } else if (scroll < s4) {
      $(".newsInner").removeClass("newsMove");
    }

    // 인재채용영역

    if (scroll >= s5) {
      $(".recruit").addClass("recruitMove");
    } else if (scroll < s5) {
      $(".recruit").removeClass("recruitMove");
    }
  });
});