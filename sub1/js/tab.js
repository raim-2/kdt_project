// 지도 tab
$(document).ready(function () {
  var cnt = $(".tab_menu li").size(); //탭메뉴 개수
  var onoff = false;

  //첫번째 탭메뉴 활성화
  $(".tabs .tab1").css("background", "#fff").css("color", "#01abce");

  $(".tabs .tab_menu").css("border-bottom", "none");
  $(".tabs .tab2, .tabs .tab3").css("border-bottom", "1px solid #ccc");

  $(window).on("scroll", function () {
    //스크롤 값의 변화가 생기면 (스크롤 거리)
    var scroll = $(window).scrollTop();

    if (scroll > 10 && onoff == false) {
      $(".contentArea .contlist").hide();
      // 첫번째 탭 내용만 열어주기
      $(".contentArea .contlist:eq(0) #mapLab").hide();
      $(".contentArea .contlist:eq(0)").fadeIn("slow");

      onoff = true;
    }
  });

  //탭 클릭 처리

  $(".tabs .tab").click(function (e) {
    e.preventDefault();

    // 클릭시 해당 index를 뽑아준다
    var ind = $(this).index(".tabs .tab");

    $(".tabs .contlist").hide(); // 모든 탭 숨기기
    $(".contentArea .contlist .map2").hide();
    $(".tabs .contlist:eq(" + ind + ")").show(); //클릭한 해당 탭내용만 보이기
    $(".tab").css("background", "#f8f8f8").css("color", "#333"); //모든 탭메뉴를 비활성화
    $(this).css("background", "#fff").css("color", "#01abce"); // 클릭한 해당 탭메뉴만 활성화

    //비활성
    if (ind == 0) {
      $(".tab").css("background", "#f8f8f8").css("color", "#333");
      $(".tabs .tab_menu").css("border-bottom", "none");
      $(".tab2, .tab3").css("border-bottom", "1px solid #ccc");
    } else if (ind == 1) {
      $(".tab").css("background", "#f8f8f8").css("color", "#333");
      $(".tabs .tab_menu").css("border-bottom", "none");
      $(".tab1, .tab3").css("border-bottom", "1px solid #ccc");
    } else if (ind == 2) {
      $(".tab").css("background", "#f8f8f8").css("color", "#333");
      $(".tabs .tab_menu").css("border-bottom", "none");
      $(".tab1, .tab2").css("border-bottom", "1px solid #ccc");
    }

    //활성
    $(this).css("background", "#fff").css("color", "#01abce"); //첫번째 탭메뉴 활성화
    $(this).css("border-bottom", "none");
  });
});
