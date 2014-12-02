<?php
session_start();

require_once("Database.php");

Class Admin
{
  private $_login; 
  private $_pass; 
  private $_mail; 


	public function __construct($login, $mdp)
	{
		//Afecter le login
		//
		$this->_login = $login;
		
		//Afecter le pass
		//
		$this->_pass = $pass;
		
		//Afecter le mail
		//
		Database::connect();
		$sql=" SELECT mail FROM admin WHERE login='$login' ";
		$result=mysql_query($sql);
		$results=mysql_fetch_assoc($result);
		$lemail=$results["mail"];
		$this->_mail = $lemail;
		
		
	}
	
	
		
}
?>