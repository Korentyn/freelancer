<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<!-- NAVBAR PRINCIPALE -->
<nav>
    <div class="nav-wrapper indigo lighten-5">
        <a href="<?php echo site_url(''); ?>" class="brand-logo center">Freelancer</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a class="orange-text text-darken-1" href="<?php echo site_url('index.php/Trouver/freelance'); ?>">Poster un projet</a></li>
            <li><a class="grey-text text-darken-4" href="<?php echo site_url('index.php/Trouver/freelance'); ?>">Recruter</a></li>
            <li><a class="grey-text text-darken-4" href="<?php echo site_url('index.php/Trouver/projets'); ?>">Travailler</a></li>
            <li><a class="grey-text text-darken-4" href="#">Comment ça marche ?</a></li>
        </ul>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="waves-effect waves-light btn modal-trigger" href="#modalConnexion">Connexion</a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a class="orange-text text-darken-1" href="#">Recruter</a></li>
    <li><a class="grey-text text-darken-4" href="#">Travailler</a></li>
    <li><a class="grey-text text-darken-4" href="#">Comment ça marche ?</a></li>
    <li><a class="waves-effect waves-light btn modal-trigger" href="#modalConnexion">Connexion</a></li>

</ul>

<!-- POP UP DE CONNEXION -->
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

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
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
