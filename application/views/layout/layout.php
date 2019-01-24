<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/layout.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<!-- NAVBAR PRINCIPALE -->
<nav>
    <div class="nav-wrapper indigo darken-2">
        <a href="<?php echo site_url(''); ?>" class="brand-logo center">Freelancer</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a class="orange-text text-darken-1" href="<?php echo site_url('index.php/Projet/creer'); ?>">Poster un projet</a></li>
            <li><a class="white-text " href="<?php echo site_url('index.php/Utilisateur/freelance'); ?>">Recruter</a></li>
            <li><a class="white-text " href="<?php echo site_url('index.php/Projet/lister'); ?>">Travailler</a></li>
            <li><a class="gwhite-text " href="#">Comment ça marche ?</a></li>
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
                        <i class="material-icons prefix">account_circle</i>
                        <input id="login1" type="text" class="validate">
                        <label for="login1">Login</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Pas de compte ? <a href="<?php echo site_url('index.php/Inscription/'); ?>">Créer mon compte</a></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password1" type="password" class="validate">
                        <label for="password1">Mot de passe</label>
                    </div>
                </div>

                <div id="empty" class="connexion-alert-empty">Champ Login ou Mot de passe vide</div>
                <div id="wrong" class="connexion-alert-wrong">Mot de passe incorrect ou compte inexistant</div>
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
            $empty = document.getElementById("empty");
            $wrong = document.getElementById("wrong");
            $login = $("#login1").val();
            $password = $("#password1").val();

            if($login == "" || $password == ""){
                $empty.style.display ="block";
            }else{
                connexion_event($login, $password);
            }


        });

        function connexion_event($login, $psw) {
            $.ajax(
                {
                    type: 'POST',
                    url: 'http://localhost/freelancer/index.php/Utilisateur/connexion',
                    header: "Accept : application/json",
                    data: {
                        login: $login,
                        password: $psw,


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
    });
</script>
</body>
</html>
