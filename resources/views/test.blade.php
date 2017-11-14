@extends('layouts.app')

@section('content')
<?php
$myVarValue = [18.796143,98.979263];
?>
<div id="map_canvas" style="height: 300px; width: 100%;"></div>
<?php
for ($i=0; $i < 2;$i++){
    echo '<div class="singleMap" id="allMaps_'.$i.'"></div>';
}
?>

@endsection
@section('googlemap')
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOu-BjBwPObD2LS7AjqxkcQ_tt_zQ9A10&libraries=places&callback=initialize"></script>
 <script>
    var myvar = <?php echo json_encode($myVarValue); ?>;
    var map2;
var global_markers = [];    
var markers = [[37.09024, -95.712891, 'trialhead0'], [-14.235004, -51.92528, 'trialhead1'], [-38.416097, -63.616672, 'trialhead2']];
function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(myvar[0],myvar[1]);
    var myOptions = {
        zoom: 12,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map2 = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    var infowindow = new google.maps.InfoWindow({});
    for (var i = 0; i < markers.length; i++) {
        // obtain the attribues of each marker
        var lat = parseFloat(markers[i][0]);
        var lng = parseFloat(markers[i][1]);
        var trailhead_name = markers[i][2];

        var myLatlng = new google.maps.LatLng(lat, lng);

        var contentString = "<html><body><div><p><h2>" + trailhead_name + "</h2></p></div></body></html>";

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map2,
            title: "Coordinates: " + lat + " , " + lng + " | Trailhead name: " + trailhead_name
        });

        marker['infowindow'] = contentString;

        global_markers[i] = marker;

        google.maps.event.addListener(global_markers[i], 'click', function() {
            infowindow.setContent(this['infowindow']);
            infowindow.open(map2, this);
        });
    }
    var Chiang_mai = new google.maps.LatLng(18.796143, 98.979263);
    var mapList = "";
    //var abc= 0;
    var start_array = [ ["18.808217", "98.954631"],["16.808217", "100"]];
    var end_array = [ ["18.769325", "98.976480"],["17.08217", "102"]];
    for (i = 0; i < 2; i++) {
        var start = new google.maps.LatLng(start_array[i][0],start_array[i][1]);
        var end = new google.maps.LatLng(end_array[i][0],end_array[i][1]); 
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();
        //abc = i;
        //var name = '#allMaps_'+ abc +'_';
        //$(name).append('<div class="singleMap" id="map_' + i + '"></div>');
        var mapOptions = {
            center: Chiang_mai,
            zoom: 12
        };
        var map = new google.maps.Map(document.getElementById("allMaps_"+i), mapOptions);
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay,start,end);
    }
    
}




function calculateAndDisplayRoute(directionsService, directionsDisplay,start,end) {
    
    
    directionsService.route({
      origin: start,
      destination: end,
      optimizeWaypoints: true,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
        var route = response.routes[0];
        var summaryPanel = document.getElementById('directions-panel');
        summaryPanel.innerHTML = '';
        // For each route, display summary information.
        for (var i = 0; i < route.legs.length; i++) {
          var routeSegment = i + 1;
          /*summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
              '</b><br>';
          summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
          summaryPanel.innerHTML += route.legs[i].end_address + '<br>';*/
          summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
        }
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
window.onload = initialize;
 </script>
@endsection