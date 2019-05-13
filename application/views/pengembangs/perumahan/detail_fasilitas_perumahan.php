<?php $this->load->view('pengembangs/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data Fasilitas</h1>
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
						<form enctype="multipart/form-data" method="POST" action="<?= site_url('pengembangs/estate_fasilitas_insert/'.$rowp->id_perumahan) ?>">
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
																<label class="col-sm-3">Nama Fasilitas</label>
																<div class="col-sm-8">
																	<input type="text" name="nama_fasilitas_perumahan[]" class="form-control" value="<?= set_value('nama_fasilitas_perumahan'); ?>" required>
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
											</div>
											<div class="col-md-6">
												<div class="title-form col-sm-12">
													<h1>Fasilitas</h1>
												</div>

												<div class="inner-box col-sm-12">
													<?php foreach ($fasilitas_perumahan as $result_fasilitas): ?>
														<div class="form-group row">
															<label class="col-sm-3">Nama Fasilitas</label>
															<div class="col-sm-8">
																<input type="text" class="form-control" value="<?= $result_fasilitas['nama_fasilitas_perumahan'] ?>" readonly>
															</div>
															<a href="<?= site_url('pengembangs/estate_fasilitas_delete/'.$result_fasilitas['id_fasilitas_perumahan']) ?>">
																<button type="button" id="tambah_spekp" class="btn button-minus">
																	<i class="fa fa-close"></i>
																</button>
															</a>
														</div>
													<?php endforeach ?>
												</div> 
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
		</section>

	</div>

<?php $this->load->view('pengembangs/parts/footer') ?>