<?php
include '../bdd.php';

$sql = $bdd->prepare('SELECT lien FROM theme WHERE lien = \''.$_POST['lien'].'\' ;');
$sql->execute();
$res = $sql->fetch();
if ($res)
{
	    echo('<script> alert("Le lien est déja utiliser")</script>');
	    echo('<META http-equiv="refresh" content="0; URL=../../cours.php">');
}
else{
$req = $bdd->prepare('INSERT INTO theme (id, titre, lien) VALUES(?,?,?)');
$req->execute(array(NULL,$_POST['titre'] ,$_POST['lien'] ));

header('Location: ../../index.php');
}

?>
