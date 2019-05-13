<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

							<pre id='coordinates' class='coordinates'></pre>
								<div id='output' class='ui-control'>
								  Click: <code id='click'></code><br/>
								  Mousemove: <code id='mousemove'></code><br/>
								</div>
								<pre id='info'></pre>
								<input type="" id="lang" name="">
								<input type="" id="lat" name="">
</body>
</html>

<!-- show user -->

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
var coordinates = document.getElementById('coordinates');
var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v9',
	center: [117.1390896492361, -0.501658926389112],
	zoom: 9 
});
 
map.on('click', function (e) {
	document.getElementById('info').innerHTML =
	JSON.stringify(e.point) + '<br />' +
	JSON.stringify(e.lngLat);

	var wrapped = e.lngLat.wrap();

	document.getElementById("lang").value = wrapped.lng;
	document.getElementById("lat").value = wrapped.lat;

});

var lang = 117.1390896492361;
var lat = -0.501658926389112;

var marker = new mapboxgl.Marker()
.setLngLat([lang, lat])
.addTo(map);
</script>








<!-- nge drag for bekend -->

<script type="text/javascript">
	// mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
// var coordinates = document.getElementById('coordinates');
// var map = new mapboxgl.Map({
// container: 'map',
// style: 'mapbox://styles/mapbox/streets-v9',
// center: [117.1390896492361, -0.501658926389112],
// zoom: 10
// });


 
// var marker = new mapboxgl.Marker({
// draggable: true
// })
// .setLngLat([117.1390896492361, -0.501658926389112])
// .addTo(map);
 
// function onDragEnd() {
// 	var lngLat = marker.getLngLat();
// 	coordinates.style.display = 'block';
// 	coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
// }
 
// marker.on('dragend', onDragEnd);
</script>

<!-- USERS INPUT MAP -->
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
var coordinates = document.getElementById('coordinates');
var lang = <?= $row->longitude; ?>;
var lat = <?= $row->latitude; ?>;
var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v9',
	center: [lang, lat],
	zoom: 15
});

map.on('click', function (e) {
	document.getElementById('info').innerHTML =
	JSON.stringify(e.point) + '<br />' +
	JSON.stringify(e.lngLat);

	var wrapped = e.lngLat.wrap();

	$('.mapboxgl-marker').addClass("marked");
	document.getElementById("lang").value = wrapped.lng;
	document.getElementById("lat").value = wrapped.lat;
	
	// var marker = new mapboxgl.Marker()
	var marker = new mapboxgl.Marker({
	draggable: true
	})
	.setLngLat([wrapped.lng, wrapped.lat])
	.addTo(map);
	function onDragEnd() {
	var lngLat = marker.getLngLat();
	coordinates.style.display = 'block';
	coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
	document.getElementById("lang").value = lngLat.lng;
	document.getElementById("lat").value = lngLat.lat;
}
 
marker.on('dragend', onDragEnd);

$('.marked').css('display', 'none');

});
// var marker = new mapboxgl.Marker({
// draggable: true
// })
// .setLngLat([117.1390896492361, -0.501658926389112])
// .addTo(map);
 
// function onDragEnd() {
// 	var lngLat = marker.getLngLat();
// 	coordinates.style.display = 'block';
// 	coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
// }
 
// marker.on('dragend', onDragEnd);



map.addControl(new mapboxgl.FullscreenControl());
</script>