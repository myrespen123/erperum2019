<div class="row filter_data" id="post-data">
<?php foreach ($result as $key => $value): ?>
					<div class="col-lg-6 col-md-6">
						<figure class="proper-item">
							<img src="<?php echo base_url('file/perumahan/images/'.$value['foto_bangunan']) ?>">
							<h5 class="price-prop">
								<span>Rp. <?= number_format($value['harga_bangunan'], 0, ".",".");?></span>
							</h5>
							<figcaption>
									<div class="proper-deskrip-top">
										<h5 class="text-capitalize"><?php echo $value['nama_bangunan'] ?></h5>
											<p class="text-capitalize">
												<i class="fa fa-map-marker color-blue"></i>
													<?php echo substr($value['lokasi_bangunan'], 0,40) ?>
											</p>
											<p class="color-oren">
												<span class="color-oren"><?= $value['luas_bangunan'];?> m<sup>2</sup></span>
												(<span class="color-oren"><?= $value['luas_tanah'];?> m<sup>2</sup></span>)
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
									<a href="<?= site_url('properti/'.$value['bangunan_slug']); ?>">LIHAT</a>
								</figcaption>
						</figure>
					</div>
				<?php endforeach; ?>
</div>
<?php if($total_row > $limit): ?>
<div class="loading-properts text-center" id="show_more_main_filter<?= $value['id_bangunan'];?>" style="margin-top: 40px;">
						<button type="button" id="<?= $value['id_bangunan'];?>" class="button-primer load-filter">Tampilkan lebih banyak</button>
						<p class="img-load-filter" style="display: none;"><img src="<?php echo base_url('assets/img/gifload.gif'); ?>"></p>
					</div>
<?php endif; ?>
