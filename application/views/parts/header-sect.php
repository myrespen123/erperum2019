<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/design.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url ('assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.css'); ?>">
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />
	 <link data-require="leaflet@0.7.3" data-semver="0.7.3" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
</head>
<body>

<!-- header section -->

<header class="header-sections">

	<div class=" navbar-second site-navbar">
		<div class="site-logo" style="color: #000;">
			<img src="<?php echo base_url('assets/img/smd.png'); ?>">
				<label>DISPERKIM</label>
		</div>
		
		<div class="nav-small">
			<i class="fa fa-bars"></i>
		</div>
		<div class="main-menu">
			<ul>
				<li>
					<a href="<?php echo site_url('main') ?>">BERANDA</a>
				</li>
				<li>
					<a href="<?php echo site_url('perumahan'); ?>">PERUMAHAN</a>
				</li>
				<li>
					<a href="<?php echo site_url('login'); ?>">PENGEMBANG</a>
				</li>
				<li>
					<a href="<?php echo site_url('kontak'); ?>">KONTAK</a>
				</li>
			</ul>
		</div>
	</div>

</header>

<!-- close header section -->