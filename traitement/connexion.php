<?php

// ON LINK LA BDD

include 'bdd.php';

// ON RÉCUPÈRE LES VALEURS DU FORMULAIRE DANS DES VARIABLES

$pseudo = htmlentities($_POST['pseudo']);
$password = htmlentities($_POST['password']);
$password = sha1($_POST['password']);

// ON VÉRIFIE QUE LE PSEUDO NE DÉPASSE PAS 255 CARACTÈRES, SI C'EST LE CAS ON PASSE À LA VÉRIFICATION SUIVANTE SINON ON AFFICHE UN MESSAGE D'ERREUR

$pseudolenght = strlen($pseudo);

if ($pseudolenght <= 255)
	{

	// ON VÉRIFIE QUE LE PSEUDO ET LE MOT DE PASSE CORRESPONDENT BIEN

	$reponse = $bdd->query('SELECT pseudo, password FROM eleve WHERE pseudo = \'' . $pseudo . '\' and password = \'' . $password . '\' ;');
	$res = $reponse->fetch();

	// SI LE COUPLE PSEUDO ET MOT DE PASSE EST CORRECT ALORS ON CONNECTE LA PERSONNE

	if ($res)
		{
		session_start();
		$_SESSION['pseudo'] = $pseudo;
		header('Location: ../eleve2/index.php');
		}

	// SI LE COUPLE PSEUDO ET MOT DE PASSE N'EST PAS COORECT ON VÉRIFIE QU'IL NE S'AGISSE PAS DES IDENTIFIANTS ADMINS

	  else
		{
		$reponse = $bdd->query('SELECT pseudo, password FROM admin WHERE pseudo = \'' . $pseudo . '\' and password = \'' . $password . '\' ;');
		$res = $reponse->fetch();

		// SI LES LOGS SONT CEUX DE L'ADMIN ALORS ON LE CONNECTE EN TANT QU'ADMIN

		if ($res)
			{
			session_start();
			$_SESSION['pseudo'] = $pseudo;
			header('Location: ../professeur/index.php');
			}

		// SI LE COUPLE PSEUDO ET MOT DE PASSE N'EST PAS CORRECT ET QU'IL NE S'AGIT PAS NON PLUS DU COMPTE ADMIN ALORS ON AFFICHE UN MESSAGE D'ERREUR

		  else
			{ ?>
        <script language="javascript" type="text/javascript">
            alert("Identifiant ou mot de passe incorrect !");
            window.location = '../accueil.php';
        </script>
<?php
			}
		}
	}

// MESSAGE D'ERREUR SI LE PSEUDO DÉPASSE 255 CARACTÈRES

  else
	{ ?>
 	<script language="javascript" type="text/javascript">
        alert("Votre pseudo ne doit pas dépasser 255 caractères");
        window.location = '../accueil.php';
    </script>
 <?php
	}

?>
