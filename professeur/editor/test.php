<?php
include '../traitement/bdd.php';
$url = $_POST['mdr'];



$cours = html_entity_decode($_POST['formhtml']);
$reponse = $bdd->query('SELECT * FROM cours WHERE url =' . $url);
while ($donnees = $reponse->fetch())
{
	$titre = $donnees['titre'];
}
$myfile = fopen( $url . '.html', "w") or die("Unable to open file!");
$txt = "<!DOCTYPE html>
<html>
<head>
<link href='Sans%20titre.css' rel='stylesheet'>
<title> $titre </title>
<script type='text/x-mathjax-config'>
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
<script type='text/javascript' async
  src='https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML'>
</script>
<style>
img{
display:block;
width:auto;
margin-left:auto;
margin-right:auto
	}
</style>
</head>
<body>" . $cours . '</body>
</html>';
fwrite($myfile, $txt);
fclose($myfile);
ECHO $url;
$req = $bdd->prepare('INSERT INTO court (id, titre, contenue, urlcourt) VALUES(?,?,?,?)');
$req->execute(array(NULL,$titre ,$cours, $url));
header('Location: ../../index.php');
?>