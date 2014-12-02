<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");


Database::connect();

$sport = $_SESSION["sport"];
//je recupere la liste des responsables
	$req="SELECT * FROM entrainementponctuel WHERE sport='$sport' ";
	$result=mysql_query($req);
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
		<table><tr><td>Sport</td><td>Lieu</td><td>Horaire</td><td>Date</td><td>Année</td>';
		while($tabresult = mysql_fetch_assoc($result)){
		
		
			echo'
			<tr><td>';echo $tabresult["sport"];echo'</td><td>'; echo $tabresult["lieu"];echo'</td><td>'; echo $tabresult["horaire"];echo'</td><td>';echo $tabresult["date"];echo'</td><td>'; echo $tabresult["annee"];  echo'</td></tr>';
		} ?>
			</table>
		
		<a href = "index_responsable.php"><p align="center">RETOUR</p></a>
			
			
			
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>