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
            <div class="row form-group">
                <div class="input-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Estimation du prix</label></div>
                        <div class="col col-md">
                            <input type="text" name="prix" placeholder="en €" class="form-control" >

                        </div>
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

            <div class="lot-container" id="lot-container">
                <div class="lot">
                    <div class="row">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Contenu du lot</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="titre-lot" class="form-control">
                            </div>
                    </div>
                    <div class="row">

                                <div class="col col-md-3"><label for="select" class=" form-control-label">Date estimée</label></div>
                                    <div class="col-12 col-md-9">
<!--                                        <input class="datepicker" data-provide="datepicker" data-date-format="dd/mm/yyyy">-->

                                        <input type="text" class="form-control datepicker" placeholder="Pick the date">
                                    </div>

                    </div>
                </div>



		    </div>
            <div class="row">
                <div class="input-field col s4">
                    <button type="button" onclick="creerLot()" class="btn btn-outline-info" action="creerLot()"><span class="ti-plus"></span> Ajouter un lot supplémentaire</button>
                </div>
            </div>
		<div class="text-center form-actions form-group"><button  class="btn waves-effect waves-light orange accent-4">Deviser le projet
			</button>
		</div>

		</div>
	</form>
	</form>
    </div>
<!--    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>-->

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/js/bootstrap-datepicker.js"></script>-->
<script type="text/javascript">
    // jQuery(document).ready(function ($){
    //
    //     $('#input').datetimepicker({
    //         locale: 'fr-fr',
    //         format: 'dd mmm yyyy'
    //     });
    //
    //     // $(".datepicker").datepicker();
    //
    // });
    //     function creerLot() {
    //
    //         document.getElementById('lot-container').innerHTML += '<div class="lot">\n' +
    //             '                    <div class="row">\n' +
    //             '                        <div class="col col-md-3"><label for="select" class=" form-control-label">Contenu du lot</label></div>\n' +
    //             '                        <div class="col-12 col-md-9">\n' +
    //             '                            <input type="text" name="titre-lot" class="form-control">\n' +
    //             '                        </div>\n' +
    //             '                    </div>\n' +
    //             '                    <div class="row">\n' +
    //             '\n' +
    //             '                        <div class="col col-md-3"><label for="select" class=" form-control-label">Date estimée</label></div>\n' +
    //             '                        <div class="col-12 col-md-9">\n' +
    //             '                            <input class="datepicker" id="datepicker"  />\n' +
    //             '                        </div>\n' +
    //             '\n' +
    //             '                    </div>\n' +
    //             '                </div>';
    //
    //
    //     }



    jQuery(document).ready(function($){



    $('body').on('focus',".datepicker", function(){
        $(this).datepicker();
    });

    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="input-line-control removeMe"><div class="col-md-8"><div class="form-group"><input type="text" class="form-control datepicker" placeholder="Pick the date"></div></div><div class="col-md-4"><button class="btn btn-danger remove-date"><i class="fa fa-remove"></i>Remove</button></div></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove-date", function(e){ //user click on remove text
            e.preventDefault(); $(this).closest('div.removeMe').remove(); x--;
        })
    });
    });
</script>
</body>
</html>
