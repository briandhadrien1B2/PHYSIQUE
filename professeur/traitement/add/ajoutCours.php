<?php
include '../bdd.php';

$req = $bdd->prepare('INSERT INTO cours (id, titre, lien, liencours,url) VALUES(?,?,?,?,?)');
$req->execute(array(NULL,$_POST['titre'] ,$_POST['lien'],$_POST['liencours2'] ,$_POST['url'] ));

header('Location: ../../index.php');

?>