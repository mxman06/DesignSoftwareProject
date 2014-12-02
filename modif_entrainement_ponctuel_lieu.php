<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
require_once("Database.php");
require_once("Entrainements.php");


Database::connect();



//je recupere les données envoyer par le formulaire
$newlieu = $_POST["newlieu"];
$id = $_POST["id"];


//je met a jour l'horaire de l'entrainement
//
Entrainements::update($id, $newlieu, "ponctuel", "lieu");


header('Location: http://www.guillaumeadam.com/projetConception/liste_entrainement_ponctuel.php');

?>
