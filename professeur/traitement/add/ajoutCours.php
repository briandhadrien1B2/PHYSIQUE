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
$id = chaine_aleatoire(9);



$req = $bdd->prepare('INSERT INTO cours (id, titre, lien, liencours,url) VALUES(?,?,?,?,?)');
$req->execute(array(NULL,$_POST['titre'] ,$_POST['lien'],$_POST['liencours2'] ,$id ));

header('Location: ../../index.php');

?>