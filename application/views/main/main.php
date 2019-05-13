<?php $this->load->view('parts/header') ?>


<!-- close header section -->

<!-- main-section -->

<main class="flex direction-column width100">

	<section class="section-programs pads">
		<div class="properties-title">
			<h1>APA ITU E-PERUMAHAN?</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="container">
			<div class="row">
				<?php foreach ($mainfo as $val_info): ?>
					<div class="programs-items col-lg-4 col-md-6">
						<img src="<?php echo base_url('file/main/images/'.$val_info['foto']); ?>">
							<div class="program-deskrip">
								<label class="program-deskrip-title"><?php echo $val_info['judul'] ?></label>
								<p>
									<?php echo $val_info['deskripsi'] ?>
								</p>
							</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	
	<section class="our-services setting-bg pads" style="background-image: url('<?php echo base_url('file/main/images/'.$middle->foto); ?>');">
		<div class="container">
			<div class="services-items row">
				<div class="col-md-6">
					<img src="<?php echo base_url('file/main/images/'.$maintentang->foto) ?>">
				</div>
				<div class="col-md-6 services-descipction">
					<h1><?php echo $maintentang->judul ?></h1>
						<div>
							<?php echo $maintentang->deskripsi ?>
						</div>
				</div>
			</div>
		</div>
	</section>

	<section class="except-properts pads">
		<div class="properties-title">
			<h1>PROPERTI TERBARU</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="container">
			<div class="row">
				<?php foreach ($new_proper as $key => $value): ?>
					
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('file/perumahan/images/'.$value['foto_bangunan']); ?>">
						<h5 class="price-prop">
							<span>Rp. <?php echo number_format($value['harga_bangunan'], 0, ".","."); ?></span>
						</h5>
							<figcaption>
								<div class="proper-deskrip-top">
									<h5><?php echo $value['nama_bangunan'] ?></h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span><?php echo $value['lokasi_bangunan'] ?></span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> <?php echo $value['jumlah_kamar']; ?> Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> <?php echo $value['jumlah_garasi'] ?> Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> <?php echo $value['jumlah_kamar_mandi'] ?> Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> <?php echo $value['jumlah_lantai'] ?> Lantai</span>
										</p>
									</div>
								</div>
								<a href="<?php echo site_url('perumahan/properties/'.$value['id_bangunan']); ?>">LIHAT</a>
							</figcaption>
					</figure>
				</div>
				<?php endforeach ?>

			</div>
			<div class="row">
				<div class="button-middle">
					<a href="#">
						<button type="button" class="button-primer">Lihat Semua</button>
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php $this->load->view('parts/footer') ?>