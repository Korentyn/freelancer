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
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/nouislider.min.css" />

    <title>Document</title>
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
                    <option value="1">> 50 €</option>
                    <option value="2">> 100 €</option>
                    <option value="3">> 200 €</option>
                    <option value="4">> 500 €</option>
                </select>
                <label>Prix total minimum</label>
            </div>

            <form class="col s6" action="#">
                <div class="input-field col s5">
                    <select>
                        <option value="" disabled selected>> 0 €/h</option>
                        <option value="1">> 15 €/h</option>
                        <option value="2">> 20 €/h</option>
                        <option value="3">> 25 €/h</option>
                        <option value="4">> 30 €/h</option>
                    </select>
                    <label>Prix / heure minimum</label>
                </div>
    </div>
</div>

<div class="liste-elem">
    <div class="liste-elem-title">
        <div class="nb-resultats">XX Résultats</div>
        <div class="filtre-resultats">Trier par :</div>
    </div>
    <div class="elem">
        <div class="header-elem">
            <div class="prix-elem">500 - 750 € fixe</div>
            <div class="titre-elem">Créer logo + application</div>
            <div class="createur-elem">DavidCoj</div>
        </div>
        <div class="body-elem">
            <div class="description-elem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque malesuada leo,
                nec scelerisque ligula mollis ullamcorper. Nunc condimentum erat mi, ut sollicitudin diam
                hendrerit ac.</div>
        </div>
        <div class="footer-elem">
            <div class="comp-elem">Compétences : Java</div>
            <div class="postuler-elem"><button class="btn waves-effect waves-light" type="submit" name="action">Postuler
                    <i class="material-icons left">send</i>
                </button></div>
        </div>

    </div>
    <div class="elem">
        <div class="header-elem">
            <div class="prix-elem">500 - 750 € fixe</div>
            <div class="titre-elem">Créer logo + application</div>
            <div class="createur-elem">DavidCoj</div>
        </div>
        <div class="body-elem">
            <div class="description-elem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur scelerisque malesuada leo,
                nec scelerisque ligula mollis ullamcorper. Nunc condimentum erat mi, ut sollicitudin diam
                hendrerit ac.</div>
        </div>
        <div class="footer-elem">
            <div class="comp-elem">Compétences : Java</div>
            <div class="postuler-elem">
                <button class="btn waves-effect waves-light" type="submit" name="action">Postuler
                    <i class="material-icons left">send</i>
                </button>
            </div>
        </div>

    </div>
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
