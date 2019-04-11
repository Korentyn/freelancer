<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Detail Freelancer</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/formInscriptionUser.css'); ?>">
</head>
<body>
<a onclick="history.back()" class="btn btn-warning">
	<i class="fas fa-undo"></i> Retour</a>
<div class="form-wrapper">
	<h2>Profil Freelance</h2>
    <?php if (isset($news)) {
    foreach($news as $news) { ?>
	<form class="needs-validation" action="" method="">
        <div class="header-elem">
		<div class="createur-elem"><strong><img class="rounded-circle" src="<?php echo base_url()?><?php echo $news['image']; ?>" alt=""><?php echo $news['login']; ?></strong></div>
        </div>
		<div class="card-body card-block">


			<div class="row form-group">
				<div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Présentation du freelance</label></div>
				<div class="col-12 col-md-9"><textarea name="presentation" id="textarea-input" rows="9" placeholder="Votre contenu..." class="form-control" disabled><?php echo $news['presentation']; ?></textarea></div>
			</div>
    </form>
    <?php }
    } ?>
</div>
</div>
</body>
</html>
