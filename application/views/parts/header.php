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
		<div class="ble sort-home"  style="background-image: url('<?php echo base_url('file/main/images/'.$header->foto) ?>');">
			<label class="label-sort-home"><?php echo $row->slogan_setting; ?></label>
				
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
		<div class="site-logo" style="color: #000;">
			<img src="<?php echo base_url('file/main/images/'.$row->logo_setting); ?>">
				<label><?php echo $row->nama_website ?></label>
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