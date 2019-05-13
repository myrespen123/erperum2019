<?php $this->load->view('pengembangs/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Detail Data Perumahan</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Detail Data</li>
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
						<form enctype="multipart/form-data" method="POST">
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
														<label class="col-sm-3">Judul</label>
														<div class="col-sm-8">
															<input type="text" name="nama_bangunan" class="form-control" value="<?= $row->nama_bangunan; ?>" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Deskripsi</label>
														<div class="col-sm-8">
															<textarea name="deskripsi_bangunan" class="form-control" readonly><?= $row->deskripsi_bangunan ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kategori</label>
															<div class="col-sm-8">
															<input type="text" name="kategori_bangunan" class="form-control" value="<?= $row->kategori_bangunan; ?>" readonly>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Tipe</label>
														<div class="col-sm-8">
															<input type="text" name="tipe_bangunan" class="form-control" value="<?= $row->tipe_bangunan; ?>" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Tersedia</label>
															<div class="col-sm-8 row">
																<div class="col-sm-6">
																	<input type="number" name="jumlah_tersedia" class="form-control" value="<?= $row->jumlah_tersedia ?>" readonly="">
																</div>
																<div class="col-sm-6">
																	unit
																</div>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Harga(Rp)</label>
															<div class="col-sm-8 row">
																<div class="col-sm-6">
																	<input type="text" name="harga_bangunan" id="rupiah" value="Rp. <?= number_format($row->harga_bangunan, 0, ".", "."); ?>" class="form-control" readonly="">
																</div>
																<div class="col-sm-6">
																	<input type="text" id="rupiah2" class="form-control detail-data border-none outline-none" readonly="">
																</div>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kecamatan</label>
															<div class="col-sm-8">
																<select id="kecamatan" class="form-control" disabled>
																	<option></option>
																	<?php foreach ($kecamatan as $nama_kec): ?>
																		<option value="<?= $nama_kec['id_kecamatan'] ?>" <?= ($nama_kec['id_kecamatan'] == $row->id_kecamatan) ? 'selected="selected"' : '' ?>><?= $nama_kec['nama_kecamatan'] ?></option>
																	<?php endforeach ?>
																</select>
																<input type="hidden" value="<?= $row->id_kecamatan; ?>" name="id_kecamatan">
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kelurahan</label>
															<div class="col-sm-8">
																<select id="kelurahan" class="form-control" disabled="">
																	<?php foreach ($kelurahan as $nama_kel): ?>
																		<option value="<?= $nama_kel['id_kelurahan'] ?>" <?= ($nama_kel['id_kelurahan'] == $row->id_kelurahan) ? 'selected="selected"' : '' ?>><?= $nama_kel['nama_kelurahan'] ?></option>
																	<?php endforeach ?>
																</select>
																<input type="hidden" value="<?= $row->id_kelurahan; ?>" name="id_kelurahan">
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Lokasi</label>
														<div class="col-sm-8">
															<textarea name="lokasi_bangunan" class="form-control" readonly=""><?= $row->lokasi_bangunan ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Luas Bangunan</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="text" name="luas_bangunan" value="<?= $row->luas_bangunan; ?>" class="form-control" readonly>
																</div>
																<div class="col-sm-6">
																	<span>M<sup>2</sup></span>
																</div>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Dimensi Bangunan</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="text" name="dimensi_bangunan" value="<?= $row->dimensi_bangunan; ?>" class="form-control" readonly>
																</div>
																(dalam satuan meter)
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Luas Tanah</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="text" name="luas_tanah" value="<?= $row->luas_tanah; ?>" class="form-control" readonly>
																</div>
																<div class="col-sm-6">
																	<span>M<sup>2</sup></span>
																</div>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Dimensi Tanah</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="text" name="dimensi_tanah" value="<?= $row->dimensi_bangunan; ?>" class="form-control" readonly>
																</div>
																(dalam satuan meter)
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Lantai</label>
														<div class="col-sm-8">
															<input type="text" value="<?= $row->jumlah_lantai ?> lantai" class="form-control" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Kamar Tidur</label>
														<div class="col-sm-8">
															<input type="text" value="<?= $row->jumlah_kamar ?> kamar" class="form-control" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Kamar Mandi</label>
														<div class="col-sm-8">
															<input type="text" value="<?= $row->jumlah_kamar_mandi ?> kamar" class="form-control" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Garasi</label>
														<div class="col-sm-8">
															<input type="text" value="<?= $row->jumlah_garasi ?> kamar" class="form-control" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Pasokan Listrik</label>
														<div class="col-sm-8">
															<input type="text" value="<?= $row->listrik ?> watt" class="form-control" readonly>
														</div>
													</div>
												</div>

											</div>
											<div class="col-md-6">
												<div class="title-form col-sm-12">
													<h1>Spesifikasi Rumah</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="mom-append-spekp">
														<?php foreach ($spesifikasi_rumah as $result_spek): ?>
															<div id="child-spekp">
																<div class="form-group row">
																	<label class="col-sm-3">Nama Spesifikasi Rumah</label>
																	<div class="col-sm-8">
																		<input type="text" name="nama_spesifikasi_rumah[]" class="form-control" value="<?= $result_spek['nama_spesifikasi_rumah'] ?>" readonly>
																	</div>
																</div>
															</div>
														<?php endforeach ?>
													</div>
												</div>
												<div class="title-form col-sm-12">
													<h1>Foto</h1>
												</div>

												<div class="inner-box col-sm-12">
													<?php foreach ($foto_bangunan as $val_bangunan): ?>
														<div class="form-group row">
															<img src="<?= base_url('file/perumahan/images/'.$val_bangunan['foto_bangunan']); ?>" class="img-admins-detail">
														</div>
													<?php endforeach ?>
												</div>
											</div>
										</div>
									</div>
									<a href="javascript:history.back();">
										<button type="button" class="btn btn-primary">Kembali</button>
									</a>

							</div>
						</form>
					</div>	
				</div>
			</div>
		</section>

	</div>

<?php $this->load->view('pengembangs/parts/footer') ?>