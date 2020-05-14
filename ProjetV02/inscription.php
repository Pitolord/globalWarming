<?php
if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email'])) {
} else  {
	echo '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		input{position: absolute; left:300px;}
	</style>
	<title>Inscription</title>
</head>
<body>
<form name="f1" method="POST" action="inscription.php">
	<fieldset>

		<legend><b><u>Inscription</u></b></legend>
		<p><b>Login : </b><input type="text" id="login" name="login" required="" placeholder="Saisir login"></p>
		<p><b>Mot de passe : </b><input type="password" id="password" name="password" required="" placeholder="Saisir mot de passe"> </p>
		<p><b>Retapez votre mot de passe : </b><input type="password" id="repassword" name="repassword" required="" placeholder="Confirmer mot de passe"></p>
		<p><b>Email : </b><input type="email" id="email" name="email" required="" placeholder="Saisir email"></p>
		<p><b>Clé : </b><input type="text" id="key" name="key" required="" placeholder="Saisir clé"></p>
		<input type="submit" value="Valider" onclick="return verifier()"><br><br>
		<input type="button" value="Annuler" onclick="annuler()">
	</fieldset>
</form>

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
	if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email'])) {
		
		$verif = $db->query('SELECT rôle from role_keys WHERE role_key="'.$_POST['key'].'"');
		$verif= $verif->fetch();

		if (empty($verif)) {
			echo '<label>Erreur: clé invalide</label>';
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
				$request->execute(array($id, $_POST['login'], $_POST['password'], $_POST['email'], "admin"));
			}
			echo '<label><br><br>Bienvenue à vous ! Vous avez été inscrit avec succès !</label><br><br><a href="inscription.php"><button>Retour</button></a><br><br><a href="connexion.php"><button>Connexion</button></a>';
		}
	}



?>