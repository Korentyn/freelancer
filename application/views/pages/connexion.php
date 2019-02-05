<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Connexion</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/cs-skin-elastic.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/styleTemplate.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/connexion.css'); ?>">

</head>
<body class="">

<div class="sufee-login d-flex align-content-center flex-wrap">
	<div class="container">
		<div class="login-content">
			<div class="login-logo">
				<a href="<?php echo base_url(''); ?>">
					<img class="align-content" src="<?php echo base_url('asset/images/logo-2.png'); ?>" alt="">
				</a>
			</div>
			<div class="login-form">
				<form action="<?php echo site_url('index.php/Utilisateur/connexion'); ?>" method="post" >
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" name="mail" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Mot de passe">
					</div>
					<?php

						if(isset($erreur)){
//MESSAGE ERREUR cf Utilisateur->connexion TODO
							if($erreur=="wrong") { ?>
								<div id="wrong" class="connexion-alert-wrong">Mot de passe incorrect ou compte inexistant</div>
							<?php }elseif ($erreur=="empty"){ ?>
								<div id="empty" class="connexion-alert-empty">Champ Email ou Mot de passe vide</div>
							<?php } ?>
							<?php
						} ?>

					<div class="checkbox">
						<label>
							<input type="checkbox"> Se souvenir de moi
						</label>
						<label class="pull-right">
							<a href="#">Mot de passe oublié ?</a>
						</label>

					</div>
					<button type="submit" class="btn btn-success  btn-flat m-b-30 m-t-30">Connexion</button>
					<div class="social-login-content">
						<div class="social-button">
							<button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
							<button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
						</div>
					</div>
					<div class="register-link m-t-15 text-center">
						<p>Pas de compte ? <a href="<?php echo site_url('index.php/Inscription/'); ?>">Créer un compte</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

<script src="<?php echo base_url('asset/js/main.js'); ?>" ></script>
<!--	<script src="--><?php //echo base_url('asset/js/dashboard.js'); ?><!--" ></script>-->
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
</body>
</html>






