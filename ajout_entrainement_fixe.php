<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
require_once("Entrainements.php");
Database::connect();

//Je recupere les variable passée dans le formulaire
//
$lieuentrainement = $_POST["lieu"];
$horaire = $_POST["horaire"];
$annee = $_POST["annee"];
$date = $_POST["date"];

// recuperation variable nécessaires pour l'insertion
//
$sport = $_SESSION["sport"];

//Tester si un entrainement fixe n'existe pas deja
//
if(Entrainements::EntrainementAlready($sport, "fixe")){
	header('Location: http://www.guillaumeadam.com/projetConception/entrainementfixe_already.php');
}

//aucun entrainement fixe n'ont ete rentrés
//
else{
	
	//On créer l'entrainement fixe
	//
	$newentrainementfixe = new Entrainements($sport, $lieuentrainement, $horaire, $date, $annee);
	
	//et on l'insert
	Entrainements::insert($newentrainementfixe, "fixe");
	
	header('Location: http://www.guillaumeadam.com/projetConception/liste_entrainementfixe.php');
}
?>











