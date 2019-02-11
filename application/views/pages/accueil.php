<?php
/**
 * Created by PhpStorm.
 * User: c.frantz
 * Date: 17/10/2018
 * Time: 13:33
 */
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Grow Up</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/accueil.css'); ?>">
</head>
<body>
<div class="body2">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel0.jpeg'); ?>" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Application mobile</h3>
					<h1>A partir de 500€</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel1.jpeg'); ?>" alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Web-marketing</h3>
					<h1>A partir de 250€</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel2.jpeg'); ?>" alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Design graphique</h3>
					<h1>A partir de 150€</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel3.jpeg'); ?>" alt="Fourth slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Big data</h3>
					<h1>A partir de 400€</h1>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<h1 class="text-center margin">Quel projet vous intéresse ?</h1>
	<div>
		<!--TODO : implement icons-->
	</div>
</div>
</body>
</html>
