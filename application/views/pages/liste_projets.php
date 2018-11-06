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
        <div class="row">
            <div class="input-field col s10">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Compétences</label>
            </div>
        </div>
    </form>

</div>
    <div id="" class="row">
        <form class="col s4" action="#">
            <p class="range-field">
            Prix total : <br>
            <div id="test-slider"></div>
            </p>
        </form>
        <form class="col s4" action="#">
            <p class="range-field">
                Prix / heure : <br>
            <div id="test-slider2"></div>
            </p>
        </form>
    </div>



</div>

<script src="<?php echo base_url()?>asset/js/nouislider.min.js"></script>
<script>
    $(document).ready(function () {

        var slider = document.getElementById('test-slider');
        noUiSlider.create(slider, {
            start: [20, 80],
            connect: true,
            step: 1,
            orientation: 'horizontal', // 'horizontal' or 'vertical'
            range: {
                'min': 0,
                'max': 100
            }
        });

        var slider2 = document.getElementById('test-slider2');
        noUiSlider.create(slider2, {
            start: [20, 80],
            connect: true,
            step: 1,
            orientation: 'horizontal', // 'horizontal' or 'vertical'
            range: {
                'min': 0,
                'max': 100
            }
        });
    });
</script>
</body>
</html>
