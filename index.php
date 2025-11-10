<?php
	//var_dump( $_GET[ 'route' ] ) ;
	//$route = $_GET[ 'route' ] ;
	
	$route = parse_url( $_SERVER[ 'REQUEST_URI' ] , PHP_URL_PATH ) ;

	if( $route == '/' ){
		require "vues/vue-accueil.php" ;
	}
	elseif( $route == '/clients/connexion' ){
		require "vues/vue-connexion.php" ;
	}
	elseif( $route == '/clients/connecter' ){
		require "controleurs/ctrl-connecter-client.php" ;
	}
	elseif( $route == '/clients/espace' ){ 
		session_start() ;
		require "vues/vue-espace-client.php" ;
	}
	elseif( $route == '/clients/deconnecter' ){
		session_start() ;
		require "controleurs/ctrl-deconnecter-client.php" ;
	}
	elseif( $route == '/avis' ){
		session_start() ;
		require "controleurs/ctrl-consulter-avis.php" ;
	}
	elseif( $route == '/avis/enregistrer' ){
		session_start() ;
		require "controleurs/ctrl-enregistrer-avis.php" ;
	}
	elseif( preg_match( '#^/avis/([0-9]+)/supprimer$#' , $route , $atomes ) ){
		session_start() ;
		$numAvis = $atomes[ 1 ] ;
		require "controleurs/ctrl-supprimer-avis.php" ;
	}
	else {
		var_dump( $route ) ;
	}
?>
