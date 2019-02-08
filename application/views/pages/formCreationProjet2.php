<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Inscription - Freelance</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
</head>
<body>
<div class="form-wrapper">
	<h2>Création d'un projet</h2>
	<form class="needs-validation" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" method="post">
		<div class="card-header"><strong>Champs obligatoires</strong></div>
		<div class="card-body card-block">

			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">Titre</div>
					<input type="text" id="titre" name="titre" placeholder="Titre de votre projet" class="form-control" required>
				</div>
			</div>
			<div class="form-group">

					<div class="row form-group">
						<div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Votre présentation</label></div>
						<div class="col-12 col-md-9"><textarea name="presentation" id="textarea-input" rows="9" placeholder="Votre contenu..." class="form-control" required></textarea></div>
					</div>

			</div>
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Budget</label></div>
				<div class="col-12 col-md-9">
					<select name="categorie" id="select" class="form-control" required>
						<option value="0">Libre</option>
						<?php foreach($budget as $budget) { ?>
							<option value="<?php echo $budget['id']; ?>"><?php echo $budget['description']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="card-header"><strong>Champs facultatifs</strong></div>
			<br>
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Compétence demandé</label></div>
				<div class="col-12 col-md-9">
					<select name="competence" id="select" class="form-control" required>
						<option value="1">Libre</option>
						<?php foreach($competence as $competence) { ?>
							<option value="<?php echo $competence['id']; ?>"><?php echo $competence['titre']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupFileAddon01">Fichier à ajouter</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
						<label class="custom-file-label" for="inputGroupFile01">Sélectionner...</label>
					</div>
				</div>
			</div>
			</div>

			<div class="text-center form-actions form-group"><button id="bouton-form" type="submit" class="btn btn-success btn-lg">Envoyer</button>
			</div>
		</div>
	</form>
</div>
</div>

<script>
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>
</body>
</html>
