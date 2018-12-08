<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/auth-design.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancybox/dist/jquery.fancybox.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url ('assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
</head>
<body>

	<main class="main-login">
		<div class="section-login">
			<form class="form-login" method="POST" enctype="multypart/form-data" action="">
				<div class="login-head">
					<img src="<?php echo base_url('assets/img/smd.png') ?>">
						<label>LOGIN</label>
				</div>
				<div class="login-body">
					<div class="login-group">
						<label class="login-label">Username</label>
							<input type="text" name="username" placeholder="Username" required="">
					</div>
					<div class="login-group">
						<label class="login-label">Password</label>
							<input type="password" name="password" placeholder="Password" required="">
					</div>
					<button type="submit" name="submit-auth">LOGIN</button>
				</div>
			</form>
			<div class="login-foot">
				<p class="copyright">Copyright &copy; 2018</p>
			</div>
		</div>
	</main>

</body>
</html>