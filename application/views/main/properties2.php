<?php $this->load->view('parts/header-sect'); ?>
<?php if ($num_rows > 0): ?>
<main class="properties-detils">
	<div class="title-properties2 clean-nav">
		<h1><?php echo $row->nama_bangunan; ?></h1>
	</div>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach ($data3 as $indicator => $valindicator): ?>
				<li data-target="#carouselExampleIndicators" data-slide-to="<?= $indicator; ?>" <?= ($indicator==0) ? 'class="active"' : '' ?>></li>
			<?php endforeach ?>
		</ol>
		<div class="carousel-inner">
			<?php foreach ($data3 as $keyimg => $valimg): ?>
				<div class="carousel-item slide-properties <?= ($keyimg==0) ? 'active' : '' ?>">
					<img class="d-block w-100" src="<?php echo base_url('file/perumahan/images/'.$valimg['foto_bangunan']); ?>" alt="First slide">
				</div>
			<?php endforeach ?>
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
							<img src="<?php echo base_url('file/pengembang/images/'.$row->foto_pengembang); ?>">
							<!-- <img src="<?php echo base_url('assets/img/pplwapple.jpg') ?>"> -->
						</div>
						<div class="pengembang-describe">
							<a class="pengembang-name" href="<?php echo site_url('perumahan/pengembang/'.$row->id_pengembang); ?>">
								<h4><?php echo $row->nama_pengembang ?></h4>
							</a>
							<p>
								<i class="fa fa-phone"></i>
									<span class="m-s-5">+<?php echo $row->telepon_pengembang; ?></span>
							</p>
							<p>
								<i class="fa fa-envelope"></i>
									<span class="m-s-5"><?php echo $row->email_pengembang ?></span>
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
							<div class="subject-perum-top">
								<h2>Rp. <?php echo number_format($row->harga_bangunan, 0, ".", "."); ?></h2>
							</div>
							<div class="describe-addr">
								<h1><?php echo $row->nama_bangunan; ?></h1>
								<div class="form-group">
									<i class="fa fa-map-marker"></i>
										<span><?php echo $row->lokasi_bangunan ?></span>
								</div>
							</div>
							<div class="properti-room">
								<div class="row rowp">
									<div class="properti-room-item">
										<label>Lantai</label>
										<div class="properti-room-img">
											<i class="fa fa-th-large"></i>
												<span><?= $row->jumlah_lantai; ?></span>
										</div>
									</div>
									<div class="properti-room-item">
										<label>Kamar</label>
										<div class="properti-room-img">
											<img src="<?= base_url('assets/img/logos/Tidur.png') ?>">
												<span><?= $row->jumlah_kamar; ?></span>
										</div>
									</div>
									<div class="properti-room-item">
										<label>Toilet</label>
										<div class="properti-room-img">
											<img src="<?= base_url('assets/img/logos/Mandi.png') ?>">
												<span><?= $row->jumlah_kamar_mandi ?></span>
										</div>
									</div>
									<div class="properti-room-item">
										<label>Garasi</label>
										<div class="properti-room-img">
											<img src="<?= base_url('assets/img/logos/mobil.png') ?>">
												<span><?= $row->jumlah_garasi; ?></span>
										</div>
									</div>
									<div class="properti-room-item">
										<label>Luas Properti</label>
										<div class="properti-room-img">
											<img src="<?= base_url('assets/img/logos/luas_properti.png') ?>">
												<span><?= $row->luas_bangunan; ?> m<sup>2</sup></span>
										</div>
									</div>
									<div class="properti-room-item">
										<label>Luas Tanah</label>
										<div class="properti-room-img">
											<img src="<?= base_url('assets/img/logos/luas_tanah.png') ?>">
												<span><?= $row->luas_tanah; ?> m<sup>2</sup></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="properti-describe">
							<div class="subject-perum">
								<label>Deskripsi</label>
							</div>
							<div class="perum-describe-text">
								<?php echo $row->deskripsi_bangunan ?>
							</div>
						</div>
						<div class="properti-ditel">
							<div class="subject-perum">
								<label>Detail Properti</label>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Nama Properti</span>
											<p><?php echo $row->nama_bangunan; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Nama Pengembang</span>
											<p><?php echo $row->nama_pengembang; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Kategori</span>
											<p><?= $row->kategori_bangunan; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Luas Bangunan</span>
											<p><?= $row->luas_bangunan; ?> m<sup>2</sup> (<?= $row->dimensi_bangunan ?>)</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Tipe</span>
											<p>Tipe <?= $row->tipe_bangunan; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Luas Tanah</span>
											<p><?php echo $row->luas_tanah ?> m<sup>2</sup> (<?= $row->dimensi_tanah ?>)</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Sertifikat</span>
											<p>
												<a href="<?= base_url('file/perumahan/file/'.$row->sertifikat) ?>#toolbar=0" class="sertificate-button">Detail Sertifikat</a>
											</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Listrik</span>
											<p><?php echo $row->listrik ?> watt</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="properti-atribut">
										<span>Jumlah Tersedia</span>
											<p><?php echo $row->jumlah_tersedia ?> unit</p>
									</div>
								</div>
							</div>
						</div>


						<div class="properti-ditel properti-spek">
							<div class="subject-perum">
								<label>Spesifikasi Properti</label>
							</div>
							<div class="row">
								<?php foreach ($spesifikasi_rumah as $data_spesifikasi): ?>
									<div class="col-md-6">
										<div class="properti-atribut">
											<p><?php echo $data_spesifikasi['nama_spesifikasi_rumah']; ?></p>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>

						<div id="tabs" class="properti-facilities">
							<div class="container">
								<div class="subject-perum">
									<label>Sarana Prasarana dan Fasilitas</label>
								</div>
								<div class="row">
									<div class="col-md-12">
										<nav>
											<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
												<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sarana Prasarana</a>
												<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Fasilitas</a>
											</div>
										</nav>
										<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
											<!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
												<div class="row">
													<?php foreach ($data2 as $keyfal => $valfal): ?>
													<div class="col-md-6">
														<div class="perum-facity">
															<i class="fa fa-check"></i>
																<span class="m-s-5"><?php echo $valfal['nama_fasilitas'] ?></span>
														</div>
													</div>
													<?php endforeach ?>
												</div>
											</div>
											<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
												<div class="row">
													<?php foreach ($data1 as $keysa => $valsa): ?>
													<div class="col-md-6">
														<div class="perum-facity">
															<i class="fa fa-check"></i>
																<span class="m-s-5"><?php echo $valsa['nama_sarana_prasarana'] ?></span>
														</div>
													</div>
													<?php endforeach ?>
												</div>
											</div> -->
											<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
												<div class="row">
													<?php foreach ($sarana_prasarana_perumahan as $data_sarana_perumahan): ?>
													<div class="col-md-6">
														<div class="perum-facity">
															<i class="fa fa-check"></i>
																<span class="m-s-5"><?php echo $data_sarana_perumahan['nama_sarana_prasarana_perumahan'] ?></span>
														</div>
													</div>
													<?php endforeach ?>
												</div>
											</div>
											<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
												<div class="row">
													<?php foreach ($fasilitas_perumahan as $data_fasilitas): ?>
													<div class="col-md-6">
														<div class="perum-facity">
															<i class="fa fa-check"></i>
																<span class="m-s-5"><?php echo $data_fasilitas['nama_fasilitas_perumahan'] ?></span>
														</div>
													</div>
													<?php endforeach ?>
												</div>
											</div>
										</div>
									
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
<?php else: ?>
<?php endif ?>

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
	var lang = <?= $row_perum->longitude; ?>;
	var lat = <?= $row_perum->latitude; ?>;
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

		document.getElementById("lang").value = wrapped.lng;
		document.getElementById("lat").value = wrapped.lat;

	});


	var marker = new mapboxgl.Marker()
	.setLngLat([lang, lat])
	.addTo(map);

	map.addControl(new mapboxgl.FullscreenControl());
	map.addControl(new mapboxgl.NavigationControl());
</script>