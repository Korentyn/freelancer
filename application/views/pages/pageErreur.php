<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Whoops</title>
</head>
<body>
Whoops, une erreur est survenue dans le chargement de votre page. <br>
Merci de recommencer dans quelques instants

<?php if (isset($error)) {
    echo $error;
} ?>
</body>
</html>