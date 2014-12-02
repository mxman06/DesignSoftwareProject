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
		<h3>Page Connexion Systeme</h3> <br />
		Entrer vos identifiants (login/passe), que l'administrateur vous communiqué.<br /><br />
		<div id="form_new_client">	
			<form name="form1" method="POST" action="checklogin.php">	
				<p align="left">NomClient :
				<input name="login" type="text" size="10" id="login"><br />
				<p align="left">Password :&nbsp;
				<input name="mdp" type="password" id="mdp" size="15">(15 car max)<br />
				</p>
				<input align="center" type="submit" name="Submit" value="S'enregistrer">
			</form>
		</div>
		<p>Vous êtes responsable d'un sport qui n'est pas dans le systeme? : <br />
		Merci de prendre contacte avec l'administrateur.</p>
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>