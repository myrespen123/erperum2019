<?php $this->load->view('pengembang/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Data Foto
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?php echo site_url('pengembang') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="<?php echo site_url('pengembang/data_perumahan') ?>">Data Perumahan</a></li>
     		<li class="active">Data Foto</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/foto_insert/'.$row->id_bangunan) ?>">
						<div class="box-body box-append">
							<div class="title-form-sect">
								Foto
							</div>
							
							<div class="mom-append-fotop">
								<div id="child-fotop">
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-2">Foto</label>
											<div class="col-sm-9">
												<input type="file" name="foto_bangunan[]" class="form-control" required="">
											</div>
									</div>
								</div>
							</div>
							<i class="text-warning">* Max Ukuran Foto 2 MB</i>
							<div class="button-group-append">
								<button type="button" id="tambah_fotop" class="btn button-plus">
									<i class="fa fa-plus"></i>
								</button>
								<button type="button" id="hapus_fotop" class="btn button-minus">
									<i class="fa fa-minus"></i>
								</button>
							</div>
						<div class="box-footer" style="border: none;">
							<!-- <button type="button" class="btn btn-primary col-sm-2 visible-hide"></button> -->
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>
					<hr>
					<div class="box-body table-responsive">
						<table class="tb-tb-desk table table-bordered">
							<thead>
								<tr>
									<th style="width: 5%;">No</th>
									<th>Deskripsi</th>
									<th style="width: 5%;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data1 as $keyfoto => $valfoto): ?>
									<tr>
										<td><?php echo $keyfoto+1 ?></td>
										<td>
											<img class="img-bgn img-fluid" src="<?php echo base_url('file/perumahan/images/'.$valfoto['foto_bangunan']) ?>">
										</td>
										<td class="text-center">
											<a href="<?= site_url('pengembang/foto_delete/'.$valfoto['id_foto_bangunan']) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
												<i class="fa fa fa-times-rectangle close-one"></i>
											</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('pengembang/parts/footer_admin') ?>