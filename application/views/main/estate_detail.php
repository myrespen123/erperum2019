<?php $this->load->view('parts/header-sect'); ?>

<main class="properties-detils">
	<div class="title-properties2 clean-nav">
		<h1>Perumahan Perumahan</h1>
	</div>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to=""></li>
		</ol>
		<div class="carousel-inner">
				<div class="carousel-item slide-properties active">
					<img class="d-block w-100" src="<?php echo base_url('file/perumahan/estate/home_slider_1.jpg'); ?>" alt="First slide">
				</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<div class="button-prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			</div>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<div class="button-prev">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
			</div>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="prop-describe">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="title-left">
						<label>Pengembang</label>
					</div>
					<div class="pengembang-profile">
						<div class="pengembang-img">
							<img src="<?php echo base_url('file/pengembang/images/willsmith_actor.jpg'); ?>">
							<!-- <img src="<?php echo base_url('assets/img/pplwapple.jpg') ?>"> -->
						</div>
						<div class="pengembang-describe">
							<a class="pengembang-name" href="">
								<h4>Nama Oengembnag</h4>
							</a>
							<p>
								<i class="fa fa-phone"></i>
									<span class="m-s-5">+8909089090890</span>
							</p>
							<p>
								<i class="fa fa-envelope"></i>
									<span class="m-s-5">email@email.com</span>
							</p>
								<a href="/properti">
									<button type="button">
										Lihat
									</button>
								</a>
						</div>
					</div>
				</div>
				<div class="col-lg-7 offset-lg-1">
					<div class="perumahan-content">
						<div class="top-describe-perum">
							<div class="describe-addr">
								<h1>Nama nama</h1>
								<div class="form-group">
									<i class="fa fa-map-marker"></i>
										<span>lokasi</span>
								</div>
							</div>
							<div class="properti-room">
								<div class="row rowp">

								</div>
							</div>
						</div>
						<div class="properti-describe">
							<div class="subject-perum">
								<label>Deskripsi</label>
							</div>
							<div class="perum-describe-text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
						</div>
						<div class="properti-ditel">
							<div class="subject-perum">
								<label>Fasilitas Perumahan</label>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>namanamam</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>namanamam</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>namanamam</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>namanamam</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>namanamam</p>
									</div>
								</div>
							</div>
						</div>

						<div class="properti-ditel properti-spek">
							<div class="subject-perum">
								<label>Sarana Prasarana Perumahan</label>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>Data</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>Data</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>Data</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>Data</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p>Data</p>
									</div>
								</div>
							</div>
						</div>

						<div class="properti-maps">
							<div class="subject-perum">
								<label>Map</label>
							</div>
							<div id="map" class="mapbox"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php $this->load->view('parts/footer'); ?>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
		var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11'
	});
</script>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';
	var coordinates = document.getElementById('coordinates');
	var lang = 20;
	var lat = 0;
	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v9',
		center: [lang, lat],
		zoom: 10
	});
	 
	map.on('click', function (e) {
		document.getElementById('info').innerHTML =
		JSON.stringify(e.point) + '<br />' +
		JSON.stringify(e.lngLat);

		var wrapped = e.lngLat.wrap();

		document.getElementById("lang").value = wrapped.lng;
		document.getElementById("lat").value = wrapped.lat;

	});


	var marker = new mapboxgl.Marker()
	.setLngLat([lang, lat])
	.addTo(map);

	map.addControl(new mapboxgl.FullscreenControl());
	map.addControl(new mapboxgl.NavigationControl());
</script>