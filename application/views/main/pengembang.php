<?php $this->load->view('parts/header-sect'); ?>

<main class="developer-details pads">
	<div class="devdet-head">
		<div class="container head-crumb">
			<img src="<?php echo base_url('file/pengembang/images/'.$row->foto_pengembang); ?>">
				<div class="dev-detils">
					<div class="group-det">
							<label class="col-sm-10 dev-name"> <?php echo $row->nama_pengembang ?></label>
					</div>
					<div class="group-det">
						<h5 class="control-label text-align-left col-sm-2">Telepon</h5>
							<div class="col-sm-10">
								<span class="">: +<?php echo $row->telepon_pengembang ?></span>
							</div>
					</div>
					<div class="group-det">
						<h5 class="control-label text-align-left col-sm-2">Email</h5>
							<div class="col-sm-10">
								<span class="">: <?php echo $row->email_pengembang ?></span>
							</div>
					</div>
					<div class="group-det">
						<h5 class="control-label text-align-left col-sm-2">Alamat</h5>
							<div class="col-sm-10">
								<span class="">: <?php echo $row->alamat_pengembang ?></span>
							</div>
					</div>
				</div>
		</div>
	</div>
	<div class="dev-properties">
		<div class="container">
			<label class="title-dev-det">Properti</label>

		<div class="container">
			<div class="row">
				<?php foreach ($dataPerum as $key => $value): ?>
					<div class="col-lg-4 col-md-6">
						<figure class="proper-item">
							<img src="<?php echo base_url('file/perumahan/images/'.$value['foto_bangunan']) ?>">
								<figcaption>
									<div class="proper-deskrip-top">
										<h5 class="text-capitalize"><?php echo $value['nama_bangunan'] ?></h5>
											<p class="text-capitalize">
												<i class="fa fa-map-marker color-blue"></i>
													<?php echo substr($value['lokasi_bangunan'], 0,40) ?>
											</p>
									</div>
									<div class="proper-deskrip-bot">
										<div>
											<p>
												<i class="fa fa-th-large color-blue"></i>
													<span class="color-blue m-s-10"><?= $value['jumlah_lantai'] ?> Lantai</span>
											</p>
											<p>
												<i class="fa fa-car color-blue"></i>
													<span class="color-blue m-s-10"><?= $value['jumlah_garasi'] ?> Garasi</span>
											</p>
										</div>
										<div>
											<p>
												<i class="fa fa-bed color-blue"></i>
													<span class="color-blue m-s-10"><?= $value['jumlah_kamar'] ?> Kamar</span>
											</p>
											<p>
												<i class="fa fa-bath color-blue"></i>
													<span class="color-blue m-s-10"><?= $value['jumlah_kamar_mandi'] ?> Toilet</span>
											</p>
										</div>
									</div>
									<a href="<?= site_url('perumahan/properties/'.$value['id_bangunan']); ?>">LIHAT</a>
								</figcaption>
						</figure>
					</div>
				<?php endforeach ?>
			</div>
		</div>
			
		</div>
	</div>
</main>

<?php $this->load->view('parts/footer'); ?>