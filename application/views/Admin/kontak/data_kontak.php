<?php $this->load->view('admin/parts/header_admin'); ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Data Kontak
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li class="active">Kontak</li>
     	</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body table-responsive">
						<table id="dtable" class="dtable table table-bordered table-striped">
		                	<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>No Telepon</th>
									<th>Pesan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $kontak => $val_kontak): ?>
					                <tr>
										<td><?= $kontak+1; ?></td>
										<td><?= $val_kontak['kontak_nama'] ?></td>
										<td><?= $val_kontak['kontak_telepon'] ?></td>
										<td><?= substr($val_kontak['kontak_pesan'], 0,100); ?></td>
										
										<td>
											<div class="dropdown show">
												<button type="button" class="btn button-dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Aksi <i class="fa fa-caret-down"></i>
												</button>

											  <div class="dropdown-menu dropdown-button" aria-labelledby="dropdownMenuLink">
											    <a class="m-s-5" href="<?php echo site_url('admin/kontak_detail/'.$val_kontak['id_kontak']); ?>">
													<button class="btn button-detail">
														<i class="fa fa-info"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?php echo site_url('admin/kontak_delete/'.$val_kontak['id_kontak']); ?>" onclick="return confirm('Yakin ingin menghapus data?');">
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