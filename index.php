<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>STAG - Syst�me de d'information sportives</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_index.css" />
	</head>
<body>
	<div id="headeur"> <h1>STAG <br/>Informations Sportives - IUT Nice</h1></div>
	
	
		<div id="col">
			<table><tr>
		<?php
			require_once("Responsable.php");
			
			$res = Responsable::getTable();
			$i=0;
			while($sports=mysql_fetch_array($res)){
				
				echo'<td><a href="sport.php?sport=';echo $sports["sport"]; echo'"><strong>';
				echo $sports["sport"];
				echo'	 </td>';
			$i++;
			}
			echo'</tr></form></table>';
			
			
		?>
		</div>
		
	<div id="corps"><br />
		<h3>Bienvenue sur le site d'informations sportives de l'IUT de Nice.</h3> <br />
		
		Ce projet a �t� d�velopp� dans le cadre d'un DUT pour le cours OMGL.<br />
		Ce site poss�de plusieurs caract�ristiques :
		<ul>
			<li>Respecte le patron MVC</li>
			<li>Utilise les classes PHP</li>
			<li>Affiche les donn�es pour un �cran d'information � http://www.guillaumeadam.com/projetConception/ecran.php</li>
			<li>Les donn�es de l'�cran sont pars�s en XML, puis affich�es</li>
			<li>Il est possible d'ajouter un responsable de sport � http://www.guillaumeadam.com/projetConception/index_responsable.php</li>
			<li>Il est possible de gerer un responsable de sport � http://www.guillaumeadam.com/projetConception/index_admin.php</li>
			<li>Le menu contenant les sports est dynamique </li>
			<li>Il est possible de g�rer <ul>
				<li>Annulations/Modifications/Ajouts des entrainements fixes et ponctuels, rencontres</li></ul>
			<li>Avoir le bilan entrainement fixes/ponctuels</li>
			<li>Les informations de l'�cran sont uniquement ins�r�es dans la BDD (ajout non impl�ment�</li>
		
	</div>
	
	<div id="footer"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
</body>
</html>