<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>SB - Avis</title>
	</head>
	<body>
		
		<a href="/">Accueil</a>
		<br/>
		
		<?php if( isset( $erreur ) ){ ?>
			<b><?= $erreur ?></b>
		<?php } ?>
		
		<form action="/clients/connecter" method="POST">
			Identifiant :<br/>
			<input type="text" name="email" /><br/>
			Mot de passe :<br/>
			<input type="password" name="mdp" /><br/>
			<br/>
			<input type="submit" value="Valider" />
		</form>
		
	</body>
	
</html>
