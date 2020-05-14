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
	$login=$_POST['login'];
	$role=$_POST['role'];
	$_SESSION['login'] = $login;
	$_SESSION['role'] = $role;
	header('Location: index.php');
}
else {
	echo "Connexion refusée : données saisies invalides";
}


?>
<button type="button" id="retour" name="retour" onclick=window.location.href="index.php"> Retour </button>