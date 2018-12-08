

<footer class="site-footer setting-bg" style="background-image: url('<?php echo base_url('file/main/images/'.$footer->foto) ?>');">
	<div class="container">
		<div class="row">
			<div class="footer-left col-lg-3 col-md-6">
				<h5 class="footer-comp-name"><?php echo $row->nama_website ?></h5>
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
							<span class="m-s-10"><?php echo $row->alamat_setting; ?></span>
					</p>
					<p>
						<i class="fa fa-phone color-blue"></i>
							<span class="m-s-10">+<?php echo $row->telepon_setting; ?></span>
					</p>
					<p>
						<i class="fa fa-envelope color-blue"></i>
							<span class="m-s-10"><?php echo $row->email_setting; ?></span>
					</p>
					<p>
						<i class="fa fa-clock-o color-blue"></i>
							<span class="m-s-10"><?php echo $row->jam_setting; ?></span>
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
<script src="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script src="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.js') ?>"></script>

</body>
</html>