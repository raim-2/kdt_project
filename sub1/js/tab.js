// 지도 tab
  var onoff = false;
  var clickedTab = false;
  var ind = $('.tabs .tab').index(".tabs .tab");

  //첫번째 탭메뉴 활성화
  $(".tabs .tab1").css("background", "#fff").css("color", "#01abce");

  $(".tabs .tab_menu").css("border-bottom", "none");
  $(".tabs .tab2, .tabs .tab3").css("border-bottom", "1px solid #ccc");

  //탭 클릭 없이 스크롤 했을 때
  $(window).on("scroll", function (e) {
    e.preventDefault();
    //스크롤 값의 변화가 생기면 (스크롤 거리)
    var scroll = $(window).scrollTop();

    if (scroll > 10 && onoff == false && clickedTab == false) {
      $(".contentArea .contlist").hide();
      $(".contentArea .contlist:eq(0) .map2").hide();
      $(".contentArea .contlist .summary").hide();

      // 첫번째 탭 내용만 열어주기
      $(".contentArea .contlist:eq(0)").fadeIn("slow");
      $(".contentArea .contlist:eq(0) .summary").fadeIn("slow");

      onoff = true;
    }
  });

  //탭 클릭 처리 (탭 클릭 후 스크롤 했을 떄)

  $(".tabs .tab").click(function (e) {
    e.preventDefault();
    clickedTab = true; //탭 클릭 후 스크롤 위해 지정
    ind = $(this).index(".tabs .tab");

    $(".contentArea .contlist").hide();
    $(".contentArea .contlist .map2").hide();
    $(".contentArea .contlist .summary").hide();
    $(".contentArea .contlist:eq(" + ind + ")").fadeIn("slow");
    $(".tabs .contlist:eq(" + ind + ") .summary").show();
    
    //탭 css 처리 
    $(".tab").css("background", "#f8f8f8").css("color", "#333"); //모든 탭메뉴를 비활성화
    $(this).css("background", "#fff").css("color", "#01abce"); // 클릭한 해당 탭메뉴만 활성화
  
    //탭 메뉴 css 비활성
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

    //탭 메뉴 css 활성
    $(this).css("background", "#fff").css("color", "#01abce"); //첫번째 탭메뉴 활성화
    $(this).css("border-bottom", "none");

    //버튼1, 버튼 2로 데이터 변경 후 탭 클릭할 때
    let span_text = $(".section0"+(ind+1)+" .btn"+(ind+1)+" span");

    if($(span_text).text() == '본사 위치' || $(span_text).text() == '천안공장 위치') {
       $(".contentArea .contlist:eq(" + ind + ") .map2").fadeIn("slow");
    }
  });
