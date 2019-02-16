<?php




?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/projetDetail.css')?>" />


    <title>Projets disponibles</title>
</head>
<body>




    <?php foreach($news as $news) { ?>

    <div class="form-wrapper">
        <h2>Fiche du projet</h2>
        <form class="ficheProjet" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" method="post">
            <div class="card-header"><strong><div class="createur-elem"><img src="<?php echo base_url()?>asset/images/avatar/<?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></div></strong></div>
            <div class="card-body card-block">

                <div class="form-group">
                    <div class="input-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Titre</label></div>
                        <input type="text" id="titre" value="<?php echo $news['titre']; ?>" placeholder="Titre de votre projet" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group">

                    <div class="row form-group">
                        <div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Présentation du projet</label></div>
                        <div class="col-12 col-md-9"><textarea type="text" id="texte-presentation" id="textarea-input" rows="9"  class="form-control" disabled><?php echo $news['presentation']; ?></textarea></div>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Budget</label></div>
                    <div class="col-12 col-md-9" >
                        <input type="text" name="budget" value="<?php echo $news['budget']; ?>" class="form-control" disabled>
                    </div>
                </div>

                <div class="card-header"><strong></strong></div>
                <br>
				<div class="row form-group">
					<div class="col col-md-3"><label for="select" class=" form-control-label">Compétence demandé</label></div>
					<div class="col-12 col-md-9">


						<?php
						$techno = $news['techno'];
						if(isset($techno)) { ?>
							<input type="text" id="budget" value="<?php echo $techno; ?>" class="form-control" disabled>
						<?php }else{ ?>
							<input type="text" id="budget" value="Libre" class="form-control" disabled>
						<?php } ?>
					</div>
				</div>

				<div class="row form-group">
					<div class="col col-md-3"><label for="select" class=" form-control-label">Mot clé</label></div>
					<div class="col-12 col-md-9">


						<?php
						$mot_cle = $news['mot_cle'];
						if(isset($mot_cle)) { ?>
							<input type="text" id="budget" value="<?php echo $mot_cle; ?>" class="form-control" disabled>
						<?php }else{ ?>
							<input type="text" id="budget" value="Aucun" class="form-control" disabled>
						<?php } ?>
					</div>
				</div>

            </div>

            <div class="text-center form-actions form-group"><a href=""  class="btn waves-effect waves-light orange accent-4">Deviser le projet
				</a>
            </div>
			<?php } ?>
    </div>
    </form>


<!------------------------------------------------------------------------------------------------------------------------>
	<h2>Votre devis</h2>
	<form class="needs-validation" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" method="post">
		<div class="card-header"><strong><div class="createur-elem"><img src="<?php echo base_url()?>asset/images/avatar/<?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></div></strong></div>
		<div class="card-body card-block">
            <div class="form-group">
                <div class="input-group">
                    <div class="col col-md-2"><label for="select" class=" form-control-label">Votre estimation du prix global</label></div>
                    <input type="text" name="prix" placeholder="en €" class="form-control" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Votre estimation du nombre d'heures de développement</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="heures" class="form-control">

                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Votre tarif horaire</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="tarif_hor" class="form-control" disabled>
                </div>
            </div>

			<div class="form-group">

				<div class="row form-group">
					<div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Commentaire</label></div>
					<div class="col-12 col-md-9"><textarea type="text" id="texte-presentation" value="" id="textarea-input" rows="9"  class="form-control" ></textarea></div>
				</div>

			</div>

			<div class="card-header"><strong></strong></div>
			<br>
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Compétence proposée</label></div>
				<div class="col-12 col-md-9">
					<input type="text" name="competence" value="" class="form-control" >
				</div>
			</div>

            <div class="lot-container">
                <div class="lot">
                    <div class="row">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Titre du lot</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="titre-lot" class="form-control">
                            </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" />
                                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

		    </div>
            <div class="row">
                <div class="input-field col s4">
                    <button class="btn btn-outline-info"><span class="ti-plus"></span> Ajouter un lot supplémentaire</button>
                </div>
            </div>
		<div class="text-center form-actions form-group"><a href="<?php echo site_url('index.php/Projet/deviserProjet'); ?>?id=<?php echo $news['id']?>"  class="btn waves-effect waves-light orange accent-4">Deviser le projet
			</a>
		</div>

		</div>
	</form>
	</form>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
</body>
</html>
