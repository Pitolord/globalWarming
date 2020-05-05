<!DOCTYPE html>
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
      <video src="Mon film.mp4"></video>
  </div>
    <section class="section1">
      <h1>Protégeons les !</h1>

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
                <button type="button" id="bu2" onclick=window.location.href="add.php"> Ajouter une espèce </button>

          </form>
      </div>
    </div>
    </a>

          <a id="a2"> <h2 id="pays"></h2> 
          </a>

    </section>

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
</html>




