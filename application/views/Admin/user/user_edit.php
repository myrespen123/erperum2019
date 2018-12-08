<?php $this->load->view('admin/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Tambah Data User
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="<?php echo site_url('admin/data_user') ?>">User</a></li>
     		<li class="active">Ubah Data User</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" method="POST" enctype="multipart/form-data" action="<?= site_url('admin/user_update/'.$id_user) ?>">
						<div class="box-body">
							<div class="form-group">
								<label class="input-label control-label col-sm-2">Username</label>
									<div class="col-sm-8">
										<input type="text" name="username" class="form-control" value="<?= $username; ?>" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label col-sm-2">Password</label>
									<div class="col-sm-8">
										<input type="password" name="password" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label col-sm-2">Konfirmasi Password</label>
									<div class="col-sm-8">
										<input type="password" name="re_password" class="form-control" required="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label col-sm-2">Hak Akses</label>
									<div class="col-sm-8">
										<select class="form-control" name="level" required="">
											<option selected disabled></option>
											<option value="1" <?= ($level == '1') ? 'selected="selected"' : ''; ?>>Admin</option>
											<option value="2" <?= ($level == '2') ? 'selected="selected"' : ''; ?>>Pengembang</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label col-sm-2">Status</label>
									<div class="col-sm-8">
										<select class="form-control" name="status" required="">
											<option selected disabled></option>
											<option value="1" <?= ($status == '1') ? 'selected="selected"' : ''; ?>>Aktif</option>
											<option value="0" <?= ($status == '0') ? 'selected="selected"' : ''; ?>>Tidak Aktif</option>
										</select>
									</div>
							</div>
						</div>
						<input type="hidden" value="<?= $id_user ?>" name="id_user">
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('admin/parts/footer_admin') ?>