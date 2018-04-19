<html>
<head>
</head>
<style>
#right-panel {
  font-family: 'Roboto', 'sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel select,
#right-panel input {
  font-size: 15px;
}

#right-panel select {
  width: 100%;
}

#right-panel i {
  font-size: 12px;
}

html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#map {
  height: 100%;
  float: left;
  width: 63%;
  height: 100%;
}

#right-panel {
  float: right;
  width: 34%;
  height: 100%;
}

.panel {
  height: 100%;
  overflow: auto;
}

</style>
<body>

  <div id="map"></div>
  <div id="right-panel">
    <p>Total Distance: <span id="total"></span></p>
  </div>
  <span id="total2">

  </span>
  <!-- Replace the value of the key parameter with your own API key. -->

  <?php
echo '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ8RCyEygyP3FOVYBaFz1XgATsxuFewgI&callback=initMap">


</script>';
   ?>
<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: {
      lat: -24.345,
      lng: 134.46
    } // Australia.
  });

  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer({
    draggable: true,
    map: map,
    panel: document.getElementById('right-panel')
  });

  directionsDisplay.addListener('directions_changed', function() {
    computeTotalDistance(directionsDisplay.getDirections());
  });

  displayRoute('Perth, WA', 'Queensland', directionsService,
    directionsDisplay);
}

function displayRoute(origin, destination, service, display) {
  service.route({
    origin: origin,
    destination: destination,
    travelMode: 'DRIVING',
    avoidTolls: true
  }, function(response, status) {
    if (status === 'OK') {
      display.setDirections(response);
      console.log(response);

    } else {
      alert('Could not display directions due to: ' + status);
    }
  });
}

function computeTotalDistance(result) {
  var total = 0;
  var myroute = result.routes[0];
 var j=20;

  for (var i = 0; i < myroute.legs.length; i++) {

   total += myroute.legs[i].distance.value;
for(var k=0;k<myroute.legs[i].steps.length;k++){
//  alert( strip_html_tags(myroute.legs[i].steps[k].instructions));
    console.log(strip_html_tags(myroute.legs[i].steps[k].distance.value));

}

  }
  total = total / 1000;
  document.getElementById('total').innerHTML = total + ' km';
}

function strip_html_tags(str)
{
   if ((str===null) || (str===''))
       return false;
  else
   str = str.toString();
  return str.replace(/<[^>]*>/g, '');
}


</script>
</body>

</html>
