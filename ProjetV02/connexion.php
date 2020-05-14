<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		input{position: absolute; left:300px;}
	</style>
	<title>Se connecter</title>
</head>
<body>
<form name="f1" method="POST" action="verification.php">
	<fieldset>

		<legend><b><u>Connexion</u></b></legend>
		<p><b>Login : </b><input type="text" id="login" name="login" required="" placeholder="Saisir login"></p>
		<p><b>Mot de passe : </b><input type="password" id="password" name="password" required="" placeholder="Saisir mot de passe"> </p>
		<input type="submit" value="Valider"><br><br>
		<input type="button" value="Annuler" onclick="annuler()">
	</fieldset>
</form>

<script type="text/javascript">

	function annuler() {
		document.getElementById("login").value = "";
		document.getElementById("password").value = "";
	}
</script>
</body>
</html>