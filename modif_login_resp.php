<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
require_once("Database.php");
require_once("Responsable.php");


Database::connect();


//je recupere les données envoyer par le formulaire
$newlogin = $_POST["newlogin"];
$id = $_POST["id"];


//tester si le newlogin pas deja affecter
//
if(Responsable::elementAlreadyUse($newlogin, "login")){
	header('Location: http://www.guillaumeadam.com/projetConception/log_resp_already.php');
	exit();
}
	
//Si le login est libre
//
else{

	//je met a jour le stock
	//
	Responsable::update($id, $newlogin, "login"); 

	header('Location: http://www.guillaumeadam.com/projetConception/liste_resp.php');
	exit();
}
