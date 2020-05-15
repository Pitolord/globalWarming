<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./style.css" />
    <title>Projet Intégrateur</title>
  </head>
  <body>
  <div class="intro">
      <h1>Chaque année plusieurs espèces animales disparaissent</h1>
	  <button onclick="ScrollBas()" id="scroll">Défiler en bas ou cliquer ici</button>
      <video src="Mon film.mp4"></video>
  </div>
    <section class="section1">
      <h1>Protégeons les !</h1>
	  <!-- navigation bar -->
      <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="MS.pdf">Méthodologie Scientifique</a></li>
          <li><a href="projetIntegrateur.pdf">Global Warming</a></li>
		  <?php 
		  if (isset($_SESSION['login'])) {
			echo '<li style="float:right"><a href="deconnexion.php">Déconnexion</a></li>';
		  } else {
			echo '<li style="float:right"><a href="inscription.php">Inscription</a></li>';
			echo '<li style="float:right"><a href="connexion.php">Connexion</a></li>';
		  }
			?>
          
      </ul>

      <a id="a1"> <h2>ESPÈCES ANIMALES</h2> 
        <form id="form" action="map.php" method="POST">
          <div class="Commande">
            <div id="choice" class="CHOICE">
              <p id="p1">SELECTIONNER UNE ESPÈCE :</p>
                <?php
                    $globalwarming = new PDO('mysql:host=localhost;dbname=globalwarming;charset=utf8', 'root', '');
                    $response = $globalwarming->query('SELECT * FROM animal');
                ?>
                <select id="saisieMode" name="saisieMode">
                  <option>Veuillez choisir</option>
                  <?php while($animaux = $response->fetch()){ ?>
                    <option value="<?php echo $animaux['name']; ?>"><?php echo $animaux['name']; ?></option>
                  <?php } ?>
                </select>
                
                <button type="submit" id="bu1"> Confirmer </button>
               
				

          </form>
      </div>
    </div>
    </a>

          <a id="a2"> <h2 id="pays"></h2> 
            <div  class="Commande">
              <h2>AJOUTER UNE ESPÈCE</h2>
              <form id="add" action="index.php" method="POST">
                <label for="name">Nom de l'espèce : </label><input id="name" name="name" type="text"/><br><br><br>
                <label for="temp_min">Température minimal : </label><input id="temp_min" name="temp_minimal" type="text" type="number" required /><br><br><br>
                <label for="temp_max">Température maximal : </label><input id="temp_max" name="temp_maximal" type="text" type="number" required /><br><br><br>
                <input type="submit" id="envoyer" name="envoyer" value="Envoyer" style="width: 150px;margin-right:10px"/><br><br>
              </form>
            </div>
          </a>

    </section>


	
	<?php 
	if (isset($_SESSION['login'])) {
		echo '<script type="text/javascript">document.getElementById("envoyer").disabled= false;</script>';
	} else {
		echo '<script type="text/javascript">document.getElementById("envoyer").disabled= true;</script>';
	}
	?>
	
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"
      integrity="sha256-2p2tRZlPowp3P/04Pw2rqVCSbhyV/IB7ZEVUglrDS/c="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js"
      integrity="sha256-peenofh8a9TIqKdPKIeQE7mJvuwh+J0To7nslvpj1jI="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.js"
      integrity="sha256-31FC/OT6XpfjAhj9FuXjw5/wPXXawCAjJQ29E23/XPk="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"
      integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U="
      crossorigin="anonymous"
    ></script>
    <script src="app.js"></script>



  </body>
  <footer>
    <hr>
   Un travail de : Mouad TAHTAOUI, Axel PHANOR, Esteban CALLEJA et Nicolas EVAIN  
  </footer>
</html>

<?php
    if (isset($_POST['name']) && isset($_POST['temp_minimal']) && isset($_POST['temp_maximal'])) {
        $globalwarming = new PDO('mysql:host=localhost;dbname=globalwarming;charset=utf8', 'root', '');
        $req = $globalwarming->prepare('INSERT INTO animal(name, temp_min, temp_max) VALUES(?, ?, ?)');
        $req->execute(array($_POST['name'], $_POST['temp_minimal'], $_POST['temp_maximal']));
    }

?>
</html>




