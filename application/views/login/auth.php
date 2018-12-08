<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login | Profil Web</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login-design.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
</head>
<body>
	<div class="login-row">
		<div class="login-bg" style="background-image: url('<?php echo base_url('assets/img/scenicity.jpg'); ?>')">
			<div class="login-box">
				<form class="login-form" autocomplete="off" action="<?php echo site_url('Login/authenticate') ?>" method="POST">
					<div class="login-head">
						<img src="<?php echo base_url('assets/img/smd.png'); ?>">
							<label>LOG IN</label>
					</div>
					<?php if (isset($_SESSION['alert'])): ?>
						<div class="alert alert-danger">
							<?= $_SESSION['alert'] ?>
							<?php unset($_SESSION['alert']) ?>
						</div>
					<?php endif ?>
					<div class="validate-input">
						<input type="text" name="username" placeholder="Username" required="">
						<i class="fa fa-user"></i>
					</div>
					<div class="validate-input">
						<input type="password" name="password" placeholder="Password" required="">
						<i class="fa fa-lock"></i>
					</div>
					<div class="validate-button">
						<button type="submit">Login</button>
					</div>
					<div class="login-copyright">
						<label>2018 &copy; Disperkim</label>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>