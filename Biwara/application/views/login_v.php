<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login - Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/login/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/login/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/login/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/login/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/login/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<div class="login100-form-title-1"">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?=base_url()?>assets/img/biwara.png" alt="Klorofil Logo"></div>
                                <p class="lead">Login User</p>
                                <?php if(isset($error)) { echo $error; }; ?>

							</div>
							<form class="form-auth-small" method="POST" action="<?php echo base_url() ?>index.php/login">
								<div class="form-group">
									<!-- <label for="signin-email" class="control-label sr-only">email</label> -->
									<input type="text" class="form-control" id="signin-email"  name="email" placeholder="email">
                                    <?php echo form_error('Email'); ?>
                                </div>
								<div class="form-group">
									<!-- <label for="signin-password" class="control-label sr-only">Password</label> -->
									<input type="password" class="form-control" id="signin-password"  name="password" placeholder="Password">
                                    <?php echo form_error('password'); ?>
                                </div>
								<!-- <div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div> -->
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<!-- <div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div> -->
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Sharing is Caring </h1>
							<p>by The Biwara Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
