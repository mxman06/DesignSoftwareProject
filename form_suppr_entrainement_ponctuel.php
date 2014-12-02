<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}

require("Database.php");
require_once("Entrainements.php");

Database::connect();

//Récupération du sprot
//
$sport = $_SESSION["sport"];

//Recuperer la liste des entrainements poncutel du sport du responsable
//
$result = Entrainements::getEntrainement($sport, "ponctuel");


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
		
		Voici la liste des entrainements ponctuels : 
		<table><tr><td>id</td><td>Lieu</td><td>Année</td><td>Horaire</td>';
		$i=0;
		while($tabresult = mysql_fetch_assoc($result)){
				$i++;
			echo'<tr><td><form method="post" action="suppr_entrainementponctuel.php" name="';echo $i;
			echo'"><input type="text" size="3" name="id" readonly="readonly" id="id" value="';echo $tabresult["id"];echo'"></td>';
			
			echo'<td>';echo $tabresult["lieu"];	echo'</td>';
			echo'<td>';echo $tabresult["annee"];	echo'</td>';
			echo'<td>';echo $tabresult["horaire"];	echo'</td>';
			echo'<td><input type="image" src="image/supprimer.png" /></form></td>';
			echo'</tr>';
			
			} ?>
			</table>
		
		<a href = "index_responsable.php"><p align="center">RETOUR</p></a>
			
			
			
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>