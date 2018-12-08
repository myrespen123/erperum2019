<?php $this->load->view('Pengembang/parts/header_admin') ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
      	Data Akun
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-md-12">
				<div class="box box-info">
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
					<form class="form-horizontal p20">
						<div class="col-md-3 left-account text-center">
							<img src="<?php echo base_url('file/pengembang/images/'.$row->foto_pengembang); ?>" class="">
			    				<div>
			    					<label><?= $row->nama_pengembang; ?></label>
			    						<p>Pengembang</p>
				    						<a href="<?= base_url('pengembang/akun_edit/'.$row->id_pengembang); ?>">
				    							<button type="button" class="btn bg-blues color-white">
													Ubah Data
												</button>
				    						</a>
			    				</div>
						</div>
						<div class="col-md-8">
							<div class="box-body">
								<div class="form-group">
									<label class="input-label control-label text-align-left col-sm-2">NIK</label>
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control disabled-input" value=": <?php echo $row->nik_pengembang ?>" readonly>
										</div>
								</div>
								<div class="form-group">
									<label class="input-label control-label text-align-left col-sm-2">Nama</label>
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control disabled-input" value=": <?php echo $row->nama_pengembang ?>" readonly>
										</div>
								</div>
								<div class="form-group">
									<label class="input-label control-label text-align-left col-sm-2">Telepon</label>
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control disabled-input" value=": <?php echo $row->telepon_pengembang ?>" readonly>
										</div>
								</div>
								<div class="form-group">
									<label class="input-label control-label text-align-left col-sm-2">Email</label>
										<div class="col-sm-8">
											<input type="text" name="username" class="form-control disabled-input" value=": <?php echo $row->email_pengembang ?>" readonly>
										</div>
								</div>
								<div class="form-group">
									<label class="input-label control-label text-align-left col-sm-2">Alamat</label>
										<div class="col-sm-8">
											<textarea class="form-control disabled-input" disabled="">: <?= $row->alamat_pengembang ?></textarea>
										</div>
								</div>
							</div>
						</div>
						<div class="box-footer visible-hide">
							<button type="submit" name="insert_user" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
    	</div>
    </section>
</div>

<?php $this->load->view('Pengembang/parts/footer_admin') ?>