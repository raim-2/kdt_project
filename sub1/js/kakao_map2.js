window.onload = function () {
  var container = document.getElementById("mapHead");
  var options = {
    center: new daum.maps.LatLng(37.57360969999977, 127.03000899999947),
    level: 2,
  };

  var map = new daum.maps.Map(container, options);

  var mapTypeControl = new daum.maps.MapTypeControl();
  map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

  var zoomControl = new daum.maps.ZoomControl();
  map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);

  var markerPosition = new daum.maps.LatLng(
    37.57360969999977,
    127.03000899999947
  );
  var marker = new daum.maps.Marker({
    position: markerPosition,
  });

  marker.setMap(map);

  var overlay = new daum.maps.CustomOverlay({
    map: map,
    position: marker.getPosition(),
  });

  //두번째 맵

  var container2 = document.getElementById("mapCheonan");
  var options2 = {
    center: new daum.maps.LatLng(36.84000350000009, 127.10994110000003),
    level: 2,
  };

  var map2 = new daum.maps.Map(container2, options2);

  var mapTypeControl2 = new daum.maps.MapTypeControl();
  map2.addControl(mapTypeControl2, daum.maps.ControlPosition.TOPRIGHT);

  var zoomControl2 = new daum.maps.ZoomControl();
  map2.addControl(zoomControl2, daum.maps.ControlPosition.RIGHT);

  var markerPosition2 = new daum.maps.LatLng(
    36.84000350000009,
    127.10994110000003
  );
  var marker2 = new daum.maps.Marker({
    position: markerPosition2,
  });

  marker2.setMap(map2);

  var overlay2 = new daum.maps.CustomOverlay({
    map: map2,
    position: marker2.getPosition(),
  });

  //세번째 맵

  var container3 = document.getElementById("mapLab");
  var options3 = {
    center: new daum.maps.LatLng(37.264730400000175, 127.10723569999998),
    level: 2,
  };

  var map3 = new daum.maps.Map(container3, options3);

  var mapTypeControl3 = new daum.maps.MapTypeControl();
  map3.addControl(mapTypeControl3, daum.maps.ControlPosition.TOPRIGHT);

  var zoomControl3 = new daum.maps.ZoomControl();
  map3.addControl(zoomControl3, daum.maps.ControlPosition.RIGHT);

  var markerPosition3 = new daum.maps.LatLng(
    37.264730400000175,
    127.10723569999998
  );
  var marker3 = new daum.maps.Marker({
    position: markerPosition2,
  });

  marker3.setMap(map3);

  var overlay3 = new daum.maps.CustomOverlay({
    map: map3,
    position: marker3.getPosition(),
  });

  //네번째 맵

  var container4 = document.getElementById("mapDalseong");
  var options4 = {
    center: new daum.maps.LatLng(35.739694499999835, 128.46433119999958),
    level: 2,
  };

  var map4 = new daum.maps.Map(container4, options4);

  var mapTypeControl4 = new daum.maps.MapTypeControl();
  map4.addControl(mapTypeControl4, daum.maps.ControlPosition.TOPRIGHT);

  var zoomControl4 = new daum.maps.ZoomControl();
  map4.addControl(zoomControl2, daum.maps.ControlPosition.RIGHT);

  var markerPosition4 = new daum.maps.LatLng(
    35.739694499999835,
    128.46433119999958
  );
  var marker4 = new daum.maps.Marker({
    position: markerPosition2,
  });

  marker4.setMap(map4);

  var overlay2 = new daum.maps.CustomOverlay({
    map: map4,
    position: marker4.getPosition(),
  });
};
