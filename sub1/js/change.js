var dt = document.querySelector("dt");
var dd = document.querySelector("dd");
var btn = document.querySelector(".btn");
// var mapid = document.getElementById("mapHead");

var sec02 = document.querySelector(".section02");
var dt2 = sec02.querySelector("dt");
var dd2 = sec02.querySelector("dd");
var btn2 = sec02.querySelector(".btn2");
// var mapid2 = sec02.querySelector("#mapCheonan");

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

function change(event) {
  event.preventDefault();
  cnt++;

  if (cnt % 2 == 0) {
    dt.innerText = mapinfo[1].name;
    dd.innerText = mapinfo[1].address;
    // mapid.id = mapinfo[1].id;
    $("#mapHead").css("display", "none");
    $("#mapLab").css("display", "block");
    $(".summary dd span").text("본사 위치");
  } else if (cnt % 2 == 1) {
    dt.innerText = mapinfo[0].name;
    dd.innerText = mapinfo[0].address;
    // mapid.id = mapinfo[0].id;
    $("#mapHead").css("display", "block");
    $("#mapLab").css("display", "none");
    $(".summary dd span").text("연구소 위치");
  }
}

function change2(event) {
  event.preventDefault();
  cnt2++;

  if (cnt2 % 2 == 0) {
    dt2.innerText = mapinfo[3].name;
    dd2.innerText = mapinfo[3].address;
    // mapid2.id = mapinfo[3].id;
    $("#mapCheonan").css("display", "none");
    $("#mapDalseong").css("display", "block");
    $(".summary dd span").text("천안공장 위치");
  } else if (cnt2 % 2 == 1) {
    dt2.innerText = mapinfo[2].name;
    dd2.innerText = mapinfo[2].address;
    // mapid2.id = mapinfo[2].id;
    $("#mapCheonan").css("display", "block");
    $("#mapDalseong").css("display", "none");
    $(".summary dd span").text("달성공장 위치");
  }
}

btn.addEventListener("click", change);
btn2.addEventListener("click", change2);
