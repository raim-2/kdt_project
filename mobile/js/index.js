// index 메인 자동 처리
var timeonoff; //타이머 처리
var imageCount = $(".gallery ul li").size(); //이미지 총개수
var cnt = 1; //이미지 순서 1 2 3 1 2 3
var onoff = true; // true=>타이머 동작중 , false=>동작하지 않을때

$(".btn1").css("background", "#1f415c"); //첫번째 on

$(".gallery .link1 img").fadeIn("slow"); //첫번째 이미지 on
$(".gallery .link1 .text").animate({
    top: "30%",
    opacity: 1,
  },
  "slow"
);

function moveg() {
  if (cnt == imageCount + 1) cnt = 1;
  if (cnt == imageCount) cnt = 0; //카운트 초기화

  cnt++; //카운트 1씩 증가 3되면 초기화, 0  1 2 3 1 2 3

  $(".gallery li").hide(); //이미지 모두 off
  $(".gallery .link" + cnt).fadeIn("slow"); // 자신만 on

  $(".mbutton").css("background", "#fff"); //모두 out
  $(".btn" + cnt).css("background", "#1f415c"); //자신만 on

  $(".gallery li .text").css("top", "35%").css("opacity", 0);
  $(".gallery .link" + cnt)
    .find(".text")
    .delay(1000)
    .animate({
        top: "30%",
        opacity: 1,
      },
      "slow"
    );

  if (cnt == imageCount) cnt = 0; //카운트의 초기화 0
}

timeonoff = setInterval(moveg, 4000);
// 타이머를 동작 1~3이미지를 순서대로 자동 처리


//신제품 영역
var cnt = $('.tab_menu li').size(); //탭메뉴 개수 ***

$('.contBox .contlist').hide();
$('.contBox .contlist:eq(0)').show(); // 첫번째 탭 내용만 열어라
$('.tab_menu .tab1').css('box-shadow', '0px 0px 5px 0px #999').css('background-color','#fff'); //첫번째 탭메뉴 활성화

$('.tab_menu .tab').click(function (e) {
  e.preventDefault();

  var ind = $(this).index('.tab_menu .tab');

  $(".contBox .contlist").hide();
  $(".contBox .contlist:eq(" + ind + ")").show();
  $('.tab_menu .tab').css('box-shadow', 'none').css('background-color','#eee');
  $(this).css('box-shadow', '0px 0px 5px 0px #999').css('background-color','#fff');

});




// 정도경영 영역 count *숫자 자동입력
// 사회공헌 금액
var countNumber1;
var countNumber2;

function count() {
  var memberCountConTxt = 32;

  $({
    val: 0,
  }).animate({
    val: memberCountConTxt,
  }, {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $("#management .count1").text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $("#management .count1").text(number);
    },
  });
}

// 온실가스 사용량

function count2() {
  memberCountConTxt = 120;

  $({
    val: 0,
  }).animate({
    val: memberCountConTxt,
  }, {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $("#management .count2").text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $("#management .count2").text(number);
    },
  });
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "");
}

// window.addEventListener('scroll',)

$(window).on("scroll", function () {
  var scroll = $(window).scrollTop();
  var h1 = $("#management").offset().top - 200;
  // var h2 = $("#faq").offset().top;
  //  console.log(h1);

  if (scroll >= h1 && scroll < h1 + 200) {
    countNumber1 = setTimeout(count, 100);
    countNumber2 = setTimeout(count2, 100);
    // clearTimeout()
    // count();
    // count2();
  }
});

//faq 세로아코디언

var faqList = $(".faq .faqList"); //모든 질문 답변 리스트
faqList.find(".a").slideUp(100); // 모든 답변 off
faqList.find("span").html('<i class="fas fa-chevron-down"></i>');

$(".faq .faqList .trigger").click(function (e) {
  e.preventDefault();
  var myfaqList = $(this).parents(".faqList"); //클릭한 해당 list

  if (myfaqList.hasClass("hide")) {
    faqList.find(".a").slideUp(100); //모든 답변을 닫아라
    faqList.removeClass("show").addClass("hide"); // 모든 리스트를 hide교체
    faqList.find(".q a:not(span)").css("color", "#333");
    faqList.find("span").html('<i class="fas fa-chevron-down"></i>');

    myfaqList.removeClass("hide").addClass("show"); // show로 바꾼다
    myfaqList.find(".a").slideDown(100); //해당 리스트의 답변을 열어라
    myfaqList.find(".q a:not(span)").css("color", "#01abce");
    myfaqList.find("span").html('<i class="fas fa-chevron-up"></i>');
  } else {
    // 'show' 답변이 열려있냐??
    myfaqList.removeClass("show").addClass("hide"); // hide로 바꾼다
    myfaqList.find(".a").slideUp(100); //해당 리스트의 답변을 닫아라
    myfaqList.find(".q a:not(span)").css("color", "#333");
    myfaqList.find("span").html('<i class="fas fa-chevron-down"></i>');
  }
});