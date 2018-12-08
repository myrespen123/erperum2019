<?php $this->load->view('operator/parts/header_admin'); ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Main Info
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li class="active">main bg</li>
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
									<th class="col-md-1">No</th>
									<th>Judul</th>
									<th>Deskripsi</th>
									<th>Foto</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $databg => $val_info): ?>
					                <tr>
										<td><?= $databg+1; ?></td>
										<td><?= $val_info['judul']; ?></td>
										<td><?= substr($val_info['deskripsi'], 0,30) ?> ..</td>
										<td>
											<img src="<?php echo base_url('file/main/images/'.$val_info['foto']) ?>" class="img-tbl">
										</td>									
										<td>
											<div class="dropdown show">
												<button type="button" class="btn button-dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Aksi <i class="fa fa-caret-down"></i>
												</button>

											  <div class="dropdown-menu dropdown-button" aria-labelledby="dropdownMenuLink">
											  	<a class="m-s-5" href="<?php echo site_url('operator/mainfo_detail/'.$val_info['id_main_info']); ?>">
													<button class="btn button-detail">
														<i class="fa fa-info"></i>
													</button>
												</a>
											    <a class="m-s-5" href="<?php echo site_url('operator/mainfo_edit/'.$val_info['id_main_info']); ?>">
													<button class="btn button-edit">
														<i class="fa fa-pencil"></i>
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

<?php $this->load->view('operator/parts/footer_admin'); ?>