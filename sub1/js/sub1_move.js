//sub1 scroll에 따른 동작 처리

var smh = $(".visual").height();
var c1 = $(".content01").offset().top;

$(window).on("scroll", function () {
  var cScroll = $(window).scrollTop();

  if (cScroll > smh + 50) {
    $(".content01 .vision").find("li").addClass("active");
    //스크롤의 거리가 50px 이상이면 active class 추가
  }
});