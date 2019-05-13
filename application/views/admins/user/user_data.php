<?php $this->load->view('admins/parts/header') ?>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Data User</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Data User</li>
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
							<a href="<?= site_url('admins/user_create') ?>" class="btn button-insert" id="btn-usulan-insert">
								Tambah Data
							</a>
						</div>
						<div class="card-body table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Username</th>
										<th>Level</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $value): ?>
										<tr>
											<td><?= $key+1; ?></td>
											<td><?= $value['username'] ?></td>
											<td>
												<?php if ($value['level'] == 1): ?>
													Admins
												<?php elseif($value['level'] == 2): ?>
													Pengembang
												<?php else: ?>
													Unkown User
												<?php endif ?>
											</td>
											<td>
												<?php if ($value['status']=='1'): ?>
													<a href="<?= site_url('admins/nonaktif/'.$value['id_user']); ?>" onclick="return confirm('Yakin ingin matikan akun?');">
														<i class="activate-user fa fa-check-square"></i>
													</a>
												<?php elseif ($value['status']=='0'): ?>
													<a href="<?= site_url('admins/aktifkan/'.$value['id_user']); ?>" onclick="return confirm('Yakin ingin aktifkan akun?');">
														<i class="inactivate-user fa fa-times"></i>
													</a>
												<?php endif ?>
											</td>
											<td class="text-center">
												<!-- <a class="ms5 btn button-detail" href="<?php echo site_url('admins/user_detail/'.$value['id_user']) ?>">
													<i class="fa fa-info"></i>
												</a> -->
												<a class="ms5 btn button-edit" href="<?php echo site_url('admins/user_edit/'.$value['id_user']) ?>">
													<i class="fa fa-pencil"></i>
												</a><!-- 
												<a class="ms5 btn button-delete" href="<?php echo site_url('admins/user_delete/'.$value['id_user']) ?>" onclick="return confirm('Ingin menghapus data ?');">
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

<?php $this->load->view('admins/parts/footer') ?>