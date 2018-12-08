<?php $this->load->view('admin/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Konfirmasi Perumahan
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?php echo site_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="<?php echo site_url('admin/data_perumahan') ?>">Data Perumahan</a></li>
     		<li class="active">Konfirmasi Perumahan</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" enctype="multipart/form-data" method="POST" action="<?= site_url('admin/perumahan_confirmation/'.$row->id_bangunan) ?>">
						<div class="box-body ">
							<div class="title-form-sect" style="margin-top: 0">
								Detail Bangunan
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kategori</label>
									<div class="col-sm-9">
										<select class="form-control cursor-disabled" name="kategori_bangunan" disabled="">
											<option selected="" disabled=""></option>
											<option value="1" <?= ($row->kategori_bangunan == '1') ? 'selected="selected"' : '' ?>>Rumah Bagus</option>
											<option value="2" <?= ($row->kategori_bangunan == '2') ? 'selected="selected"' : '' ?>>Rumah Murah</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Judul</label>
									<div class="col-sm-9">
										<input type="text" name="nama_bangunan" class="form-control cursor-disabled" value="<?= $row->nama_bangunan; ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Harga</label>
									<div class="col-sm-9">
										<input type="number" name="harga_bangunan" class="form-control cursor-disabled" value="<?= $row->harga_bangunan ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Deskripsi</label>
									<div class="col-sm-9">
										<textarea class="form-control cursor-disabled" name="deskripsi_bangunan" readonly><?= $row->deskripsi_bangunan ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Kecamatan</label>
									<div class="col-sm-9">
										<select class="form-control" name="id_kecamatan" disabled>
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
										<select class="form-control" name="id_kelurahan" disabled>
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
										<textarea class="form-control cursor-disabled" name="lokasi_bangunan" readonly><?= $row->lokasi_bangunan ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Luas Bangunan</label>
									<div class="col-sm-9">
										<input type="number" name="luas_bangunan" class="form-control cursor-disabled" value="<?= $row->luas_bangunan ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Luas Tanah</label>
									<div class="col-sm-9">
										<input type="number" name="luas_tanah" class="form-control cursor-disabled" value="<?= $row->luas_tanah ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Lantai</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_lantai" class="form-control cursor-disabled" value="<?= $row->jumlah_lantai ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Kamar</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_kamar" class="form-control cursor-disabled" value="<?= $row->jumlah_kamar ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Kamar Mandi</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_kamar_mandi" class="form-control cursor-disabled" value="<?= $row->jumlah_kamar_mandi ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jumlah Garasi</label>
									<div class="col-sm-9">
										<input type="number" name="jumlah_garasi" class="form-control cursor-disabled" value="<?= $row->jumlah_garasi ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Listrik</label>
									<div class="col-sm-9">
										<input type="number" name="listrik" class="form-control cursor-disabled" value="<?= $row->listrik ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Sertifikat</label>
									<div class="col-sm-6">
										<a href="<?php echo base_url('file/perumahan/file/'.$row->sertifikat) ?>">Sertifikat Detail</a>
									</div>
							</div>
						</div>
						<hr>
						<div class="box-body box-append">
							<div class="title-form-sect">
								Sarana & Prasarana
							</div>
							<table class="tb-perum-desk table table-bordered">
								<thead>
									<tr>
										<th style="width: 5%;">No</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data1 as $keySarana => $valueSarana): ?>
										<tr>
											<td><?php echo $keySarana+1 ?></td>
											<td><?php echo $valueSarana['nama_sarana_prasarana'] ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<hr>
						<div class="box-body box-append">
							<div class="title-form-sect">
								Fasilitas
							</div>
							<table class="tb-perum-desk table table-bordered">
								<thead>
									<tr>
										<th style="width: 5%;">No</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data2 as $keyFasil => $valueFasil): ?>
										<tr>
											<td><?php echo $keyFasil+1 ?></td>
											<td><?php echo $valueFasil['nama_fasilitas'] ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<hr>
						<div class="box-body box-append">
							<div class="title-form-sect">
								Foto
							</div>
							<table class="tb-perum-desk table table-bordered">
								<thead>
									<tr>
										<th style="width: 5%;">No</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data3 as $keyfoto => $valfoto): ?>
									<tr>
										<td><?php echo $keyfoto+1 ?></td>
										<td>
											<img class="img-bgn" src="<?php echo base_url('file/perumahan/images/'.$valfoto['foto_bangunan']) ?>">
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<hr>
						<div class="box-body m-t-30">
							<div class="form-group">
								<label class="input-label control-label text-align-left font-bold col-sm-2">Konfirmasi</label>
									<div class="col-sm-9">
										<select class="form-control red-border" name="status_publish" required="">
											<option value="1" <?= ($row->status_publish == '1') ? 'selected="selected"' : '' ?>>Aktifkan</option>
											<option value="0" <?= ($row->status_publish == '0') ? 'selected="selected"' : '' ?>>Non Aktifkan</option>
										</select>
									</div>
							</div>
						</div>
						<div class="box-footer m-t-30">
							<button type="submit" class="btn btn-primary font-bold col-sm-2">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('admin/parts/footer_admin') ?>