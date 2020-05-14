<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=globalwarming', 'root', '');
}
catch(exception $e) {
    die('Error '.$e->getMessage());
}

$id = 0;
$role = "";

$verif = $db->query('SELECT rôle from role_keys WHERE role_key="'.$_POST['key'].'"');
$verif= $verif->fetch();

if (empty($verif)) {
	echo '<label>Erreur: clé invalide</label>';
} else {
	if ($verif == "biologist") {
		$request = $db->prepare(' INSERT INTO membres(id,identifiant,password,email,rôle) VALUES(?,?,?,?,?) ');
		$request->execute(array($id, $_POST['login'], $_POST['password'], $_POST['email'], "biologist"));
	} 
	if ($verif == "ecologist") {
		$request = $db->prepare(' INSERT INTO membres(id,identifiant,password,email,rôle) VALUES(?,?,?,?,?) ');
		$request->execute(array($id, $_POST['login'], $_POST['password'], $_POST['email'], "ecologist"));
	} 
	echo '<label>Bienvenue à vous ! Vous avez été inscrit avec succès !</label><br><br><a href="inscription"><button>Retour</button></a><br><br><a href="connexion"><button>Connexion</button></a>';
	
}



?>