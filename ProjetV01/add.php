<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Ajouter espèce</title>
    <link rel='stylesheet' type='style.css'>
    
</head>
<body>
    <h1><U>Ajouter une espèce</U></h1>
	<form action="add.php" method="POST">
	<label for="name">Nom de l'espèce : </label><input name="name" type="text" required /><br><br>
    <label for="temp_min">Température minimal : </label><input name="temp_minimal" type="number" required /><br><br>
    <label for="temp_max">Température maximal : </label><input name="temp_maximal" type="number" required /><br><br>
	<input type="submit" value="Envoyer"/>  <button type="button" onclick=window.location.href="index.php">Retour</button><br><br>
	</form>
	</select>
</body>
</html>

<?php
    if (isset($_POST['name']) && isset($_POST['temp_minimal']) && isset($_POST['temp_maximal'])) {
        $globalwarming = new PDO('mysql:host=localhost;dbname=globalwarming;charset=utf8', 'root', '');
        $req = $globalwarming->prepare('INSERT INTO animal(name, temp_min, temp_max) VALUES(?, ?, ?)');
        $req->execute(array($_POST['name'], $_POST['temp_minimal'], $_POST['temp_maximal']));
    }

?>
