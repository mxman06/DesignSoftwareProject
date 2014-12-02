<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}
require_once("Database.php");
require_once("Responsable.php");


Database::connect();

//je recupere la liste des responsables
//
$result = Responsable::getTable();

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
		<h3>Page Admin</h3> <br />
		
		Voici la liste des responsables : 
		<table><tr><td>id</td><td>Login</td><td>Email</td><td>Sport</td>';
		$i=0;
		while($tabresult = mysql_fetch_assoc($result)){
				$i++;
			echo'<tr><td><form method="post" action="suppr_resp.php" name="';echo $i;
			echo'"><input type="text" size="3" name="id" readonly="readonly" id="id" value="';echo $tabresult["id"];echo'"></td>';
			
			echo'<td>';echo $tabresult["login"];	echo'</td>';
			echo'<td>';echo $tabresult["mail"];	echo'</td>';
			echo'<td>';echo $tabresult["sport"];	echo'</td>';
			echo'<td><input type="image" src="image/supprimer.png" /></form></td>';
			echo'</tr>';
			
			} ?>
			</table>
		
		<a href = "index_admin.php"><p align="center">RETOUR</p></a>
			
			
			
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>