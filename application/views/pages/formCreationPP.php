<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Inscription - Porteur de projet</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
</head>
<body>
<a href="<?php echo site_url('index.php/Inscription'); ?>" class="btn btn-warning">
	<i class="fas fa-undo"></i> Retour</a>
<div class="form-wrapper">
	<h2>Inscription - Porteur de projet</h2>
<form class="needs-validation" action="<?php echo site_url('index.php/Utilisateur/enregistrer?role=2'); ?>" method="post"
	  oninput='password2.setCustomValidity(password2.value != password.value ? "Mot de passe différents." : "");email2.setCustomValidity(email2.value != email.value ? "Email différent." : "")'>
<div class="card-header"><strong>Champs obligatoires</strong></div>
<div class="card-body card-block">
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Civilité</label></div>
				<div class="col-12 col-md-9">
					<select name="civilite" id="select" class="form-control">
						<option value="1">Monsieur</option>
						<option value="2">Madame</option>
						<option value="3">Mademoiselle</option>
					</select>
				</div>
			</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">Nom</div>
			<input type="text" id="nom" name="nom" placeholder="" class="form-control" required>
			<div class="valid-feedback">
				Ok !
			</div>
			<div class="invalid-feedback">
				Champ requis
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">Prénom</div>
			<input type="text" id="prenom" name="prenom" placeholder="" class="form-control" required>
			<div class="valid-feedback">
				Ok !
			</div>
			<div class="invalid-feedback">
				Champ requis
			</div>
		</div>
	</div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" class="form-control" required>
				<div class="valid-feedback">
					Ok !
				</div>
				<div class="invalid-feedback">
					Champ requis
				</div>
			</div>
			<?php
			//Si le mail existe on affiche le message d'erreur
			if(isset($erreur) && $erreur=='pseudo') { ?>
				<div class="erreur">Le Login est déjà utilisé</div>
			<?php } ?>
		</div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
				<input type="email" id="email" name="email" placeholder="Email" class="form-control" required>

				<div class="valid-feedback">
					Ok !
				</div>
				<div class="invalid-feedback">
					Champ requis
				</div>
			</div>
			<?php
			//Si le mail existe on affiche le message d'erreur
			if(isset($erreur) && $erreur=='mail') { ?>
				<div class="erreur">Le mail est déjà utilisé</div>
			<?php } ?>
		</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
			<input type="email" id="email2" name="email2" placeholder="Vérification email" class="form-control" required>
			<div class="valid-feedback">
				Ok !
			</div>
			<div class="invalid-feedback">
				Champ requis
			</div>
		</div>
	</div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
				<input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control" required>
				<div class="valid-feedback">
					Ok !
				</div>
				<div class="invalid-feedback">
					Champ requis
				</div>
			</div>
		</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
			<input type="password" id="password2" name="password2" placeholder="Vérification mot de passe" class="form-control" required>

		</div>
	</div>
	<div class="card-header"><strong>Champs facultatifs</strong></div>
	<div class="form-group">
		<label class=" form-control-label">Téléphone</label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-phone"></i></div>
			<input name="telephone" class="form-control">
		</div>
		<small class="form-text text-muted">ex. 0611223344</small>
	</div>
		<div class="text-center form-actions form-group"><button id="bouton-form" type="submit" class="btn btn-success btn-lg">Envoyer</button></div>
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
