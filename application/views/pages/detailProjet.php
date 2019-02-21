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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.css" rel="stylesheet" />
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Projets disponibles</title>
</head>
<body>




    <?php foreach($news as $news) { ?>

    <div class="form-wrapper">
        <h2>Fiche du projet</h2>
        <form class="ficheProjet" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" >
            <div class="card-header"><strong><div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></div></strong></div>
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


    </form>


<!------------------------------------------------------------------------------------------------------------------------>
	<h2>Votre devis</h2>
	<form class="needs-validation" action="<?php echo site_url('index.php/Projet/deviser'); ?>?id=<?php echo $news['id']; ?>" method="post">
        <?php } ?>
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

<script type="text/javascript">

	var first = document.getElementById('prix');
	var second = document.getElementById('heures');
	var result = document.getElementById('tarif_hor');

	first.addEventListener("input", sum);
	second.addEventListener("input", sum);

	function sum() {

		var one = parseFloat(first.value) || 0;
		var two = parseFloat(second.value) || 0;

		var add = one/two;

		result.value = Math.round(add*100)/100;

	}



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

    jQuery(document).ready(function($){

		$.datepicker.regional['fr'] = {clearText: 'Effacer', clearStatus: '',
			closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
			prevText: '<Préc', prevStatus: 'Voir le mois précédent',
			nextText: 'Suiv>', nextStatus: 'Voir le mois suivant',
			currentText: 'Courant', currentStatus: 'Voir le mois courant',
			monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
				'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
			monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
				'Jul','Aoû','Sep','Oct','Nov','Déc'],
			monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
			weekHeader: 'Sm', weekStatus: '',
			dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
			dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
			dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
			dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
			dateFormat: 'dd/mm/yy', firstDay: 0,
			initStatus: 'Choisir la date', isRTL: false};

		$.datepicker.setDefaults($.datepicker.regional['fr']);

    $('body').on('focus',".datepicker", function(){
        $(this).datepicker({
			dateFormat: "dd/mm/yy"
		});
    });

    $(document).ready(function() {
        var max_fields      = 100; //maximum input boxes allowed
        var wrapper         = $(".lot-container"); //Fields wrapper
        var add_button      = $(".boutton-lot"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="removeMe lot">' +
					'<div class="row">' +
					'<div class="col col-md-3"><label for="select" class=" form-control-label">Contenu du lot</label></div>' +
					'<div class="col-12 col-md-9">' +
					'<input type="text" name="titre-lot['+x+']" class="form-control" required>' +
                    '<div class="valid-feedback">' +
                    'Ok !' +
                    '</div>' +
                    '<div class="invalid-feedback">' +
                    'Obligatoire' +
                    '</div>'+
					'</div>'+
					'</div>'+
					'<div class="row">'+
					'<div class="col col-md-3"><label for="select" class=" form-control-label">Date estimée</label></div>'+
					'<div class="col-12 col-md-9">'+
					'<input type="text" name="date-lot['+x+']" class="form-control datepicker" placeholder="Sélectionnez la date" required>'+
                    '<div class="valid-feedback">' +
                    'Ok !' +
                    '</div>' +
                    '<div class="invalid-feedback">' +
                    'Obligatoire' +
                    '</div>'+
					'</div>'+
					'</div>'+
					'<div class="text-right col col-md-12"><button id="remove" class="btn btn-danger remove"><i class="fa fa-remove"></i> Supprimer</button></div></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove", function(e){ //user click on remove text
            e.preventDefault(); $(this).closest('div.removeMe').remove(); x--;
        })
    });
    });
</script>
</body>
</html>
