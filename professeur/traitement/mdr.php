<form><ul>


<form action="traitement/add/ajoutchapitre.php" method="post" class="ajout-chapitre">
	<input type="text" name="titre" placeholder="Titre" class="input-titre">
	<br />
	  <p class="link-theme-titre">Lien vers theme :</p>
	  	<select name="lien" class="link-theme-chap">';

<?php
	$lientheme = $bdd->query('SELECT * FROM theme'); //affichage des themes present dans la BDD
	while ($donnees = $lientheme->fetch())
		{
		$lien = $donnees['lien'];
		echo ('<option value=" ' . $lien . '">' . $donnees['titre'] . '</option>');
		}
?>
</select><br />
			  <p class="id-cours">Id des cours :</p>
	<input type="text" name="lienchapitre" placeholder="Id cours" class="idtext">
	<br />
	<br />
	<input class="submit" type="submit" value="Créer le Chapitre">
	</form>