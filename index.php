<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/accueil.css">
</head>
<body>

<div class="header">
	<form class="connexion" action="traitement/connexion.php" method="post" accept-charset="utf-8">
		<label for="pseudo"></label>
		<input class="pseudo" type="text" name="pseudo" placeholder="Pseudo">
		
		<label for="password"></label>
		<input class="password" type="password" name="password" placeholder="Mot de passe">
		
		<input class="submit" border=0 src="img/login.svg" width="30px" height="25px" type="image" Value="submit"> 
    </form>
</div> <!-- Fin Header -->

<div class="container">
	<div class="left">
		<img class="logo" src="img/logo.svg">
		<p class="txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

	</div> <!-- Fin left -->

	<div class="right">
		<div class="contenu">
				<form class="inscription" action="traitement/inscription.php" method="post" accept-charset="utf-8">
			        <label for="nom"></label>
			        <input class="nom" type="text" name="nom" placeholder="Nom">
			        
			        <label for="prenom"></label>
			        <input class="prenom" type="text" name="prenom" placeholder="Prénom"> 
			        <br />
			        <label for="email"></label>
					<input class="mail" type="email" placeholder="Mail" name="mail" id="email">
					<br />
			        <label for="pseudo"></label>
			        <input class="pseudoinsc" type="text" name="pseudo" placeholder="Pseudo">  
			        <br />
			  		<label for="password"></label>
					<input class="passwordinsc" type="password" placeholder="Mot de passe" name="password" id="password">	

					<label for="Confirmpassword"></label>
					<input class="passwordinsc2" type="password" placeholder="Confirmation" name="password2" id="confirmPassword">
				
			        <br />
			       <!-- <label class="classe" for="classe">Classe</label> -->
						<select name="classe" class="classelist">
					        <option value="Seconde" > &nbsp; &nbsp; Classe</option>
					        <option value="Seconde" > &nbsp;Seconde</option>
					        <option value="Premiere"> &nbsp;Première</option>
					        <option value="Terminale">&nbsp;Terminale</option>
		                 </select>							
					<br />		
			        <input class="valider" border="0" src="img/login.svg" width="60px" height="50px" type="image" value="submit">
				</form>
   		</div> <!-- Fin contenu -->
	</div> <!-- Fin right -->
</div> <!-- Fin Container -->
<script type="text/javascript" src="script.js"></script>
</body>
</html>