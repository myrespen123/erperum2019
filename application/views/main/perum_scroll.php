				<?php if ($cek_posts > 0): ?>
					
				<?php foreach ($posts as $key => $value): ?>
					<div class="col-lg-6 col-md-6">
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
				<?php else: ?>
					<div class="col-lg-12 col-md-12">
						<center>
							<label class="font-normal">Oops, Properti tidak ditemukan :(</label>
						</center>
					</div>
				<?php endif ?>