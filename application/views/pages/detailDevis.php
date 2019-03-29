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
<h2>Votre devis</h2>
<form>

	<div class="card-header"><strong><div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $image = $this->session->userdata('image'); ?>" alt=""><?php echo $pseudo = $this->session->userdata('pseudo'); ?></div></strong></div>
	<div class="card-body card-block">
		<div class="row form-group">
			<div class="input-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Estimation du prix</label></div>
				<div class="col col-md">
					<input type="number" id="prix" name="prix" placeholder="en €" class="form-control" required>
					<div class="valid-feedback">
						Ok !
					</div>
					<div class="invalid-feedback">
						Estimez le cout global du projet
					</div>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="input-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Votre estimation du nombre d'heures de développement</label></div>
				<div class="col-12 col-md-9">
					<input type="number" id="heures" name="heures" class="form-control" required>
					<div class="valid-feedback">
						Ok !
					</div>
					<div class="invalid-feedback">
						Obligatoire
					</div>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col col-md-3"><label for="select" class=" form-control-label">Votre tarif horaire</label></div>
			<div class="col-12 col-md-9">
				<input type="text" id="tarif_hor" name="tarif_hor" class="form-control" disabled>
			</div>
		</div>

		<div class="form-group">

			<div class="row form-group">
				<div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Commentaire</label></div>
				<div class="col-12 col-md-9"><textarea type="text" name="commentaire" id="texte-presentation"  id="textarea-input" rows="9"  class="form-control" required></textarea>
					<div class="valid-feedback">
						Ok !
					</div>
					<div class="invalid-feedback">
						Obligatoire
					</div>
				</div>

			</div>

			<div class="card-header"><strong></strong></div>
			<br>
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Compétence proposée</label></div>
				<div class="col-12 col-md-9">
					<input type="text" name="competence" class="form-control" required>
					<div class="valid-feedback">
						Ok !
					</div>
					<div class="invalid-feedback">
						Obligatoire
					</div>
				</div>
			</div>
			<hr>
			<span>A présent, indiquez la date où vous pourrez envoyer le projet terminé au porteur de projet. Si besoin, vous pouvez diviser le projet en plusieurs
lots. Le porteur de projet vous enverra alors une partie du montant du devis à chaque lots pour vous permettre de continuer le développement.</span>

			<div class="lot">
				<div class="row">
					<div class="col col-md-3"><label for="select" class=" form-control-label">Contenu du lot</label></div>
					<div class="col-12 col-md-9">
						<input type="text" name="titre-lot[1]" class="form-control" required>
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
						<input type="text" name="date-lot[1]" class="form-control datepicker" placeholder="Sélectionnez la date" required>
						<div class="valid-feedback">
							Ok !
						</div>
						<div class="invalid-feedback">
							Obligatoire
						</div>
					</div>
				</div>
			</div>
			<div class="lot-container" id="lot-container">


			</div>
			<div class="row">
				<div class="input-field col s4">
					<button type="button" id="boutton-lot"  class="boutton-lot btn btn-outline-info" ><span class="ti-plus"></span> Ajouter un lot supplémentaire</button>
				</div>
			</div>
			<div class="text-right form-actions form-group"><button id="boutton-envoyer" type="submit" class="btn">Envoyer le devis
				</button>
			</div>

		</div>
</form>
</div>

</body>
</html>
