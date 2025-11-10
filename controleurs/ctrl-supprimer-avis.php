<?php

	require "modeles/ModeleSBAvis.php" ;
	ModeleSBAvis::supprimerAvis( $numAvis , $_SESSION[ 'id' ] ) ;
	
	header( "Location: /avis" ) ;

?>
