<?php

include '../bdd.php';

$req = $bdd->prepare('DELETE FROM chapitre WHERE id=?');
$req->execute(array($_GET['id']));
header('Location: ../../index.php');


?>