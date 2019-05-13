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
						<form enctype="multipart/form-data" method="POST" action="<?= site_url('pengembangs/properti_update/'.$row->id_bangunan) ?>">
							<div class="card-body">
								<div class="row">
									
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<div class="title-form col-sm-12">
													<h1>Data Umum</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="form-group row">
														<label class="col-sm-3">Judul</label>
														<div class="col-sm-8">
															<input type="text" name="nama_bangunan" class="form-control" value="<?= $row->nama_bangunan; ?>" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Deskripsi</label>
														<div class="col-sm-8">
															<textarea name="deskripsi_bangunan" class="form-control" required><?= $row->deskripsi_bangunan ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kategori</label>
															<div class="col-sm-8">
																<select name="kategori_bangunan" class="form-control" required="">
																	<option></option>
																	<option <?= ($row->kategori_bangunan == "MBR") ? 'selected="selected"' : '' ?>>MBR</option>
																	<option <?= ($row->kategori_bangunan == "NON MBR") ? 'selected="selected"' : '' ?>>NON MBR</option>
																</select>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Tipe</label>
														<div class="col-sm-8">
															<input type="text" name="tipe_bangunan" class="form-control" value="<?= $row->tipe_bangunan; ?>" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Tersedia</label>
															<div class="col-sm-8 row">
																<div class="col-sm-6">
																	<input type="number" name="jumlah_tersedia" class="form-control" value="<?= $row->jumlah_tersedia ?>" required="">
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
																	<input type="number" name="harga_bangunan" id="rupiah" value="<?= $row->harga_bangunan ?>" class="form-control" required="">
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
																	<input type="text" name="luas_bangunan" value="<?= $row->luas_bangunan; ?>" class="form-control" required>
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
																	<input type="text" name="dimensi_bangunan" value="<?= $row->dimensi_bangunan; ?>" class="form-control" required>
																</div>
																(dalam satuan meter)
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Luas Tanah</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="text" name="luas_tanah" value="<?= $row->luas_tanah; ?>" class="form-control" required>
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
																	<input type="text" name="dimensi_tanah" value="<?= $row->dimensi_bangunan; ?>" class="form-control" required>
																</div>
																(dalam satuan meter)
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Lantai</label>
														<div class="col-sm-8">
															<select name="jumlah_lantai" class="form-control">
																<option></option>
																<option value="1" <?= ($row->jumlah_lantai==1) ? 'selected="selected"' : '' ?>>1 Lantai</option>
																<option value="2" <?= ($row->jumlah_lantai==2) ? 'selected="selected"' : '' ?>>2 Lantai</option>
																<option value="3" <?= ($row->jumlah_lantai==3) ? 'selected="selected"' : '' ?>>3 Lantai</option>
																<option value="4" <?= ($row->jumlah_lantai==4) ? 'selected="selected"' : '' ?>>4+ Lantai</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Kamar Tidur</label>
														<div class="col-sm-8">
															<select name="jumlah_kamar" class="form-control">
																<option></option>
																<option value="1" <?= ($row->jumlah_kamar==1) ? 'selected="selected"' : '' ?>>1 Kamar Tidur</option>
																<option value="2" <?= ($row->jumlah_kamar==2) ? 'selected="selected"' : '' ?>>2 Kamar Tidur</option>
																<option value="3" <?= ($row->jumlah_kamar==3) ? 'selected="selected"' : '' ?>>3 Kamar Tidur</option>
																<option value="4" <?= ($row->jumlah_kamar==4) ? 'selected="selected"' : '' ?>>4 Kamar Tidur</option>
																<option value="5" <?= ($row->jumlah_kamar==5) ? 'selected="selected"' : '' ?>>5 Kamar Tidur</option>
																<option value="6" <?= ($row->jumlah_kamar==6) ? 'selected="selected"' : '' ?>>6 Kamar Tidur</option>
																<option value="7" <?= ($row->jumlah_kamar==7) ? 'selected="selected"' : '' ?>>7 Kamar Tidur</option>
																<option value="8" <?= ($row->jumlah_kamar==8) ? 'selected="selected"' : '' ?>>8 Kamar Tidur</option>
																<option value="9" <?= ($row->jumlah_kamar==9) ? 'selected="selected"' : '' ?>>9+ Kamar Tidur</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Kamar Mandi</label>
														<div class="col-sm-8">
															<select name="jumlah_kamar_mandi" class="form-control">
																<option></option>
																<option value="1" <?= ($row->jumlah_kamar_mandi==1) ? 'selected="selected"' : '' ?>>1 Kamar Mandi</option>
																<option value="2" <?= ($row->jumlah_kamar_mandi==2) ? 'selected="selected"' : '' ?>>2 Kamar Mandi</option>
																<option value="3" <?= ($row->jumlah_kamar_mandi==3) ? 'selected="selected"' : '' ?>>3 Kamar Mandi</option>
																<option value="4" <?= ($row->jumlah_kamar_mandi==4) ? 'selected="selected"' : '' ?>>4 Kamar Mandi</option>
																<option value="5" <?= ($row->jumlah_kamar_mandi==5) ? 'selected="selected"' : '' ?>>5 Kamar Mandi</option>
																<option value="6" <?= ($row->jumlah_kamar_mandi==6) ? 'selected="selected"' : '' ?>>6 Kamar Mandi</option>
																<option value="7" <?= ($row->jumlah_kamar_mandi==7) ? 'selected="selected"' : '' ?>>7 Kamar Mandi</option>
																<option value="8" <?= ($row->jumlah_kamar_mandi==8) ? 'selected="selected"' : '' ?>>8 Kamar Mandi</option>
																<option value="9" <?= ($row->jumlah_kamar_mandi==9) ? 'selected="selected"' : '' ?>>9+ Kamar Mandi</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Garasi</label>
														<div class="col-sm-8">
															<select name="jumlah_garasi" class="form-control">
																<option></option>
																<option value="1" <?= ($row->jumlah_garasi==1) ? 'selected="selected"' : '' ?>>1 Mobil</option>
																<option value="2" <?= ($row->jumlah_garasi==2) ? 'selected="selected"' : '' ?>>2 Mobil</option>
																<option value="3" <?= ($row->jumlah_garasi==3) ? 'selected="selected"' : '' ?>>3 Mobil</option>
																<option value="4" <?= ($row->jumlah_garasi==4) ? 'selected="selected"' : '' ?>>4 Mobil</option>
																<option value="5" <?= ($row->jumlah_garasi==5) ? 'selected="selected"' : '' ?>>5 Mobil</option>
																<option value="6" <?= ($row->jumlah_garasi==6) ? 'selected="selected"' : '' ?>>6 Mobil</option>
																<option value="7" <?= ($row->jumlah_garasi==7) ? 'selected="selected"' : '' ?>>7 Mobil</option>
																<option value="8" <?= ($row->jumlah_garasi==8) ? 'selected="selected"' : '' ?>>8 Mobil</option>
																<option value="9" <?= ($row->jumlah_garasi==9) ? 'selected="selected"' : '' ?>>9+ Mobil</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Pasokan Listrik</label>
														<div class="col-sm-8">
															<select name="listrik" class="form-control">
																<option></option>
																<option value="450" <?= ($row->listrik==450) ? 'selected="selected"' : '' ?>>450 watt</option>
																<option value="900" <?= ($row->listrik==900) ? 'selected="selected"' : '' ?>>900 watt</option>
																<option value="1300" <?= ($row->listrik==1300) ? 'selected="selected"' : '' ?>>1300 watt</option>
																<option value="2200" <?= ($row->listrik==2200) ? 'selected="selected"' : '' ?>>2200 watt</option>
																<option value="3500" <?= ($row->listrik==3500) ? 'selected="selected"' : '' ?>>3500 watt</option>
																<option value="4400" <?= ($row->listrik==4400) ? 'selected="selected"' : '' ?>>4400 watt</option>
																<option value="5500" <?= ($row->listrik==5500) ? 'selected="selected"' : '' ?>>5500 watt</option>
																<option value="6600" <?= ($row->listrik==6600) ? 'selected="selected"' : '' ?>>6600 watt</option>
																<option value="7600" <?= ($row->listrik==7600) ? 'selected="selected"' : '' ?>>7600 watt</option>
																<option value="7700" <?= ($row->listrik==7700) ? 'selected="selected"' : '' ?>>7700 watt</option>
																<option value="8000" <?= ($row->listrik==8000) ? 'selected="selected"' : '' ?>>8000 watt</option>
																<option value="9500" <?= ($row->listrik==9500) ? 'selected="selected"' : '' ?>>9500 watt</option>
																<option value="10000" <?= ($row->listrik==10000) ? 'selected="selected"' : '' ?>>10000 watt</option>
																<option value="10600" <?= ($row->listrik==10600) ? 'selected="selected"' : '' ?>>10600 watt</option>
															</select>
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