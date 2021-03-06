<html>

<head>

  <meta charset="UTF-8">

  <title>Editeur de texte</title>

  <meta name="robots" content="noindex">

<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css'>
<link rel="stylesheet" type="text/css" href="../../css/editeur.css">

</head>

<body>

<header class="header">
<a href="../index.php"><img src="../../img/house.svg" alt="" class="iconhome"></a>
</header>



<div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="container app">
  <h3>Editor</h3>
  <div text-angular="text-angular" name="htmlcontent" ng-model="htmlcontent" ta-disabled='disabled'></div>
  <!--<h3>Raw HTML in a text area</h3>-->
  <form  action="test.php" method="post">
	  COURS :
<select name="mdr">
<?php
include '../traitement/bdd.php';
$liencours = $bdd->query('SELECT * FROM cours'); //affichage des themes present dans la BDD

while ($donnees = $liencours->fetch())
	{
	$url = $donnees['url'];
	$titre = $donnees['titre'];
	echo ('<option value=" ' . $url . '">' . $donnees['titre'] . '</option>');

	}

?>
</select>
  <textarea id="formhtml" name="formhtml" ng-model="htmlcontent" style="width: 100%"></textarea>
  <input type="submit" name="submit" value="Envoyez">
  </form>

  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
  <script src='editor.js'></script>

</body>
</html>