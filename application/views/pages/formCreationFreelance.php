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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
</head>
<body id="bodyForm">
<div id="myForm-wrapper" class="row">

    <form id="myFormInscription" method="post" action="http://localhost/freelancer/index.php/Utilisateur/enregistrer">
        <h3 class="titleForm">Mon inscription en quelques étapes</h3>

        <div class="champsObligatoires">
            <h5>Champs Obligatoires</h5>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input placeholder="" id="login" name="login" type="text" class="validate">
                    <label for="login">Votre pseudo</label>
                </div>
                <div class="input-field col s6">
                    <select name="civilite">
                        <option value="" disabled selected>Sélectionner votre civilité</option>
                        <option value="1">M.</option>
                        <option value="2">MM.</option>
                        <option value="3">Mlle</option>
                    </select>
                    <label>Civilité</label>
                </div>
            </div>
        <div class="row">
            <div class="input-field col s6">
                <input name="nom" placeholder="" id="nom" type="text" class="validate">
                <label for="nom">Nom</label>
            </div>
        <div class="input-field col s6">
            <input name="prenom" placeholder="" id="prenom" type="text" class="validate">
            <label for="prenom">Prénom</label>
        </div>
        </div>


            <div class="row">
                <div class="input-field col s6">
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Mot de passe</label>
                </div>
                <div class="input-field col s6">
                    <input name="passwordVerif" id="passwordVerif" type="password" class="validate" oninput="verifPassword()">
                        <label for="passwordVerif">Vérification du mot de passe</label>
                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="email" id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                </div>
                <div class="input-field col s6">
                    <input name="emailVerif" id="emailVerif" type="email" class="validate">
                        <label for="emailVerif">Vérification du mail</label>
                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                </div>
            </div>
        </div>

        <div class="champsOptionnels">
                <h5>Champs facultatifs</h5>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input name="telephone" id="icon_telephone" type="tel" class="validate">
                    <label for="icon_telephone">Telephone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="presentation" id="presentation" name="presentation" class="materialize-textarea" size="1200" data-length="1200"></textarea>
                    <label for="presentation">Votre présentation</label>
                </div>
            </div>
        </div>
            <div class="row">

                <div id="register" class="flex">
                    <button type="submit" name="action" id="sign" class="bttn">Enregistrer</button>
                </div>
            </div>


    </form>
</div>

<script>

    $(document).ready(function () {
        $('select').formSelect();

        $('input#input_text, textarea#presentation').characterCounter();

        // $('#sign').click(function () {
        //     var $nom = $("#pseudo").val();
        //     var $prenom = $("#password1").val();
        //
        //     //alert("Vous avez tapé : " + $nom );
        //
        //     poster_event($nom, $prenom, $note);
        // });

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
