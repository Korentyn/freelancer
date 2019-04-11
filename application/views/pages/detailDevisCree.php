<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/projetDetail.css')?>" />
    <title>Document</title>
</head>
<body>
<?php if (isset($devis)){
foreach($devis as $devis) { ?>
<div class="form-wrapper">
    <?php switch ($devis['etat']) {
        case 1:
            echo "<div class=\"alert alert-warning\">
                           <strong>Devis envoyé</strong> En attente d'une réponse du porteur de projet.
                            </div>";
            break;
        case 2:
            echo "<div class=\"alert alert-warning\">
                           <strong>Devis envoyé</strong> En attente d'une réponse du porteur de projet.
                            </div>";
            break;
        case 4:
            echo "<div class=\"alert alert-danger\">
                    <strong>Devis refusé</strong> <a href=".site_url('index.php/Projet/detailProjet?id=').$devis['id_projet'].">Renvoyer un nouveau devis</a>
                        </div>";
            break;
        case 5:
            echo "<div class=\"alert alert-success\">
  <strong>Devis accepté !</strong> <a href=".site_url('index.php/Projet/commencerProjet?id=').$devis['id']."&p=".$devis['id_projet'].">Valider le démarrage du projet</a>
</div>";
            break;
        case 7:
            echo "<div class=\"alert alert-info\">
                           <strong>Projet en cours</strong> Vous pouvez à présent uploader le projet
                            </div>";
            break;
        case 8:
            echo "<div class=\"alert alert-success\">
                           <strong>Bravo vous avez terminé</strong> Le porteur de projet va à présent vérifier le contenu des lots et vous payer.
                            </div>";
            break;
    } ?>
    <h2>Fiche du projet</h2>
    <form class="ficheProjet" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" >
        <div class="card-header"><strong><div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $devis['image']; ?>" alt=""><?php echo $devis['login']; ?></div></strong></div>
        <div class="card-body card-block">
            <div class="form-group">
                <div class="input-group">
                    <div class="col col-md-2"><label for="select" class=" form-control-label">Titre</label></div>
                    <input type="text" id="titre" value="<?php echo $devis['titreprojet']; ?>" placeholder="Titre de votre projet" class="form-control" disabled>
                </div>
            </div>
            <div class="form-group">
                <div class="row form-group">
                    <div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Présentation du projet</label></div>
                    <div class="col-12 col-md-9"><textarea type="text" id="texte-presentation" id="textarea-input" rows="9"  class="form-control" disabled><?php echo $devis['presentationprojet']; ?></textarea></div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Budget</label></div>
                <div class="col-12 col-md-9" >
                    <input type="text" name="budget" value="<?php echo $devis['budget']; ?>" class="form-control" disabled>
                </div>
            </div>
            <div class="card-header"><strong></strong></div>
            <br>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Compétence demandé</label></div>
                <div class="col-12 col-md-9">
                    <?php
                    $techno = $devis['techno'];
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
                    $mot_cle = $devis['cleprojet'];
                    if(isset($mot_cle)) { ?>
                        <input type="text" id="budget" value="<?php echo $mot_cle; ?>" class="form-control" disabled>
                    <?php }else{ ?>
                        <input type="text" id="budget" value="Aucun" class="form-control" disabled>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>
</div>

<h2>Devis proposé</h2>
<form>

      <div class="card-body card-block">
        <div class="row form-group">
            <div class="input-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Estimation du prix (€)</label></div>
                <div class="col col-md">
                    <input type="number" id="prix" name="prix" value="<?php echo $devis['prix']; ?>" class="form-control" disabled>
                    <div class="valid-feedback">
                        Ok !
                    </div>
                    <div class="invalid-feedback">
                        Estimez le coût global du projet
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="input-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Votre estimation du nombre d'heures de développement</label></div>
                <div class="col-12 col-md-9">
                    <input type="number" id="heures" name="heures" value="<?php echo $devis['heures']; ?>" class="form-control" disabled>
                    <div class="valid-feedback">
                        Ok !
                    </div>
                    <div class="invalid-feedback">
                        Obligatoire
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Votre tarif horaire</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="tarif_hor" name="tarif_hor" value="<?php echo $devis['tarif_hor2']; ?>" form-control" disabled>
            </div>
        </div>

        <div class="form-group">

            <div class="row form-group">
                <div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Commentaire</label></div>
                <div class="col-12 col-md-9"><textarea type="text" name="commentaire" id="texte-presentation"  id="textarea-input" rows="9"  class="form-control" disabled><?php echo $devis['commentaire']; ?></textarea>
                    <div class="valid-feedback">
                        Ok !
                    </div>
                    <div class="invalid-feedback">
                        Obligatoire
                    </div>
                </div>

            </div>

            <div class="card-header"><strong></strong></div>
            <br>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Compétence proposée</label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="competence" value="<?php echo $devis['competence']; ?>" class="form-control" disabled>
                    <div class="valid-feedback">
                        Ok !
                    </div>
                    <div class="invalid-feedback">
                        Obligatoire
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="needs-validation">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Réponse</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea  class="form-control" id="message-text"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <a href="<?php echo site_url('index.php/Projet/refuserDevis?id='); ?><?php echo $devis['id']; ?>" class="btn btn-danger">Refuser</a>
                                <a href="<?php echo site_url('index.php/Projet/accepterDevis?id='); ?><?php echo $devis['id']; ?>&p=<?php echo $devis['id_projet']; ?>" class="btn btn-success">Accepter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <hr>
            <span>Lot(s) prévu(s) pour le projet. Si le freelance décide de diviser le projet en plusieurs lots, un paiement à chaque lot sera nécessaire pour télécharger les sources.</span>
            <?php if (isset($lots)) {
                foreach($lots as $lots) { ?>
                    <div class="lot">
                        <div class="row">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Contenu du lot</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="titre-lot[1]" value="<?php echo $lots['titre']; ?>" class="form-control" disabled>
                                <div class="valid-feedback">
                                    Ok !
                                </div>
                                <div class="invalid-feedback">
                                    Obligatoire
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Date estimée</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="date-lot[1]" value="<?php echo $lots['date_deploiement']; ?>" class="form-control datepicker" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Prix du lot</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="date-lot[1]" value="<?php echo $lots['prix']; ?> €" class="form-control datepicker" disabled>
                            </div>
                        </div>
                    <?php if ($devis['etat'] >= 7){ ?>
                        <?php if ($lots['etat'] != 1){ ?>
                        <div class="col-12 col-md-12 alert alert-warning">
                            Attention, le format doit être <strong>obligatoirement</strong> en .zip et < 50 Mo
                            <?php echo form_open_multipart('index.php/Projet/uploaderLot?devis='.$devis['id'].'&id='.$lots['id']);?>
                            <form action = "" method = "">
                                <input type ="file" name ="userfile" size ="50000" />
                                <br /><br />
                                <input type = "submit" value = "Envoyer" />
                            </form>
                        </div>
                        <?php }?>

                        <?php if ($lots['etat'] == 1){ ?>
                            <div class="col-12 col-md-12 alert alert-success">
                                <strong>Bravo !</strong> Le lot a bien été envoyé


                                <form action = "" method = "">
                                    <?php echo $lots['filename']; ?>.zip
                                    <br /><br />
                                    <input type = "submit" value = "Envoyer" disabled/>
                                </form>
                            </div>
                        <?php }?>
                    <?php }?>
                    </div>
                <?php }
            } ?>
            <?php switch ($devis['etat']) {
                case 1:
                    echo "<div class=\"alert alert-warning\">
                           <strong>Devis envoyé</strong> En attente d'une réponse du porteur de projet.
                            </div>";
                    break;
                case 2:
                    echo "<div class=\"alert alert-warning\">
                           <strong>Devis envoyé</strong> En attente d'une réponse du porteur de projet.
                            </div>";
                    break;
                case 4:
                    echo "<div class=\"alert alert-danger\">
                    <strong>Devis refusé</strong> <a href=".site_url('index.php/Projet/detailProjet?id=').$devis['id_projet'].">Renvoyer un nouveau devis</a>
                        </div>";
                    break;
                case 5:
                    echo "<div class=\"alert alert-success\">
  <strong>Devis accepté !</strong> <a href=".site_url('index.php/Projet/commencerProjet?id=').$devis['id']."&p=".$devis['id_projet'].">Valider le démarrage du projet</a>
</div>";
                    break;
                case 7:
                    echo "<div class=\"alert alert-info\">
                           <strong>Projet en cours</strong> Vous pouvez à présent uploader le projet
                            </div>";
                    break;
                case 8:
                    echo "<div class=\"alert alert-success\">
                           <strong>Bravo vous avez terminé</strong> Le porteur de projet va à présent vérifier le contenu des lots et vous payer.
                            </div>";
                    break;
            } ?>
        </div>
          <?php }
          } ?>
</form>


</div>

</body>
</html>
