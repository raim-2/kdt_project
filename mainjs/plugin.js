//사업분야 휠 이벤트

$(function () {
  //var onpage = $(".bizInner ul.bizMove li");
  //console.log(onpage.index() + 1);

  $("#native").bind("mousewheel", function (event, deltaY) {
    event.preventDefault();
    var scrollTop = this.scrollTop;
    this.scrollTop = scrollTop + event.deltaY * event.deltaFactor * -1;

    /*
    if (deltaY > 0) {
      //위로 올릴 때

      //$(this).css("background", "pink");
      //$(this).find("li").first().stop().hide("3000");
      $(this).find("li").first().appendTo(this).stop().show("2000");
      //console.log(event.originalEvent); //deltaY -100씩이동 .wheelDelta 120씩 이동
    } else if (deltaY < 0) {
      //밑으로 내릴 때

      //$(this).css("background", "yellow");
      //$(this).find("li").first().stop().hide("3000");
      $(this).find("li").first().appendTo(this).stop().show("2000");
    }
    */
  });
});

// #native 마우스엔터시 스크롤 동작
$("#native").on("mouseenter", function () {
  $(".business .scroll").addClass("on");
});
$("#native").on("mouseleave", function () {
  $(".business .scroll").removeClass("on");
});