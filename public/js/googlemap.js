var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var labelIndex = 0;
var markerarray = [];

function initMap() {
    var map = new google.maps.Map(document.getElementById('maptab_1'), {
        center: {
            lat: 13.7251088,
            lng: 100.3529055,
        },
        zoom: 6,
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,

            };
            map.setCenter(pos);
            map.setZoom(12);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(
        input, {
            placeIdOnly: true
        });
    autocomplete.bindTo('bounds', map);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var geocoder = new google.maps.Geocoder;
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();

        if (!place.place_id) {
            return;
        }
        geocoder.geocode({
            'placeId': place.place_id
        }, function (results, status) {

            if (status !== 'OK') {
                window.alert('Geocoder failed due to: ' + status);
                return;
            }
            map.setZoom(11);
            map.setCenter(results[0].geometry.location);
        });
    });

    // This event listener calls addMarker() when the map is clicked.
    google.maps.event.addListener(map, 'click', function (event) {
        if (markerarray != null) {
            markerarray.forEach(function (marker) {
                marker.setMap(null);
            });
            markerarray = [];
        }
        addMarker(event.latLng, map);
    });
}

// Adds a marker to the map.
function addMarker(location, map) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    markerarray.push(new google.maps.Marker({
        position: location,
        // label: labels[labelIndex++ % labels.length],
        map: map,
    }));

    $('#latitude').val(location.lat());
    $('#longitude').val(location.lng());
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}


var map2;
var global_markers = [];    
var markers = [[37.09024, -95.712891, 'trialhead0'], [-14.235004, -51.92528, 'trialhead1'], [-38.416097, -63.616672, 'trialhead2']];



function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(40.77627, -73.910965);
    var myOptions = {
        zoom: 1,
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


function initMap() {
   
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