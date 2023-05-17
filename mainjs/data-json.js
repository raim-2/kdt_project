var xhr = new XMLHttpRequest(); // XMLHttpRequest 객체를 생성한다.
var cnt = 0; // 0 1 2 3
var total = 0; //객체배열의 총개수

function ok(i) {
  var newContent = "";

  newContent += "<ul>";
  newContent += "<li class=newList>";

  newContent += '<div class="newLeftSide">';
  newContent += '<span class="eName">' + responseObject.newProducts[i].engName + "</span>";
  newContent += "<dl>";
  newContent += "<dt>" + responseObject.newProducts[i].korName + "</dt>";
  newContent += "<dd>" + responseObject.newProducts[i].info + "</dd>";
  newContent += "<dd>" + responseObject.newProducts[i].effect + "</dd>";
  newContent += "</dl>";
  newContent += '<span class="more"><a href="' + responseObject.newProducts[i].address + '" title="' + responseObject.newProducts[i].korName + ' 더보기' + '" >View more</a></span>';
  newContent += "</div>";

  newContent += '<div class="newRightSide">';
  newContent += '<img src="' + responseObject.newProducts[i].img + '" alt="' + responseObject.newProducts[i].korName + '">';
  newContent += '<img src="./images/circle.png" alt="" />';
  newContent += "<span>" + responseObject.newProducts[i].num + "</span>";
  newContent += "</div>";

  newContent += "</li>";
  newContent += "</ul>";

  document.getElementById("ajaxContent").innerHTML = newContent;
}

xhr.onload = function () {
  // When readystate changes

  if (xhr.status === 200) {
    // If server status was ok
    responseObject = JSON.parse(xhr.responseText); //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
    // parse() 메소드를 호출하여 자바스크립트 객체배열로 변환한다.
    total = responseObject.newProducts.length; //
    //console.log(total);
    ok(cnt); //함수호출
  }
};

document.getElementById("next").onclick = function () {
  cnt++; // 0 1 2 3  0 1 2 3
  if (cnt == total) cnt = 0;
  //console.log(cnt);
  ok(cnt);
};

document.getElementById("back").onclick = function () {
  cnt--; // 3 2 1 0 3 2 1 0
  if (cnt < 0) cnt = total - 1;
  //console.log(cnt);
  ok(cnt);
};

xhr.open("GET", "./maindata/data.json", true); // 요청을 준비한다.
xhr.send(null); // 요청을 전송한다
