<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$opts = array(
    'http' => array(
        'method' => "GET",

    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://localhost/Bizness/legion_honneur/MyTab/index.php/User/user', false, $context);
$json = json_decode($file);

//var_dump($json);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Legion d'Honneur</title>

    <!--    CSS DATATABLES-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
</head>
<body>

<div id="modalInscription" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="row">
            <form class="col s12">
                <div class="row">

                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Prénom</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="name" type="text" class="validate">
                        <label for="name">Nom</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="textarea2" class="materialize-textarea" data-length="100"></textarea>
                        <label for="textarea2">Note</label>
                    </div>
                </div>


            </form>
        </div>

    </div>

        <div class="flex">
            <a href="#" id="sign" class="bttn">Enregistrer</a>
        </div>

</div>

<div id="modalConnexion" class="modal">
    <div class="modal-content">
        <div class="row">
            <form class="col s12">
                <div class="row">

                    <div class="input-field col s6">
                        <input id="login1" type="text" class="validate">
                        <label for="login1">Login</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Pas de compte ? <a href="<?php echo site_url('index.php/Inscription/'); ?>">Créer mon compte</a></span>
                    </div>
                    <div class="input-field col s6">
                        <input id="password1" type="password" class="validate">
                        <label for="password1">Password</label>
                    </div>
                </div>

                <a id="connexion" class="waves-effect waves-light btn">Valider</a>

            </form>
        </div>

    </div>
</div>

</div>

<div class="wrapper">
    <table id="myTable" class="display">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($json as $key => $value) {
            echo "<tr>
        <td>$value->prenom</td>
        <td>$value->nom</td>
        <td>$value->note</td>
    </tr>";
        }

        ?>
        </tbody>
    </table>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/datatables.min.js"></script>

<script>


    $(document).ready(function () {
        $elemInscription = $('#modalInscription').modal();
        $instanceInscription = M.Modal.getInstance($elemInscription);

        $elemConnexion = $('#modalConnexion').modal();
        $instanceConnexion = M.Modal.getInstance($elemConnexion);

        

        $('#myTable').DataTable({
            responsive: true,
            "paging":   false
        });

        //Initialisation navbar gauche responsive
        $('.sidenav').sidenav();

        $('input#input_text, textarea#textarea2').characterCounter();

        $('#sign').click(function ()
        {

            $nom = $("#name").val();
             $prenom = $("#last_name").val();
             $note = $("#textarea2").val();
            console.log("Vous avez tapé : " + $note );

            poster_event($nom, $prenom, $note);

        });



        $('#connexion').click(function ()
        {

             $login = $("#login1").val();
             $password = $("#password1").val();


            connexion_event($login, $password);

        });

    });

    function creation_event(login, password) {
        // https://thenightwatchtavern.v-info.info/User/user
        $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Bizness/legion_honneur/MyTab/index.php/Login/login',
                header: "Accept : application/json",
                data: {
                    login: login,
                    password: password,

                },
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function (data) {
                    console.log(data);
                    window.location.reload();

                    $instanceCreation.close();

                },
                error: function (errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);

                    $instanceCreation.close();
                }
            });
    }


    function connexion_event(login, password) {

        $.ajax(
            {
                type: 'GET',
                url: 'http://localhost/Bizness/legion_honneur/MyTab/index.php/Login/login',
                header: "Accept : application/json",
                data: {
                    login: login,
                    password: password,
                },
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function (data) {

                    $instanceConnexion.close();

                    console.log(data[0]['login']);
                },
                error: function (errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);
                    $instanceConnexion.close();
                }
            });
    }

    function poster_event(nom, prenom, note) {
            console.log(nom);

        $.ajax(
            {
                type: 'POST',
                url: 'http://localhost/Bizness/legion_honneur/MyTab/index.php/User/user',
                header: "Accept : application/json",
                data: {
                    nom: nom,
                    prenom: prenom,
                    note: note,

                },
                datatype: 'json', // ou json .. ou etc.  = le type de données que l'on attend en retour, si le retour est différent il lance callback erreur, si c'est ok il parse direvtement le JSON
                success: function (data) {
                    console.log(data);
                    window.location.reload();

                    $instanceInscription.close();

                },
                error: function (errorThrown) {
                    // Une erreur s'est produite lors de la requete
                    console.log(errorThrown);

                    $instanceInscription.close();
                }
            });
    }


</script>
</body>
</html>
