//faq 세로아코디언

var faqList = $(".faq .faqList"); //모든 질문 답변 리스트
faqList.find(".a").slideUp(100); // 모든 답변 off
faqList.find("span").html('<i class="fas fa-chevron-down"></i>');

$(".faq .faqList:first").find(".q a:not(span)").css("color", "#01abce");
$(".faq .faqList:first").find(".a").slideDown(100);
$(".faq .faqList:first").find("span").html('<i class="fas fa-chevron-up"></i>');

$(".faq .faqList .trigger").click(function (e) {
  e.preventDefault();
  var myfaqList = $(this).parents(".faqList"); //클릭한 해당 list

  if (myfaqList.hasClass("hide")) {
    faqList.find(".a").slideUp(100); //모든 답변을 닫아라
    faqList.removeClass("show").addClass("hide"); // 모든 리스트를 hide교체
    faqList.find(".q a:not(span)").css("color", "#333");
    faqList.find("span").html('<i class="fas fa-chevron-down"></i>');

    myfaqList.removeClass("hide").addClass("show"); // show로 바꾼다
    myfaqList.find(".a").slideDown(100); //해당 리스트의 답변을 열어라
    myfaqList.find(".q a:not(span)").css("color", "#01abce");
    myfaqList.find("span").html('<i class="fas fa-chevron-up"></i>');
  } else {
    // 'show' 답변이 열려있냐??
    myfaqList.removeClass("show").addClass("hide"); // hide로 바꾼다
    myfaqList.find(".a").slideUp(100); //해당 리스트의 답변을 닫아라
    myfaqList.find(".q a:not(span)").css("color", "#333");
    myfaqList.find("span").html('<i class="fas fa-chevron-down"></i>');
  }
});

//모두 여닫기 처리

$(".all").toggle(
  function (e) {
    e.preventDefault();

    faqList.find(".a").slideDown(100);
    faqList.removeClass("hide").addClass("show");
    faqList.find(".q a").css("color", "#01abce");
    faqList.find("span").html('<i class="fas fa-chevron-up"></i>');
    $(this).text("모두 닫기");
    $(this).css("background", "#01abce");
  },
  function (e) {
    e.preventDefault();
    faqList.find(".a").slideUp(100);
    faqList.removeClass("show").addClass("hide");
    faqList.find(".q a").css("color", "#333");
    faqList.find("span").html('<i class="fas fa-chevron-down"></i>');
    $(this).text("모두 열기");
    $(this).css("background", "rgba(1, 171, 206, 0.8)");
  }
);
