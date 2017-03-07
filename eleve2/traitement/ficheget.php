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


}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


</style>
</head>
<body>

<?php

$q = intval($_GET['q']);
$con = mysqli_connect('localhost','root','root','SitePhysique');
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM fichecontenue WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

	echo "<form><ul>";

while($row = mysqli_fetch_array($result)) {
	echo('<li style:"display : " name="users ">' . $row['texte'] . '</li>' );
		echo('<br>');
		
}
echo "</ul>";
$e=0;
echo "<form><ul>";
mysqli_close($con);
?>

</body>
</html>