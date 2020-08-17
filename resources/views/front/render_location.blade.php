<div class="map" id="map" style="height: 450px; visible: none; overflow: hidden"></div>
<script>

initMap(parseFloat("{{ $facility->latitude }}"), parseFloat("{{ $facility->longitude }}"));

var marker;
function initMap(lat, lng) {
    console.log(lat, lng);
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 16,
center: {lat: lat, lng: lng}
});
var geocoder = new google.maps.Geocoder();
// geocodeAddress(geocoder, map);

if(marker && marker.setMap)
{
marker.setMap(null);
}

// resultsMap.setCenter(results[0].geometry.location);
marker = new google.maps.Marker({
map: map,
position: {lat: lat, lng: lng}
});

}

function geocodeAddress(geocoder, resultsMap) {
var address = document.getElementById('address').value;
geocoder.geocode({'address': address}, function(results, status) {
if (status === 'OK') {
if(marker && marker.setMap)
{
marker.setMap(null);
}

resultsMap.setCenter(results[0].geometry.location);
marker = new google.maps.Marker({
map: resultsMap,
position: results[0].geometry.location
});
}
});
}
</script>
