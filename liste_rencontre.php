<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
require_once("Rencontre.php");

$sport = $_SESSION["sport"];
Database::connect();

$result = Rencontre::getTable($sport);
echo'

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <title>STAG - Système de d\'information sportives</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_index.css" />
	  </head>
<body>
	<div id="headeur"> <h1>STAG <br />Informations Sportives - IUT Nice</h1></div>
	
	
		<div id="corps"><br />
		<h3>Page Responsable</h3> <br />
		
		Voici la liste des rencontres : 
		<table><tr><td>Sport</td><td>Lieu</td><td>Date</td><td>Equipe</td><td>EquipeVS</td></tr>';
		
		while($tabresult = mysql_fetch_assoc($result)){
			echo'
			<tr><td>';echo $tabresult["sport"];echo'</td><td>'; echo $tabresult["lieu"];echo'</td><td>'; echo $tabresult["date"];echo'</td><td>'; echo $tabresult["equipe"];  echo'</td><td>';echo $tabresult["equipevs"];  echo'</td></tr>';
		} ?>
			</table>
		
		<a href = "index_responsable.php"><p align="center">RETOUR</p></a>
			
			
			
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>