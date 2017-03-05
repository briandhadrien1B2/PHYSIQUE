<?php

include '../bdd.php';

$req = $bdd->prepare('DELETE FROM cours WHERE id=?');
$req->execute(array($_GET['id']));
header('Location: ../../index.php');


?>