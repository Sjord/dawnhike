$.getJSON('route.php?year=2013', function (data) {
    a = data;
    avgLat = data.reduce(function (v, e) { return v + e.lat }, 0) / data.length;
    avgLon = data.reduce(function (v, e) { return v + e.lon }, 0) / data.length;

    function initialize() {
      var mapOptions = {
        zoom: 13,
        center: new google.maps.LatLng(avgLat, avgLon),
        mapTypeId: google.maps.MapTypeId.TERRAIN
      };

      var map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

      
      var flightPlanCoordinates = data.map(function (elem) { return new google.maps.LatLng(elem.lat, elem.lon); });
      var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });

      flightPath.setMap(map);
    }

    initialize();
});

