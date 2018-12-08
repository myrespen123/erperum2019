<?php $this->load->view('admin/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Detail Data Pengembang
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="admin/data_pengembang">Pengembang</a></li>
     		<li class="active">Detail Pengembang</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" enctype="multipart/form-data">
						<div class="box-body ">
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Nama</label>
									<div class="col-sm-9">
										<input type="text" name="nama_pengembang" class="form-control detail-dat" value="<?= $row->nama_pengembang ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">No KTP</label>
									<div class="col-sm-9">
										<input type="text" name="nik_pengembang" class="form-control detail-dat" value="<?= $row->nik_pengembang ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">No HP</label>
									<div class="col-sm-9">
										<input type="text" name="telepon_pengembang" class="form-control detail-dat" value="<?= $row->telepon_pengembang ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Email</label>
									<div class="col-sm-9">
										<input type="text" name="email_pengembang" class="form-control detail-dat" value="<?= $row->email_pengembang ?>" readonly>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Alamat</label>
									<div class="col-sm-9">
										<textarea name="alamat_pengembang" class="form-control detail-dat" readonly><?= $row->alamat_pengembang ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Foto</label>
									<div class="img-preview col-sm-9">
											<img src="<?php echo base_url('file/pengembang/images/'.$row->foto_pengembang) ?>" class="img-fluid">
									</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary col-sm-2 visible-hide"></button>
							<a href="<?= site_url('admin/data_pengembang') ?>">
								<button type="button" name="insert_pengembang" class="btn btn-primary col-sm-2">Kembali</button>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('admin/parts/footer_admin') ?>