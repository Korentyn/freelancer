<?php




?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="--><?php //echo base_url()?><!--asset/css/style.css" />-->
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/nouislider.min.css" />

    <title>Projets disponibles</title>
</head>
<body>




    <?php foreach($news as $news) { ?>
        <div class="elem">

            <div class="header-elem">
                <div class="prix-elem"><?php echo $news['description']; ?></div>
                <div class="titre-elem"><?php echo $news['titre']; ?></div>
                <div class="img-createur-elem"><img src="<?php echo base_url()?>asset/images/avatar/<?php echo $news['image']; ?>" alt=""></div>
                <div class="createur-elem"><?php echo $news['login']; ?></div>
            </div>
            <div class="body-elem">
                <div class="description-elem"><?php echo $news['presentation']; ?></div>
            </div>
            <div class="footer-elem">
                <div class="comp-elem"><?php
                    if(($news['mot_cle'])!="") {
                        echo $news['mot_cle'];
                    }else{
                        echo ("Libre");
                    } ?></div>
                <div class="postuler-elem">
                    <a href="" value="<?php echo $news['id']; ?>" class="btn waves-effect waves-light orange accent-4" type="submit" name="projetId">Postuler
                    </a>
                </div>
            </div>

        </div>
    <?php } ?>


<script src="<?php echo base_url()?>asset/js/nouislider.min.js"></script>
<script>
    $(document).ready(function () {



    });
</script>
</body>
</html>
