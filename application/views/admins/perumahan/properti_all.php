<?php $this->load->view('admins/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data properti</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Data properti</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

 		<section class="content">
			<div class="row">
				<div class="col-md-12">				
					<div class="card">
						<div class="card-header">
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
							<!-- <a class="btn button-insert" id="btn-usulan-insert">
								Tambah Data
							</a> -->
						</div>
						<div class="card-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Pengembang</th>
										<th>Nama</th>
										<th>Kategori</th>
										<th>Harga</th>
										<th>Jumlah Tersedia</th>
										<th>Status Publish</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $value): ?>
										<tr>
											<td><?= $key+1; ?></td>
											<td><?= $value['nama_pengembang'] ?></td>
											<td><?= $value['nama_bangunan'] ?></td>
											<td><?= $value['kategori_bangunan'] ?></td>
											<td>Rp. <?= number_format($value['harga_bangunan'], 0, ".", "."); ?></td>
											<td><?= $value['jumlah_tersedia'] ?> unit</td>
											<td>
												<?php if ($value['status_publish']=="1" || $value['status_publish']=="2"): ?>
													<a href="<?= site_url('admins/properti_confirm/'.$value['id_bangunan']) ?>">
														<div class="status status-green">Sudah Dikonfirmasi</div>
													</a>
												<?php elseif ($value['status_publish']=="0"): ?>
													<a href="<?= site_url('admins/properti_confirm/'.$value['id_bangunan']) ?>">
														<div class="status status-red">Belum Dikonfirmasi</div>
													</a>
												<?php else: ?>
													<div class="status status-black">error data</div>
												<?php endif ?>
											</td>
											<td class="text-center">
												<a class="ms5 btn button-detail" href="<?php echo site_url('admins/properti_detail/'.$value['id_bangunan']) ?>">
													<i class="fa fa-info"></i>
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

<?php $this->load->view('admins/parts/footer') ?>