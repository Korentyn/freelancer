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
    <div class="liste-elem">
        <h2>Mes devis envoyés</h2>
        <div class="liste-elem-title">
            <div class="nb-resultats">X Résultats</div>
            <div class="filtre-resultats">Trier par :</div>
        </div>
        <?php
        if (isset($devis)){

            foreach($devis as $devis) { ?>
                    <div class="elem">
                        <div class="header-elem">
                            <div class="prix-elem"><strong>Votre prix :</strong><?php echo $devis['prix']; ?>€</div>
                            <div class="date-elem"><strong>Prévision :</strong><?php echo $devis['heures']; ?>h</div>
                            <div class="totalrep-elem"><strong>Etat :</strong><?php switch ($devis['etat']){ case 1: echo "Envoyé"; break;
                        case 2: echo "Lu";break; case 3: echo "Répondu";break; case 4: echo "Refusé";break; case 5: echo "Accepté";break; case 6: echo "Litige";break; case 7: echo "En cours";break;case 8: echo "Terminé";break;}?></div>
                        </div>
                        <div class="body-elem">
                            <div class="createur-elem"><strong>Titre du projet :</strong><?php echo $devis['titreprojet']; ?></div>
                        </div>
                        <div class="footer-elem">
                            <div class="comp-elem"><strong>Technologie :</strong><?php echo $devis['competence']; ?></div>

                            <div class="postuler-elem">
                                <a href="<?php echo site_url('index.php/Projet/detailDevisFreelance'); ?>?id=<?php echo $devis['id']?>" >Détails
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php	}else{?>
            <div class="elem">
                <span>Vous n'avez pas encore envoyé de devis</span>
            </div>
        <?php   } ?>
    </div>
</body>
</html>
