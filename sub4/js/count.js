/*숫자 자동입력*/
// 전력
let result = document.querySelector(".result img");
let count = document.querySelector(".result ul");
// let resultScorllHeight = window.pageYOffset + result.getBoundingClientRect().top + 150;
let resultScorllHeight = result.offsetTop + 100;
let countScrollHeight = count.offsetTop;

 window.addEventListener("scroll", scrollEvent)

 function scrollEvent() {
  var scroll = $(window).scrollTop(); //스크롤 top의 높이
  //$(".topText").text(scroll); //스크롤 좌표의 값
  let onoff = false;

  if (scroll > resultScorllHeight && scroll <= countScrollHeight) {
    count1();
    onoff = true;
  }

  if (onoff == true) {
    window.removeEventListener("scroll",scrollEvent);
  }
};

function count1 () {
//전력 사용량 감소
var memberCountConTxt = 134;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count1").text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count1").text(number);
    },
  }
);


// 온실가스
memberCountConTxt = 120;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count2").text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count2").text(number);
    },
  }
);

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "");
}


//용수
memberCountConTxt = 100;

$({ val: 0 }).animate(
  { val: memberCountConTxt },
  {
    duration: 2000,
    step: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count3").text(number);
    },
    complete: function () {
      var number = numberWithCommas(Math.floor(this.val));
      $(".count3").text(number);
    },
  }
);
}