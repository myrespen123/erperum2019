<?php $this->load->view('admin/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Data Perumahan
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?= site_url('admin/index') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     		<li class="active">Perumahan Saya</li>
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
					</div>

					<div class="box-body table-responsive">
						<table id="dtable" class="dtable table table-bordered table-striped">
		                	<thead>
								<tr>
									<th>No</th>
									<th>Pengembang</th>
									<th>Judul</th>
									<th>Status Publish</th>
									<th style="width: 15%;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dataPerum as $perum => $val_perum): ?>
					                <tr>
										<td><?= $perum+1; ?></td>
										<td>
											<a href="<?php echo site_url('admin/pengembang_detail/'.$val_perum['id_pengembang']); ?>">
												<?= $val_perum['nama_pengembang']; ?>
											</a>
										</td>
										<td><?= $val_perum['nama_bangunan']; ?></td>
										<td>
											<?php if ($val_perum['status_publish']=='1'): ?>
												<a href="<?= site_url('admin/perumahan_confirm/'.$val_perum['id_bangunan']); ?>">
													<button class="btn btn-primary color-white"><i class="fa fa-check-circle"></i> Aktif</button>
												</a>
											<?php else: ?>
												<a href="<?= site_url('admin/perumahan_confirm/'.$val_perum['id_bangunan']); ?>">
													<button class="btn bg-danjer color-white"><i class="fa fa-ban"></i> Tidak Aktif</button>
												</a>
											<?php endif ?>
										</td>
										<td>
											<div class="dropdown show">
												<button type="button" class="btn button-dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Aksi <i class="fa fa-caret-down"></i>
												</button>

											  <div class="dropdown-menu dropdown-button" aria-labelledby="dropdownMenuLink">
											    <a class="m-s-5" href="<?= site_url('admin/perumahan_detail/'.$val_perum['id_bangunan']); ?>">
													<button class="btn button-detail">
														<i class="fa fa-info"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?= site_url('admin/perumahan_delete/'.$val_perum['id_bangunan']); ?>">
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

<?php $this->load->view('admin/parts/footer_admin') ?>