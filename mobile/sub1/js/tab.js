// 지도 tab
$(document).ready(function () {
  var cnt = $(".tab_menu li").size(); //탭메뉴 개수
  var onoff = false;

  //첫번째 탭메뉴 활성화
  $(".tabs .tab1").find("span").css("background", "#01abce");

  $(window).on("scroll", function () {
    //스크롤 값의 변화가 생기면 (스크롤 거리)
    var scroll = $(window).scrollTop();

    if (scroll > 10 && onoff == false) {
      $(".contentlist .conlist").hide();
      // 첫번째 탭 내용만 열어주기
      // $(".contentlist .contlist:eq(0) #mapLab").hide();
      $(".contentlist .conlist:eq(0)").fadeIn("slow");

      onoff = true;
    }
  });

  //탭 클릭 처리

  $(".tabs .tab").click(function (e) {
    e.preventDefault();

    // 클릭시 해당 index를 뽑아준다
    var ind = $(this).index(".tabs .tab");

    $(".tabs .conlist").hide(); // 모든 탭 숨기기
    // $(".contentlist .contlist .map2").hide();
    $(".tabs .conlist:eq(" + ind + ")").show(); //클릭한 해당 탭내용만 보이기
    $(".tab span").css("background", "#01abce"); //모든 탭메뉴를 비활성화
    $(this).find('span').css("background", "#01abce"); // 클릭한 해당 탭메뉴만 활성화
    console.log(ind)
    //비활성
    if (ind == 0) {
      $(".tab2, .tab3").find("span").css("background", "#1f415c");
    } else if (ind == 1) {
      $(".tab1, .tab3").find("span").css("background", "#1f415c");
    } else if (ind == 2) {
      $(".tab1, .tab2").find("span").css("background", "#1f415c");
    }

    //활성
    $(this).find("span").css("background", "#01abce");; //첫번째 탭메뉴 활성화
  });
});