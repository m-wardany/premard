var coordinates = $('#coordinates').val().split(',');
var lat = coordinates[0];
var lng = coordinates[1];
if(lat == undefined || lat == "")
    lat = 31.95487515559715;
if(lng == undefined)
    lng = 35.94671135046383;

var latlng = new google.maps.LatLng(lat,lng);
$('#coordinates').val(lat+','+lng);
var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 15,
  center: latlng
});

var marker = new google.maps.Marker({
    position: latlng,
//    icon:"/../images/mapMarker.png",
    draggable: true  
});
marker.setMap(map);
google.maps.event.addListener(marker, 'dragend', function(evt){
    $('#coordinates').val(evt.latLng.lat()+','+evt.latLng.lng());
});
//https://cdn0.iconfinder.com/data/icons/weboo-2/512/pin.png