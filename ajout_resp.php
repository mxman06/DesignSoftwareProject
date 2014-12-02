<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
require_once("Responsable.php");
Database::connect();

//Je recupere les variable passée dans le formulaire
//
$loginresponsable = $_POST["nomresponsable"];
$sportresponsable = $_POST["sport"];
$mdpresponsable = $_POST["mdp"];
$mailresponsable = $_POST["mail"];



//Test si le login responsable est pas deja utiliser
//
if (Responsable::elementAlreadyUse($loginresponsable,"login") ){
	//echo"coucou";
	header('Location: http://www.guillaumeadam.com/projetConception/log_resp_already.php');
	exit();
}



//Test si le sport n'a pas deja un responsable
//
if (Responsable::elementAlreadyUse($sportresponsable,"sport") ){
	header('Location: http://www.guillaumeadam.com/projetConception/sport_resp_already.php');
	exit();
}


//Sinon on créer l'objet
//
$newresp = new Responsable($loginresponsable,$mdpresponsable,$mailresponsable,$sportresponsable);

//et on l'insert
Responsable::insert($newresp);

header('Location: http://www.guillaumeadam.com/projetConception/liste_resp.php');
exit();

?>











