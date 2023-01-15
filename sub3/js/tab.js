// JavaScript Document

//sub3_1

//var cnt = 3; //탭메뉴 개수 ***
var cnt = $(".tab_menu li").size(); //탭메뉴 개수 ***

$(".contentArea .contlist").hide();
$(".contentArea .contlist:eq(0)").show(); // 첫번째 탭 내용만 열어라
$(".contentArea .tab1").find("img").css("filter", "none");
$(".contentArea .tab1").find("span").css("opacity", "0");

$(".contentArea .tab").click(function (e) {
  e.preventDefault();

  var ind = $(this).index(".contentArea .tab"); // 클릭시 해당 index를 뽑아준다
  //console.log(ind);

  $(".contentArea .contlist").hide(); //모든 탭내용을 안보이게...
  $(".contentArea .contlist:eq(" + ind + ")").show();
  $(".tab").find("img").css("filter", "contrast(0.8) brightness(0.5)");
  $(".tab").find("span").css("opacity", "1");
  $(this).find("img").css("filter", "none"); // 클릭한 해당 탭메뉴만 활성화
  $(this).find("span").css("opacity", "0");
});

// $(".contentArea .tab").hover(
//   function () {
//     $(this).find("img").css("filter", "none");
//     $(this).find("span").css("opacity", "0");
//   },
//   function () {
//     $(this).find("img").css("filter", "contrast(0.8) brightness(0.5)");
//     $(this).find("span").css("opacity", "1");
//   }
// );

//sub3_2
var acnt = $(".tab_menu2 li").size(); //탭메뉴 개수 ***

$(".contentArea .content").hide();
$(".contentArea .content:eq(0)").show(); // 첫번째 탭 내용만 열어라
$(".contentArea .a_tab1").css("background", "rgba(255, 255, 255, 0.1)");
$(".tab_menu2 li:eq(0)").addClass("on");

$(".contentArea .a_tab").click(function (e) {
  e.preventDefault();

  var ind = $(this).index(".contentArea .a_tab"); // 클릭시 해당 index를 뽑아준다
  console.log(ind);

  $(".contentArea .content").hide(); //모든 탭내용을 안보이게...
  $(".contentArea .content:eq(" + ind + ")").show();
  $(".tab_menu2 li").removeClass("on");
  $(".contentArea .a_tab").css("background", "none");
  $(".tab_menu2 li:eq(" + ind + ")").addClass("on");
  $(".contentArea .a_tab" + (ind + 1) + "").css(
    "background",
    "rgba(255, 255, 255, 0.1)"
  );
});
