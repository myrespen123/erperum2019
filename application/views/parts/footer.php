

<footer class="site-footer setting-bg" style="background-image: url('<?php echo base_url('file/main/images/'.$footer->foto) ?>');">
	<div class="container">
		<div class="row">
			<div class="footer-left col-lg-3 col-md-6">
				<h5 class="footer-comp-name"><?php echo $row_set->nama_website ?></h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					</p>
			</div>
			<div class="footer-center col-lg-3 col-md-6">
				<h5 class="footer-title">KONTAK KAMI</h5>
					<p>
						<i class="fa fa-map-marker"></i>
							<span class="m-s-10"><?php echo $row_set->alamat_setting; ?></span>
					</p>
					<p>
						<i class="fa fa-phone"></i>
							<span class="m-s-10">+<?php echo $row_set->telepon_setting; ?></span>
					</p>
					<p>
						<i class="fa fa-envelope"></i>
							<span class="m-s-10"><?php echo $row_set->email_setting; ?></span>
					</p>
					<p>
						<i class="fa fa-clock-o"></i>
							<span class="m-s-10"><?php echo $row_set->jam_setting; ?></span>
					</p>
			</div>
			<div class="footer-link col-lg-3 col-md-6">
				<h5 class="footer-title">LINK TERKAIT</h5>
					<div class="link-foot">
						<a href="#">Perumahan</a>
						<a href="#">Pengembang</a>
						<a href="#">Tentang Kami</a>
						<a href="#">Kontak Kami</a>
					</div>
			</div>
			<div class="footer-map col-lg-3 col-md-6">
				<h5 class="footer-title">MAP</h5>
					<div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.690436310542!2d117.17929669269651!3d-0.4587439940657388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df5d6033b793f91%3A0xe380dade32764edd!2sKantor+PUPR+Samarinda!5e0!3m2!1sen!2sid!4v1551336206157" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="foot-copyright">
				<p>Copyright &copy; 2018 TIM IT Disperkim</p>
			</div>
		</div>
	</div>
</footer>

<!-- close main section -->

<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script src="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.js') ?>"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<script data-require="leaflet@0.7.3" data-semver="0.7.3" src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
<!-- <script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
		var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11'
	});
</script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
var coordinates = document.getElementById('coordinates');
var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v9',
	center: [117.1390896492361, -0.501658926389112],
	zoom: 12 
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

map.addControl(new mapboxgl.FullscreenControl());
</script> -->
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

</body>
</html>