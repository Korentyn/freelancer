<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url('asset/css/projetDetail.css')?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.css" rel="stylesheet" />
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Grow up - Mes devis</title>
</head>
<body>
<?php foreach($projet as $projet) { ?>
<div class="form-wrapper">
    <h2>Résumé du projet</h2>
    <form class="ficheProjet" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" >
        <div class="card-body card-block">
            <div class="form-group">
                <div class="input-group">
                    <div class="col col-md-2"><label for="select" class=" form-control-label">Titre</label></div>
                    <input type="text" id="titre" value="<?php echo $projet['titre']; ?>" placeholder="Titre de votre projet" class="form-control" disabled>
                </div>
            </div>
            <div class="form-group">
                <div class="row form-group">
                    <div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Présentation du projet</label></div>
                    <div class="col-12 col-md-9"><textarea type="text" id="texte-presentation" id="textarea-input" rows="9"  class="form-control" disabled><?php echo $projet['presentation']; ?></textarea></div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Budget</label></div>
                <div class="col-12 col-md-9" >
                    <input type="text" name="budget" value="<?php echo $projet['budget']; ?>" class="form-control" disabled>
                </div>
            </div>
            <div class="card-header"><strong></strong></div>
            <br>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Compétence demandé</label></div>
                <div class="col-12 col-md-9">
                    <?php
                    $techno = $projet['techno'];
                    if(isset($techno)) { ?>
                        <input type="text" id="budget" value="<?php echo $techno; ?>" class="form-control" disabled>
                    <?php }else{ ?>
                        <input type="text" id="budget" value="Libre" class="form-control" disabled>
                    <?php } ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Mot clé</label></div>
                <div class="col-12 col-md-9">
                    <?php
                    $mot_cle = $projet['mot_cle'];
                    if(isset($mot_cle)) { ?>
                        <input type="text" id="budget" value="<?php echo $mot_cle; ?>" class="form-control" disabled>
                    <?php }else{ ?>
                        <input type="text" id="budget" value="Aucun" class="form-control" disabled>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>
    <?php } ?>
    <div class="liste-elem">
        <h2>Devis reçu</h2>
        <div class="liste-elem-title">
            <div class="nb-resultats">X Résultats</div>
            <div class="filtre-resultats">Trier par :</div>
        </div>
        <?php
        //	var_dump($news);

        if (isset($devis)) {
            foreach($devis as $devis) {
                $etat = $devis['etat'];
                if( $etat!=4){ ?>
                    <div class="elem">
                        <div class="header-elem">
                            <div class="prix-elem"><strong>Prix :</strong><?php echo $devis['prix']; ?>€</div>
                            <div class="date-elem"><strong>Date de déploiement :</strong><?php echo $devis['date_deploiement']; ?></div>
                            <div class="totalrep-elem"><strong>Etat :</strong><?php switch ($devis['etat']){ case 1: echo "Nouveau"; break;
                        case 2: echo "Réponse nécessaire";break; case 3: echo "Répondu";break; case 5: echo "Accepté";break;}?></div>
                        </div>
                        <div class="body-elem">
                            <div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $devis['image']; ?>" alt=""><?php echo $devis['login']; ?></div>
                        </div>
                        <div class="footer-elem">
                            <div class="comp-elem"><strong>Technologie :</strong><?php echo $devis['competence']; ?></div>

                            <div class="postuler-elem">
                                <a href="<?php echo site_url('index.php/Projet/detailDevis'); ?>?id=<?php echo $devis['id']?>" >Détails
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php } ?>
            <?php	}else{?>
            <div class="elem">
                <span>Vous n'avez pas encore de proposition, revenez plus tard</span>
            </div>
        <?php   } ?>
    </div>
</body>
</html>
