<?php $this->load->view('pengembangs/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data Foto</h1>
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
						<form enctype="multipart/form-data" method="POST" action="<?= site_url('pengembangs/foto_insert/'.$rowp->id_bangunan) ?>">
							<div class="card-body">
								<div class="form-alerts">
									<?php if ($this->session->flashdata('simpan') == true): ?>
										<div class="alert alert-primary" role="alert">
										 	<?= $this->session->flashdata('simpan'); ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif ?>
									<?php if ($this->session->flashdata('gagal') == true): ?>
										<div class="alert alert-danger" role="alert">
										 	<?= $this->session->flashdata('gagal'); ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif ?>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="title-form col-sm-12">
													<h1>Tambah data</h1>
												</div>

												<div class="inner-box col-sm-12">
													<div class="mom-append-spekp">
														<div id="child-spekp">
															<div class="form-group row">
																<label class="col-sm-3">File Foto</label>
																<div class="col-sm-8">
																	<input type="file" name="foto_bangunan[]" class="form-control" value="<?= set_value('foto_bangunan'); ?>" required>
																</div>
															</div>
														</div>
													</div>
													<div class="button-group-append">
														<button type="button" id="tambah_spekp" class="btn button-plus">
															<i class="fa fa-plus"></i>
														</button>
														<button type="button" id="hapus_spekp" class="btn button-minus">
															<i class="fa fa-minus"></i>
														</button>
													</div>
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
											<div class="col-md-6">
												<div class="title-form col-sm-12">
													<h1>Foto</h1>
												</div>

												<div class="inner-box col-sm-12 table-responsive ">
													
													<table class="table table-bordered">
														<tr>
															<th>Foto</th>
															<th>Utama</th>
															<th>Aksi</th>
														</tr>
													<?php foreach ($foto_bangunan as $val_bangunan): ?>
														<tr>
															<td>
																<img src="<?= base_url('file/perumahan/images/'.$val_bangunan['foto_bangunan']); ?>" class="img-admins-detail">
															</td>
															<td>
																<?php if ($val_bangunan['level_foto']=='1'): ?>
																	<div class="status status-green">Utama</div>
																<?php elseif ($val_bangunan['level_foto']=='0'): ?>
																	<a href="<?= site_url('pengembangs/detail_foto_primer/'.$val_bangunan['id_foto_bangunan']); ?>">
																		<div class="status status-blue">Utamakan</div>
																	</a>
																<?php endif ?>
															</td>
															<td>
																<a href="<?= site_url('pengembangs/foto_delete/'.$val_bangunan['id_foto_bangunan']) ?>">
																	<button type="button" id="tambah_spekp" class="btn button-minus">
																		<i class="fa fa-close"></i>
																	</button>
																</a>
															</td>
														</tr>
													<?php endforeach ?>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</section>

	</div>

<?php $this->load->view('pengembangs/parts/footer') ?>