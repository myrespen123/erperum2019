<?php $this->load->view('parts/header-sect'); ?>

<div class="container pads">
	<div class="box-header">
		<?php if ($this->session->flashdata('simpan') == true): ?>
			<div class="alert alert-success" role="alert">
			 	<?= $this->session->flashdata('simpan'); ?>
			 	<button type="button" id="close-alert" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif ?>
		<?php if ($this->session->flashdata('gagal') == true): ?>
			<div class="alert alert-danger" role="alert">
			 	<?= $this->session->flashdata('gagal'); ?>
		 		<button type="button" id="close-alert" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif ?>
	</div>

	<section class="message">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="message-info">
						<div class="message-title">
							<h1>Info Kontak</h1>
						</div>
						<div class="message-detail">
							<div class="form-group row">
								<div class="col-sm-2 msg-info-icon">
									<i class="fa fa-phone"></i>
								</div>
									<div class="col-sm-9 message-label">
										<h3>Telepon Kami</h3>
											<p>+123 456 678</p>
									</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-2 msg-info-icon">
									<i class="fa fa-envelope"></i>
								</div>
									<div class="col-sm-9 message-label">
										<h3>Email</h3>
											<p>Company.email@email.com</p>
									</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-2 msg-info-icon">
									<i class="fa fa-map-marker"></i>
								</div>
									<div class="col-sm-9 message-label">
										<h3>Alamat</h3>
											<p>Jalan blabla blabal No. 00, Samarinda Kota</p>
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="message-form">
						<div class="message-title">
							<h1>Kirim Pesan</h1>
						</div>
						<form class="msg-form" method="POST" enctype="multipart/form-data" action="<?= site_url('kontak/kontak_insert') ?>">
							<input type="text" name="kontak_nama" class="msg-input" placeholder="Nama Lengkap" required="">
							<input type="text" name="kontak_telepon" class="msg-input" placeholder="No HP" required="">
							<textarea class="msg-input" name="kontak_pesan" placeholder="Pesan" required=""></textarea>
							<div class="msg-button">
								<button type="submit">Kirim</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<?php $this->load->view('parts/footer'); ?>