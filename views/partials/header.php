<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog de test</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/foundation/5.4.7/css/foundation.min.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/foundation/5.4.7/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/foundation/5.4.7/js/foundation.min.js"></script>
</head>

<body id='global'>
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name">
				<h1><a href="#">Blog du Cesi</a></h1>
			</li>
		</ul>
	</nav>
	<div id="side_panel" class="small-12 large-2 medium-uncentered columns">
			<div class="panel">
				<div class="row">
					<?php if(!AccessHelper::isConnected()):?>
						<div>
							<form method="POST" action="index.php?control=user&task=connect" >
							    <input type ='text' name='login' id='login' placeholder='Login'/>
							    <input type ='password' name='pass' id='pass' placeholder='Mot de passe'/>
							    <input type ='submit' name='submit' class="button small success expand"/>
							</form>
						</div>
					<?php else:?>
						<div class="small-centered columns">
							<strong>Utilisateur : <cite><?php echo $_SESSION['user']->login?></cite></strong>
						</div>
						<hr>
						<div>
							<a href="index.php?control=user&task=disconnect" class="button alert small expand">Déconnexion</a>
							<a href="#" class="button small expand">Mon Compte</a>
						</div>
					<?php endif?>
								
					<?php if(AccessHelper::isAdmin()):?>
						<div>
							<a href="index.php?task=creation" class="button small green expand">Nouvel article</a>
						</div>
					<?php endif?>
				</div>
			</div>
		</div>
	<div id='content' class='small-12 large-8 end columns'>