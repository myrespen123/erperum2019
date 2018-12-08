<?php $this->load->view('pengembang/parts/header_admin') ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Data Perumahan Saya
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="<?= site_url('pengembang/index') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
						<a href="<?= site_url('pengembang/perumahan_create'); ?>" class="btn button-insert">
							Tambah Data
						</a>
					</div>

					<div class="box-body table-responsive">
						<table id="dtable" class="dtable table table-bordered table-striped">
		                	<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Sarana</th>
									<th>Fasilitas</th>
									<th>Foto</th>
									<th>Status Publish</th>
									<th style="width: 15%;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dataPerum as $perum => $val_perum): ?>
					                <tr>
										<td><?= $perum+1; ?></td>
										<td><?= $val_perum['nama_bangunan']; ?></td>
										<td>
											<a href="<?= site_url('pengembang/sarana_edit/'.$val_perum['id_bangunan']); ?>">
												<button class="btn bg-purp color-white">
													Detail Sarana
												</button>
											</a>
										</td>
										<td>
											<a href="<?= site_url('pengembang/fasilitas_edit/'.$val_perum['id_bangunan']); ?>">
												<button class="btn bg-blues color-white">
													Detail Fasilitas
												</button>
											</a>
										</td>
										<td>
											<a href="<?= site_url('pengembang/foto_edit/'.$val_perum['id_bangunan']); ?>">
												<button class="btn bg-oranye color-white">
													Detail Foto
												</button>
											</a>
										</td>
										<td><?= ($val_perum['status_publish']=='1') ? '<button class="btn btn-primary color-white cursor-disabled"><i class="fa fa-check-circle"></i> Aktif</button>' : '<button class="btn bg-danjer color-white cursor-disabled"><i class="fa fa-ban"></i> Tidak Aktif</button>'; ?></td>
										<td>
											<div class="dropdown show">
												<button type="button" class="btn button-dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Aksi <i class="fa fa-caret-down"></i>
												</button>

											  <div class="dropdown-menu dropdown-button" aria-labelledby="dropdownMenuLink">
											    <a class="m-s-5" href="<?= site_url('pengembang/perumahan_detail/'.$val_perum['id_bangunan']); ?>">
													<button class="btn button-detail">
														<i class="fa fa-info"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?= site_url('pengembang/perumahan_edit/'.$val_perum['id_bangunan']); ?>">
													<button class="btn button-edit">
														<i class="fa fa-pencil"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?= site_url('pengembang/perumahan_delete/'.$val_perum['id_bangunan']); ?>">
													<button class="btn button-delete">
														<i class="fa fa-trash"></i>
													</button>
												</a>
											  </div>
											</div
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