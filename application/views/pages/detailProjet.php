<?php




?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/projetDetail.css')?>" />


    <title>Projets disponibles</title>
</head>
<body>




    <?php foreach($news as $news) { ?>

    <div class="form-wrapper">
        <h2>Fiche du projet</h2>
        <form class="needs-validation" action="<?php echo site_url('index.php/Projet/enregistrer'); ?>" method="post">
            <div class="card-header"><strong><div class="createur-elem"><img src="<?php echo base_url()?>asset/images/avatar/<?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></div></strong></div>
            <div class="card-body card-block">

                <div class="form-group">
                    <div class="input-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Titre</label></div>

                        <input type="text" id="titre" value="<?php echo $news['titre']; ?>" placeholder="Titre de votre projet" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group">

                    <div class="row form-group">
                        <div class="col- col-md-3"><label for="textarea-input" class=" form-control-label">Présentation du projet</label></div>
                        <div class="col-12 col-md-9"><textarea type="text" id="texte-presentation" value="" id="textarea-input" rows="9"  class="form-control" disabled><?php echo $news['presentation']; ?></textarea></div>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Budget</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="budget" value="<?php echo $news['description']; ?>" class="form-control" disabled>

                    </div>
                </div>

                <div class="card-header"><strong></strong></div>
                <br>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Compétence demandé</label></div>
                    <div class="col-12 col-md-9">


                            <?php
                                $techno = $news['techno'];
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
						$mot_cle = $news['mot_cle'];
						if(isset($mot_cle)) { ?>
							<input type="text" id="budget" value="<?php echo $mot_cle; ?>" class="form-control" disabled>
						<?php }else{ ?>
							<input type="text" id="budget" value="Aucun" class="form-control" disabled>
						<?php } ?>
					</div>
				</div>

            </div>

            <div class="text-center form-actions form-group"><a href="<?php echo site_url('index.php/Projet/detailProjet'); ?>?id=<?php echo $news['id']?>"  class="btn waves-effect waves-light orange accent-4">Proposer mes services
				</a>
            </div>
    </div>
    </form>
    </div>
    </div>
    <?php } ?>
<script>

</script>
</body>
</html>
