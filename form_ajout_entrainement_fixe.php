<?php session_start();

if (!$_SESSION["login"]){
	header("location:admin.php");
	}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
        <title>STAG - Syst�me de d'information sportives</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_index.css" />
	  </head>
<body>
	<div id="headeur"> <h1>STAG <br />Informations Sportives - IUT Nice</h1></div>
	
	
		<div id="corps"><br />
		<h3>Page Responsable</h3> <br />
		
		<div id="form_new_client">
			<form name="form1" method="post" action="ajout_entrainement_fixe.php">	
				<p align="left">Lieu (30 car max) :
				<input name="lieu" type="text" size="30" id="lieu"><br />
				<p align="left">Date (30 car max) :
				<input name="date" type="text" size="30" id="date"><br />
				<p align="left">Horaire (30 car max) :
				<input name="horaire" type="text" size="30" id="horaire"><br />
				<p align="left">Ann�e (aaaa) :	
				<input name="annee" type="text" id="annee" size="4"><br />
				</p>
				<input align="center" type="submit" name="Submit" value="Enregistrer l'Entra�nement">
			</form>
		</div>
		
		<a href = "index_responsable.php"><p align="center">RETOUR</p></a>
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>