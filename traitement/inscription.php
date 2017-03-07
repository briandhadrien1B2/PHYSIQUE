<?php
// ON LINK LA BDD
include 'bdd.php';

// ON VERIFIE SI TOUS LES CHAMPS ON ÉTÉ REMPLIS, SI C'EST LE CAS ON ENTRE DANS LES VÉRIFICATIONS PLUS AVANCÉES
if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['classe'])) {
// ON RÉCUPÈRE LES VALEURS DU FORMULAIRE DANS DES VARIABLES
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$mail = htmlspecialchars($_POST['mail']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$password = htmlspecialchars($_POST['password']);
	$password2 = htmlspecialchars($_POST['password2']);

// ON VÉRIFIE QUE LE NOM NE DÉPASSE PAS 255 CARACTÈRES, SI C'EST LE CAS ON PASSE À LA VÉRIFICATION SUIVANTE SINON ON AFFICHE UN MESSAGE D'ERREUR
		$nomlenght = strlen($nom);
		if ($nomlenght <= 255) {
// ON VÉRIFIE QUE LE PRÉNOM NE DÉPASSE PAS 255 CARACTÈRES, SI C'EST LE CAS ON PASSE À LA VÉRIFICATION SUIVANTE SINON ON AFFICHE UN MESSAGE D'ERREUR

		$prenomlenght = strlen($prenom);
		if ($prenomlenght <= 255) {
// ON VÉRIFIE QUE LE PSEUDO NE DÉPASSE PAS 255 CARACTÈRES, SI C'EST LE CAS ON PASSE À LA VÉRIFICATION SUIVANTE SINON ON AFFICHE UN MESSAGE D'ERREUR

		$pseudolenght = strlen($pseudo);
		if ($pseudolenght <= 255) {
// ON VÉRIFIE QUE LE MOT DE PASSE ET QUE LA CONFIRMATION DE MOT DE PASSE CORRESPONDENT, SI C'EST LE CAS ON PASSE À LA VÉRIFICATION SUIVANTE SINON ON AFFICHE UN MESSAGE D'ERREUR

			if ($password == $password2) {
					$password = sha1($_POST['password']); // CRYPTAGE DU MOT DE PASSE DANS LA BDD AVEC LE SHA1
					// ON VÉRIFIE QUE LE PSEUDO N'EST PAS UTILISÉ
					$reponse = $bdd->query('SELECT pseudo FROM eleve WHERE pseudo = \''.$pseudo.'\' ;');
    				$res = $reponse->fetch();
 					// SI LE PSEUDO EXISTE DÉJÀ DANS LA BDD ON AFFICHE CE MESSAGE D'ERREUR
   					 if ($res) {
     					   echo ("Ce pseudo est déjà utilisé");
   								 }
   					// SI LE PSEUDO N'EST PAS UTILISÉ ALORS ON EFFECTUE LA MÊME VÉRIFICATION POUR L'ADRESSE MAIL
    					else {

    				$mailcheck = $bdd->query('SELECT mail FROM eleve WHERE mail = \''.$mail.'\' ;');
    				$ress = $mailcheck->fetch();
 					// SI L'ADRESSE MAIL EST DÉJÀ UTILISÉE ON AFFICHE CE MESSAGE D'ERREUR
   					 if ($ress) {
     					   echo ("Ce mail est déjà utilisé");
   								 }
   					// SI ILS N'Y A PAS D'ERREUR ALORS ON AJOUTE LES INFORMATIONS À LA BASE DE DONNÉE ET VALIDE L'INSCRIPTION
    					else {


// REQUÊTE SQL PERMETTANT D'INSÉRER LES INFORMATIONS DANS LA BASE DE DONNÉE
$req = $bdd->prepare('INSERT INTO eleve (id, nom, prenom, mail, pseudo, password,classe) VALUES(?,?,?,?,?,?,?)');
$req->execute(array(NULL,$_POST['nom'] ,$_POST['prenom'], $_POST['mail'], $_POST['pseudo'], $password, $_POST['classe']));
// ON REDIRIGE DONC VERS LA PAGE DE COURS DU SITE
header('Location: ../eleve2/index.php');

}

										 }

										}

									// MESSAGE EN CAS D'ERREUR SUR LA CONFIRMATION DE MOT DE PASSE
									else { ?>

									<script language="javascript" type="text/javascript">
        								alert("Vos mots de passe ne correspondent pas !");
        								window.location = '../accueil.php';
    								</script>
		<?php }

								  }

								  // MESSAGE D'ERREUR SI LE PSEUDO DÉPASSE 255 CARACTÈRES
								  else { ?>
								  	<script language="javascript" type="text/javascript">
        									alert("Votre pseudo ne doit pas dépasser 255 caractères");
        									window.location = '../accueil.php';
    								</script>
		<?php }

								  }

								 // MESSAGE D'ERREUR SI LE PRÉNOM DÉPASSE 255 CARACTÈRES
								  else { ?>
									<script language="javascript" type="text/javascript">
        								alert("Votre prénom ne doit pas dépasser 255 caractères");
        								window.location = '../accueil.php';
    								</script>
		<?php }
							   }

							   // MESSAGE D'ERREUR SI LE NOM DÉPASSE 255 CARACTÈRES
							   else { ?>
							   	<script language="javascript" type="text/javascript">
        								alert("Votre nom ne doit pas dépasser 255 caractères");
        								window.location = '../accueil.php';
    							</script>

		<?php }
}

// MESSAGE D'ERREUR SI TOUS LES CHAMPS N'ONT PAS ÉTÉ COMPLÉTÉS
else { ?>
	<script language="javascript" type="text/javascript">
        alert("Tous les champs doivent être complétés");
        window.location = '../accueil.php';
    </script>
<?php }


// BOUCLE PERMETTANT D'AFFICHER LES MESSAGES D'ERREURS
//if (isset($erreur)) {
//	echo $erreur;
//}

?>
