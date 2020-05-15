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

<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=globalwarming', 'root', '');
}
catch(exception $e) {
    die('Error '.$e->getMessage());
}

$response = $db->query(' SELECT COUNT(id) FROM membres WHERE ((identifiant LIKE "'.$_POST['login'].'") AND (password LIKE "'.$_POST['password'].'")) ');
$data = $response->fetch();
if($data['COUNT(id)'] == 1) {
	echo "Connexion autorisée";
	session_start();
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['role'] = $_POST['role'];
	header('Location: index.php');
} else {
	echo '
	<div class="container">
	<img src="uppa.png"/>
	<div class="form-input">
	<h2><br><br>Connexion refusée : données saisies invalides</h2><br><br><input type="button" value="Retour à la connexion" class="btn-login" onclick=location.href="connexion.php"><br><br>
	</div></div>';
}
?>

