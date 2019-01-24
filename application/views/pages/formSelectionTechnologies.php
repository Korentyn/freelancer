<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="myForm-wrapper" class="row">
    <form id="myFormInscription" method="post" action="http://localhost/freelancer/index.php/Utilisateur/enregistrer?role=2">
        <h3 class="titleForm">Je sélectionne mes compétences</h3>


            <div class="chips chips-initial input-field">
                <div class="chip" tabindex="0">Apple</div>
                <div class="chip" tabindex="0">Microsoft</div>
                <div class="chip" tabindex="0">Google</div>
            </div>


    </form>
</div>
<script>
    $(document).ready(function () {

        $('.chips-initial').chips({
            autocompleteOptions: {
                onChipAdd: () => {
                    //console.log("Chip Added");
                    // $tag = $(".chip").text().slice(0, -5);
                    // document.getElementById("motcle").value = $tag;
                },
                onChipSelect: () => {
                    console.log("Chip Selected");
                },
                onChipDelete: () => {
                    //console.log("Chip Deleted");
                    document.getElementById("motcle").value = "";
                }
            }
        });
    });

</script>
</body>
</html>