<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>

<nav>
    <div class="nav-wrapper indigo lighten-5">
        <a href="<?php echo site_url(''); ?>" class="brand-logo center">Freelancer</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a class="orange-text text-darken-1" href="<?php echo site_url('index.php/Trouver/freelance'); ?>">Recruter</a></li>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!--////////// LIBRAIRIES BOOTSTRAP 4.1 ////////////////-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
</body>
</html>
