<?php $this->load->view('admins/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data pengembang</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Data pengembang</li>
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
							<a href="<?= site_url('admins/pengembang_create') ?>" class="btn button-insert" id="btn-usulan-insert">
								Tambah Data
							</a>
						</div>
						<div class="card-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Telepon</th>
										<th>Email</th>
										<th>Alamat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $value): ?>
										<tr>
											<td><?= $key+1; ?></td>
											<td><?= $value['nama_pengembang'] ?></td>
											<td><?= $value['telepon_pengembang'] ?></td>
											<td><?= $value['email_pengembang'] ?></td>
											<td><?= $value['alamat_pengembang'] ?></td>
											<td class="text-center">
												<a class="ms5 btn button-detail" href="<?php echo site_url('admins/pengembang_detail/'.$value['id_pengembang']) ?>">
													<i class="fa fa-info"></i>
												</a>
												<a class="ms5 btn button-edit" href="<?php echo site_url('admins/pengembang_edit/'.$value['id_pengembang']) ?>">
													<i class="fa fa-pencil"></i>
												</a>
												<a class="ms5 btn button-delete" href="<?php echo site_url('admins/pengembang_delete/'.$value['id_pengembang']) ?>" onclick="return confirm('Ingin menghapus data ?');">
													<i class="fa fa-trash"></i>
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