<?php
include 'bdd.php';
?>
<!DOCTYPE html>
<html>
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<head>
<script>

	
function showUser(str) {
	console.log(str);
	document.getElementById("txtHint").innerHTML="";	
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
  xmlhttp.open("GET","ficheget.php?q="+str,true);
  xmlhttp.send();
}

</script>
	<style>
		html,body{
			font-family: 'Dosis', sans-serif;
			background-color: #C8C9C7;
			color: #332F21 ;	
		}
		
		ul,li{
			text-decoration: none;
			list-style: none;
		}
		
#col1 {
 	width:20%;
 	z-index:1;
 	position:relative;
	float:left;
	margin:0 0 0 1%;
	display:inline;
	left:1px;
	background-color: #BFB8AF;
}

#txtHint{
	width:20%;;
	float:left;
	margin:0 0 0 1%;
	display:inline;
	position:relative;
	z-index:1;
	left:1px;
	background-color:#A59C94;
		}
		
#txtHinttt h2{
	
	text-align: center;
}


a{
	color: #332F21;
		text-decoration: none;
}

a:hover{
	color: #ffffff;
	text-decoration: none;
}

	</style>
	
	

	
</head>
<body>
	<header>
		<a href="index.php" style="float: left">Cours</a>
		<a href="fiche.php" style="float: right">Fiche</a>
	</header>
	<br><br><br><br><br>
<div id="col1">
<form >
<ul>

<?php
$reponse = $bdd->query('SELECT * FROM fiche');
while ($donnees = $reponse->fetch())
{
	echo('<li id="mdr" name="users" onclick="showUser(this.value)" value="' . $donnees['id'] . '">' . $donnees['titre'] . '</li>' );
	echo('<br>');
}
?>

</form>
</div>
<div id="txtHint"><b></b></div>

</body>
</html>