<?php session_start();
if (!isset($_SESSION["login"])){
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
		<h3>Page Responsable</h3> <br />
		
		<div id="col">
			<table>
			<tr><td><a href="index_responsable.php"><strong>Accueil<hr></strong></td></a></tr>
			<tr><td><a href="form_ajout_entrainement_fixe.php"><strong>Ajouter les horaires Entraînement fixes<hr></strong></td></a></tr>
			<tr><td><strong><a href="form_modif_entrainement_fixe.php">Modifier les horaires Entraînement fixes</a><hr></strong></td></tr>
			
			<tr><td><strong><a href="form_ajout_entrainement_ponctuel.php">Ajouter des horaires Entraînement ponctuelles</a><hr></strong></td></tr>
			<tr><td><strong><a href="form_modif_entrainement_ponctuel.php">Modifier des horaires Entraînement ponctuelles</a><hr></strong></td></tr>
			<tr><td><strong><a href="form_suppr_entrainement_ponctuel.php">Supprimer des horaires Entraînement ponctuelles</a><hr></strong></td></tr>
			
			<tr><td><strong><a href="form_ajout_rencontre.php">Ajouter une rencontre</a><hr></strong></td></tr>
			<tr><td><strong><a href="voir_commande.php">Ajouter un appel à joueur(s)</a><hr></strong></td></tr>			
			<tr><td><strong><a href="voir_commande.php">Ajouter une vente de matériel</a><hr></strong></td></tr>			
			<tr><td><strong><a href="voir_commande.php">Ajouter une information pratique</a><hr></strong></td></tr>	
			<tr><td><strong><a href="bilan_entrainement.php">Avoir Bilan Entraînements</a><hr></strong></td></tr>
			<tr><td><strong><a href="voir_commande.php">Avoir Bilan Rencontres</a><hr></strong></td></tr>
			
			<tr><td><a href="logout.php"><strong>Deconnexion<hr></strong></td></a></tr>
			</table>
		</div>
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>