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

$f = intval($_GET['f']);
$con = mysqli_connect('localhost','root','root','SitePhysique');
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM court WHERE urlcourt = '".$f."'";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {

	$titre = $row['titre'];
	$contenue = $row['contenue'];
	
	echo('<strong><h2>'. $titre .'</h2></strong>');
	echo( '<pre>' . $contenue . '</pre>' );



}

mysqli_close($con);
?>

</body>
</html>