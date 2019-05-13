<?php $this->load->view('admins/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Detail Data Pengembang</h1>
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
						<form enctype="multipart/form-data">
							<div class="card-body">
								<div class="col-md-12">
									<div class="title-form col-sm-12">
										<h1>Data Umum</h1>
									</div>

									<div class="inner-box col-sm-12">
											<?php if (validation_errors()) : ?>
											  <div class="alert alert-danger">
												<?php echo validation_errors(); ?>
											  </div>
											<?php endif; ?>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3">Nama Lengkap</label>
													<div class="col-sm-8">
														<input type="text" name="nama_pengembang" class="form-control" value="<?= $row->nama_pengembang ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">NIK</label>
													<div class="col-sm-8">
														<input type="text" name="nik_pengembang" class="form-control" value="<?= $row->nik_pengembang ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Telepon/HP</label>
													<div class="col-sm-8">
														<input type="text" name="telepon_pengembang" class="form-control" value="<?= $row->telepon_pengembang ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Email</label>
													<div class="col-sm-8">
														<input type="text" name="email_pengembang" class="form-control" value="<?= $row->email_pengembang ?>" disabled>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3">Alamat</label>
													<div class="col-sm-8">
														<input type="text" name="alamat_pengembang" class="form-control" value="<?= $row->alamat_pengembang ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Ijin Perusahaan</label>
													<div class="col-sm-8">
														<a target="blank" href="<?= base_url('file/pengembang/file/'.$row->ijin_perusahaan); ?>" disabled>
															Klik untuk cek file
														</a>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Foto</label>
													<div class="col-sm-8">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 visible-hide">Foto</label>
														<div class="col-sm-8 img-preview">
															<img id="img-priview" src="<?= base_url('file/pengembang/images/'.$row->foto_pengembang); ?>" disabled>
														</div>
												</div>

											</div>
										</div>
									</div>
									<a href="javascript:history.back();">
										<button type="button" class="btn btn-primary">Kembali</button>
									</a>
								</div>
							</div>
						</form>
					</div>	
				</div>
			</div>
		</section>

	</div>

<?php $this->load->view('admins/parts/footer') ?>
