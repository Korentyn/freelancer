<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="apple-touch-icon" href="">
	<link rel="shortcut icon" href="">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/cs-skin-elastic.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/styleTemplate.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('asset/css/jquery-ui.min.css'); ?>">

</head>
<body>
<!------------------------------ Left Panel ------------------------------------------------------------------------->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo site_url(''); ?>"><i class="menu-icon fa fa-laptop"></i>Accueil</a>
                    </li>
                    <li class="menu-title">Premiers pas</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">

                        <a href="<?php echo site_url('index.php/Projet/creer'); ?>" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-play"></i>Poster un projet</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="<?php echo site_url('index.php/Projet/lister'); ?>" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-cogs"></i>Projets disponibles</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="<?php echo site_url('index.php/Utilisateur/lister'); ?>" class="dropdown-toggle"  aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-users"></i>Freelances inscrits</a>
                    </li>

                    <?php
                    //Si le membre est connecté on affiche le tableau de bord + profil
                    $login = $this->session->userdata('pseudo');
                    $role_id = $this->session->userdata('role_id');
                    if(isset($role_id)) { ?>

                        <li class="menu-title">Tableau de bord</li><!-- /.menu-title -->
                    <?php if($role_id== 2) { ?>
                        <li class="menu-item-has-children dropdown">
                            <a href="<?php echo site_url('index.php/Projet/mesProjets'); ?>" ><i class="menu-icon fa fa-tasks"></i> Projet créé</a>
                        </li>
                        <?php }else if ($role_id== 3) {?>
                            <li class="menu-item-has-children dropdown">
                                <a href="<?php echo site_url('index.php/Projet/mesDevis'); ?>" ><i class="menu-icon fa fa-tasks"></i> Mes devis envoyés</a>
                            </li>
                        <?php } ?>
                        <li class="menu-item-has-children dropdown">
                            <a href=""> <i class="menu-icon ti-email"></i>Messagerie </a>
                        </li>

                        <li class="menu-title">Mon profil</li><!-- /.menu-title -->
                        <li class="menu-item-has-children">
                            <a href="<?php echo site_url('index.php/Utilisateur/monProfil'); ?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Mes informations</a>
                            <br>
                        </li>
                        <li>
                            <br>
                            <a  href="<?php echo site_url('index.php/Utilisateur/deconnexion'); ?>" ><i class="menu-icon fa fa-power-off"></i>Deconnexion </a>
                        </li>
                    <?php } ?>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
<!-- /#left-panel -->

<!-- Right Panel -->
<div id="right-panel" class="right-panel">


	<!---------------------------------------- Header-------------------------------------------------------->
	<header id="header" class="header">
		<div class="top-left">
			<div class="navbar-header">


				<a class="navbar-brand" href="<?php echo site_url(''); ?>"><img src="<?php echo base_url('asset/images/logo-2.png'); ?>" alt="Logo"></a>

				<a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


			</div>
		</div>

		<div class="top-right">
			<div class="header-menu">
				<div class="header-left">
				<?php


				if(isset($role_id)) { ?>



				<!------------------------- NOTIFICATIONS ----------------->
				<div class="dropdown for-notification">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-bell"></i>
						<span class="count bg-danger">3</span>
					</button>
					<div class="dropdown-menu" aria-labelledby="notification">
						<p class="red">You have 3 Notification</p>
						<a class="dropdown-item media" href="#">
							<i class="fa fa-check"></i>
							<p>Server #1 overloaded.</p>
						</a>
						<a class="dropdown-item media" href="#">
							<i class="fa fa-info"></i>
							<p>Server #2 overloaded.</p>
						</a>
						<a class="dropdown-item media" href="#">
							<i class="fa fa-warning"></i>
							<p>Server #3 overloaded.</p>
						</a>
					</div>
				</div>

				<!------------------------- MESSAGES     ----------------->
				<div class="dropdown for-message">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-envelope"></i>
						<span class="count bg-primary">1</span>
					</button>
					<div class="dropdown-menu" aria-labelledby="message">
						<p class="red">Vous avez 1 message(s)</p>
						<a class="dropdown-item media" href="#">
							<span class="photo media-left"><img alt="avatar" src="<?php echo base_url('asset/images/avatar/2.jpg'); ?>"></span>
							<div class="message media-body">
								<span class="name float-left">Jonathan Smith</span>
								<span class="time float-right">Just now</span>
								<p>Hello, this is an example msg</p>
							</div>
						</a>

					</div>
				</div>
			</div>


				<?php }?>

				<div class="header-left">


				<?php if(isset($role_id)) {
					$image = $this->session->userdata('image');
					?>
				<div class="user-area dropdown float-right">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img class="user-avatar rounded-circle" src="<?php echo base_url()?><?php echo $image; ?>" alt="User Avatar">
					</a>

					<div class="user-menu dropdown-menu">
						<a class="nav-link" href="<?php echo site_url('index.php/Utilisateur/monProfil'); ?>"><i class="fa fa- user"></i>My Profile</a>

						<a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

						<a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

						<a class="nav-link" href="<?php echo site_url('index.php/Utilisateur/deconnexion'); ?>"><i class="fa fa-power -off"></i>Logout</a>
					</div>
				</div>
				<?php }else{?>
					<form action="<?php echo site_url('index.php/Utilisateur/formConnexion'); ?>" method="post">
					<button id="connexion-button" class="btn btn-primary">Connexion</button>
					</form>
					<?php } ?>
			</div>
		</div>
	</header>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url('asset/js/main.js'); ?>" ></script>
    <script>

    </script>
</body>
</html>
