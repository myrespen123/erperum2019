<?php $this->load->view('admin/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Tambah Data Pengembang
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="admin/data_pengembang">Pengembang</a></li>
     		<li class="active">Tambah Pengembang</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('admin/pengembang_insert') ?>">
						<div class="box-body ">
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Nama</label>
									<div class="col-sm-9">
										<input type="text" class="form-control detil-dat" value="<?= $row->kontak_nama; ?>" readonly="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">No Telepon</label>
									<div class="col-sm-9">
										<input type="text" class="form-control detil-dat" value="<?= $row->kontak_telepon; ?>" readonly="">
									</div>
							</div>
							<div class="form-group">
								<label class="input-label control-label text-align-left col-sm-2">Pesan</label>
									<div class="col-sm-9">
										<textarea class="form-control detil-dat" readonly=""><?= $row->kontak_pesan; ?></textarea>
									</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('admin/parts/footer_admin') ?>