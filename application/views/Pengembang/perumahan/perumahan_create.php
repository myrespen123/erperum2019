<?php $this->load->view('pengembang/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Tambah Data Perumahan
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?php echo site_url('pengembang') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="<?php echo site_url('pengembang/data_perumahan') ?>">Data Perumahan</a></li>
     		<li class="active">Tambah Data Perumahan</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" onSubmit="return validate();" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/perumahan_insert') ?>">
						<div class="box-body ">
							<div class="title-form-sect" style="margin-top: 0">
								Detail Bangunan
							</div>
							  <?php if (validation_errors()) : ?>
							      <div class="alert alert-danjer">
							        Lokasi pada MAP harus dipilih
							      </div>
							  <?php endif; ?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Kategori</label>
											<div class="col-sm-8">
												<select class="form-control" name="kategori_bangunan" required="">
													<option selected="" disabled=""></option>
													<option value="1">MBR</option>
													<option value="2">NON-MBR</option>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Judul</label>
											<div class="col-sm-8">
												<input type="text" name="nama_bangunan" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Harga(Rp)</label>
											<div class="col-sm-8 col-md-6 flex">
												<input type="text" id="rupiah" name="harga_bangunan" class="form-control" required="">
												<input type="text" id="rupiah2" class="form-control disabled-input" required="" readonly="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Deskripsi</label>
											<div class="col-sm-8">
												<textarea class="form-control" name="deskripsi_bangunan" required=""></textarea>
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Kecamatan</label>
											<div class="col-sm-8">
												<select class="form-control" name="id_kecamatan" id="kecamatan" required="">
													<option selected="" disabled=""></option>
													<?php foreach ($kecamatan as $keykec => $valkec): ?>
														<option value="<?= $valkec['id_kecamatan'] ?>"><?= $valkec['nama_kecamatan'] ?></option>
													<?php endforeach ?>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Kelurahan</label>
											<div class="col-sm-8">
												<select class="form-control" name="id_kelurahan" id="kelurahan" required="">
													<option selected="" disabled=""></option>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Alamat</label>
											<div class="col-sm-8">
												<textarea class="form-control" name="lokasi_bangunan" required=""></textarea>
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Luas Bangunan(m<sup>2</sup>)</label>
											<div class="col-sm-8">
												<input type="number" name="luas_bangunan" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Luas Tanah(m<sup>2</sup>)</label>
											<div class="col-sm-8">
												<input type="number" name="luas_tanah" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Jumlah Lantai</label>
											<div class="col-sm-8">
												<input type="number" name="jumlah_lantai" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Jumlah Kamar</label>
											<div class="col-sm-8">
												<input type="number" name="jumlah_kamar" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Jumlah Kamar Mandi</label>
											<div class="col-sm-8">
												<input type="number" name="jumlah_kamar_mandi" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Jumlah Garasi</label>
											<div class="col-sm-8">
												<input type="number" name="jumlah_garasi" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Listrik</label>
											<div class="col-sm-8">
												<input type="number" name="listrik" class="form-control" required="">
											</div>
									</div>
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-4">Sertifikat</label>
											<div class="col-sm-8">
												<input type="file" name="sertifikat" class="form-control" required="">
											</div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="input-label control-label text-align-right width100 col-sm-4">Map</label>
									</div>
									<i class="text-warning m-s-10 text-align-left width100">klik pada map untuk menandai</i>
									<div class="map-section">
										<div id='map'></div>
										<pre id='coordinates' class='coordinates'></pre>
											<pre id='info' style="display: none;"></pre>
											<input type="hidden" id="lang" name="longitude">
											<input type="hidden" id="lat" name="latitude">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									
								</div>
								
							</div>
						</div>
						<hr>
						<div class="box-body box-append">
							<div class="title-form-sect">
								Sarana & Prasarana
							</div>
							<div class="mom-append-sarana">
								<div id="child-sarana">
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-2">Sarana Prasarana</label>
											<div class="col-sm-9 col-md-4">
												<input type="text" name="nama_sarana_prasarana[]" class="form-control" required="">
											</div>
									</div>
								</div>
							</div>
							<div class="button-group-append">
								<button type="button" id="tambah_sarana" class="btn button-plus">
									<i class="fa fa-plus"></i>
								</button>
								<button type="button" id="hapus_sarana" class="btn button-minus">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<hr>
						<div class="box-body box-append">
							<div class="title-form-sect">
								Fasilitas
							</div>
							<div class="mom-append-fasilities">
								<div id="child-fasilities">
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-2">Nama Fasilitas</label>
											<div class="col-sm-9 col-md-4">
												<input type="text" name="nama_fasilitas[]" class="form-control" required="">
											</div>
									</div>
								</div>
							</div>
							<div class="button-group-append">
								<button type="button" id="tambah_fasilities" class="btn button-plus">
									<i class="fa fa-plus"></i>
								</button>
								<button type="button" id="hapus_fasilities" class="btn button-minus">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<hr>
						<div class="box-body box-append">
							<div class="title-form-sect">
								Foto
							</div>
							<div class="mom-append-fotop">
								<div id="child-fotop">
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-2">Foto</label>
											<div class="col-sm-9 col-md-4">
												<input type="file" name="foto_bangunan[]" class="form-control foto-upload" required="">
											</div>
									</div>
								</div>
							</div>
							<i class="text-warning" id="alert-img"></i>
							<div class="button-group-append">
								<button type="button" id="tambah_fotop" class="btn button-plus">
									<i class="fa fa-plus"></i>
								</button>
								<button type="button" id="hapus_fotop" class="btn button-minus">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary col-sm-2 visible-hide"></button>
							<button type="submit" name="insert_pengembang" class="btn btn-primary col-sm-2">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>



	</section>
</div>



<?php $this->load->view('pengembang/parts/footer_admin') ?>
<script>
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
				url:"<?php echo site_url('pengembang/get_select') ?>",
				method:"POST",
				data:{'id_kecamatan':id_kecamatan},
				success:function(data)
				{
					$('#kelurahan').html(data);
				}
			});
		});
	});

	$("input[type='file']").on("change", function () {
		if(this.files[0].size > 2000000) {
			alert("Please upload file less than 2MB. Thanks!!");
			$(this).val('');
		}
	});
</script>

<script type="text/javascript">
	var rupiah = document.getElementById("rupiah");
	var rupiah2 = document.getElementById("rupiah2");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatnumber(this.value, "");
  rupiah2.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function formatnumber(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "" : "";
    rupiah += separator + ribuan.join("");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}

</script>