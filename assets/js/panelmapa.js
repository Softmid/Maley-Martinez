var map;
var geocoder;
var marker;
var lat = $('#lat').val();
var lng = $('#lng').val();

function initialize() 
{
  if(lat == null && lng == null)
  {
    lat = 20.979721;
    lng = -89.615789;
    zoomap = 11;
  }
  var latlng = new google.maps.LatLng(lat, lng);
  var myOptions = {
    zoom: zoomap,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP 
  };
  map = new google.maps.Map(document.getElementById("map-canvas"),
      myOptions);
  geocoder = new google.maps.Geocoder();
  marker = new google.maps.Marker({
    position: latlng, 
    map: map
  });

  map.streetViewControl=false;

  google.maps.event.addListener(map, 'click', function(event) {
  marker.setPosition(event.latLng);

  var yeri = event.latLng;
  document.getElementById('lat').value=yeri.lat().toFixed(6);
  document.getElementById('lng').value=yeri.lng().toFixed(6);
  });


  google.maps.event.addListener(map, 'mousemove', function(event) {
    var yeri = event.latLng;
    document.getElementById("mlat").value = yeri.lat().toFixed(6);
    document.getElementById("mlng").value = yeri.lng().toFixed(6);
  });

  google.maps.event.addListener(map, 'zoom_changed', function() {
    var zoomLevel = map.getZoom();
    map.setCenter(latlng);
    document.getElementById("zoom").value = zoomLevel;
  });
}

function codeAddress() 
{
  var address = document.getElementById("gadres").value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      document.getElementById('lat').value=results[0].geometry.location.lat().toFixed(6);
      document.getElementById('lng').value=results[0].geometry.location.lng().toFixed(6);
  var latlong = "(" + results[0].geometry.location.lat().toFixed(6) + " , " +
  + results[0].geometry.location.lng().toFixed(6) + ")";

  var infowindow = new google.maps.InfoWindow({
      content: latlong
  });

  marker.setPosition(results[0].geometry.location);
  map.setZoom(16);

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

    } else {
      alert("Lat and long cannot be found.");
    }
  });

}
google.maps.event.addDomListener(window, 'load', initialize);