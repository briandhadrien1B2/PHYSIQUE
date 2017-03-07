
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
	echo ('<a href="editor/ ' .$row['url'] . '.html" target="_blank"><li class="titre" style:"display : " name="users" /* onclick="window.open(this.value) */" value=" ' . $row['url'] . ' ">' . $row['titre'] . '</li></a>');
	echo ('<br />');
}

echo "</ul>";
$e = 0;
echo "</form><ul>";

mysqli_close($con);
?>

</body>
</html>