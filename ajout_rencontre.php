<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
require_once("Rencontre.php");
Database::connect();

//Je recupere les variable passée dans le formulaire
//
$lieurencontre = $_POST["lieu"];
$daterencontre = $_POST["date"];
$equipe = $_POST["equipe"];
$equipevs = $_POST["equipevs"];

// recuperation variable nécessaires pour l'insertion
//
$sport = $_SESSION["sport"];

//Tester si la rencontre n'existe pas deja
//
if(Rencontre::rencontreAlready($sport, $daterencontre)){
	header('Location: http://www.guillaumeadam.com/projetConception/rencontre_already.php');
}

//aucun entrainement fixe n'ont ete rentrés
//
else{
	
	//On créer la rencontre
	//
	$newrencontre = new Rencontre($sport, $lieurencontre, $daterencontre, $equipe, $equipevs);
	
	//et on l'insert
	Rencontre::insert($newrencontre);
	
	header('Location: http://www.guillaumeadam.com/projetConception/liste_rencontre.php');
}
?>











