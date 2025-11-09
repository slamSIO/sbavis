<?php
	
	require "modeles/ModeleSBAvis.php" ;
	
	$avis = ModeleSBAvis::getAvis() ;
	
	require "vues/vue-avis.php" ;
?>
