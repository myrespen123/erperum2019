<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/design.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url ('assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
</head>
<body>

<!-- header section -->

<header class="header-sections">
	<div class="header-section">
		<div class="ble sort-home"  style="background-image: url('<?php echo base_url('assets/img/scen2.jpg') ?>');">
			<label class="label-sort-home">Cari Rumah Legal Impianmu</label>
				
			<div class="filter-search">
				<div class="container">
					<form class="form-fil-search" method="POST">
						<select>
							<option>Lokasi</option>
							<option>TEST</option>
							<option>TEST</option>
							<option>TEST</option>
						</select>
						<select>
							<option>Harga Min</option>
							<option>TEST</option>
							<option>TEST</option>
							<option>TEST</option>
						</select>
						<select>
							<option>Harga Max</option>
							<option>TEST</option>
							<option>TEST</option>
							<option>TEST</option>
						</select>
						<select>
							<option>Tipe Rumah</option>
							<option>TEST</option>
							<option>TEST</option>
							<option>TEST</option>
						</select>
						<button>Cari</button>
					</form>
				</div>
			</div>		
		</div>
	</div>

	<div class="site-navbar">
		<div class="site-logo">
			<img src="<?php echo base_url('assets/img/smd.png'); ?>">
				<label>DISPERKIM</label>
		</div>
		<div class="nav-small">
			<i class="fa fa-bars"></i>
		</div>
		<div class="main-menu">
			<ul>
				<li>
					<a href="#">BERANDA</a>
				</li>
				<li>
					<a href="<?php echo site_url('Welcome/perumahan'); ?>">PERUMAHAN</a>
				</li>
				<li>
					<a href="#">PENGEMBANG</a>
				</li>
				<li>
					<a href="#">TENTANG KAMI</a>
				</li>
				<li>
					<a href="#">KONTAK</a>
				</li>
			</ul>
		</div>
	</div>

</header>

<!-- close header section -->

<!-- main-section -->

<main class="flex direction-column width100">
	<section class="recent-properties pads">
		<div class="properties-title">
			<h1>RECENT PROPERTIES</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="body-properties container">
			<div class="row">
				<div class="col-md-6">
					<figure class="properties-items">
						<img src="<?php echo base_url('assets/img/scenicity3.jpg') ?>">
							<figcaption>
								<div class="proper-loc width80">
									<h4>Perumahan Alaya</h4>
										<p>
											<i class="fa fa-map-marker"></i>
												<span class="m-s-5">Sungai Kunjang</span>
										</p>
								</div>
								<div class="width20 flex align-center">
									<a href="#">LIHAT</a>
								</div>
							</figcaption>
					</figure>
				</div>
				<div class="col-md-6">
					<figure class="properties-items">
						<img src="<?php echo base_url('assets/img/scenicity3.jpg') ?>">
							<figcaption>
								<div class="proper-loc width80">
									<h4>Perumahan Alaya</h4>
										<p>
											<i class="fa fa-map-marker"></i>
												<span class="m-s-5">Sungai Kunjang</span>
										</p>
								</div>
								<div class="width20 flex align-center">
									<a href="#">LIHAT</a>
								</div>
							</figcaption>
					</figure>
				</div>
				<div class="col-md-6">
					<figure class="properties-items">
						<img src="<?php echo base_url('assets/img/scenicity3.jpg') ?>">
							<figcaption>
								<div class="proper-loc width80">
									<h4>Perumahan Alaya</h4>
										<p>
											<i class="fa fa-map-marker"></i>
												<span class="m-s-5">Sungai Kunjang</span>
										</p>
								</div>
								<div class="width20 flex align-center">
									<a href="#">LIHAT</a>
								</div>
							</figcaption>
					</figure>
				</div>
				<div class="col-md-6">
					<figure class="properties-items">
						<img src="<?php echo base_url('assets/img/scenicity3.jpg') ?>">
							<figcaption>
								<div class="proper-loc width80">
									<h4>Perumahan Alaya</h4>
										<p>
											<i class="fa fa-map-marker"></i>
												<span class="m-s-5">Sungai Kunjang</span>
										</p>
								</div>
								<div class="width20 flex align-center">
									<a href="#">LIHAT</a>
								</div>
							</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</section>

	<section class="our-services setting-bg pads" style="background-image: url('<?php echo base_url('assets/img/newyok.jpg') ?>');">
		<div class="container">
			<div class="services-items row">
				<div class="col-md-6">
					<img src="<?php echo base_url('assets/img/pplwapple.jpg') ?>">
				</div>
				<div class="col-md-6 services-descipction">
					<h1>LAYANAN KAMI</h1>
						<div>
							<p class="m-b-10">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							</p>
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
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('assets/img/scen2.jpg') ?>">
							<figcaption>
								<div class="proper-deskrip-top">
									<h5>Rumah Alaya Permai</h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span>Perumahan Alaya</span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> 4 Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> 1 Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> 2 Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> 2 Lantai</span>
										</p>
									</div>
								</div>
								<a href="#">LIHAT</a>
							</figcaption>
					</figure>
				</div>
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('assets/img/rumah-new1.jpg') ?>">
							<figcaption>
								<div class="proper-deskrip-top">
									<h5>Rumah Alaya Permai</h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span>Perumahan Alaya</span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> 4 Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> 1 Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> 2 Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> 2 Lantai</span>
										</p>
									</div>
								</div>
								<a href="#">LIHAT</a>
							</figcaption>
					</figure>
				</div>
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('assets/img/rumah-new1.jpg') ?>">
							<figcaption>
								<div class="proper-deskrip-top">
									<h5>Rumah Alaya Permai</h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span>Perumahan Alaya</span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> 4 Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> 1 Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> 2 Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> 2 Lantai</span>
										</p>
									</div>
								</div>
								<a href="#">LIHAT</a>
							</figcaption>
					</figure>
				</div>
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('assets/img/rumah-new1.jpg') ?>">
							<figcaption>
								<div class="proper-deskrip-top">
									<h5>Rumah Alaya Permai</h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span>Perumahan Alaya</span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> 4 Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> 1 Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> 2 Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> 2 Lantai</span>
										</p>
									</div>
								</div>
								<a href="#">LIHAT</a>
							</figcaption>
					</figure>
				</div>
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('assets/img/rumah-new1.jpg') ?>">
							<figcaption>
								<div class="proper-deskrip-top">
									<h5>Rumah Alaya Permai</h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span>Perumahan Alaya</span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> 4 Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> 1 Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> 2 Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> 2 Lantai</span>
										</p>
									</div>
								</div>
								<a href="#">LIHAT</a>
							</figcaption>
					</figure>
				</div>
				<div class="col-lg-4 col-md-6">
					<figure class="proper-item">
						<img src="<?php echo base_url('assets/img/rumah-new1.jpg') ?>">
							<figcaption>
								<div class="proper-deskrip-top">
									<h5>Rumah Alaya Permai</h5>
										<p>
											<i class="fa fa-map-marker color-blue"></i>
												<span>Perumahan Alaya</span>
										</p>
								</div>
								<div class="proper-deskrip-bot">
									<div>
										<p>
											<i class="fa fa-bed color-blue"></i>
												<span class="color-blue m-s-10"> 4 Kamar</span>
										</p>
										<p>
											<i class="fa fa-car color-blue"></i>
												<span class="color-blue m-s-10"> 1 Garasi</span>
										</p>
									</div>
									<div>
										<p>
											<i class="fa fa-bath color-blue"></i>
												<span class="color-blue m-s-10"> 2 Toilet</span>
										</p>
										<p>
											<i class="fa fa-th-large color-blue"></i>
												<span class="color-blue m-s-10"> 2 Lantai</span>
										</p>
									</div>
								</div>
								<a href="#">LIHAT</a>
							</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</section>

</main>

<footer class="site-footer setting-bg" style="background-image: url('<?php echo base_url('assets/img/footer-bg.jpg') ?>');">
	<div class="container">
		<div class="row">
			<div class="footer-left col-lg-3 col-md-6">
				<h5 class="footer-comp-name">DINAS PERUMAHAN DAN PERMUKIMAN SAMARINDA</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					</p>
			</div>
			<div class="footer-center col-lg-3 col-md-6">
				<h5 class="footer-title">KONTAK KAMI</h5>
					<p>
						<i class="fa fa-map-marker color-blue"></i>
							<span class="m-s-10">Jl. Balaikota</span>
					</p>
					<p>
						<i class="fa fa-phone color-blue"></i>
							<span class="m-s-10">+0541-124-214</span>
					</p>
					<p>
						<i class="fa fa-envelope color-blue"></i>
							<span class="m-s-10">email@email.com</span>
					</p>
					<p>
						<i class="fa fa-clock-o color-blue"></i>
							<span class="m-s-10">Senin - Jumat, 08.00 - 16.00</span>
					</p>
			</div>
			<div class="footer-link col-lg-3 col-md-6">
				<h5 class="footer-title">LINK TERKAIT</h5>
					<div class="link-foot">
						<a href="#">Perumahan</a>
						<a href="#">Pengembang</a>
						<a href="#">Tentang Kami</a>
						<a href="#">Kontak Kami</a>
					</div>
			</div>
			<div class="footer-map col-lg-3 col-md-6">
				<h5 class="footer-title">MAP</h5>
					<div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6706951580686!2d117.14358171400346!3d-0.4928816354124102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f12748846d1%3A0x36ec5987bac50811!2sDinas+Perumahan+dan+Permukiman+Kota+Samarinda+(Disperkim)!5e0!3m2!1sen!2sid!4v1539671390415" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="foot-copyright">
				<p>Copyright &copy; 2018 TIM IT Disperkim</p>
			</div>
		</div>
	</div>
</footer>

<!-- close main section -->

<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

</body>
</html>