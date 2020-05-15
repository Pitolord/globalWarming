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
 height: 450px;
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
 
input[type="text"],input[type="password"]{
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
 
.btn-login{
 padding: 15px 25px;
 border: none;
 background-color: #27ae60;
 color: #fff;
}

	</style>
	<title>Se connecter</title>
</head>
<body>
<div class="container">
<img src="uppa.png"/>
<form name="f1" method="POST" action="verification.php">
	<div class="form-input">
		<input type="text" id="login" name="login" required="" placeholder="Saisir login">
	</div>	
	<div class="form-input">
		<input type="password" id="password" name="password" required="" placeholder="Saisir mot de passe">
	</div>
		<input type="button" value="Annuler" class="btn-login" onclick="annuler()">
		<input type="submit" value="Valider" class="btn-login"><br><br>
		
		<input type="button" value="Retour à l'accueil" class="btn-login" onclick=location.href="index.php">
	

</form>
</div>

<script type="text/javascript">

	function annuler() {
		document.getElementById("login").value = "";
		document.getElementById("password").value = "";
	}
</script>
</body>
</html>