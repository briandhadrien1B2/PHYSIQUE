<?php
try
{
    $bdd = new PDO ('mysql:host=localhost;dbname=SitePhysique', 'root', 'root');
    $bdd -> exec("set names utf8");

}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>