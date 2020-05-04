<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./style.css" />
    <title>Projet tut</title>
  </head>
  <body>
  <!--  <div class="intro">
      <h1>Chaque année plusieurs espèces animales disparaissent</h1>
      <video src="Mon film.mp4"></video>
  </div> -->
    <section class="section1">
      <h1>Protégeons les !</h1>

      <a id="a1"> <h2>ESPÈCES ANIMALES</h2> 
        <form id="form">
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
                
                <button type="button" id="bu1" onclick="afficher();"> Confirmer </button>
                <button type="button" id="bu2" onclick=window.location.href="add.php"> Ajouter une espèce </button>

          </form>
      </div>
    </div>
    </a>

          <a id="a2"> <h2 id="pays"></h2> 
            <div id="map" class="Commande">

            </div>
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


    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 43.493891, lng: -1.544312},
          zoom: 8
        });
      }
      function afficher(){
        var locations = [];
      
        
        for(var i = 0; i <saisieMode.length; i++)
			  {
          if(document.getElementById("saisieMode").options[i].selected)
          {
            alert(saisieMode.value);
            <?php
              
            ?>
              
          }
			  }
        //locations.push({lat: 41.902782, lng: 12.496366});
        

        
        var arrayLength = locations.length;
        for (var i = 0; i < arrayLength; i++) 
          var marker = new google.maps.Marker({ position: locations[i], map: map, title: 'Test'});
        
        
      } 

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-8LHQlkFxEzB0TeRgmjd3bPU3epvGx1c&callback=initMap"
    async defer></script>
  </body>
</html>




