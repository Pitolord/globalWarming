<?php

try {
    $db = new PDO('mysql:host=localhost; dbname=bdm', 'root', '');
}
catch(exception $e) {
    die('Error '.$e->getMessage());
}

$id = 0;

$request = $db->prepare(' INSERT INTO membres(id,pseudo,pass,email) VALUES(?,?,?,?) ');
$request->execute(array($id, $_POST['login'], $_POST['mdp'], $_POST['email']));

echo '<label>Bienvenue à vous ! Vous avez été inscrit avec succès !</label><br><br><a href="inscription"><button>Retour</button></a><br><br><a href="sauthentifier"><button>Connexion</button></a>';

?>