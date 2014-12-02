<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
require_once("Database.php");
require_once("Responsable.php");


Database::connect();


//je recupere les données envoyer par le formulaire
//
$idresponsable = $_POST["id"];


//je met a jour la table
//
Responsable::delete($idresponsable);


header('Location: http://www.guillaumeadam.com/STAG/form_suppr_resp.php');
exit();
?>