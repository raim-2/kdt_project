// JavaScript Document
$(document).ready(function () {
  var article = $(".faq .article"); //모든 질문 답변 리스트
  //article.find('.a').slideUp(100); // 모든 답변 닫아라
  article.find("span").html('<i class="fas fa-chevron-down"></i>');
  //$(".faq .all").html('리스트 모두 열기  <i class="fas fa-chevron-down"></i>')
  $(".faq .article:first").find(".q a").css("color", "#01abce");
  $(".faq .article:first").find(".a").slideDown(100);
  $(".faq .article:first")
    .find("span")
    .html('<i class="fas fa-chevron-up"></i>');

  $(".faq .article .trigger").click(function (e) {
    // 각각의 질문을 클릭하면
    e.preventDefault(); //<a href="#"> 태그 링크 처리
    var myArticle = $(this).parents(".article"); //클릭한 해당 list

    if (myArticle.hasClass("hide")) {
      //클릭한 해당 리스트의 상태가 hide냐?? 답변이 닫혀있냐??
      article.find(".a").slideUp(100); //모든 답변을 닫아라
      article.removeClass("show").addClass("hide"); // 모든 리스트를 hide교체
      article.find(".q a").css("color", "#333");
      article.find("span").html('<i class="fas fa-chevron-down"></i>');

      myArticle.removeClass("hide").addClass("show"); // show로 바꾼다
      myArticle.find(".a").slideDown(100); //해당 리스트의 답변을 열어라
      myArticle.find(".q a").css("color", "#01abce");
      myArticle.find("span").html('<i class="fas fa-chevron-up"></i>');
    } else {
      // 'show' 답변이 열려있냐??
      myArticle.removeClass("show").addClass("hide"); // hide로 바꾼다
      myArticle.find(".a").slideUp(100); //해당 리스트의 답변을 닫아라
      myArticle.find(".q a").css("color", "#333");
      myArticle.find("span").html('<i class="fas fa-chevron-down"></i>');
    }
  });

  //모두 여닫기 처리

  $(".all").toggle(
    function (e) {
      e.preventDefault();

      article.find(".a").slideDown(100);
      article.removeClass("hide").addClass("show");
      article.find(".q a").css("color", "#01abce");
      article.find("span").html('<i class="fas fa-chevron-up"></i>');
      $(this).text('리스트 모두 닫기')
      $(this).css('background', '#01abce url(./images/content1/select_u.png) 160px center no-repeat')

    },
    function (e) {
      e.preventDefault();
      article.find(".a").slideUp(100);
      article.removeClass("show").addClass("hide");
      article.find(".q a").css("color", "#333");
      article.find("span").html('<i class="fas fa-chevron-down"></i>');
      $(this).text('리스트 모두 열기')
      $(this).css('background', '#01abce url(./images/content1/select_d.png) 160px center no-repeat')
    }
  );
});