<?php
session_start();
include("bdd.php");



if (isset($_POST['submitinscription'])) {
	
	if (!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$password = htmlspecialchars($_POST['password']);
		$password2 = htmlspecialchars($_POST['password2']);

		$pseudolenght = strlen($pseudo);
		if ($pseudolenght <= 255) {
			
			if ($password == $password2) {

				$sql = "INSERT INTO Eleve VALUES(NULL,?,?)";
				$query = $pdo->prepare($sql);
				$query->execute(array($_POST['pseudo'], $_POST['password']));

   				 $sql = "SELECT * FROM Eleve WHERE pseudo=? AND passwd=?";
				 $query = $pdo->prepare($sql);
				 $query->execute(array($_POST['pseudo'], $_POST['password']));

    			while($line=$query->fetch()) {
      		  	$_SESSION["id"] = $line["id"];
        		$_SESSION["pseudo"] = $line["pseudo"];
    }
    			if(isset($_SESSION['id'])) {
       			 header("Location:../affichage/cours.php?id=".$_SESSION['id']);
    }
	
			}
			
			else {
				$erreur = "Vos mots de passe ne correspondent pas !";
			}
		}
		
		else {
			$erreur = "Votre login ne doit pas dépasser 255 caractères";
		}
	}
	
}




if (isset($erreur)) {
	echo $erreur;
}



?>