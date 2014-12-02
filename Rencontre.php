<?php
session_start();

require_once("Database.php");

	Class Rencontre
	{
	  private $_sport; 
	  private $_lieu; 
	  private $_date; 
	  private $_equipe;
	  private $_equipevs;


		public function __construct($sport, $lieu, $date, $equipe, $equipevs)
		{
			//Afecter le sport
			//
			$this->_sport = $sport;
			
			//Afecter le lieu
			//
			$this->_lieu = $lieu;
			
			//Afecter la date
			//
			$this->_date = $date;
			
			//Afecter l'equipe
			//
			$this->_equipe = $equipe;
			
			//Afecter l'equipevs
			//
			$this->_equipevs = $equipevs;
			
			return $this;			
		}
		
		public function getTable($sport){
		
			$req="SELECT * FROM rencontre WHERE sport='$sport'";
			$result=mysql_query($req);
			
			return $result;
		
		}
		
		public function rencontreAlready($sport, $date){
		
			Database::connect();
			$req=" SELECT * FROM rencontre WHERE sport='$sport' AND date='$date' ";
			$result=mysql_query($req);
			$count=mysql_num_rows($result);
			
			if($count >= 1 ){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function rencontreExist($sport){
		
			Database::connect();
			$req=" SELECT * FROM rencontre WHERE sport='$sport' ";
			$result=mysql_query($req);
			$count=mysql_num_rows($result);
			
			
			if($count >= 1 ){
				return true;
			}
			else{
				return false;
			}
		}
		
		
		public function insert($rencontre){
			
			Database::connect();
			$req="INSERT INTO rencontre (sport,lieu,date,equipe,equipevs)
			VALUES ('$rencontre->_sport', '$rencontre->_lieu', '$rencontre->_date', '$rencontre->_equipe', '$rencontre->_equipevs')";
			$result=mysql_query($req);
			Database::disconnect();
		}
	}
	?>