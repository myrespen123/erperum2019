<?php $this->load->view('operator/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Ubah Data Info
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="operator/data_info">Main Info</a></li>
     		<li class="active">Ubah Data Info</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('operator/mainfo_update/'.$row->id_main_info) ?>">
						<div class="box-body ">
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Judul</label>
									<div class="col-sm-9">
										<input type="text" name="judul" class="form-control" value="<?= $row->judul; ?>" required>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Deskripsi</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="deskripsi" required=""><?= $row->deskripsi; ?></textarea>
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Foto</label>
									<div class="col-sm-9">
										<input type="file" name="foto" class="form-control" onchange="readURL(this);" >
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2 visible-hide">Foto</label>
									<div class="col-sm-9 img-preview">
										<img id="img-priview" src="<?= base_url('file/main/images/'.$row->foto); ?>">
									</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary col-sm-2 visible-hide"></button>
							<button type="submit" name="update_mainfo" class="btn btn-primary col-sm-2">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('operator/parts/footer_admin') ?>