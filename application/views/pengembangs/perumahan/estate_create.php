<?php $this->load->view('pengembangs/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Tambah Data Perumahan</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Tambah Data</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

 		

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Form</h3>
						</div>
						<form enctype="multipart/form-data" method="POST" action="<?= site_url('pengembangs/estate_insert') ?>">
							<div class="card-body">
								<div class="row">
									
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="title-form col-sm-12">
													<h1>Data Umum</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="form-group row">
														<label class="col-sm-3">Nama Perumahan</label>
														<div class="col-sm-8">
															<input type="text" name="nama_perumahan" class="form-control" value="<?= set_value('nama_perumahan'); ?>" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Deskripsi</label>
														<div class="col-sm-8">
															<textarea class="form-control" name="deskripsi_perumahan" required=""></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kecamatan</label>
															<div class="col-sm-8">
																<select name="id_kecamatan" id="kecamatan" class="form-control" required="">
																	<option></option>
																	<?php foreach ($kecamatan as $nama_kec): ?>
																		<option value="<?= $nama_kec['id_kecamatan'] ?>"><?= $nama_kec['nama_kecamatan'] ?></option>
																	<?php endforeach ?>
																</select>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kelurahan</label>
															<div class="col-sm-8">
																<select name="id_kelurahan" id="kelurahan" class="form-control" required="">
																	<option></option>
																</select>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Lokasi</label>
														<div class="col-sm-8">
															<input type="lokasi" name="lokasi" class="form-control" required="">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Legatilas(pdf)</label>
														<div class="col-sm-8">
															<input type="file" name="legalitas" class="form-control" value="<?= set_value('legalitas'); ?>" required>
														</div>
													</div>
												</div>

												<div class="title-form col-sm-12">
													<h1>Sarana & Prasarana</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="mom-append-saranap">
														<div id="child-saranap">
															<div class="form-group row">
																<label class="col-sm-3">Nama Sarana & Prasarana</label>
																<div class="col-sm-8">
																	<input type="text" name="nama_sarana_prasarana_perumahan[]" class="form-control" value="<?= set_value('nama_sarana_prasarana_perumahan'); ?>" required>
																</div>
															</div>
														</div>
													</div>
													<div class="button-group-append">
														<button type="button" id="tambah_saranap" class="btn button-plus">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" id="hapus_saranap" class="btn button-minus">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>

												<div class="title-form col-sm-12">
													<h1>Fasilitas</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="mom-append-fasilitasp">
														<div id="child-fasilitasp">
															<div class="form-group row">
																<label class="col-sm-3">Nama fasilitas</label>
																<div class="col-sm-8">
																	<input type="text" name="nama_fasilitas_perumahan[]" class="form-control" value="<?= set_value('nama_fasilitas_perumahan'); ?>" required>
																</div>
															</div>
														</div>
													</div>
													<div class="button-group-append">
														<button type="button" id="tambah_fasilitasp" class="btn button-plus">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" id="hapus_fasilitasp" class="btn button-minus">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>

												<div class="title-form col-sm-12">
													<h1>Foto Perumahan</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="mom-append-spekp">
														<div id="child-spekp">
															<div class="form-group row">
																<label class="col-sm-3">File Foto</label>
																<div class="col-sm-8">
																	<input type="file" name="foto_perumahan[]" class="form-control" value="<?= set_value('foto_perumahan'); ?>" required>
																</div>
															</div>
														</div>
													</div>
													<div class="button-group-append">
														<button type="button" id="tambah_spekp" class="btn button-plus">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" id="hapus_spekp" class="btn button-minus">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>

											</div>
											<div class="col-md-6">
												<div class="title-form col-sm-12">
													<h1>Map</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div>
														<i class="text-danger m-s-10 text-align-left width100">klik pada map untuk menandai</i>
														<div class="map-section">
															<div id='map'></div>
															<pre id='coordinates' class='coordinates'></pre>
																<pre id='info' style="display: none;"></pre>
																<input type="hidden" id="lang" name="longitude">
																<input type="hidden" id="lat" name="latitude">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<button type="submit" class="btn btn-primary">Submit</button>

							</div>
						</form>
					</div>	
				</div>
			</div>
		</section>

	</div>

<?php $this->load->view('pengembangs/parts/footer') ?>
<script>
	// mapboxgl.accessToken = 'sk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0aTRpdmZvMGhzZjQ0cXp4N3FxNGljOSJ9.o0OiHlaHDmM3DkhL8LUYAA';
	mapboxgl.accessToken = 'pk.eyJ1IjoibXlyZXNwZW4xMjMiLCJhIjoiY2p0NTk3ejhiMDNmYTQzcGowdGY3dGNzdCJ9.7Lj7S1mKplZMmRAFWJT5XQ';

	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v9',
		center: [117.12754620431451, -0.502443356244541],
		zoom: 11
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
	 
		var lngLat = marker.getLngLat();
		coordinates.style.display = 'block';
		coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
		document.getElementById("lang").value = lngLat.lng;
		document.getElementById("lat").value = lngLat.lat;

		marker.on('dragend', onDragEnd);

		$('.marked').css('display', 'none');

	});
	map.addControl(new mapboxgl.FullscreenControl());
	map.addControl(new mapboxgl.NavigationControl());
</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$('#kecamatan').change(function(){
			var id_kecamatan = $(this).val();			
			$.ajax({
				url:"<?php echo site_url('pengembangs/get_kelurahan') ?>",
				method:"POST",
				data:{'id_kecamatan':id_kecamatan},
				success:function(data)
				{
					$('#kelurahan').html(data);
				}
			});
		});
	});
</script>