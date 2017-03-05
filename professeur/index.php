<!--
P R O F S
vu des cours et ajouts
-->

<?php
include 'traitement/bdd.php';
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
<header class="header">
	<a href="index.php"><img src="../img/house.svg" alt="" class="iconhome"></a>
	<a href="editor/editor2.php"><img src="../img/note.svg" class="iconeditor" alt=""></a>
	<a href="../traitement/deconnexion.php"><img src="../img/exit-sign.svg" class="iconlogout" alt=""></a>
</header>
<div class="container">
<div id="colonne1">
	<div class="titre2">
	<p>Thème</p>
	</div>
	
	<?php
$reponse = $bdd->query('SELECT * FROM theme'); //affichage des themes present dans la BDD

while ($donnees = $reponse->fetch())
	{
	$id = htmlspecialchars($donnees['id']);
	echo ('<p class="nom-theme">' . $donnees['titre'] . '</p>');
	echo ('<br />');
	echo ('<a class="img-edit" href="" ><img src="../img/edit.svg" class="img-edit" alt=""></a>');
	echo ('<a class="img-remove" href="traitement/delect/SupressionTheme.php?id=' . $id .'" ><img src="../img/remove.svg" class="img-remove" alt=""></a>');
	echo ('<br />');
	}

?>



<form action="traitement/add/ajoutTheme.php" method="post" class="ajout-theme">
	<input type="text" name="titre" placeholder="Titre" class="input-titre">
	<br />
	<input type="text" name="lien" placeholder="Lien du Thème" class="input-lien">
	<br />
	<input class="submit" type="submit" value="Créer le Theme">
</form>
</div>

<div id="centre">
	<div class="titre">
		<p>Chapitre</p>
	</div>

	<?php
$reponse = $bdd->query('SELECT * FROM chapitre'); //affichage des themes present dans la BDD

while ($donnees = $reponse->fetch())
	{
	$id = htmlspecialchars($donnees['id']);
	echo ('<p class="nom-chapitre">' . $donnees['titre'] . '</p>');
	echo ('<br />');
	echo ('<a class="img-edit" href="" ><img src="../img/edit.svg" class="img-edit" alt=""></a>');
	echo ('<a class="img-remove" href="traitement/delect/SupressionTheme.php?id=' . $id .'" ><img src="../img/remove.svg" class="img-remove" alt=""></a>');
	echo ('<br />');
	}

?>


<form action="traitement/add/ajoutchapitre.php" method="post" class="ajout-chapitre">
	<input type="text" name="titre" placeholder="Titre" class="input-titre">
	<br />
	  Lien vers theme :
	  	<select name="lien">
	  <?php
$lientheme = $bdd->query('SELECT * FROM theme'); //affichage des themes present dans la BDD

while ($donnees = $lientheme->fetch())
	{
	$lien = $donnees['lien'];
	echo ('<option value=" ' . $lien . '">' . $donnees['titre'] . '</option>');
	}

?>
		</select><br />
			  Id des cours :
	<input type="text" name="lienchapitre">
	<br />
	<br />
	<input class="submit" type="submit" value="Créer le Chapitre">
</div>

<div id="colonne2">
	<div class="titre">
	<p>Cours</p>
	</div>





	<?php
$reponse = $bdd->query('SELECT * FROM cours'); //affichage des themes present dans la BDD

while ($donnees = $reponse->fetch())
	{
	$id = htmlspecialchars($donnees['id']);
	echo ('<p class="nom-cours">' . $donnees['titre'] . '</p>');
	echo ('<br />');
	echo ('<a class="img-edit" href="" ><img src="../img/edit-black.svg" class="img-edit" alt=""></a>');
	echo ('<a class="img-remove" href="traitement/delect/SupressionTheme.php?id=' . $id .'" ><img src="../img/remove-black.svg" class="img-remove" alt=""></a>');
	echo ('<br />');
	}

?>

<form action="traitement/add/ajoutcours.php" method="post">
	<input type="text" name="titre" placeholder="Titre" class="input-titre-cours">
	<br />
	  <p class="link-theme-titre">Lien du Theme : </p>
	  	<select name="lien" class="link-theme">
	  <?php
$lientheme = $bdd->query('SELECT * FROM theme'); //affichage des themes present dans la BDD

while ($donnees = $lientheme->fetch())
	{
	$lien = $donnees['lien'];
	echo ('<option value=" ' . $lien . '">' . $donnees['titre'] . '</option>');
	}

?>
		</select>	<br />
	<p class="link-chapitre-titre">Lien vers Chapitre :</p>
		  	<select class="link-chapitre" name="liencours2">
	  <?php
$lien = $bdd->query('SELECT * FROM chapitre'); //affichage des themes present dans la BDD

while ($donnees = $lien->fetch())
	{
	$liens = $donnees['lienchapitre'];
	echo ('<option value=" ' . $liens . '">' . $donnees['titre'] . '</option>');
	}

?>
		</select>

	<br />
	  <p class="url">URL du cours :</p>
	<input type="text" name="url" placeholder="URL ICI" class="urltext">
	<br />
	<input class="submit-cours" type="submit" value="Créer le cours">
</form>
</div>

</div>

</body>
</html>

<?php



?>
