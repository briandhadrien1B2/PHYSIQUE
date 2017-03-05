<?php	
include '../traitement/bdd.php';
$lien = $_POST['mdr'];
$cours = html_entity_decode($_POST['formhtml']);
$reponse = $bdd->query('SELECT * FROM cours WHERE url =' . $lien);
while ($donnees = $reponse->fetch())
{
	$titre = $donnees['titre'];
}
$myfile = fopen( $titre . '.html', "w") or die("Unable to open file!");
$txt = '<html>
<head>
  <meta charset="UTF-8">
  <title>Editeur de texte</title>
</head>
<body>' . $cours . '</body>
</html>';
fwrite($myfile, $txt);
fclose($myfile);

$req = $bdd->prepare('INSERT INTO court (id, titre, contenue, urlcourt) VALUES(?,?,?,?)');
$req->execute(array(NULL,$titre ,$cours, $lien));
header('Location: ../cours.php');
?>