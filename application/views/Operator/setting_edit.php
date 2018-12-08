<?php $this->load->view('operator/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Ubah Data Setting
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="operator/data_setting">Setting</a></li>
     		<li class="active">Ubah Data Setting</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('operator/setting_update/'.$row->id_setting) ?>">
						<div class="box-body ">
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Nama Website</label>
									<div class="col-sm-9">
										<input type="text" name="nama_website" class="form-control" value="<?= $row->nama_website; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Deskripsi</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="deskripsi_website" required=""><?= $row->deskripsi_website; ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Slogan</label>
									<div class="col-sm-9">
										<input type="text" name="slogan_setting" class="form-control" value="<?= $row->slogan_setting; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Alamat</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="alamat_setting" required=""><?= $row->alamat_setting; ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Telepon</label>
									<div class="col-sm-9">
										<input type="text" name="telepon_setting" class="form-control" value="<?= $row->telepon_setting; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Email</label>
									<div class="col-sm-9">
										<input type="text" name="email_setting" class="form-control" value="<?= $row->email_setting; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Jam Kerja</label>
									<div class="col-sm-9">
										<input type="text" name="jam_setting" class="form-control" value="<?= $row->jam_setting; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Copyright</label>
									<div class="col-sm-9">
										<input type="text" name="copyright" class="form-control" value="<?= $row->copyright; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Embed Google Map</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="embed_gmap" required=""><?= $row->embed_gmap; ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Foto</label>
									<div class="col-sm-9">
										<input type="file" name="logo_setting" class="form-control" onchange="readURL(this);" >
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2 visible-hide">Logo</label>
									<div class="col-sm-9 img-preview">
										<img id="img-priview" src="<?= base_url('file/main/images/'.$row->logo_setting); ?>">
									</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary col-sm-2 visible-hide"></button>
							<button type="submit" name="update_setting" class="btn btn-primary col-sm-2">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('operator/parts/footer_admin') ?>