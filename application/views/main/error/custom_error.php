<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/design.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url ('assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
</head>
<body>
	<div class="data-notfound pads">
		<div class="container">
			<div class="row width100 justify-center">
				<div class="error-content">
					<div class="error-logo">
						<img src="<?= base_url('assets/img/alien2.png') ?>">
					</div>
					<div class="error-text">
						<h1>Maaf, <?= $error_title; ?> tidak tersedia</h1>
						<p>Link <?= $error_title; ?> ini tidak tersedia atau sudah tidak dapat diakses kembali.</p>
					</div>
					<div class="error-link">
						<a href="<?php echo base_url(); ?>">
							<button class="btn btn-green-custom">Kembali ke Halaman Utama</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>