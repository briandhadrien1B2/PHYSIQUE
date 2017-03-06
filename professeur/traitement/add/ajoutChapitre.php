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
$id = chaine_aleatoire(7);



$sql = $bdd->prepare('SELECT lien FROM chapitre WHERE lienchapitre = \''.$id.'\' ;');
$sql->execute();
$res = $sql->fetch();
if ($res)
{
	    echo('<script> alert("Le lien est déja utiliser")</script>');
	    echo('<META http-equiv="refresh" content="0; URL=../../cours.php">');
}
else{

$req = $bdd->prepare('INSERT INTO chapitre (id, titre, lien, lienchapitre) VALUES(?,?,?,?)');
$req->execute(array(NULL,$_POST['titre'] ,$_POST['lien'], $id));
header('Location: ../../index.php');
}
?>