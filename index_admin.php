<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}?>
	



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <title>STAG - Système de d'information sportives</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_index.css" />
	  </head>
<body>
	<div id="headeur"> <h1>STAG <br />Informations Sportives - IUT Nice</h1></div>
	
	
		<div id="corps"><br />
		<h3>Page Admin</h3> <br />
		
		<div id="col">
			<table>
			<tr><td><a href="index_admin.php"><strong>Accueil<hr></strong></td></a></tr>
			<tr><td><a href="form_ajout_resp.php"><strong>Ajouter un compte responsable<hr></strong></td></a></tr>
			<tr><td><strong><a href="form_suppr_resp.php">Supprimer un compte responsable</a><hr></strong></td></tr>
			<tr><td><strong><a href="form_modif_resp.php">Modifier un compte responsable</a><hr></strong></td></tr>
			<tr><td><strong><a href="liste_resp.php">Voir liste Responsables</a><hr></strong></td></tr>
			<tr><td><a href="logout.php"><strong>Deconnexion<hr></strong></td></a></tr>
			</table>
		</div>
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>