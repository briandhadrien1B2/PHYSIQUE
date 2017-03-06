<?php
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
$id = chaine_aleatoire(10);


//test de doublon

include('bdd.php');

    $sql = $bdd->prepare('SELECT id FROM utilisateurs WHERE invitation = ?');
    $sql->execute(array($invitation0));
    $res = $sql->fetch();

    while($res)
    {
        $invitation0 = chaine_aleatoire(6);
 }

?>