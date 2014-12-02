<?php


Class Authentification
{
  private $_login; 
  private $_mdp;

	
	//Méthode permettant de savoir si authentification valide
	//
	public function AuthentificationValide($login, $mdp, $type)
	{
		//Se connecter a la base
		//
		require_once("Database.php");
		Database::connect();
		
		//Authentification Resposnable
		//
		if ($type=="responsable"){
			//Tester si responsable valide
			//
			$sql="SELECT * FROM responsable WHERE login='$login' AND pass='$mdp'";
			$result=mysql_query($sql);
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
		//Authentification Admin
		//
		if ($type=="admin"){
			//Tester si admin valide
			//
			$sql="SELECT * FROM admin WHERE login='$login' AND pass='$mdp'";
			$result=mysql_query($sql);
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
		
		return false;
		
	}
	
	public function getSport($login){
	
		require_once("Database.php");
		Database::connect();
		$sql = "SELECT sport FROM responsable WHERE login='$login'";
		$result=mysql_query($sql);
		$ret=mysql_fetch_assoc($result);
		$ret=$ret["sport"];
		return $ret;
	
	}
	
	public function getMail($login){
	
		$sql = "SELECT mail FROM responsable WHERE login='$login'";
		$result=mysql_query($sql);
		$ret =mysql_fetch_assoc($result);
		$ret["login"];
		return $ret;
	
	}
}
?>