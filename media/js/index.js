//story 영역 텍스트 높이 맞추기
var li = $('.story ul li:eq(1)')
//console.dir(li)
var boxHeight = $('.story ul li:eq(1)').outerHeight();
//console.log(boxHeight)
$(".story ul li:eq(0)").css('height', boxHeight);


$(window).resize(function () {
    boxHeight = $('.story ul li:eq(1)').outerHeight();
    $(".story ul li:eq(0)").css('height', boxHeight);
});

//trailer 영역 텍스트 높이 맞추기

var imgHeight = $('.trailerInner .innerImg img').outerHeight();
$(".trailerInner dl").css('height', imgHeight);


$(window).resize(function () {
    imgHeight = $('.trailerInner .innerImg img').outerHeight();
    $(".trailerInner dl").css('height', imgHeight);

});


  var s1 = $("#content .character").offset().top - 320;
  var s2 = $("#content .trailer").offset().top - 320;
  console.log(s2)

  //console.log(s5);

  $(window).on("scroll", function () {
              var scroll = $(window).scrollTop(); //스크롤 top의 높이

              //$(".topText").text(scroll); //스크롤 좌표의 값

              //스크롤의 거리의 범위를 처리

              // wave
              if (scroll >= s1) {
                  $(".wave").addClass("on");
              } else if (scroll < s1) {
                  $(".wave").removeClass("on");
              } 

              //main 캐릭터
  });
/*
let screenSize;

function screen_size() {
    screenSize = $(window).width(); //스크린의 너비
}

screen_size(); //최초 실행시 호출

$(window).resize(function () {
    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    screen_size();
});

function screenI() {
    if (screenSize > 768) {
        $('.character .moana').attr('src', './images/charact1_1.png')
        $('.character .maui').attr('src', './images/charact7.png')
    } else if (screenSize <= 768) {
        $('.character .moana').attr('src', './images/chgimg1.jpg');
        $('.character .maui').attr('src', './images/chgimg2.jpg')
    }
}

screenI(); //함수호출    

$(window).resize(function () {
    screenSize = $(window).width();
    screenI(); //함수호출
});
*/