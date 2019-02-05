<?php
/**
 * Created by PhpStorm.
 * User: c.frantz
 * Date: 18/09/2018
 * Time: 12:53
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/InscriptionEffect1.css'); ?>">
</head>
<body id="bodyForm">
<div id="profil-wrapper" class="row">
	<div class="col-12"><h2>Quel est votre objectif ?</h2></div>

</div>
    <div class="grid">
        <figure class="effect-zoe">
            <a href="<?php echo site_url('index.php/Inscription/travailler'); ?>">
                <img src="<?php echo base_url('asset/images/laptop.jpg'); ?>" alt="img25"/>
                <figcaption>
                    <h2>Travailler</h2>
                    <p class="description">Proposer mes services aux recruteurs, et rechercher les projets disponibles</p>
                </figcaption>
            </a>
        </figure>
        <figure class="effect-zoe">
            <a href="<?php echo site_url('index.php/Inscription/recruter'); ?>">
            <img src="<?php echo base_url('asset/images/ampoule.jpg'); ?>" alt="img26"/>
            <figcaption>
                <h2>Recruter</h2>

                <p class="description">Créer mon projet, et rechercher les freelances inscrits dans la plateforme</p>
            </figcaption>
            </a>
        </figure>
    </div>


</body>
</html>
