// 지도 tab
$(document).ready(function () {
  var cnt = $(".tab_menu li").size(); //탭메뉴 개수
  var onoff = false;

  //첫번째 탭메뉴 활성화
  $(".tabs .tab1").css("background", "#1f415c").css('color', '#fff');
  $(".contentlist .conlist").hide();
  $(".contentlist .conlist:eq(0)").fadeIn("slow");


  //탭 클릭 처리

  $(".tabs .tab").click(function (e) {
    e.preventDefault();

    // 클릭시 해당 index를 뽑아준다
    var ind = $(this).index(".tabs .tab");

    $(".tabs .conlist").hide(); // 모든 탭 숨기기
    // $(".contentlist .contlist .map2").hide();
    $(".tabs .conlist:eq(" + ind + ")").show(); //클릭한 해당 탭내용만 보이기
    $(".tab span").css("background", "#f8f8f8").css('color', '#333'); //모든 탭메뉴를 비활성화
    $(this).css("background", "#1f415c").css('color', '#fff'); // 클릭한 해당 탭메뉴만 활성화
    //console.log(ind)
    //비활성
    if (ind == 0) {
      $(".tab2").css("background", "#f8f8f8").css('color', '#333');
    } else if (ind == 1) {
      $(".tab1").css("background", "#f8f8f8").css('color', '#333');
    }

    //활성
    $(this).css("background", "#1f415c").css('color', '#fff'); //첫번째 탭메뉴 활성화
  });
});