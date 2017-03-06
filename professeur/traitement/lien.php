<h3>Lien : </h3>
<?php
	include '../traitement/bdd.php';
// On affiche les personnes dont l'id dans lien est egale a amie
$id = $_POST['idmdr'];
echo('resultats pour ' . $id);
echo('<br>');
echo('<br>');
echo('<br>');
echo('<strong>THEME</strong>');
echo('<br>');
$recherche = $bdd->query('SELECT * FROM theme WHERE lien = \''.$id.'\'');
    while ($donnees = $recherche->fetch())
    { 
	  echo('<br>');
	  echo htmlspecialchars($donnees['titre']);	
	}
		  echo('<br>');
		  	  echo('<br>');
	echo('<strong>CHAPITRE</strong>');
	echo('<br>');
$recherche2 = $bdd->query('SELECT * FROM chapitre WHERE lien = \''.$id.'\'');
    while ($donnees = $recherche2->fetch())
    { 
	  echo('<br>');
	  echo htmlspecialchars($donnees['titre']);	
	}
		  echo('<br>');
		  	  echo('<br>');
	  echo('<strong>COURS</strong>');
	  echo('<br>');
$recherche3 = $bdd->query('SELECT * FROM cours WHERE lien = \''.$id.'\'');
    while ($donnees = $recherche3->fetch())
    { echo('<br>');
	  echo htmlspecialchars($donnees['titre']);	
	}	
  ?>