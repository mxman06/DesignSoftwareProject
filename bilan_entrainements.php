<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
require_once("Entrainements.php");


Database::connect();

$sport = $_SESSION["sport"];
//je recupere la liste des entrainements fixes
	$fixes = Entrainements::getEntrainement($sport, "fixe");
	
// je recupere la liste des entrainements ponctuels
		$ponctuels = Entrainements::getEntrainement($sport, "ponctuel");
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
		
		Voici le bilan des entrainements : 
		<table><tr><td>Sport</td><td>Lieu</td><td>Horaire</td><td>Date</td><td>Année</td>';
		
		while($tabfixes = mysql_fetch_assoc($fixes)){
		
		
			echo'
			<tr><td>';echo $tabfixes["sport"];echo'</td><td>'; echo $tabfixes["lieu"];echo'</td><td>'; echo $tabfixes["horaire"];echo'</td><td>';echo $tabfixes["date"];echo'</td><td>'; echo $tabfixes["annee"];  echo'</td></tr>';
		} 
		
		while($tabponctuels = mysql_fetch_assoc($ponctuels)){
		
		
			echo'
			<tr><td>';echo $tabponctuels["sport"];echo'</td><td>'; echo $tabponctuels["lieu"];echo'</td><td>'; echo $tabponctuels["horaire"];echo'</td><td>';echo $tabponctuels["date"];echo'</td><td>'; echo $tabponctuels["annee"];  echo'</td></tr>';
		}
		?>
			</table>
		
		<a href = "index_responsable.php"><p align="center">RETOUR</p></a>
			
			
			
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>