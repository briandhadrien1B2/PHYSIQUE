<!DOCTYPE html>
<html>
<head>

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}


</style>
</head>
<body>


<?php

$e = intval($_GET['e']);
$con = mysqli_connect('localhost','root','root','SitePhysique');
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM cours WHERE liencours = '".$e."'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
	echo '</div  id="colonne2">';
	echo "</ul>";
		echo "<br>";
		echo('<li style:"display : " name="users" onclick="showUser3(this.value)" value=" ' . $row['url'] . ' ">' . $row['titre'] . $row['url']. '</li>' );
	//	echo '<a href=" ' . $row['url'] . '"> <li> ' . $row['titre'] . ' </li> </a>';
		echo('<br>');
	echo "</ul>";

}
echo "</div>";
mysqli_close($con);
?>

</body>
</html>