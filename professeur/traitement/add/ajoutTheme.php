<?php
include '../bdd.php';


// Génération d'une chaine aléatoire
function chaine_aleatoire($nb_car, $chaine = '123456789')
{
$nb_lettres = strlen($chaine) - 1;
$generation = '';
for($i=0; $i < $nb_car; $i++)
{
$pos = mt_rand(0, $nb_lettres);
$car = $chaine[$pos];
$generation .= $car;
} return $generation;
}
$id = chaine_aleatoire(4);








$sql = $bdd->prepare('SELECT lien FROM theme WHERE lien = \''.$id.'\' ;');
$sql->execute();
$res = $sql->fetch();
if ($res)
{
	    echo('<script> alert("Le lien est déja utiliser")</script>');
	    echo('<META http-equiv="refresh" content="0; URL=../../cours.php">');
}
else{
$req = $bdd->prepare('INSERT INTO theme (id, titre, lien) VALUES(?,?,?)');
$req->execute(array(NULL,$_POST['titre'] ,$id ));

header('Location: ../../index.php');
}

?>
