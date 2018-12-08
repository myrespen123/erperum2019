<?php $this->load->view('parts/header-sect'); ?>

<main class="perumahan-items">

	<div class="header-items">
		<p>
		  <a href="<?php echo base_url('file/perumahan/images/'.$row->foto_bangunan) ?>" 
		     data-fancybox="images-preview" 
		     data-thumbs='{"autoStart":true}'> 
		    <img src="<?php echo base_url('file/perumahan/images/'.$row->foto_bangunan) ?>" />
		  </a>
		</p>

		<div style="display: none;">
			<?php foreach ($data3 as $keyfoto => $valfoto): ?>
				<a href="<?php echo base_url('file/perumahan/images/'.$valfoto['foto_bangunan']) ?>" data-fancybox="images-preview" 
			     data-width="1500" data-height="1000" data-thumb="<?php echo base_url('file/perumahan/images/'.$valfoto['foto_bangunan']) ?>">
				</a>
			<?php endforeach ?>
		</div>

		<div class="button-imgprev">
			<a href="<?php echo base_url('file/perumahan/images/'.$row->foto_bangunan)  ?>" data-fancybox="images-preview" data-thumbs='{"autoStart":true}'>
				<i class="fa fa-image"></i>
					<span> 3</span>
			</a>
		</div>
	</div>

	<div class="the-items">

		<div class="navin-perum">
			<div class="container">
				<div class="row">
					<ul class="navin-perum-menu">
						<li>
							<a href="#">
								<i class="fa fa-info m-s-10"></i>
									<span class=""> Detail Properti</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-map-marker m-s-10"></i>
									<span class=""> Lokasi</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="perum-detail">
			<div class="container">
				<div class="row">
					<section class="perum-section col-md-8">
						<div class="perum-summary">
							<h2>Rp. <?php echo number_format($row->harga_bangunan, 0, ".", "."); ?></h2>
							<div class="perum-addr">
								<span class="perum-address">
									<i class="fa fa-map-marker color-blue"></i>
										<?php echo $row->lokasi_bangunan ?>
								</span>
									<span class="perum-type"><?= ($row->kategori_bangunan == 1) ? 'Premium' : 'Subsidi'; ?></span>
							</div>
							<div class="perum-areas">
								<label>Luas Bangunan : <?= $row->luas_bangunan; ?> m2</label>
								<span class="m-s-5">|</span>
								<label>Luas Tanah : <?= $row->luas_tanah; ?> m2</label>
							</div>
							<div class="perum-features">
								<p>
									<i class="fa fa-th-large"></i>
										<span><?= $row->jumlah_lantai; ?> Lantai</span>
								</p>
								<p>
									<i class="fa fa-bed"></i>
										<span><?= $row->jumlah_kamar; ?> Kamar</span>
								</p>
								<p>
									<i class="fa fa-bath"></i>
										<span><?= $row->jumlah_kamar_mandi ?> Toilet</span>
								</p>
								<p>
									<i class="fa fa-car"></i>
										<span><?php echo $row->jumlah_garasi; ?> Garasi</span>
								</p>
							</div>
						</div>

						<div class="perum-details">
							<div class="perum-details-primary">
								<h2>Detail</h2>
									<div class="row">
										<div class="col-md-6">
											<div class="perum-attr">
												<span class="color-grey">Nama</span>
													<p><?php echo $row->nama_bangunan; ?></p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="perum-attr">
												<span class="color-grey">Sertifikat</span>
													<p>SHM
														<a href="<?= base_url('file/perumahan/file/'.$row->sertifikat) ?>#toolbar=0" class="sertificate-button">Detail Sertifikat</a>
													</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="perum-attr">
												<span class="color-grey">Luas bangunan</span>
													<p><?= $row->luas_bangunan; ?> m2</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="perum-attr">
												<span class="color-grey">Pengembang</span>
													<p><?php echo $row->nama_pengembang; ?></p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="perum-attr">
												<span class="color-grey">Luas Tanah</span>
													<p><?php echo $row->luas_tanah ?> m2</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="perum-attr">
												<span class="color-grey">Listrik</span>
													<p><?php echo $row->listrik ?></p>
											</div>
										</div>
									</div>
							</div>
							<div class="perum-details-description">
								<h2>Deskripsi</h2>
									<div class="descript-text">
										<?php echo $row->deskripsi_bangunan ?>
									</div>
							</div>
						</div>
						<div class="perum-facilities">
							<h2>Sarana & Prasana</h2>
								<div class="row">
									<?php foreach ($data1 as $keysa => $valsa): ?>
									<div class="col-md-6">
										<div class="perum-facity">
											<i class="fa fa-plus"></i>
												<span class="m-s-5"><?php echo $valsa['nama_sarana_prasarana'] ?></span>
										</div>
									</div>
									<?php endforeach ?>
								</div>
						</div>
						<div class="perum-facilities">
							<h2>Failitas</h2>
								<div class="row">
									<?php foreach ($data2 as $keyfal => $valfal): ?>
									<div class="col-md-6">
										<div class="perum-facity">
											<i class="fa fa-plus"></i>
												<span class="m-s-5"><?php echo $valfal['nama_fasilitas'] ?></span>
										</div>
									</div>
									<?php endforeach ?>
								</div>
						</div>
					</section>
					<div class="perum-right-section col-md-4">
						<div class="dev-profile">
							<div class="dev-profile-head">
								<img src="<?php echo base_url('file/pengembang/images/'.$row->foto_pengembang); ?>">
									<a href="<?php echo site_url('perumahan/pengembang/'.$row->id_pengembang); ?>">
										<h4><?php echo $row->nama_pengembang ?></h4>
									</a>
							</div>
							<div class="dev-profile-descript">
								<p>
									<i class="fa fa-phone"></i>
										<span class="m-s-5">+<?php echo $row->telepon_pengembang; ?></span>
								</p>
								<p>
									<i class="fa fa-envelope"></i>
										<span class="m-s-5"><?php echo $row->email_pengembang ?></span>
								</p>
								<button type="button">
									<a href="<?php echo site_url('perumahan/pengembang/'.$row->id_pengembang); ?>">Lihat</a>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</main>

<?php $this->load->view('parts/footer'); ?>