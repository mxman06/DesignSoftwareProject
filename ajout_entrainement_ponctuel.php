<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
require_once("Entrainements.php");
Database::connect();

//Je recupere les variable pass�e dans le formulaire
//
$lieuentrainement = $_POST["lieu"];
$horaire = $_POST["horaire"];
$annee = $_POST["annee"];
$date = $_POST["date"];

// recuperation variable n�cessaires pour l'insertion
//
$sport = $_SESSION["sport"];



//On cr�er l'entrainement ponctuel
	//
	$newentrainementponctuel = new Entrainements($sport, $lieuentrainement, $horaire, $date, $annee);
	
	//et on l'insert
	Entrainements::insert($newentrainementponctuel, "ponctuel");
	
	header('Location: http://www.guillaumeadam.com/projetConception/liste_entrainement_ponctuel.php');

?>











