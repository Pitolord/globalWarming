<?php
if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email']) && isset($_POST['key'])) {
}else  {
	echo '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
				body{
 margin: 0 auto;
 background-image: url("terre.png");
 background-repeat: no-repeat;
 background-size: cover;
 background-color: #cccccc;
}
 
.container{
 width: 500px;
 height: 700px;
 text-align: center;
 margin: 0 auto;
 background-color: rgba(44, 62, 80,0.7);
 margin-top: 160px;
}
 
.container img{
 width: 150px;
 height: 150px;
 margin-top: -60px;
}
 
input[type="text"],input[type="password"], input[type="email"]{
 margin-top: 30px;
 height: 45px;
 width: 300px;
 font-size: 18px;
 margin-bottom: 20px;
 background-color: #fff;
 padding-left: 40px;
}
 
.form-input::before{
 content: "\f007";
 font-family: "FontAwesome";
 padding-left: 07px;
 padding-top: 40px;
 position: absolute;
 font-size: 35px;
 color: #2980b9; 
}
 
.form-input:nth-child(2)::before{
 content: "\f023";
}
.form-input:nth-child(3)::before{
 content: "\f023";
}
.form-input:nth-child(5)::before{
 content: "\f084";
}
 
.btn-login{
 padding: 15px 25px;
 border: none;
 background-color: #27ae60;
 color: #fff;
}
input[type=password]:valid {
  border-color: green ;
  background-color: #ABD6A4;
}

input[type=password]:invalid {
  border-color: red;
  background-color: #EBA9A9;
}

input[type=password]:placeholder-shown{
  border-color: black;
  background-color: white;
}

input[type=email]:valid {
  border-color: green ;
  background-color: #ABD6A4;
}

input[type=email]:invalid {
  border-color: red;
  background-color: #EBA9A9;
}

input[type=email]:placeholder-shown{
  border-color: black;
  background-color: white;
}
.style {
  border-color: black;
  background-color: white;
}
	</style>
	<title>Inscription</title>
</head>
<body>
	<div class="container">
<img src="uppa.png"/>
<form name="f1" method="POST" action="inscription.php">
	<div class="form-input">
		<input type="text" class="style" id="login" name="login" required="" placeholder="Saisir login">
	</div>
	<div class="form-input">
		<input type="password" id="password" name="password" required="" placeholder="Saisir mot de passe"> 
	</div>
	<div class="form-input">
		<input type="password" id="repassword" name="repassword" required="" placeholder="Confirmer mot de passe">
	</div>
	<div class="form-input">
		<input type="email" id="email" name="email" required="" placeholder="Saisir email">
	</div>
	<div class="form-input">
		<input type="text" class="style" id="key" name="key" required="" placeholder="Saisir clé">
	</div>
		<input type="button" value="Annuler" class="btn-login" onclick="annuler()">
		<input type="submit" value="Valider" class="btn-login" onclick="return verifier()">
	</fieldset>
</form>
</div>

<script type="text/javascript">
	function verifier() {
		if(document.getElementById("password").value != document.getElementById("repassword").value) {
			alert("Les mots de passe sont différents");
			return false;
		}
		else {
			return true;
		}
	
	}

	function annuler() {
		document.getElementById("login").value = "";
		document.getElementById("password").value = "";
		document.getElementById("repassword").value = "";
		document.getElementById("email").value = "";
		document.getElementById("key").value = "";
	}
</script>
</body>
</html>';

}
?>
<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=globalwarming', 'root', '');
}
catch(exception $e) {
    die('Error '.$e->getMessage());
}

$id = 0;
$role = "";
	if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email']) && isset($_POST['key'])) {
		
		$verif = $db->query('SELECT rôle from role_keys WHERE role_key="'.$_POST['key'].'"');
		$verif= $verif->fetch();
		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
				body{
 margin: 0 auto;
 background-image: url("terre.png");
 background-repeat: no-repeat;
 background-size: cover;
 background-color: #cccccc;
}
 
.container{
 width: 500px;
 
 height: 590px;
 text-align: center;
 margin: 0 auto;
 background-color: rgba(44, 62, 80,0.7);
 margin-top: 160px;
}
 
.container img{
 width: 150px;
 height: 150px;
 margin-top: -60px;
}
 
input[type="text"],input[type="password"], input[type="email"]{
 margin-top: 30px;
 height: 45px;
 width: 300px;
 font-size: 18px;
 margin-bottom: 20px;
 background-color: #fff;
 padding-left: 40px;
}

h2 {
  text-align: center;
  padding-top: 10px;
  color : white;
  font-family : Arial;
}
 

 

 
.btn-login{
 padding: 15px 25px;
 border: none;
 background-color: #27ae60;
 color: #fff;
}
	</style>
	<title>Inscription</title>
</head>
<body>
	<div class="container">
<img src="uppa.png"/>
<form name="f1" method="POST" action="inscription.php">
	<div class="form-input">';
		if (empty($verif)) {
			echo '<h2><br><br>Erreur: clé invalide</h2><br><br><input type="button" value="Retour à l\'inscription" class="btn-login" onclick=location.href="inscription.php"><br><br>';
		} else {
			if ($verif[0] == "biologist") {
				$request = $db->prepare(' INSERT INTO membres(id,identifiant,password,email,rôle) VALUES(?,?,?,?,?) ');
				$request->execute(array($id, $_POST['login'], $_POST['password'], $_POST['email'], "biologist"));
			} 
			if ($verif[0] == "ecologist") {
				$request = $db->prepare(' INSERT INTO membres(id,identifiant,password,email,rôle) VALUES(?,?,?,?,?) ');
				$request->execute(array($id, $_POST['login'], $_POST['password'], $_POST['email'], "ecologist"));
			}
			if ($verif[0] == "admin") {
				$request = $db->prepare(' INSERT INTO membres(id,identifiant,password,email,rôle) VALUES(?,?,?,?,?) ');
				$request->execute(array($id, $_POST['login'], $_POST['password'], $_POST['email'], "ecologist"));
			} 
			echo '<h2><br><br>Bienvenue à vous ! <br>Vous avez été inscrit avec succès !</h2><br><br>			
	</div>
		<input type="button" value="Retour à l\'accueil" class="btn-login" onclick=location.href="index.php"><br><br>
		<input type="button" value="Connexion" class="btn-login" onclick=location.href="connexion.php"><br><br>
	
	</fieldset>
</form>
</div>';
		}
	}
				
			