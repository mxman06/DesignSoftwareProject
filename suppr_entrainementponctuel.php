<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}

	
require_once("Database.php");
require_once("Entrainements.php");


Database::connect();

//recuperation des var session pour la requete
$nomclient = $_SESSION["nomclient"];
$mdp=$_SESSION["mdp"];

//je recupere les données envoyer par le formulaire
$identrainement = $_POST["id"];


//je met a jour la table
//
Entrainements::delete($identrainement);

header('Location: http://www.guillaumeadam.com/STAG/liste_entrainement_ponctuel.php');
?>