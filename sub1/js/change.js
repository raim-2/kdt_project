var dt = document.querySelector("dt");
var dd = document.querySelector("dd");

var sec02 = document.querySelector(".section02");
var dt2 = sec02.querySelector("dt");
var dd2 = sec02.querySelector("dd");

var cnt = 1;
var cnt2 = 1;

var mapinfo = [
  {
    name: "동아ST 본사",
    address: "서울특별시 동대문구 천호대로 64",
    id: "mapHead",
  },
  {
    name: "연구소",
    address: "용인시 기흥구 금화로 105번길 21",
    id: "mapLab",
  },
  {
    name: "천안공장",
    address: "천안시 서북구 백석공단1로 200-23",
    id: "mapCheonan",
  },
  {
    name: "달성공장",
    address: "대구시 달성군 논공읍 논공로 493",
    id: "mapDalseong",
  },
];

$('.btn1').click(function(e) {
  e.preventDefault();
  console.log(cnt)
  cnt++;

  if (cnt % 2 == 0) {
    dt.innerText = mapinfo[1].name;
    dd.innerText = mapinfo[1].address;
    $("#mapHead").css("display", "none");
    $("#mapLab").css("display", "block");
    $(this).find("span").text("본사 위치");
  } else if (cnt % 2 == 1) {
    dt.innerText = mapinfo[0].name;
    dd.innerText = mapinfo[0].address;
    $("#mapHead").css("display", "block");
    $("#mapLab").css("display", "none");
    $(this).find("span").text("연구소 위치");
  }
})

$('.btn2').click(function(e) {
  e.preventDefault();
  cnt2++;

  if (cnt2 % 2 == 0) {
    dt2.innerText = mapinfo[3].name;
    dd2.innerText = mapinfo[3].address;
    $("#mapCheonan").css("display", "none");
    $("#mapDalseong").css("display", "block");
    $(this).find("span").text("천안공장 위치");
  } else if (cnt2 % 2 == 1) {
    dt2.innerText = mapinfo[2].name;
    dd2.innerText = mapinfo[2].address;
    $("#mapCheonan").css("display", "block");
    $("#mapDalseong").css("display", "none");
    $(this).find("span").text("달성공장 위치");
  }
})