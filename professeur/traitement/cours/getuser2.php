
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../css/admin.css">
</head>
<body>


<?php
	include ('bdd.php');
$e = intval($_GET['e']);
$con = mysqli_connect('localhost', 'root', 'root', 'SitePhysique');

if (!$con)
{
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "ajax_demo");
$sql = "SELECT * FROM cours WHERE liencours = '" . $e . "'";
$result = mysqli_query($con, $sql);
echo "<form><ul>";

while ($row = mysqli_fetch_array($result))
{
	echo ('<a href="editor/' .$e . '.html" target="_blank"><li class="titre" style:"display : " name="users" /* onclick="window.open(this.value) */" value=" ' . $row['url'] . ' ">' . $row['titre'] . '</li></a>');
	echo ('<br />');
	echo ('<a class="img-edit" href="" ><img src="../img/edit-black.svg" class="img-edit" alt=""></a>');
	echo ('<a class="img-remove" href="traitement/delect/SupressionCours.php?id=' . $row['id'] . '" ><img src="../img/remove-black.svg" class="img-remove" alt=""></a>');
}

echo "</ul>";
$e = 0;
echo "</form><ul>";
echo '<hr width="50%" color="black">
 <form action="traitement/add/ajoutcours.php" method="post">
	<input type="text" name="titre" placeholder="Titre" class="input-titre-cours">
	<br />
	  <p class="link-theme-titre">Lien du Theme : </p>';



echo '<select name="lien" class="link-theme">';

$lientheme = $bdd->query('SELECT * FROM theme'); //affichage des themes present dans la BDD

while ($donnees = $lientheme->fetch())
{
	$lien = $donnees['lien'];
	echo ('<option value=" ' . $lien . '">' . $donnees['titre'] . '</option>');
}

echo '</select>	<br />';





echo '<p class="link-chapitre-titre">Lien vers Chapitre :</p>
<select class="link-chapitre" name="liencours2">';

$lien = $bdd->query('SELECT * FROM chapitre'); //affichage des themes present dans la BDD

while ($donnees = $lien->fetch())
{
	$liens = $donnees['lienchapitre'];
	echo ('<option value=" ' . $liens . '">' . $donnees['titre'] . '</option>');
}

echo '</select><br />
	<input class="submit-cours" type="submit" value="Créer le cours">
</form>';
mysqli_close($con);
?>

</body>
</html>