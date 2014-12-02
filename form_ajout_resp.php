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
		
		<div id="form_new_client">
			<form name="form1" method="post" action="ajout_resp.php">	
				<p align="left">Nom Responsable :
				<input name="nomresponsable" type="text" size="10" id="nomresponsable"><br />
				<p align="left">Sport :
				<input name="sport" type="text" size="10" id="sport"><br />
				<p align="left">Password :&nbsp;
				<input name="mdp" type="password" id="mdp" size="15">(15 car max)<br />
				</p>
				<p align="left">Mail :&nbsp;
				<input name="mail" type="text" id="mail" size="15"><br />
				</p>
				<input align="center" type="submit" name="Submit" value="Enregistrer le Responsable">
			</form>
		</div>
		
		<a href = "index_admin.php"><p align="center">RETOUR</p></a>
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>