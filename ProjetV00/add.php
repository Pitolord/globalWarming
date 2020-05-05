<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ajouter espèce</title>
    <link rel='stylesheet' type='style.css'>
    
</head>
<body>
    <h1><U>Ajouter une espèce</U></h1>
	<form action="add.php" method="POST">
	<label for="name">Nom de l'espèce : </label><input id="name" name="name" type="text"/><br><br>
    <label for="temp_min">Température minimal : </label><input id="temp_min" name="temp_minimal" type="text"/><br><br>
    <label for="temp_max">Température maximal : </label><input id="temp_max" name="temp_maximal" type="text"/><br><br>
	<input type="submit" value="Envoyer"/>  <button type="button" onclick=window.location.href="index.php">Retour</button><br><br>
	</form>
	</select>
</body>
</html>

<?php
    $globalwarming = new PDO('mysql:host=localhost;dbname=globalwarming;charset=utf8', 'root', '');
    $req = $globalwarming->prepare('INSERT INTO animal(name, temp_min, temp_max) VALUES(?, ?, ?)');
    if(!isset($req)){
        $req->execute(array($_POST['name'], $_POST['temp_minimal'], $_POST['temp_maximal']));
    }
?>
