<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
require_once("Database.php");
require_once("Entrainements.php");


Database::connect();



//je recupere les données envoyer par le formulaire
$newhoraire = $_POST["newhoraire"];
$id = $_POST["id"];



//je met a jour l'horaire de l'entrainement
//
Entrainements::update($id, $newhoraire, "ponctuel", "horaire");


header('Location: http://www.guillaumeadam.com/projetConception/liste_entrainement_ponctuel.php');
