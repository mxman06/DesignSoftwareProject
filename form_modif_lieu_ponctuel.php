<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
	
require_once("Database.php");
Database::connect();

//je recupere la liste des entrainements fixes
	$req="SELECT * FROM entrainementponctuel";
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
		<h3>Page responsable</h3> <br />
		
		Voici la liste des entrainements ponctuels : 
		<table><tr><td>id</td><td colspan="2">Horaire</td><td>Lieu</td><td>Année</td><td>Sport</td></tr>';
		$i=0;
		while($tabresult=mysql_fetch_array($result)){
			$i++;
			echo '<tr><td>'; 
			echo '<form method="post" action="modif_entrainement_ponctuel_lieu.php" name="';echo $i;echo '"><input id="id" name="id" type="text" readonly="readonly"  size="3" value="';echo $tabresult["id"];echo'"></td><td>';
			echo $tabresult["horaire"];echo'</td><td>';
			echo'Ancien : ';echo $tabresult["lieu"]; echo'</td><td>';
			echo'Nouveau lieu :<input type="text" size="30" id="newlieu" name="newlieu"></td><td>';
			echo $tabresult["sport"]; echo'</td><td>';
			echo $tabresult["annee"];echo '</td><td>';
			echo '<input type="submit"></form>';
			echo'</td></tr>';
		} ?>
			</table>
		
		<a href = "index_responsable.php"><p align="center">RETOUR</p></a>
			
			
			
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>