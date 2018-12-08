<?php $this->load->view('pengembang/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Ubah Data Pengembang
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?php echo site_url('pengembang') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li class="active">Data Akun</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="container">
					 	<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Data Umum</a></li>
					    	<li><a data-toggle="tab" href="#menu1">Data Akun</a></li>
					  	</ul>

					  	<div class="tab-content">
					    	<div id="home" class="tab-pane fade in active">
					      		<h3>Data Umum</h3>
					      		<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/pengembang_update/'.$row->id_pengembang) ?>">
									<div class="box-body ">
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Nama</label>
												<div class="col-sm-9">
													<input type="text" name="nama_pengembang" class="form-control" value="<?= $row->nama_pengembang; ?>" required="">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">No KTP</label>
												<div class="col-sm-9">
													<input type="text" name="nik_pengembang" class="form-control" value="<?= $row->nik_pengembang; ?>" required="">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">No HP</label>
												<div class="col-sm-9">
													<input type="text" name="telepon_pengembang" class="form-control" value="<?= $row->telepon_pengembang; ?>" required="">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Email</label>
												<div class="col-sm-9">
													<input type="text" name="email_pengembang" class="form-control" value="<?= $row->email_pengembang; ?>" required="">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Alamat</label>
												<div class="col-sm-9">
													<textarea name="alamat_pengembang" class="form-control" required=""><?= $row->alamat_pengembang; ?></textarea>
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Foto</label>
												<div class="col-sm-9">
													<input type="file" name="foto_pengembang" class="form-control" onchange="readURL(this);">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2 visible-hide">Foto</label>
												<div class="col-sm-9 img-preview">
													<img id="img-priview" src="<?= base_url('file/pengembang/images/'.$row->foto_pengembang); ?>">
												</div>
										</div>
									</div>
									<div class="box-footer">
										<button type="button" class="btn btn-primary col-sm-2 visible-hide"></button>
										<button type="submit" name="update_pengembang" class="btn btn-primary col-sm-2">Simpan</button>
									</div>
								</form>
					    	</div>
						    <div id="menu1" class="tab-pane fade">
						      	<h3>Data Akun</h3>
						      	<form class="form-horizontal p20" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/akun_update/'.$row->id_user) ?>">
									<div class="box-body">
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Username</label>
												<div class="col-sm-8">
													<input type="text" name="username" class="form-control" value="<?= $row->username; ?>" required="">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Password Lama</label>
												<div class="col-sm-8">
													<input type="password" name="password_old" class="form-control" required="">
												</div>
										</div>
										<div class="form-group">
											<label class="input-label control-label text-align-left col-sm-2">Password Baru</label>
												<div class="col-sm-8">
													<input type="password" name="password" class="form-control" required="">
												</div>
										</div>
									</div>
									<div class="box-footer">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
						    </div>
					 	</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('pengembang/parts/footer_admin') ?>