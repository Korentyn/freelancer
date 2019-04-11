<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/projetDetail.css')?>" />
	<title>Document</title>
</head>
<body>
<h2>Devis du freelance</h2>
<form>
    <?php if (isset($devis)){
    foreach($devis as $devis) { ?>
	<div class="card-header"><strong><div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $devis['image']; ?>" alt=""><?php echo $devis['login']; ?></div></strong></div>
	<div class="card-body card-block">
		<div class="row form-group">
			<div class="input-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Estimation du prix (€)</label></div>
				<div class="col col-md">
					<input type="number" id="prix" name="prix" value="<?php echo $devis['prix']; ?>" class="form-control" disabled>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="input-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Votre estimation du nombre d'heures de développement</label></div>
				<div class="col-12 col-md-9">
					<input type="number" id="heures" name="heures" value="<?php echo $devis['heures']; ?>" class="form-control" disabled>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col col-md-3"><label for="select" class=" form-control-label">Votre tarif horaire</label></div>
			<div class="col-12 col-md-9">
				<input type="text" id="tarif_hor" name="tarif_hor" value="<?php echo $devis['tarif_hor2']; ?>" form-control" disabled>
			</div>
		</div>

		<div class="form-group">

			<div class="row form-group">
				<div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Commentaire</label></div>
				<div class="col-12 col-md-9"><textarea type="text" name="commentaire" id="texte-presentation"  id="textarea-input" rows="9"  class="form-control" disabled><?php echo $devis['commentaire']; ?></textarea>
				</div>

			</div>

			<div class="card-header"><strong></strong></div>
			<br>
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Compétence proposée</label></div>
				<div class="col-12 col-md-9">
					<input type="text" name="competence" value="<?php echo $devis['competence']; ?>" class="form-control" disabled>
				</div>
			</div>

            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="needs-validation">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Réponse</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea  class="form-control" id="message-text"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <a href="<?php echo site_url('index.php/Projet/refuserDevis?id='); ?><?php echo $devis['id']; ?>" class="btn btn-danger">Refuser</a>
                                <a href="<?php echo site_url('index.php/Projet/accepterDevis?id='); ?><?php echo $devis['id']; ?>&p=<?php echo $devis['id_projet']; ?>" class="btn btn-success">Accepter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php }
            } ?>
			<hr>
			 <span>Lot(s) prévu(s) pour le projet. Si le freelance décide de diviser le projet en plusieurs lots, un paiement à chaque lot sera nécessaire pour télécharger les sources.</span>
            <?php if (isset($lots)) {
                foreach($lots as $lots) { ?>
                <div class="lot">
                    <div class="row">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Contenu du lot</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="titre-lot[1]" value="<?php echo $lots['titre']; ?>" class="form-control" disabled>
                            <div class="valid-feedback">
                                Ok !
                            </div>
                            <div class="invalid-feedback">
                                Obligatoire
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Date estimée</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="date-lot[1]" value="<?php echo $lots['date_deploiement']; ?>" class="form-control datepicker" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Prix du lot</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="date-lot[1]" value="<?php echo $lots['prix']; ?> €" class="form-control datepicker" disabled>
                        </div>
                    </div>
                    <?php if ($lots['etat'] == 1){ ?>
                        <div class="col-12 col-md-12 alert alert-warning">
                            <a href="<?php echo site_url('index.php/Projet/download/'.$lots['filename']) ?>" class="dwn">Télécharger le lot</a>
                        </div>
                    <?php }?>
                </div>
                <?php }
            } ?>

            <?php switch ($devis['etat']) {
                case 2:
                    echo "<div class=\"text-center\">
                            <button id=\"boutton-envoyer\" type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#Modal\">Répondre
				            </button>
			               </div>";
                    break;
                case 4:
                    echo "<div class=\"alert alert-danger\">
                    <strong>Devis refusé</strong>
                        </div>";
                    break;
                case 5:
                    echo "<div class=\"alert alert-success\">
  <strong>Devis accepté !</strong> En attente de la validation du freelance pour le commencement du projet
</div>";
                    break;
                case 6:
                    echo "<div class=\"alert alert-danger\">
                           <strong>Litige en cours</strong> Vous avez refusé le projet en l'état, un administrateur va vous contacter prochainement
                            </div>";
                    break;
                case 7:
                    echo "<div class=\"alert alert-info\">
                           <strong>Projet en cours</strong> Le projet est en cours...
                            </div>";
                    break;
                case 8:
                    echo "<div class=\"alert alert-info\">
                           <strong>Attente validation</strong> Le freelance a terminé, vous avez 48 heures pour valider ou refuser le projet. En cas de refus, vous serez contacté par l'administrateur de la plateforme.
                           <br>
                           <a class='fnlbtn acc'  href=".site_url('index.php/Projet/validerProjet?id='.$devis['id']).">Valider le projet</a>
                           <a class='fnlbtn refu' href=".site_url('index.php/Projet/refuserProjet?id='.$devis['id']).">Refuser le projet</a>
                            </div>";
                    break;
                case 9:
                    echo "<div class=\"alert alert-success\">
                           <strong>Projet validé</strong> Vous pouvez revenir ici à tout moment pour retélécharger les sources
                           </div>";
                    break;
            } ?>
		</div>
</form>


</div>

</body>
</html>
