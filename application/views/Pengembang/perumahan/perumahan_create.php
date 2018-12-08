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

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/perumahan_insert') ?>">
						<div class="box-body ">
							<div class="title-form-sect" style="margin-top: 0">
								Detail Bangunan
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kategori</label>
									<div class="col-sm-9">
										<select class="form-control" name="kategori_bangunan" required="">
											<option selected="" disabled=""></option>
											<option value="1">Rumah Bagus</option>
											<option value="2">Rumah Murah</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Judul</label>
									<div class="col-sm-9">
										<input type="text" name="nama_bangunan" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Harga</label>
									<div class="col-sm-9">
										<input type="number" name="harga_bangunan" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Deskripsi</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="deskripsi_bangunan" required=""></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kecamatan</label>
									<div class="col-sm-9">
										<select class="form-control" name="id_kecamatan" id="kecamatan" required="">
											<option selected="" disabled=""></option>
											<?php foreach ($kecamatan as $keykec => $valkec): ?>
												<option value="<?= $valkec['id_kecamatan'] ?>"><?= $valkec['nama_kecamatan'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kelurahan</label>
									<div class="col-sm-9">
										<select class="form-control" name="id_kelurahan" id="kelurahan" required="">
											<option selected="" disabled=""></option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Alamat</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="lokasi_bangunan" required=""></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Luas Bangunan</label>
									<div class="col-sm-9">
										<input type="number" name="luas_bangunan" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Luas Tanah</label>
									<div class="col-sm-9">
										<input type="number" name="luas_tanah" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Lantai</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_lantai" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Kamar</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_kamar" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Kamar Mandi</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_kamar_mandi" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Garasi</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_garasi" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Listrik</label>
									<div class="col-sm-9">
										<input type="number" name="listrik" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Sertifikat</label>
									<div class="col-sm-9">
										<input type="file" name="sertifikat" class="form-control" required="">
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
											<div class="col-sm-9">
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
											<div class="col-sm-9">
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
											<div class="col-sm-9">
												<input type="file" name="foto_bangunan[]" class="form-control" required="">
											</div>
									</div>
								</div>
							</div>
							<i class="text-warning">* Max Ukuran Foto 2 MB</i>
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
</script>