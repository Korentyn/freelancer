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
<form method="post" action="#" enctype="multipart/form-data">




<div id="myForm-wrapper" class="row">
    <form id="myFormInscription" class="col s12" action="#">
        <h2 class="titleForm">Création projet</h2>
        <div class="row">
            <div class="input-field col s6">
                <input id="pseudo" type="text" class="validate">
                <label for="pseudo">Titre du projet</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
                <label for="textarea2">Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Choisissez votre catégorie</option>
                    <option value="1">0-250€ (Petit projet)</option>
                    <option value="2">250-500€ (Moyen projet)</option>
                    <option value="3">500-1000€ (Grand projet)</option>
                    <option value="3">+1000€ (Très grand projet)</option>
                </select>
                <label>Coût du projet</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <label style="color:black;font-size: 1em;">Pour ajouter une compétence, écrivez la puis appuyez sur entrer</label>
                <div class="row">
                    <div class="input-field col s10">
                        <div class="chips chips-autocomplete"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            Entrez un tag pour définir votre projet (site, logo,...) puis appuyez sur "Entrer" (3 maximum)
            <div class="input-field col s12">
                <div class="chips chips-placeholder"></div>

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

            <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Poster mon projet
                <i class="material-icons right">send</i>
            </button>

    </form>
</div>
</form>
<script>

    $(document).ready(function () {
        //Initialisation "Cout du projet"
        $('select').formSelect();

        //Initialisation de l'input "Tags"
        $('.chips-placeholder').chips({
            placeholder: '',

        });

        //Initialisation input compétences + tableau autocomplétion
        $('.chips-autocomplete').chips({
            autocompleteOptions: {
                data: {
                    'PHP': null,
                    'HTML': null,
                    'Javascript': null,
                    'Java/JEE': null,
                    'C': null,
                    'C++': null,
                    'C#': null,
                    'Unity': null,
                    'Unreal engine': null,
                    'NodeJS' : null,
                    'Angular' : null

                },
                limit: Infinity,
                minLength: 1
            }
        });


        $('#sign').click(function () {
            var $nom = $("#pseudo").val();
            var $prenom = $("#password1").val();

            //alert("Vous avez tapé : " + $nom );

            poster_event($nom, $prenom, $note);
        });

    });

    function verifPassword() {
        var $pass1 = $("#password1").val();
        var $pass2 = $("#password2").val();

        if ($pass1 !== $pass2){

        }
    }


    function poster_event(nom, prenom, note) {

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
    }
</script>
</body>
</html>
