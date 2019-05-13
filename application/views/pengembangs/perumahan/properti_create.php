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
						<form enctype="multipart/form-data" method="POST" action="<?= site_url('pengembangs/properti_insert/'.$id_perumahan) ?>">
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
															<input type="text" name="nama_bangunan" class="form-control" value="<?= set_value('judul'); ?>" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Deskripsi</label>
														<div class="col-sm-8">
															<textarea name="deskripsi_bangunan" class="form-control" value="<?= set_value('deskripsi_bangunan'); ?>" required></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Kategori</label>
															<div class="col-sm-8">
																<select name="kategori_bangunan" class="form-control" required="">
																	<option></option>
																	<option>MBR</option>
																	<option>NON MBR</option>
																</select>
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Tipe</label>
														<div class="col-sm-8">
															<input type="text" name="tipe_bangunan" class="form-control" value="<?= set_value('tipe_bangunan'); ?>" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Tersedia</label>
															<div class="col-sm-8 row">
																<div class="col-sm-6">
																	<input type="number" name="jumlah_tersedia" class="form-control" required="">
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
																	<input type="number" name="harga_bangunan" id="rupiah" class="form-control" required="">
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
															<textarea name="lokasi_bangunan" class="form-control" readonly=""><?= $row->lokasi ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Luas Bangunan</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="number" name="luas_bangunan" class="form-control" required>
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
																	<input type="number" name="dimensib_kiri" class="form-control" required>
																</div>
																X
																<div class="col-sm-4">
																	<input type="number" name="dimensib_kanan" class="form-control" required>
																</div>
																(dalam satuan meter)
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Luas Tanah</label>
															<div class="col-sm-8 row">
																<div class="col-sm-4">
																	<input type="number" name="luas_tanah" class="form-control" required>
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
																	<input type="number" name="dimensit_kiri" class="form-control" required>
																</div>
																X
																<div class="col-sm-4">
																	<input type="number" name="dimensit_kanan" class="form-control" required>
																</div>
																(dalam satuan meter)
															</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Lantai</label>
														<div class="col-sm-8">
															<select name="jumlah_lantai" class="form-control" required="">
																<option></option>
																<option value="1">1 Lantai</option>
																<option value="2">2 Lantai</option>
																<option value="3">3 Lantai</option>
																<option value="4">4+ Lantai</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Kamar Tidur</label>
														<div class="col-sm-8">
															<select name="jumlah_kamar" class="form-control" required="">
																<option></option>
																<option value="1">1 Kamar Tidur</option>
																<option value="2">2 Kamar Tidur</option>
																<option value="3">3 Kamar Tidur</option>
																<option value="4">4 Kamar Tidur</option>
																<option value="5">5 Kamar Tidur</option>
																<option value="6">6 Kamar Tidur</option>
																<option value="7">7 Kamar Tidur</option>
																<option value="8">8 Kamar Tidur</option>
																<option value="9">9+ Kamar Tidur</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Kamar Mandi</label>
														<div class="col-sm-8">
															<select name="jumlah_kamar_mandi" class="form-control" required="">
																<option></option>
																<option value="1">1 Kamar Mandi</option>
																<option value="2">2 Kamar Mandi</option>
																<option value="3">3 Kamar Mandi</option>
																<option value="4">4 Kamar Mandi</option>
																<option value="5">5 Kamar Mandi</option>
																<option value="6">6 Kamar Mandi</option>
																<option value="7">7 Kamar Mandi</option>
																<option value="8">8 Kamar Mandi</option>
																<option value="9">9+ Kamar Mandi</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Jumlah Garasi</label>
														<div class="col-sm-8">
															<select name="jumlah_garasi" class="form-control" required="">
																<option></option>
																<option value="1">1 Mobil</option>
																<option value="2">2 Mobil</option>
																<option value="3">3 Mobil</option>
																<option value="4">4 Mobil</option>
																<option value="5">5 Mobil</option>
																<option value="6">6 Mobil</option>
																<option value="7">7 Mobil</option>
																<option value="8">8 Mobil</option>
																<option value="9">9+ Mobil</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-3">Pasokan Listrik</label>
														<div class="col-sm-8">
															<select name="listrik" class="form-control" required="">
																<option></option>
																<option value="450">450 watt</option>
																<option value="900">900 watt</option>
																<option value="1300">1300 watt</option>
																<option value="2200">2200 watt</option>
																<option value="3500">3500 watt</option>
																<option value="4400">4400 watt</option>
																<option value="5500">5500 watt</option>
																<option value="6600">6600 watt</option>
																<option value="7600">7600 watt</option>
																<option value="7700">7700 watt</option>
																<option value="8000">8000 watt</option>
																<option value="9500">9500 watt</option>
																<option value="10000">10000 watt</option>
																<option value="10600">10600 watt</option>
																<option value="11000">11000 watt</option>
																<option value="12700">12700 watt</option>
																<option value="13200">13200 watt</option>
																<option value="13300">13300 watt</option>
																<option value="13900">13900 watt</option>
																<option value="16500">16500 watt</option>
																<option value="17600">17600 watt</option>
																<option value="19000">19000 watt</option>
																<option value="22000">22000 watt</option>
																<option value="23000">23000 watt</option>
																<option value="24000">24000 watt</option>
																<option value="30500">30500 watt</option>
																<option value="33000">33000 watt</option>
																<option value="38100">38100 watt</option>
																<option value="41500">41500 watt</option>
																<option value="47500">47500 watt</option>
																<option value="53000">53000 watt</option>
																<option value="61000">61000 watt</option>
																<option value="66000">66000 watt</option>
																<option value="76000">76000 watt</option>
																<option value="82500">82500 watt</option>
																<option value="85000">85000 watt</option>
																<option value="95000">95000 watt</option>
															</select>
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
														<div id="child-spekp">
															<div class="form-group row">
																<label class="col-sm-3">Nama Spesifikasi Rumah</label>
																<div class="col-sm-8">
																	<input type="text" name="nama_spesifikasi_rumah[]" class="form-control" value="<?= set_value('nama_spesifikasi_rumah'); ?>" required>
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
												<div class="title-form col-sm-12">
													<h1>Foto</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="mom-append-fotop">
														<div id="child-fotop">
															<div class="form-group row">
																<label class="col-sm-3">Foto</label>
																<div class="col-sm-8">
																	<input type="file" name="foto_bangunan[]" class="form-control" value="<?= set_value('foto_bangunan'); ?>" required>
																</div>
															</div>
														</div>
													</div>
													<div class="button-group-append">
														<button type="button" id="tambah_fotop" class="btn button-plus">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" id="hapus_fotop" class="btn button-minus">
															<i class="fa fa-minus"></i>
														</button>
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