<?php $this->load->view('pengembang/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Ubah Data Perumahan
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?php echo site_url('pengembang') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="<?php echo site_url('pengembang/data_perumahan') ?>">Data Perumahan</a></li>
     		<li class="active">Ubah Data Perumahan</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/perumahan_update/'.$row->id_bangunan) ?>">
						<div class="box-body ">
							<div class="title-form-sect" style="margin-top: 0">
								Detail Bangunan
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kategori</label>
									<div class="col-sm-9">
										<select class="form-control" name="kategori_bangunan" required="">
											<option selected="" disabled=""></option>
											<option value="1" <?= ($row->kategori_bangunan == '1') ? 'selected="selected"' : '' ?>>Rumah Bagus</option>
											<option value="2" <?= ($row->kategori_bangunan == '2') ? 'selected="selected"' : '' ?>>Rumah Murah</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Judul</label>
									<div class="col-sm-9">
										<input type="text" name="nama_bangunan" class="form-control" value="<?= $row->nama_bangunan; ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Harga</label>
									<div class="col-sm-9">
										<input type="number" name="harga_bangunan" class="form-control" value="<?= $row->harga_bangunan ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Deskripsi</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="deskripsi_bangunan" required=""><?= $row->deskripsi_bangunan ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kecamatan</label>
									<div class="col-sm-9">
										<select class="form-control" name="id_kecamatan" id="kecamatan" required="">
											<option selected="" disabled=""></option>
											<?php foreach ($kecamatan as $keykec => $valkec): ?>
												<option value="<?= $valkec['id_kecamatan'] ?>" <?= ($valkec['id_kecamatan']==$row->id_kecamatan) ? 'selected="selected"' : '' ?>><?= $valkec['nama_kecamatan'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kelurahan</label>
									<div class="col-sm-9">
										<select class="form-control" name="id_kelurahan" id="kelurahan" required="">
											<option selected="" disabled=""></option>
											<?php foreach ($kelurahan as $keykel => $valkel): ?>
												<option value="<?= $valkel['id_kelurahan'] ?>" <?= ($valkel['id_kelurahan']==$row->id_kelurahan) ? 'selected="selected"' : '' ?>><?= $valkel['nama_kelurahan'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Alamat</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="lokasi_bangunan" required=""><?= $row->lokasi_bangunan ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Luas Bangunan</label>
									<div class="col-sm-9">
										<input type="number" name="luas_bangunan" class="form-control" value="<?= $row->luas_bangunan ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Luas Tanah</label>
									<div class="col-sm-9">
										<input type="number" name="luas_tanah" class="form-control" value="<?= $row->luas_tanah ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Lantai</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_lantai" class="form-control" value="<?= $row->jumlah_lantai ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Kamar</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_kamar" class="form-control" value="<?= $row->jumlah_kamar ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Kamar Mandi</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_kamar_mandi" class="form-control" value="<?= $row->jumlah_kamar_mandi ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Garasi</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_garasi" class="form-control" value="<?= $row->jumlah_garasi ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Listrik</label>
									<div class="col-sm-9">
										<input type="number" name="listrik" class="form-control" value="<?= $row->listrik ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Sertifikat</label>
									<div class="col-sm-6">
										<input type="file" name="sertifikat" class="form-control">
									</div>
										<a href="<?php echo base_url('file/perumahan/file/'.$row->sertifikat) ?>">Sertifikat Detail</a>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary col-sm-2 visible-hide"></button>
							<button type="submit" name="update_pengembang" class="btn btn-primary col-sm-2">Simpan</button>
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