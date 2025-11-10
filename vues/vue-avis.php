<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>SB - Ateliers</title>
	</head>
	
	<body>
		<a href="/clients/espace">Mon espace</a>
		<a href="/clients/deconnecter">Se déconnecter</a>
		
		<h4>Avis</h4>
		
		<div>
			
			<?php foreach( $avis as $unAvis ){ ?>
				
				<div>
					
					<hr />
					
					<div>
						Par <?= $unAvis[ 'nom' ] ?> <?= $unAvis[ 'prenom' ] ?> le <?= $unAvis[ 'horodatage' ] ?> : 
					</div>
					<div>
						<?= $unAvis[ 'note' ] ?> / 5
					</div>
					<p>
						<?= $unAvis[ 'commentaire' ] ?>
					</p>
					
				</div>
				
				<?php if( $unAvis[ 'id_client' ] == $_SESSION[ "id" ] ){ ?>
					
					<a href="/avis/<?= $unAvis[ 'id_avis' ] ?>/supprimer">Supprimer</a>
					
				<?php } ?>
					
			<?php } ?>
			
		</div>
		
		<hr />
		
		<h3>Nouvel avis :</h3>
		<form action="/avis/enregistrer" method="POST">
			
			<label for="note">Note (entre 0 et 5) :</label>
			<input type="number" id="note" name="note" min="0" max="5" step="1" value="5" required>
		
			<br/>
		
			<label for="commentaire">Commentaire :</label>
			</br>
			<textarea id="commentaire" name="commentaire" rows="10" cols="40" >
			</textarea>
			
			<br/>
			
			<input type="submit" value="Enregistrer" />
		
		</form>
		
	</body>
	
</html>
