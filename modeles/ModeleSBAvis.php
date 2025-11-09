<?php

	class ModeleSBAvis {

		private static $connexion = null ;
		
		private function __construct(){
			self::$connexion = new PDO( 'mysql:host=localhost;dbname=sbavis', 'sanayabio', 'azerty' ) ;
		}

		private static function getConnexion(){
			if( self::$connexion == null ){
				new ModeleSBAvis() ;
			}
			return self::$connexion ;
		}

		public static function getClient( $email , $mdp ){
			
			$bd = self::getConnexion() ;
			
			$sql = "select id , nom , prenom from client where email = :email and mdp = :mdp" ;
			$st = $bd->prepare( $sql ) ;
			$st->execute( array( ':email' => $email , ':mdp' => $mdp ) ) ;
			$client = $st->fetch( PDO::FETCH_ASSOC ) ;
			$st->closeCursor() ;
			
			return $client ;
			
		}
		
		public static function getAvis(){
			
			$bd = self::getConnexion() ;
			
			$sql = "select client.id as id_client , nom , prenom , avis.id as id_avis , note , commentaire , horodatage "
				 . "from avis "
				 . "inner join client "
				 . "on client.id = avis.idClient "
				 . "order by horodatage desc " ;
				 
			$st = $bd->prepare( $sql ) ;
			
			$st->execute() ;
			
			$avis = $st->fetchall( PDO::FETCH_ASSOC ) ;
			
			$st->closeCursor() ;
			
			return $avis ;
		
		}

		public static function enregistrerAvis( $note , $commentaire , $idClient ){
			
			$bd = self::getConnexion() ;
			$sql = "insert into avis( note , commentaire , idClient ) "
				 . "values( :note , :commentaire , :idClient ) " ;
				 
			$st = $bd->prepare( $sql ) ;
			$st->execute(
					[
						':note' => $note ,
						':commentaire' => $commentaire ,
						':idClient' => $idClient
					]
				) ;
				
			if( $st -> rowCount() == 1 ){
				return TRUE ;
			}
			else {
				return FALSE ;
			}
		}
		
		public static function supprimerAvis( $idAvis , $idClient ){
			
			$bd = self::getConnexion() ;
			
			$sql = "delete from avis "
				 . "where id = :idAvis "
				 . "and idClient = :idClient" ;
				 
			$st = $bd->prepare( $sql ) ;
			$st->execute(
					[
						':idAvis' => $idAvis ,
						':idClient' => $idClient
					]
				) ;
				
			if( $st -> rowCount() == 1 ){
				return TRUE ;
			}
			else {
				return FALSE ;
			}
			
		}

	} ;


?>
