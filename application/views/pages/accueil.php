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
    <div class="welcome-message">
        <h1>Bienvenue sur</h1><br>
        <img src="<?php echo base_url('asset/images/logo-large.png'); ?>" alt="logo">
        <div class="panel-body">
            <strong>Vous êtes...</strong><div id="type"></div>
        </div>
        <strong>Et vous voulez travailler sur des projets intéressant ou trouver un freelance ? Grow up est fait pour vous</strong>
    </div>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel0.jpeg'); ?>"
					 alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Application mobile</h3>
					<h1>A partir de 500€</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel1.jpeg'); ?>"
					 alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Web-marketing</h3>
					<h1>A partir de 250€</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel2.jpeg'); ?>"
					 alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h3>Design graphique</h3>
					<h1>A partir de 150€</h1>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('asset/images/imgCarousel3.jpeg'); ?>"
					 alt="Fourth slide">
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
	<div class="flex">
		<i class="material-icons icon">
			devices
		</i>
		<i class="material-icons icon">
			highlight
		</i>
		<i class="material-icons icon">
			trending_up
		</i>
	</div>
	<div class="flex">
		<span class="txt">
			Développement de site Web
		</span>
		<span class="txt">
			Conception graphique
		</span>
		<span class="txt">
			Web marketing
		</span>
	</div>
	<div class="coloredDiv">
		<h1 class="text-center margins">Une équipe dédiée pour vous accompagner au quotidien</h1>

		<div class="flexDiv1">
			<div class="imgDiv">
				<img class="img-fluid img-thumbnail" src="<?php echo base_url('asset/images/team.jpeg'); ?>" alt="img">
			</div>
			<div class="flexDiv">
				<i class="material-icons icons">
					forum
				</i>
				<i class="material-icons icons">
					phone_in_talk
				</i>
				<i class="material-icons icons">
					info
				</i>
			</div>
			<div class="flexDiv">
				<span class="txts">
					Une messagerie en direct pour discuter avec un de nos conseiller.
				</span>
				<span class="txts">
					Un service téléphonique pour vous accompagner dans vos démarches.
				</span>
				<span class="txts">
					Une FAQ accessible à tout moment.
				</span>
			</div>
		</div>

	</div>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script>
    $.fn.typer = function(text, options){
        options = $.extend({}, {
            char: ' ',
            delay: 1000,
            duration: 600,
            endless: true
        }, options || text);

        text = $.isPlainObject(text) ? options.text : text;

        var elem = $(this),
            isTag = false,
            c = 0;

        (function typetext(i) {
            var e = ({string:1, number:1}[typeof text] ? text : text[i]) + options.char,
                char = e.substr(c++, 1);

            if( char === '<' ){ isTag = true; }
            if( char === '>' ){ isTag = false; }
            elem.html(e.substr(0, c));
            if(c <= e.length){
                if( isTag ){
                    typetext(i);
                } else {
                    setTimeout(typetext, options.duration/10, i);
                }
            } else {
                c = 0;
                i++;

                if (i === text.length && !options.endless) {
                    return;
                } else if (i === text.length) {
                    i = 0;
                }
                setTimeout(typetext, options.delay, i);
            }
        })(0);
    };

    $('#type').typer(['développeur','designer', 'porteur de projet', 'créateur', 'érudit', 'idéaliste', ]);



</script>
</body>
</html>
