<?php $this->load->view('parts/header-sect'); ?>

<main class="developer-details pads">
	<div class="devdet-head">
		<div class="container head-crumb">
			<img src="<?php echo base_url('file/pengembang/images/'.$data_pengembang->foto_pengembang); ?>">
				<div class="dev-detils">
					<div class="group-det">
							<label class="col-sm-10 dev-name"> <?php echo $data_pengembang->nama_pengembang ?></label>
					</div>
					<div class="group-det">
						<h5 class="control-label text-align-left col-sm-2">Telepon <?php echo $cek_perumahan; ?></h5>
							<div class="col-sm-10">
								<span class="">: +<?php echo $data_pengembang->telepon_pengembang ?></span>
							</div>
					</div>
					<div class="group-det">
						<h5 class="control-label text-align-left col-sm-2">Email</h5>
							<div class="col-sm-10">
								<span class="">: <?php echo $data_pengembang->email_pengembang ?></span>
							</div>
					</div>
					<div class="group-det">
						<h5 class="control-label text-align-left col-sm-2">Alamat</h5>
							<div class="col-sm-10">
								<span class="">: <?php echo $data_pengembang->alamat_pengembang ?></span>
							</div>
					</div>
				</div>
		</div>
	</div>
	<div class="dev-properties">
		<div class="container">
			<div class="nav-toggle-menus">
				<a href="<?= site_url('pengembang/'.$data_pengembang->pengembang_slug) ?>/perumahan">
					<label class="title-dev-det active">Perumahan</label>
				</a>
				<a href="<?= site_url('pengembang/'.$data_pengembang->pengembang_slug) ?>/properti">
					<label class="title-dev-det">Properti</label>
				</a>
			</div>
			<div class="container">
				<div class="row">
					<?php if ($cek_perumahan > 0): ?>
					<div class="col-md-12">
						<div class="estate-map-dev">
							<div id="map" class="mapbox"></div>
						</div>
					</div>
					<?php foreach ($perumahan as $data_perumahan): ?>
					<div class="col-md-12">
						<div class="estate-min">
							<div class="row">
								<div class="col-md-5">
									<div class="estate-min-img">
										<?php $queryfp = $this->db->get_where('foto_perumahan', array('id_perumahan' => $data_perumahan['id_perumahan']))->result_array(); ?>
										<?php foreach ($queryfp as $keyfp => $valuefp): ?>
											<?php if ($valuefp['status_foto'] == 1): ?>
											<img src="<?= base_url('file/perumahan/estate/'.$valuefp['foto_perumahan']) ?>">
											<?php endif ?>
										<?php endforeach ?>
									</div>
								</div>
								<div class="col-md-7">
									<div class="estate-min-info">
										<a href="<?= site_url('perumahan/'.$data_perumahan['slug']) ?>" class="estate-min-title">
											<?= $data_perumahan['nama_perumahan'] ?>
										</a>
										<p class="estate-min-location">
											<?= $data_perumahan['lokasi'].", ".$data_perumahan['nama_kelurahan'].", ".$data_perumahan['nama_kecamatan'] ?>
										</p>
										<div class="estate-min-properti">
											<?php $row_properti = $this->db->get_where('bangunan', array('id_perumahan' => $data_perumahan['id_perumahan']))->num_rows(); ?>
											<?= $row_properti; ?> Properti
										</div>
										<div class="estate-min-facilities">
											<?php $q_fasilitas_perumahan = $this->db->get_where('fasilitas_perumahan', array('id_perumahan' => $data_perumahan['id_perumahan']))->result_array(); ?>
											<?php foreach ($q_fasilitas_perumahan as $data_fas): ?>
												<span class="estate-fac-item"><?= $data_fas['nama_fasilitas_perumahan']; ?></span>
											<?php endforeach ?>
											<?php $q_sarana_perumahan = $this->db->get_where('sarana_prasarana_perumahan', array('id_perumahan' => $data_perumahan['id_perumahan']))->result_array(); ?>
											<?php foreach ($q_sarana_perumahan as $data_sar): ?>
												<span class="estate-fac-item"><?= $data_sar['nama_sarana_prasarana_perumahan']; ?></span>
											<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					<?php else: ?>
						Data tidak ada
					<?php endif ?>
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
	var lang = 0;
	var lat = 0;
	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v9',
		<?php foreach ($perumahan as $key_center_js => $val_center_js): ?>
			<?php if ($key_center_js == 0) { ?>
					center: [<?= $val_center_js['longitude'] ?>, <?= $val_center_js['latitude'] ?>],
				<?php } ?>
		<?php endforeach ?>
		zoom: 10
	});


	<?php foreach ($perumahan as $val_perum_js): ?>
		var popup = new mapboxgl.Popup({ offset: 25 })
			.setText('<?= $val_perum_js['nama_perumahan']; ?>');
		var el = document.createElement('div');
			el.class = '<?= $val_perum_js['slug']; ?>';
		var marker = new mapboxgl.Marker()
			.setLngLat([<?= $val_perum_js['longitude']; ?>, <?= $val_perum_js['latitude'] ?>])
			.setPopup(popup)
			.addTo(map);
	<?php endforeach ?>

	map.addControl(new mapboxgl.FullscreenControl());
	map.addControl(new mapboxgl.NavigationControl());
</script>