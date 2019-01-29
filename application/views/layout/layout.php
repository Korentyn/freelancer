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
            <li><a class="white-text " href="<?php echo site_url('index.php/Utilisateur/lister'); ?>">Recruter</a></li>
            <li><a class="white-text " href="<?php echo site_url('index.php/Projet/lister'); ?>">Travailler</a></li>
            <li><a class="gwhite-text " href="#">Comment ça marche ?</a></li>
        </ul>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php
            //Si le membre est connecté on affiche le menu-connection
            $login = $this->session->userdata('pseudo');
            if(isset($login)) { ?>

            <li><a class="white-text " href="index.php/Projet/dashboard">Dashboard</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><div class="chip"><img src="<?php echo base_url('asset/images/gup.png'); ?>" alt="Contact Person">
                           <?php echo $this->session->userdata('pseudo'); ?>
                        </div></a></li>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">Mon profil</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="<?php echo site_url('index.php/Utilisateur/deconnexion'); ?>"><img src="<?php echo base_url('asset/images/onOff.png'); ?>" alt="Deconnexion"></a></li>
                </ul>
            <?php }else{ ?>
                <li><a class="waves-effect waves-light btn modal-trigger" href="#modalConnexion">Connexion</a></li>
            <?php }?>

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
    $empty = document.getElementById("empty");
    $wrong = document.getElementById("wrong");



    $(document).ready(function () {
        $elemConnexion = $('#modalConnexion').modal();
        $instanceConnexion = M.Modal.getInstance($elemConnexion);

        //Dropdown du profil
        $dropdown = $(".dropdown-trigger").dropdown();

        //$dropdown = document.querySelectorAll('.dropdown-trigger');
        //var instanceDropdown = M.Dropdown.init($dropdown, alignment);

        //Initialisation navbar gauche responsive
        $('.sidenav').sidenav();


        $('#connexion').click(function () {

            $login = $("#login1").val();
            $password = $("#password1").val();

            if($login == "" || $password == ""){
                $empty.style.display ="block";
                $wrong.style.display ="none";
            }else{
                connexion_event($login, $password);
            }


        });

        function refresh(){
            location.reload();
            console.log("refresh done");
        }

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

                        switch(data){
                            case '0' :
                                //connexion réussi
                                $instanceConnexion.close();
                                location.reload();
                                break;
                            case '1':
                                //login ou pass vide
                                $empty.style.display ="block";
                                $wrong.style.display ="none";
                                break;
                            case '2':
                                //login ou mdp faux
                                $empty.style.display ="none";
                                $wrong.style.display ="block";
                                break;
                        }


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
