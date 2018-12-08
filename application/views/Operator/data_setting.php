<?php $this->load->view('operator/parts/header_admin'); ?>

<div class="content-wrapper">
	<section class="content-header">
     	<h1>
     		Setting
     	</h1>
     	<ol class="breadcrumb">
     		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     		<li class="active">Setting</li>
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
						<a href="<?php echo site_url('operator/setting_edit/'.$row->id_setting); ?>" class="btn button-insert">
							Ubah Data
						</a>
					</div>
					<div class="box-body table-responsive">
						<table id="dtable" class="dtable table table-bordered table-striped">
		                	<thead>
								<tr>
									<th>No</th>
									<th>Setting</th>
									<th>Deskripsi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Nama Website</td>
									<td><?php echo $row->nama_website ?></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Deskripsi Footer</td>
									<td><?= substr($row->deskripsi_website, 0,60) ?></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Slogan</td>
									<td><?php echo $row->slogan_setting; ?></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Alamat</td>
									<td><?= substr($row->alamat_setting, 0,60); ?></td>
								</tr>
								<tr>
									<td>4</td>
									<td>Telepon</td>
									<td><?= $row->telepon_setting; ?></td>
								</tr>
								<tr>
									<td>5</td>
									<td>Email</td>
									<td><?php echo $row->email_setting; ?></td>
								</tr>
								<tr>
									<td>6</td>
									<td>Jam Kerja</td>
									<td><?php echo $row->jam_setting ?></td>
								</tr>
								<tr>
									<td>7</td>
									<td>Copyright</td>
									<td><?php echo $row->copyright; ?></td>
								</tr>
								<tr>
									<td>8</td>
									<td>Embed Google Map</td>
									<td>---</td>
								</tr>
								<tr>
									<td>9</td>
									<td>Logo</td>
									<td>
										<img class="img-tbl" src="<?php echo base_url('file/main/images/'.$row->logo_setting); ?>">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('operator/parts/footer_admin'); ?>