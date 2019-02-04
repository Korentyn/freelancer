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
    <div id="" class="row">
        <div class="col s12" action="#">
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



        </div>
    </div>
</div>

<div class="liste-elem">
    <div class="liste-elem-title">
        <div class="nb-resultats">XX Résultats</div>
        <div class="filtre-resultats">Trier par :</div>
    </div>
    <?php foreach($news as $news) { ?>
        <div class="elem">

            <div class="header-elem">
<!--                <div class="prix-elem">--><?php //echo $news['presentation']; ?><!--</div>-->
                <div class="titre-elem"><?php echo $news['login']; ?></div>
<!--                <div class="createur-elem">--><?php //echo $news['login']; ?><!--</div>-->
            </div>
            <div class="body-elem">
                <div class="description-elem"><?php echo $news['presentation']; ?></div>
            </div>
            <div class="footer-elem">
                <div class="comp-elem"><?php
                    if(($news['techno'])!="") {
                        echo $news['techno'];
                    }else{
                        echo ("Non défini");
                    } ?></div>
                <div class="postuler-elem">
                    <button value="<?php echo $news['id']; ?>" class="btn waves-effect waves-light orange accent-4" type="submit" name="freelanceId">Voir profil
                        <i class="material-icons left">send</i>
                    </button>
                </div>
            </div>

        </div>
    <?php } ?>
</div>

<script src="<?php echo base_url()?>asset/js/nouislider.min.js"></script>
<script>
    $(document).ready(function () {

        //Initialisation champ compétences
        $('.chips').chips();
        $('.chips-autocomplete').chips({
            autocompleteOptions: {
                data: {
                    'PHP': null,
                    'HTML': null,
                    'Javascript': null,
                    'Java/JEE': null,
                    'C': null,
                    'C++': null,
                    'C#': null,
                    'Unity': null,
                    'Unreal engine': null,
                    'NodeJS' : null,
                    'Angular' : null

                },
                limit: Infinity,
                minLength: 1
            }
        });

        //Initialisation input prix tt + prix /h
        $('select').formSelect();


    });
</script>
</body>
</html>
