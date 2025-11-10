<?php

	require "modeles/ModeleSBAvis.php" ;
	ModeleSBAvis::enregistrerAvis( $_POST[ 'note' ] , $_POST[ 'commentaire' ] , $_SESSION[ 'id' ] ) ;
	
	header( "Location: /avis" ) ;

?>
