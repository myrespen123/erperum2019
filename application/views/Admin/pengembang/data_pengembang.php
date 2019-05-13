<?php $this->load->view('admin/parts/header_admin'); ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Data Pengembang
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li class="active">Pengembang</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
					<?php if ($this->session->flashdata('simpan') == true): ?>
						<div class="alert alert-sukses" role="alert">
						 	<?= $this->session->flashdata('simpan'); ?>
						 	<button type="button" id="close-alert" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
					<?php if ($this->session->flashdata('gagal') == true): ?>
						<div class="alert alert-danjer" role="alert">
						 	<?= $this->session->flashdata('gagal'); ?>
					 		<button type="button" id="close-alert" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
						<a href="<?php echo site_url('admin/pengembang_create'); ?>" class="btn button-insert">
							Tambah Data
						</a>
					</div>

					<div class="box-body table-responsive">
						<table id="dtable" class="dtable table table-bordered table-striped">
		                	<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $pengembang => $val_pengembang): ?>
					                <tr>
										<td><?= $pengembang+1; ?></td>
										<td><?= $val_pengembang['nama_pengembang'] ?></td>
										<td><?= $val_pengembang['telepon_pengembang'] ?></td>
										<td><?= $val_pengembang['email_pengembang'] ?></td>
										<td><?= $val_pengembang['alamat_pengembang'] ?></td>
										<td>
											<div class="dropdown show">
												<button type="button" class="btn button-dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Aksi <i class="fa fa-caret-down"></i>
												</button>

											  <div class="dropdown-menu dropdown-button" aria-labelledby="dropdownMenuLink">
											    <a class="m-s-5" href="<?php echo site_url('admin/pengembang_detail/'.$val_pengembang['id_pengembang']); ?>">
													<button class="btn button-detail">
														<i class="fa fa-info"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?php echo site_url('admin/pengembang_edit/'.$val_pengembang['id_pengembang']); ?>">
													<button class="btn button-edit">
														<i class="fa fa-pencil"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?php echo site_url('admin/pengembang_delete/'.$val_pengembang['id_pengembang']); ?>" onclick="return confirm('Yakin ingin menghapus data?');">
													<button class="btn button-delete">
														<i class="fa fa-trash"></i>
													</button>
												</a>
											  </div>
											</div>
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

<?php $this->load->view('admin/parts/footer_admin'); ?>