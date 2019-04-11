<?php
/**
 * Created by PhpStorm.
 * User: coren
 * Date: 05/11/2018
 * Time: 22:52
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/style.css" />
    <title>Les freelances</title>
</head>
<body>
<div class="header">
    <div class="row">

        <div class="col s12">
            <label style="color:black;font-size: 1em;">Pour filtrer une compétence en particulier, écrivez la puis appuyez sur entrer</label>
            <div class="row">
                <div class="input-field col s10">
                    <div class="chips chips-autocomplete"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="liste-elem">
    <div class="liste-elem-title">
        <div class="nb-resultats">XX Résultats</div>
        <div class="filtre-resultats">Trier par :</div>
    </div>
    <?php if (isset($news)) {
        foreach($news as $news) { ?>
            <div class="elem">

                <div class="header-elem">

                    <div class="titre-elem">Freelance</div>
                    <div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></div>
                </div>
                <div class="body-elem">
                    <div class="description-elem"><strong>Présentation : </strong><?php echo substr($news['presentation'], 0, 80).'...';  ?></div>
                </div>
                <div class="footer-elem">

                    <div class="postuler-elem">
                        <a class="btn btn-info" href="<?php echo site_url('index.php/Utilisateur/detailFreelance'); ?>?id=<?php echo $news['id']?>">Voir profil</a>
                        </button>
                    </div>
                </div>

            </div>
        <?php }
    } ?>
</div>
</body>
</html>
