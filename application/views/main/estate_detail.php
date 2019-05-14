<?php $this->load->view('parts/header-sect'); ?>

<main class="properties-detils">
	<div class="title-properties2 clean-nav">
		<h1><?= $row->nama_perumahan ?></h1>
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
								<h4><?= $row->nama_pengembang ?></h4>
							</a>
							<p>
								<i class="fa fa-phone"></i>
									<span class="m-s-5">+<?= $row->telepon_pengembang; ?></span>
							</p>
							<p>
								<i class="fa fa-envelope"></i>
									<span class="m-s-5"><?= $row->email_pengembang ?></span>
							</p>
								<a href="<?php echo site_url('pengembang/'.$row->pengembang_slug); ?>/properti">
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
								<h1><?= $row->nama_perumahan ?></h1>
								<div class="form-group">
									<i class="fa fa-map-marker"></i>
										<span><?= $row->lokasi ?>, <?= $row->nama_kelurahan ?>, <?= $row->nama_kecamatan ?></span>
								</div>
							</div>
						</div>
						<div class="properti-describe">
							<div class="subject-perum">
								<label>Deskripsi</label>
							</div>
							<div class="perum-describe-text">
								<?= $row->deskripsi_perumahan ?>
							</div>
						</div>
						<div class="properti-ditel">
							<div class="subject-perum">
								<label>Fasilitas Perumahan</label>
							</div>
							<div class="row">
								<?php foreach ($fasilitas_perumahan as $val_fas): ?>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p><?= $val_fas['nama_fasilitas_perumahan'] ?></p>
									</div>
								</div>
								<?php endforeach ?>
							</div>
						</div>

						<div class="properti-ditel properti-spek">
							<div class="subject-perum">
								<label>Sarana Prasarana Perumahan</label>
							</div>
							<div class="row">
								<?php foreach ($sarana_prasarana_perumahan as $val_sar): ?>
									
								<?php endforeach ?>
								<div class="col-md-6">
									<div class="properti-atribut">
										<p><?= $val_sar['nama_sarana_prasarana_perumahan'] ?></p>
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
	<div class="properti-inestate pads">
		<div class="big-title m-b-20">
			<h1>Properti Perumahan</h1>
		</div>
			<div class="container">
				<div class="row">
					<?php if ($namros > 0): ?>
						<?php foreach ($dataPerum as $key => $value): ?>
							<div class="col-lg-4 col-md-6">
								<figure class="proper-item">
									<?php $foto_b = $this->db->get_where('foto_bangunan', array('id_bangunan' => $value['id_bangunan'], 'level_foto' => 1))->result_array(); ?>
									<?php foreach ($foto_b as $valfb): ?>
										<img src="<?php echo base_url('file/perumahan/images/'.$valfb['foto_bangunan']) ?>">
									<?php endforeach ?>
										<figcaption>
											<div class="proper-deskrip-top">
												<h5 class="text-capitalize"><?php echo $value['nama_bangunan'] ?></h5>
													<p class="text-capitalize">
														<i class="fa fa-map-marker color-blue"></i>
															<?php echo substr($value['nama_perumahan'], 0,40) ?>
													</p>
											</div>
											<div class="proper-deskrip-bot">
												<div>
													<p>
														<i class="fa fa-th-large color-blue"></i>
															<span class="color-blue m-s-10"><?= $value['jumlah_lantai'] ?> Lantai</span>
													</p>
													<p>
														<i class="fa fa-car color-blue"></i>
															<span class="color-blue m-s-10"><?= $value['jumlah_garasi'] ?> Garasi</span>
													</p>
												</div>
												<div>
													<p>
														<i class="fa fa-bed color-blue"></i>
															<span class="color-blue m-s-10"><?= $value['jumlah_kamar'] ?> Kamar</span>
													</p>
													<p>
														<i class="fa fa-bath color-blue"></i>
															<span class="color-blue m-s-10"><?= $value['jumlah_kamar_mandi'] ?> Toilet</span>
													</p>
												</div>
											</div>
											<a href="<?= site_url('properti/'.$value['bangunan_slug']); ?>">LIHAT</a>
										</figcaption>
								</figure>
							</div>
						<?php endforeach ?>
					<?php else: ?>
						<h3 class="flex justify-center width100">Oops, Sepertinya perumahan ini belum memiliki properti :(</h3>
					<?php endif ?>
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
	var lang = <?= $row->longitude ?>;
	var lat = <?= $row->latitude ?>;
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