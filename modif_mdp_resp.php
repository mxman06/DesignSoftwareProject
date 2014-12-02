<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
require_once("Database.php");
require_once("Responsable.php");


Database::connect();


//je recupere les données envoyées par le formulaire
//
$newmdp = $_POST["newmdp"];
$id = $_POST["id"];

//je met a jour le stock
//
Responsable::update($id, $newmdp, "pass");



header('Location: http://www.guillaumeadam.com/projetConception/liste_resp.php');
exit();
