<?php




?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/style.css" />


    <title>Projets disponibles</title>
</head>
<body>
<div class="header">
<div class="row">

    <form class="col s12">
        <label style="color:black;font-size: 1em;">Pour ajouter une compétence, écrivez la puis appuyez sur entrer</label>
        <div class="row">
            <div class="input-field col s10">
                <div class="chips chips-autocomplete"></div>
            </div>
        </div>
    </form>

</div>
    <div id="" class="row">
        <form class="col s12" action="#">
            <div class="input-field col s5">
                <select>
                    <option value="" disabled selected>> 0 €</option>
                    <option value="1">0-250€ (Petit projet)</option>
                    <option value="2">250-500€ (Moyen projet)</option>
                    <option value="3">500-1000€ (Grand projet)</option>
                    <option value="3">+1000€ (Très grand projet)</option>
                </select>
                <label>Type de projet</label>
            </div>



            </form>
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
                <div class="prix-elem"><strong>Prix :</strong><?php echo $news['description']; ?></div>
                <div class="titre-elem"><strong>Titre :</strong><?php echo $news['titre']; ?></div>
                <div class="img-createur-elem"></div>
                <div class="createur-elem"><img class="rounded-circle" src="<?php echo base_url()?><?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></div>
            </div>
            <div class="body-elem">
                <div class="description-elem"><strong>Description :</strong><?php echo substr($news['presentation'], 0, 180).'...'; ?></div>
            </div>
            <div class="footer-elem">
                <div class="comp-elem"><strong>Technologies :</strong><?php
                    if(($news['mot_cle'])!="") {
                        echo $news['mot_cle'];
                    }else{
                        echo ("Libre");
                    } ?></div>
                <?php
                //Si le membre est freelance il voit le lien du projet

                $role_id = $this->session->userdata('role_id');
                if($role_id==3) { ?>
                <div class="postuler-elem">
                    <a href="<?php echo site_url('index.php/Projet/detailProjet'); ?>?id=<?php echo $news['id']?>"  class="btn waves-effect waves-light orange accent-4">Postuler
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php }
    } ?>
</div>

</body>
</html>
