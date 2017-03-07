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
	}

echo "</ul>";
$e = 0;
echo "</form><ul>";



mysqli_close($con);
?>

</body>
</html>