<?php $this->load->view('pengembang/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Data Sarana
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?php echo site_url('pengembang') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li><a href="<?php echo site_url('pengembang/data_perumahan') ?>">Data Perumahan</a></li>
     		<li class="active">Data Sarana</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">

					<form class="form-horizontal p20" autocomplete="off" method="POST" enctype="multipart/form-data" action="<?= site_url('pengembang/sarana_insert/'.$row->id_bangunan) ?>">
						<div class="box-body box-append">
							<div class="title-form-sect">
								Sarana & Prasarana
							</div>
							<div class="mom-append-sarana">
								<div id="child-sarana">
									<div class="form-group">
										<label class="input-label control-label text-align-left col-sm-2">Sarana Prasarana</label>
											<div class="col-sm-9">
												<input type="text" name="nama_sarana_prasarana[]" class="form-control" required="">
											</div>
									</div>
								</div>
							</div>
							<div class="button-group-append">
								<button type="button" id="tambah_sarana" class="btn button-plus">
									<i class="fa fa-plus"></i>
								</button>
								<button type="button" id="hapus_sarana" class="btn button-minus">
									<i class="fa fa-minus"></i>
								</button>
							</div>
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
								<?php foreach ($data2 as $keySarana => $valueSarana): ?>
									<tr>
										<td><?php echo $keySarana+1 ?></td>
										<td><?php echo $valueSarana['nama_sarana_prasarana'] ?></td>
										<td class="text-center">
											<a href="<?= site_url('pengembang/sarana_delete/'.$valueSarana['id_sarana_prasarana']) ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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