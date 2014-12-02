<?php
session_start();

if (!isset($_POST["login"])){
	header("location:index.php");
	}
	
require_once("Database.php");
require_once("Authentification.php");
require_once("Responsable.php");
require_once("Admin.php");

Database::connect();


// Récuperation des variables du formulaire
$login=$_POST["login"];
$mdp=$_POST["mdp"];

//Test si c'est un responsable
if(Authentification::AuthentificationValide($login, $mdp, "responsable")){

		//Récupération des autres variables nécessaires
		//
		$sport = Authentification::getSport($login);
		$mail = Authentification::getMail($login);
		
		//Création d'un responsable
		//
		$newresp = new Responsable($login, $mdp, $mail, $sport);
		
		//Enregistrement des variable de sessions
		//
		$_SESSION["login"] = $newresp->getLogin();
		$_SESSION["sport"] = $newresp->getSport();
		
		
		//Envoie à l'index responsable
		//
		header('Location: http://www.guillaumeadam.com/projetConception/index_responsable.php');
		exit();
}

//Test Admin
//
else if(Authentification::AuthentificationValide($login, $mdp, "admin")){

		//Création d'un responsable
		//
		$newadmin = new Admin($login, $mdp);
		$_SESSION["login"] = $login;
		
		//Envoie à l'index admin
		//
		header('Location: http://www.guillaumeadam.com/STAG/index_admin.php');
		exit();
	
}
//Sinon Erreur Log
//
else{
		header('Location: http://www.guillaumeadam.com/STAG/erreur_log.php');
	}
	Database::disconnect();



?>