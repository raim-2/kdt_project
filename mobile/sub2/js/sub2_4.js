$(document).ready(function () {
  //객체배열(json)
  var memo = [{
      title: "스티렌 투엑스정",
      component: "애엽 95%, 에탄올연조엑스(20→1) 90mg",
      sub1: "급성위염, 만성위염 치료제",
      sub2: "1회 90mg을 1일 2회 식후 경구투여한다.",
    },
    {
      title: "그로트로핀주",
      component: "재조합인성장호르몬(소마트로핀) 4IU",
      sub1: "뇌하수체 성장호르몬 분비결핍으로 인한 왜소증 치료제",
      sub2: "이 약의 용법 및 용량은 환자마다 개별화 되어야 한다.",
    },
    {
      title: "박카스D",
      component: "타우린, 비타민 B 복합제",
      sub1: "영양보급 및 자양강장제",
      sub2: "15세 이상 성인 : 1일 1회 1병을 복용한다.",
    },
    {
      title: "모닝케어D",
      component: "GMT-ALC-5L 1,600mg, 밀크 씨슬",
      sub1: "더부룩한 숙취해소음료",
      sub2: "숙취유형에 맞는 제품을 선택해 음주전후 음용",
    },
  ];

  //전역변수로 빼기
  var ind = 0;
  var txt = "";

  //바뀌는 부분만
  function popchange() {
    $(".pop .popup img").attr(
      "src",
      "./images/content4/product0" + (ind + 1) + "_2.png"
    );
    txt = "";
    txt += "<dl>";
    txt += "<dt><span>제품명</span>" + memo[ind].title + "</dt>";
    txt += "<dd><span>성분</span>" + memo[ind].component + "</dd>";
    txt += "<dd><span>효능</span>" + memo[ind].sub1 + "</dd>";
    txt += "<dd><span>용법</span>" + memo[ind].sub2 + "</dd>";
    txt += "</dl>";
    $(".pop .popup .txt").html(txt);
  }

  $(".pop .pop_menu a").click(function (e) {
    e.preventDefault();

    ind = $(this).index(".pop .pop_menu a"); // 0 1 2 3

    //$(".pop_btn").fadeIn("slow");
    $(".pop .modal_box").fadeIn("fast");
    $(".pop .popup").fadeIn("slow");

    popchange();
  });

  $(".close_btn,.pop .modal_box").click(function (e) {
    e.preventDefault();
    $(".pop .modal_box").fadeOut("fast");
    $(".pop .popup").fadeOut("fast");
    // $(".pop_btn").fadeOut("fast");
  });

  //   $(".pop_btn a").click(function (e) {
  //     e.preventDefault();

  //     $(".pop .popup").hide().fadeIn("slow");

  //     if ($(this).hasClass("pre")) {
  //       // 3 2 1 0 3 2 1 0
  //       if (ind == 0) ind = memo.length; //4
  //       ind--; // 4에서 1개 빼므로 3이 됨
  //       popchange();
  //     } else if ($(this).hasClass("next")) {
  //       // 0 1 2 3 0 1 2 3
  //       if (ind == memo.length - 1) ind = -1; // 조건이 3이라면  ind는 -1
  //       ind++; // -1에서 +1 이므로 0이 됨
  //       popchange();
  //     }
  //   });
});