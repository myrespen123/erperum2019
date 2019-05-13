<div id="test">
<div class="row filter_data" id="post-data">
				<?php if ($cek_posts > 0): ?>
					
					<div class="body-property row">
					<?php foreach ($posts as $key => $value): ?>
						<div class="col-lg-6 col-md-6">
							<figure class="proper-item">
								<?php $foto_b = $this->db->get_where('foto_bangunan', array('id_bangunan' => $value['id_bangunan'], 'level_foto' => 1))->result_array(); ?>
								<?php foreach ($foto_b as $valfb): ?>
									<img src="<?php echo base_url('file/perumahan/images/'.$valfb['foto_bangunan']) ?>">
								<?php endforeach ?>
								<h5 class="price-prop">
									<span>Rp. <?= number_format($value['harga_bangunan'], 0, ".",".");?></span>
								</h5>
								<div class="perum-love">
									<i class="fa fa-heart-o"></i>
								</div>
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
					<?php endforeach ?>
					</div>
						<div class="loading-properts text-center width100" id="show_more_main<?= $value['id_bangunan'];?>" style="margin-top: 40px;">
							<button type="button" id="<?= $value['id_bangunan'];?>" class="button-primer load-primer">Tampilkan lebih banyak</button>
							<p class="img-load" style="display: none;"><img src="<?php echo base_url('assets/img/gifload.gif'); ?>"></p>
						</div>
				<?php else: ?>
					<div class="col-lg-12 col-md-12">
						<center>
							<label class="font-normal">Oops, Properti tidak ditemukan :(</label>
						</center>
					</div>
				<?php endif ?>
</div>
</div>
