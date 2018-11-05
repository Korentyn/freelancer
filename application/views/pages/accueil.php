<?php
/**
 * Created by PhpStorm.
 * User: c.frantz
 * Date: 17/10/2018
 * Time: 13:33
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grow Up</title>
</head>
<body>

<div id="modalConnexion" class="modal">
    <div class="modal-content">
        <div class="row">
            <form class="col s12">
                <div class="row">

                    <div class="input-field col s6">
                        <input id="login1" type="text" class="validate">
                        <label for="login1">Login</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Pas de compte ? <a href="<?php echo site_url('index.php/Inscription/'); ?>">Créer mon compte</a></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password1" type="password" class="validate">
                        <label for="password1">Password</label>
                    </div>
                </div>

                <a id="connexion" class="waves-effect waves-light btn">Valider</a>

            </form>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>


    $(document).ready(function () {
            $elemConnexion = $('#modalConnexion').modal();
            $instanceConnexion = M.Modal.getInstance($elemConnexion);

            //Initialisation navbar gauche responsive
            $('.sidenav').sidenav();


        $('#connexion').click(function () {

            $login = $("#login1").val();
            $password = $("#password1").val();


            connexion_event($login, $password);
        });

    });
</script>
</body>
</html>
