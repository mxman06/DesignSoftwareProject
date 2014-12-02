<?php
session_start();

require_once("Database.php");

Class Entrainements
{
  private $_sport; 
  private $_lieu; 
  private $_horaire; 
  private $_date;
  private $_annee;

	public function __construct($sport, $lieu, $horaire, $date, $annee){
		//Afecter le sport
		//
		$this->_sport = $sport;
		
		//Afecter le lieu
		//
		$this->_lieu = $lieu;
		
		//Afecter l'horaire
		//
		$this->_horaire = $horaire;
		
		//Afecter la date
		//
		$this->_date = $date;
		
		//Afecter l'année
		//
		$this->_annee = $annee;
		
		return $this;			
	}
		
		
	public function EntrainementAlready($sport, $type)
	{
	
		if($type == "fixe"){
			//Se connecter a la base
			//
			require_once("Database.php");
			Database::connect();
			
			//Tester si entrainement deja présent
			//
			$req="SELECT * FROM entrainementfixe WHERE sport='$sport'";
			$result=mysql_query($req);
			$count=mysql_num_rows($result);
			
			//Présent
			//
			if($count == 1){
				return true;
			}
			else{
				return false;
			}
		}
		
		if($type == "ponctuel"){
			//Se connecter a la base
			//
			require_once("Database.php");
			Database::connect();
			
			//Tester si entrainement deja présent
			//
			$req="SELECT * FROM entrainementponctuel WHERE sport='$sport'";
			$result=mysql_query($req);
			$count=mysql_num_rows($result);
			
			//Présent
			//
			if($count >= 1){
				return true;
			}
			else{
				return false;
			}
		}
		
	}
	
	
	
	
	public function getEntrainement($sport, $type){

		if($type == "fixe"){
			$req="SELECT * FROM entrainementfixe WHERE sport='$sport'";
			$result=mysql_query($req);
			return $result;
		}
		
		if($type == "ponctuel"){
			$req="SELECT * FROM entrainementponctuel WHERE sport='$sport'";
			$result=mysql_query($req);
			return $result;
		}
	
	}
	
	
	public function update($id, $param, $type, $attribut){
	
		if($type == "fixe"){
		
			if($attribut == "horaire"){
			
				$req="UPDATE entrainementfixe SET horaire='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			if($attribut == "lieu"){
			
				$req="UPDATE entrainementfixe SET lieu='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			
			if($attribut == "date"){
			
				$req="UPDATE entrainementfixe SET date='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			
		}
		
		if($type == "ponctuel"){
		
			if($attribut == "horaire"){
			
				$req="UPDATE entrainementponctuel SET horaire='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			if($attribut == "lieu"){
			
				$req="UPDATE entrainementponctuel SET lieu='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			
			if($attribut == "date"){
			
				$req="UPDATE entrainementponctuel SET date='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			
		}
	
	}
	
	public function insert($entrainement, $type){
	
		Database::connect();
		if($type == "fixe"){
			$req="INSERT INTO entrainementfixe (sport,lieu,horaire,date,annee)
			VALUES ('$entrainement->_sport','$entrainement->_lieu','$entrainement->_horaire','$entrainement->_date',$entrainement->_annee)";
			$result=mysql_query($req);
		}
		
		if($type == "ponctuel"){
			$req="INSERT INTO entrainementponctuel (sport,lieu,horaire,date,annee)
			VALUES ('$entrainement->_sport','$entrainement->_lieu','$entrainement->_horaire','$entrainement->_date',$entrainement->_annee)";
			$result=mysql_query($req);
		}
		Database::disconnect();
	
	}
	
	
	public function delete($id){
		
			$req="DELETE FROM entrainementponctuel WHERE id='$id' ";
			$result = mysql_query($req);
		
		}
		
	public function toXML()
  {
		$type ="Entrainement Exceptionnel ";
		return 	'<info>'.
					'<titre>' . $type . '</titre>'.
					'<sport>' . $this->_sport . '</sport>'.
						'<content kind="info">' .
							'<texte> Cet entrainement aura lieu a '. 	 $this->_lieu . '<br /> a '.
										 $this->_horaire . '<br /> les '.
										 $this->_date . '<br /> de l\'annee '.
										 $this->_annee .
							'</texte>' .
						'</content>'  .
				 '</info>';
	
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