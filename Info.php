<?php

if( isset($_SESSION['sport'])){ 
session_start();
}

require_once("Database.php");
require_once("Entrainements.php");

	Class Info
	{
	  private $_sport;
	  private $_texte;
	  private $_type;


		public function __construct($sport, $texte, $type)
		{
			//Afecter le sport
			//
			$this->_sport = $sport;
			
			//Afecter le texte
			//
			$this->_texte = $texte;
			
			//Afecterle type
			//
			$this->_type = $type;
			
			return $this;			
		}
		
		
		
		public static function getAll($sport, $type){
		
			Database::connect();
			//Retourner les appel joueurs
			//
			if ($type == "appeljoueur"){
				$req = "SELECT * FROM info WHERE type='apl' AND sport='$sport' ;";
				$result=mysql_query($req) or die ("erreur getAll");
				
				return $result;
			}
			
			//Retourner les matériels
			//
			if ($type == "materiel"){
				$req = "SELECT * FROM materiel WHERE sport='$sport' ;";
				$result=mysql_query($req);
				
				return $result;
			}
		
		}
		
		
		public function elementAlready($param, $type){
			
			Database::connect();
			//Elément est un appel à joueur
			//
			
			if($type == "appeljoueur"){
				$req=" SELECT * FROM info WHERE sport='$param' AND type='apl' ";
				$result=mysql_query($req);
				$count=mysql_num_rows($result);
				
				if($count == 1 ){
					return true;
				}
				else{
					return false;
				}
			}
			
			
			//Elément est un matériel
			//
			
			if($type == "materiel"){
				$req=" SELECT * FROM materiel WHERE sport='$param' ";
				$result=mysql_query($req);
				$count=mysql_num_rows($result);
				
				if($count == 1 ){
					return true;
				}
				else{
					return false;
				}
			}
			
			
			
		
		}
		
		
		public static function findAll() {
  	$informations = array();
  	Database::connect();
    $query = "SELECT * FROM info WHERE type='apl'";
    $res = mysql_query($query);
    while($line = mysql_fetch_assoc($res)){
	    $sport = $line["sport"];
    	$texte = $line["texte"];
		$type = $line["type"];
    	$info = new Info($sport,$texte,$type);
    	array_push($informations, $info);
	}
	
	$query = "SELECT * FROM info WHERE type='inf'";
    $res = mysql_query($query);
    while($line = mysql_fetch_assoc($res)){
	    $sport = $line["sport"];
    	$texte = $line["texte"];
		$type = $line["type"];
    	$info = new Info($sport,$texte,$type);
    	array_push($informations, $info);
    }
	
	
	$query = "SELECT * FROM entrainementponctuel";
    $res = mysql_query($query);
    while($line = mysql_fetch_assoc($res)){
	    $sport = $line["sport"];
    	$lieu = $line["lieu"];
		$horaire = $line["horaire"];
		$date = $line["date"];
		$annee= $line["annee"];
    	$info = new Entrainements($sport,$lieu,$horaire, $date, $annee);
    	array_push($informations, $info);
    }
    Database::disconnect();
    return $informations;
  }

	//question...
	// est-ce bien ˆ sa place surtout avec author???
  public function toXML()
  {
	if( isset($this->_horaire)) {
		$type ="Entrainement Exceptionnel :";
		return 	'<info>'.
					'<titre>' . $type . '</titre>'.
					'<sport> Sport : ' . $this->_sport . '</sport>'.
						'<content kind="info">' .
							'<texte>'. $this->_horaire .
										 $this->_lieu . 
										 $this->_date . 
										 $this->_annee .
							'</texte>' .
						'</content>'  .
				 '</info>';
	}
	else{
		if( $this->_type == 'apl') $type = "Appel a Joueurs";
		if( $this->_type == 'inf') $type = "Information";
		return 	'<info>'.
					'<titre>' . $type . '</titre>'.
					'<sport>' . $this->_sport . '</sport>'.
						'<content kind="info">' .
							'<texte>' . $this->_texte . '</texte>' .
						'</content>'  .
				 '</info>';
		}
  }
  
  public function display() {
				header('Content-type: text/xml');
  				$res='<?xml version="1.0"?><data>';
			    $infos = Info::findAll();
			    foreach($infos as $tmpInformation) {
       				$res = $res.$tmpInformation->toXML() ;
    			}
    			$res=$res.'</data>';
    
			    echo $res;
			}
		
		
		
		
		
		
		
		
		
	}
	?>