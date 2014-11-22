<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog de test</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.7/css/foundation.min.css" type="text/css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.7/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.7/js/foundation.min.js"></script>
</head>

<body>
	<div id="main_div" class="row">
		<h1 id="header_title">Blog du CESI</h1>
		<div class="small-12 medium-3 columns">

			<div class="panel">
				<div >
					<?php if(!AccessHelper::isConnected()):?>
						<h3>Connexion</h3>
						<form method="POST" action="index.php?control=user&task=connect" >
						    <input type ='text' name='login' id='login' placeholder='Login'/>
						    <input type ='password' name='pass' id='pass' placeholder='Mot de passe'/>
						    <input type ='submit' name='submit' class="button small radius success expand"/>
						</form>
					<?php else:?>
						<h3><?php echo $_SESSION['user']->login?><h3>
						<a href="index.php?control=user&task=disconnect" class="button alert small radius expand">Déconnexion</a>
					<?php endif?>
				</div>
				<?php if(AccessHelper::isAdmin()):?>
					<div>
						<a href="index.php?task=creation" class="button small radius green expand">Nouvel article</a>
					</div>
				<?php endif?></div>
		</div>
		<div id='content' class='small-12 medium-9 columns'>