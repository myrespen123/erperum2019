<?php $this->load->view('pengembangs/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data Properti <?= $row->nama_perumahan ?></h1>
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
							<?php if ($row->status_perumahan != 0): ?>
								<a href="<?= site_url('pengembangs/properti_create/'.$id_perumahan) ?>" class="btn button-insert" id="btn-usulan-insert">
									Tambah Data
								</a>
							<?php else: ?>
								<button  class="btn status-red" style="cursor: no-drop;" id="btn-usulan-insert" disabled>
									Tambah Data
								</button>
							<?php endif ?>
						</div>
						<div class="card-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Kategori</th>
										<th>Jumlah Tersedia</th>
										<th>Spesifikasi Rumah</th>
										<th>Foto</th>
										<th>Status Publish</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $value): ?>
										<tr>
											<td><?= $key+1; ?></td>
											<td><?= $value['nama_bangunan'] ?></td>
											<td><?= $value['kategori_bangunan'] ?></td>
											<td><?= $value['jumlah_tersedia'] ?> unit</td>
											<td>
												<a href="<?= site_url('pengembangs/detail_spesifikasi/'.$value['id_bangunan']) ?>">
													<button type="button" class="btn btn-outline-success">Detail/Ubah</button>
												</a>
											</td>
											<td>
												<a href="<?= site_url('pengembangs/detail_foto/'.$value['id_bangunan']) ?>">
													<button type="button" class="btn btn-outline-primary">Detail/Ubah</button>
												</a>
											</td>
											<td>
												<?php if ($value['status_publish']=="1"): ?>
													<a href="<?= site_url('pengembangs/properti_setpublish/'.$value['id_bangunan']) ?>">
														<div class="status status-green">Aktif</div>
													</a>
												<?php elseif ($value['status_publish']=="0"): ?>
													<div class="status status-red">belum disetujui</div>
												<?php elseif ($value['status_publish']=="2"): ?>
													<a href="<?= site_url('pengembangs/properti_setpublish/'.$value['id_bangunan']) ?>">
														<div class="status status-blue">tidak aktif</div>
													</a>
												<?php else: ?>
													<div class="status status-black">error data</div>
												<?php endif ?>
											</td>
											<td class="text-center">
												<a class="ms5 btn button-detail" href="<?php echo site_url('pengembangs/properti_detail/'.$value['id_bangunan']) ?>">
													<i class="fa fa-info"></i>
												</a>
												<a class="ms5 btn button-edit" href="<?php echo site_url('pengembangs/properti_edit/'.$value['id_bangunan']) ?>">
													<i class="fa fa-pencil"></i>
												</a>
												<!-- <a class="ms5 btn button-delete" href="<?php echo site_url('pengembangs/properti_delete/'.$value['id_bangunan']) ?>" onclick="return confirm('Ingin menghapus data ?');">
													<i class="fa fa-trash"></i>
												</a> -->
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

<?php $this->load->view('pengembangs/parts/footer') ?>