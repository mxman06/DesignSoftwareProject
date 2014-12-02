<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>STAG - Système de d'information sportives</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_index.css" />
	</head>
<body>
	<div id="headeur"> <h1>STAG <br/>Informations Sportives - IUT Nice</h1></div>
	
	
		
		<?php 
		require_once("Info.php");
		require_once("Entrainements.php");
		require_once("Rencontre.php");
		$sport = $_GET["sport"];
		echo"
		
		
		
	<div id=\"info\"><br />
		<h3>Bienvenue sur la page du sport : "; echo $sport; echo"</h3> <br />
		<table><tr>	<td rowspan=\"2\"> 
		Appel à joueur <br/> ";	if ( Info::elementAlready($sport, "appeljoueur") ){
		
									$infos = Info::getAll($sport, "appeljoueur");
										
									while( $apels=mysql_fetch_array($infos) ){
										echo $apels["texte"];
										echo'<br /><br />';
									}
								}
								else{
									echo "Il n'y a pas d'appel à joueurs! <br /><br />";
								}
								
		
		
		
		echo "Vente Matériel <br />	"; if ( Info::elementAlready($sport, "materiel") ){
		
									$infos = Info::getAll($sport, "materiel");
										
									while( $mats=mysql_fetch_array($infos) ){
										echo "<br />";
										echo $mats["texte"];
										echo'<img alt="vente materiel" src="image/'; echo $mats[img]; echo'" />';
										echo'<br /><br />';
									}
								}
								else{
									echo "Il n'y a pas devente de matériels";
								}
		
		
		
		
		echo"</td><td> Les entrainements de "; echo $sport; echo " fixes : <br >";  if ( Entrainements::EntrainementAlready($sport, "fixe") ){
		
									$lesfixes = Entrainements::getEntrainement($sport, "fixe");
										
									while( $fixes=mysql_fetch_array($lesfixes) ){
										echo'<br />- Lieu : ';echo $fixes["lieu"];echo'<br />';
										echo'- Horaire :  '; echo $fixes["horaire"];										
										echo'<br /><br />';
									}
								}
								else{
									echo "Il n'y a pas d'horaires fixes";
								}
		
		
		
		
		
		echo"</td><td rowspan=\"2\"> Les rencontres de "; echo $sport; echo' :';	if ( Rencontre::RencontreExist($sport) ){
		
									$lesrencontres = Rencontre::getTable($sport);
									$i=1;
									while( $rencontres=mysql_fetch_array($lesrencontres) ){
										echo'<br />- Rencontre n°';echo $i;echo'<br />';
										echo'- Lieu : ';echo $rencontres["lieu"];echo'<br />';
										echo'- Date :  '; echo $rencontres["date"];	echo'<br />';
										echo'- Equipe :  '; echo $rencontres["equipe"];	echo'<br />';
										echo'- EquipeVs :  '; echo $rencontres["equipevs"];	
										echo'<br /><br />';
										$i++;
									}
								}
								else{
									echo "<br /><br /> Il n'y a pas de rencontres";
								}
					
					
					
		echo"</td></tr>
				<tr><td>Les entrainements ponctuels de "; echo $sport;echo' :';	if ( Entrainements::EntrainementAlready($sport, "ponctuel") ){
		
									$lesponctuels = Entrainements::getEntrainement($sport, "ponctuel");
									$i=1;
									while( $ponctuels=mysql_fetch_array($lesponctuels) ){
										echo'<br />- Entrainement n°'; echo $i; echo ': ';echo $ponctuels["lieu"];echo'';
										echo'<br />- Lieu : ';echo $ponctuels["lieu"];echo'<br />';
										echo'- Horaire :  '; echo $ponctuels["horaire"];										
										echo'<br /><br />';
										$i++;
									}
								}
								else{
									echo "<br /><br /> Il n'y a pas d'horaires ponctuels";
								}
				
				
				
				
				echo"</td></tr>
				<tr><td colspan=\"3\"> Informations </td></tr>
		</table>
		
	</div>
	<a href = \"index.php\"><p align=\"center\">RETOUR</p></a>
	<div id=\"footer\"> Projet OMGL Guillaume ADAM - Tristan SCAGLIA</div>
	
</body>
</html>
";
?>