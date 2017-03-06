<?php
include '../bdd.php';


$sql = $bdd->prepare('SELECT lien FROM chapitre WHERE lienchapitre = \''.$_POST['lienchapitre'].'\' ;');
$sql->execute();
$res = $sql->fetch();
if ($res)
{
	    echo('<script> alert("Le lien est déja utiliser")</script>');
	    echo('<META http-equiv="refresh" content="0; URL=../../cours.php">');
}
else{

$req = $bdd->prepare('INSERT INTO chapitre (id, titre, lien, lienchapitre) VALUES(?,?,?,?)');
$req->execute(array(NULL,$_POST['titre'] ,$_POST['lien'], $_POST['lienchapitre']));
header('Location: ../../index.php');
}
?>