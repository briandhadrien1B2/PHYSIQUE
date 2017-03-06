<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

include ('bdd.php');
$q = intval($_GET['q']);
$con = mysqli_connect('localhost', 'root', 'root', 'SitePhysique');

if (!$con)
	{
	die('Could not connect: ' . mysqli_error($con));
	}

mysqli_select_db($con, "ajax_demo");
$sql = "SELECT * FROM chapitre WHERE lien = '" . $q . "'";
$result = mysqli_query($con, $sql);
echo "<form><ul>";

while ($row = mysqli_fetch_array($result))
	{
	echo ('<li class="titre" style:"display : " name="users" onclick="showUser2(this.value)" value=" ' . $row['lienchapitre'] . ' ">' . $row['titre'] . '</li>');
	echo ('<br />');
	echo ('<a class="img-edit" href="" ><img src="../img/edit.svg" class="img-edit" alt=""></a>');
	echo ('<a class="img-remove" href="traitement/delect/SupressionChapitre.php?id=' . $row['id'] . '" ><img src="../img/remove.svg" class="img-remove" alt=""></a>');
	}

echo "</ul>";
$e = 0;
echo "</form><ul>";
echo '<hr width="50%" color="white">
<form action="traitement/add/ajoutchapitre.php" method="post" class="ajout-chapitre">
	<input type="text" name="titre" placeholder="Titre" class="input-titre">
	<br />
	  <p class="link-theme-titre">Lien vers theme :</p>';
echo '<select name="lien" class="link-theme-chap">';

$lientheme = $bdd->query('SELECT * FROM theme');

while ($donnees = $lientheme->fetch())
	{
	$lien = $donnees['lien'];
	echo ('<option value=" ' . $lien . '">' . $donnees['titre'] . '</option>');
	}
	echo '</select><br />';
	echo '<br />';
	echo '<input class="submit" type="submit" value="Créer le Chapitre">';
	echo '</form>';


mysqli_close($con);
?>

</body>
</html>