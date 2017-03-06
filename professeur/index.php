<?php
include 'traitement/bdd.php';
?>
<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
<head>
<script>


function showUser(str) {
	console.log(str);
	document.getElementById("txtHintt").innerHTML="";
		    document.getElementById("txtHinttt").innerHTML="";

  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","traitement/cours/getuser.php?q="+str,true);
  xmlhttp.send();
}



function showUser2(strr) {
	console.log(strr);
		document.getElementById("txtHinttt").innerHTML="";
  if (strr=="c'est vide wesh") {
	document.getElementById("txtHintt").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHintt").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","traitement/cours/getuser2.php?e="+strr,true);
  xmlhttp.send();
}

function showUser3(strrr) {
	console.log(strrr);
	    document.getElementById("txtHinttt").innerHTML="";
  if (strrr=="c'est vide wesh") {

    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHinttt").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","traitement/cours/getuser3.php?f="+strrr,true);
  xmlhttp.send();
}




</script>

</head>
<body>
<header class="header">
	<a href="index.php"><img src="../img/house.svg" alt="" class="iconhome"></a>
	<a href="editor/editor2.php"><img src="../img/note.svg" class="iconeditor" alt=""></a>
	<a href="../traitement/deconnexion.php"><img src="../img/exit-sign.svg" class="iconlogout" alt=""></a>
</header>
<div class="container">
<div id="colonne1">
<form>
<ul>

<?php

$reponse = $bdd->query('SELECT * FROM theme');
while ($donnees = $reponse->fetch()) {
	echo('<li class="titre" id="mdr" name="users" onclick="showUser(this.value)" value="' . $donnees['lien'] . '">' . $donnees['titre'] . '</li>' );
	echo('<br />');
	echo ('<a class="img-edit" href="" ><img src="../img/edit.svg" class="img-edit" alt=""></a>');
	echo ('<a class="img-remove" href="traitement/delect/SupressionTheme.php?id=' . $donnees['id'] . '" ><img src="../img/remove.svg" class="img-remove" alt=""></a>');
}
?>


</form>
<form action="traitement/add/ajoutTheme.php" method="post" class="ajout-theme">
	<input type="text" name="titre" placeholder="Titre" class="input-titre">
	<br />
	<input type="text" name="lien" placeholder="Lien du Thème" class="input-lien">
	<br />
	<input class="submit" type="submit" value="Créer le Theme">
</form>

</div>
<div id="txtHint"><b></b></div>

<div id="txtHintt" ><b></b></div>

<div id="txtHinttt" ><b></b>
</div>

</div>



</body>
</html>