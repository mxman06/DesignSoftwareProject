<?php

if( isset($_SESSION['sport'])){ 
session_start();
}

require_once("Database.php");

	Class Responsable
	{
	  private $_login; 
	  private $_pass; 
	  private $_mail; 
	  private $_sport;


		public function __construct($login, $mdp, $mail, $sport)
		{
			//Afecter le login
			//
			$this->_login = $login;
			
			//Afecter le pass
			//
			$this->_pass = $mdp;
			
			//Afecterle mail
			//
			$this->_mail = $mail;
			
			//Afecter le sport
			//
			$this->_sport = $sport;
			
			return $this;			
		}
		
		
		
		
		public function getSport(){ return $this->_sport; }
		public function getLogin(){ return $this->_login; }
		
		
		
		public function elementAlreadyUse($param, $type){
			
			
			
			//Elément est un login
			//
			
			if($type == "login"){
				$req=" SELECT * FROM responsable WHERE login='$param' ";
				$result=mysql_query($req);
				$count=mysql_num_rows($result);
				
				if($count == 1 ){
					return true;
				}
				else{
					return false;
				}
			}
			
			//Element est un sport
			//
			if($type == "sport"){
				$req=" SELECT * FROM responsable WHERE sport='$param' ";
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
		
		public function insert($responsable){
			
			Database::connect();
			$req="INSERT INTO responsable (login,pass,mail,sport)
			VALUES ('$responsable->_login', '$responsable->_pass', '$responsable->_mail', '$responsable->_sport')";
			$result=mysql_query($req);
			Database::disconnect();
		}
		
		
		public function delete($id){
		
			$req="DELETE FROM responsable WHERE id='$id' ";
			$result = mysql_query($req);
		
		}
		
		public function update($id, $param, $type){
		
			if($type == "login"){
			
				$req="UPDATE responsable SET login='$param' WHERE id=$id ";
				$result = mysql_query($req);
			
			}
			
			if($type == "pass"){
			
				$req="UPDATE responsable SET pass='$param' WHERE id=$id ";
				$result = mysql_query($req);
				
			
			}
		
		}
		
		public function getTable(){
			
			Database::connect();
			$req="SELECT * FROM responsable";
			$result=mysql_query($req);
			
			return $result;
		
		}
		
		public function nbCount(){
		
			Database::connect();
			$req="SELECT * FROM responsable";
			$result=mysql_query($req);
			$count=mysql_num_rows($result);
			
			return $count;
		
		}
		
		
		
	}
	?>