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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formCreationProjet.css'); ?>">
</head>
<body id="bodyForm">
<form method="post" action="http://localhost/freelancer/index.php/Projet/enregistrer" <!--enctype="multipart/form-data"-->>


    <h2 class="titleForm">Création projet</h2>

<div id="myForm-wrapper" class="row">



    <div class="champsObligatoires">
        <h5>Champs obligatoires</h5>
        <div class="row">
            <div class="input-field col s6">
                <textarea id="titre" name="titre" class="materialize-textarea" size="30" data-length="30"></textarea>
                <label for="titre">Titre du projet</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
				<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Présentation du projet</label></div>
				<div class="col-12 col-md-9"><textarea name="presentation" id="textarea-input" rows="9" placeholder="Votre contenu..." class="form-control"></textarea></div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="categorie" >
                    <option value="" disabled selected>Choisissez votre budget</option>
                    <?php foreach($budget as $budget) { ?>
                        <option value="<?php echo $budget['id']; ?>"><?php echo $budget['description']; ?></option>
                    <?php } ?>
                </select>
                <label>Coût du projet</label>
            </div>
        </div>
    </div>

    <div class="champsOptionnels">
        <h5>Champs facultatifs</h5>
		<div class="row">
			<div class="input-field col s12">
				<select name="categorie" >
					<option value="" disabled selected>Choisissez votre catégorie</option>
					<?php foreach($budget as $budget) { ?>
						<option value="<?php echo $budget['id']; ?>"><?php echo $budget['description']; ?></option>
					<?php } ?>
				</select>
				<label>Coût du projet</label>
			</div>
		</div>
        <div class="row">
            <div class="input-field col s12">
                <select name="competence" id="catTechnologie">
                    <option value="0">Libre</option>
                    <?php foreach($competence as $competence) : ?>
                        <option value="<?php echo $competence['id']; ?>"><?php echo $competence['titre']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Technologie souhaité </label>
            </div>
        </div>



        <div class="row">
            <label>Entrez un tag pour définir votre projet puis appuyez sur "Entrer"</label>
            <div class="input-field col s12">
                <div  class="chips chips-placeholder"></div>
                <input type="hidden" name="motcle" id="motcle" type="text">

            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="hidden" name="MAX_FILE_SIZE" value="60" />
                        <input class="file-path validate" type="text" placeholder="Upload un ou plusieurs fichier(s) < 50 Mo ">
                    </div>
                </div>
            </div>
        </div>
        </div>
            <button id="boutonEnvoi" class="btn waves-effect waves-light btn-large orange darken-1" type="submit" name="action">Poster mon projet
                <i class="material-icons right">send</i>
            </button>


</div>
</form>
<script>

    $(document).ready(function () {



        $('input#input_text, textarea#description').characterCounter();
        $('input#input_text, textarea#titre').characterCounter();

        //Initialisation "Cout du projet"
        $('select').formSelect();

        //Initialisation de l'input "Tags"
        $('.chips-placeholder').chips({
            autocompleteOptions: {
                data: {
                    'Site web': null,
                    'Logo': null,
                    'Mobile': null,
                    'iOS': null,
                    'Android': null,
                    'Logiciel': null,
                    'Design': null
                },
                limit: 1,
                minLength: 1
            },
            onChipAdd: () => {
                //console.log("Chip Added");
                $tag = $(".chip").text().slice(0, -5);
                document.getElementById("motcle").value = $tag;
            },
            onChipSelect: () => {
                //console.log("Chip Selected");
            },
            onChipDelete: () => {
                //console.log("Chip Deleted");
                document.getElementById("motcle").value = "";
            }
        });


        $('.chips').on('chip.add', function(e, chip){
            console.log("Added",chip);
        });
        $('.chips').on('chip.delete', function(e, chip){
            console.log("Delete",chip);
        });
        $('.chips').on('chip.select', function(e, chip){
            console.log("Select",chip);
        });


        // $('#boutonEnvoi').click(function () {
        //     $titre = $("#titre").val();
        //     $description = $("#description").val();
        //     $categorie = $("#catProjet").val();
        //     $competences = $("#competences").val();
        //
        //
        //     // alert("Vous avez tapé : " + $titre + $description + $categorie + $competences );
        //
        //     // poster_event($nom, $prenom, $note);
        // });

    });

    function verifPassword() {
        var $pass1 = $("#password1").val();
        var $pass2 = $("#password2").val();

        if ($pass1 !== $pass2){

        }
    }



    $('#id_formulaire').submit(function(nom, prenom, note) {

        $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Bizness/legion_honneur/MyTab/index.php/User/user',
                header: "Accept : application/json",
                data: {
                    nom: nom,
                    prenom: prenom,
                    note: note,

                },
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function (data) {
                    console.log(data);


                },
                error: function (errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);
                }
            });
    });
</script>
</body>
</html>
