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

<<<<<<< HEAD
    // This event listener calls addMarker() when the map is clicked.
=======

>>>>>>> 5d5881336e22aca8a5970f5abb0f74d2e17d809e
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
