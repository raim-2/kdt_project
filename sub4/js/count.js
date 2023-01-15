/*숫자 자동입력*/

// 전력
//var memberCountConTxt= [134,120,100];
//var count = $(".result ul li span:eq(1)").
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
