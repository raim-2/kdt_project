//main visual 이미지 변경

var screenSize = window.innerWidth;
var imges = document.querySelectorAll(".main_visual .c1");
var simg = document.querySelector(".careImg img");
console.log(imges);
// var imgSrc = img1.getAttribute('src')
//console.dir(window)

function screenW() {
  screenSize = window.innerWidth;

  if (screenSize > 1200 && screenSize > 640) {
    //와이드pc
    imges[0].setAttribute("src", "./images/main1.jpg");
    imges[1].setAttribute("src", "./images/main2.jpg");
    imges[2].setAttribute("src", "./images/main3.jpg");
  } else if (screenSize <= 640) {
    //모바일
    imges[0].setAttribute("src", "./images/main1_mobile.jpg");
    imges[1].setAttribute("src", "./images/main2_mobile.jpg");
    imges[2].setAttribute("src", "./images/main3_mobile.jpg");
  }

  if (screenSize > 1200) {
    simg.setAttribute("src", "./images/skin1.jpg");
  } else {
    simg.setAttribute("src", "./images/skin2.jpg");
  }
}
screenW();
window.addEventListener("resize", screenW);

//아코디언 _ 이미지 높이 맞추기
var acHeight = $(".skincare #accordion").height();
// var panelBdHeight = $('#accordion div:eq(0) .panel-body').height() + 27 * 2;
// console.log(panelBdHeight)

if (screenSize >= 1200) {
  $(".skincare .careImg").find("Img").css("height", acHeight).css("box-sizing", "border-box").css("object-fit", "cover");
} else {
  $(".skincare .careImg").find("Img").css("height", "auto").css("box-sizing", "content-box").css("object-fit", "unset");
}

// for (var i = 1; i < 3; i++) {
//     $("#accordion div:eq(" + i + ") .panel-body").css('height', panelBdHeight);
// }

$(window).resize(function () {
  acHeight = $(".skincare #accordion").height();
  if (screenSize >= 1200) {
    $(".skincare .careImg").find("Img").css("height", acHeight).css("box-sizing", "border-box").css("object-fit", "cover");
  } else {
    $(".skincare .careImg").find("Img").css("height", "auto").css("box-sizing", "content-box").css("object-fit", "unset");
  }
});

// $('.panel-title').click(function () {
//     panelBdHeight = $('#accordion div:eq(0) .panel-body').height() + 27 * 2;
//     for (var i = 1; i < 3; i++) {
//         $("#accordion div:eq(" + i + ") .panel-body").css('height', panelBdHeight);
//     }
// });

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

// $(".top").click(function (e) {
//   e.preventDefault();
//   $("html,body").stop().animate(
//     // 상단으로 스르륵 이동
//     {
//       scrollTop: 0,
//     },
//     1500
//   );
// });
