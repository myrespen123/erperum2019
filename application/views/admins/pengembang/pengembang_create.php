<?php $this->load->view('admins/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Tambah Data Pengembang</h1>
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
						<form enctype="multipart/form-data" method="POST" action="<?= site_url('admins/pengembang_insert') ?>">
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
														<input type="text" name="nama_pengembang" class="form-control" value="<?= set_value('nama_pengembang'); ?>" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">NIK</label>
													<div class="col-sm-8">
														<input type="text" name="nik_pengembang" class="form-control" value="<?= set_value('nik_pengembang'); ?>" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Telepon/HP</label>
													<div class="col-sm-8">
														<input type="text" name="telepon_pengembang" class="form-control" value="<?= set_value('telepon_pengembang') ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Email</label>
													<div class="col-sm-8">
														<input type="text" name="email_pengembang" class="form-control" value="<?= set_value('email_pengembang') ?>">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3">Alamat</label>
													<div class="col-sm-8">
														<input type="text" name="alamat_pengembang" class="form-control" value="<?= set_value('alamat_pengembang'); ?>" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Ijin Perusahaan</label>
													<div class="col-sm-8">
														<input type="file" name="ijin_perusahaan" class="form-control" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Foto</label>
													<div class="col-sm-8">
														<input type="file" name="foto_pengembang" class="form-control" value="<?= set_value('foto_pengembang'); ?>" required>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="title-form col-sm-12">
										<h1>Data User</h1>
									</div>

									<div class="inner-box col-sm-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3">Email</label>
													<div class="col-sm-8">
														<input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" required>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Password</label>
													<div class="col-sm-8">
														<input type="password" name="password" class="form-control" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3">Konfirmasi Password</label>
													<div class="col-sm-8">
														<input type="password" name="re_password" class="form-control" required="">
													</div>
												</div>
											</div>
										</div>
									</div>

									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>	
				</div>
			</div>
		</section>

	</div>

<?php $this->load->view('admins/parts/footer') ?>
