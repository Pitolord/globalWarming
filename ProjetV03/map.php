<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./map.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
    <title>Map</title>
  </head>
  <body>

    <?php
      function getAnimal($var){
        $globalwarming = new PDO('mysql:host=localhost;dbname=globalwarming;charset=utf8', 'root', '');
        $verif = $globalwarming->query('SELECT * FROM animal WHERE name LIKE "'.$_POST['saisieMode'].'"');
        $animal = $verif->fetch();
        return $animal[$var];
      }
    ?>

    <div id="mapid">
      <script type="text/javascript">
        var mymap = L.map('mapid').setView([51.505, -0.09], 3);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox/streets-v11',
          tileSize: 512,
          zoomOffset: -1,
          accessToken: 'pk.eyJ1IjoiYml0ZTEyMyIsImEiOiJjazl0czJqMW0wNndoM2VzMXVtZnlqMTJtIn0.G5rZHbpvLkxLChw0NIUc-Q'
        }).addTo(mymap);

        var icon = L.icon({
            iconUrl: "<?php echo getAnimal('image') ?>",
        });

        var longitude = [];
        var latitude = [];
        <?php
          $globalwarming = new PDO('mysql:host=localhost;dbname=globalwarming;charset=utf8', 'root', '');
          $verif = $globalwarming->query('SELECT temp_min, temp_max FROM animal WHERE name LIKE "'.$_POST['saisieMode'].'"');
          $animal = $verif->fetch();
          $verif = $globalwarming->query('SELECT longitude, latitude FROM data WHERE 1 GROUP BY city HAVING AVG(temp) BETWEEN "'.$animal['temp_min'].'" AND "'.$animal['temp_max'].'"');
          while($d = $verif->fetch()){?>
              longitude.push(<?php echo $d['longitude']; ?>);
              latitude.push(<?php echo $d['latitude']; ?>);
          <?php } 
        ?>

        for (var i = longitude.length - 1; i >= 0; i--) {
          if ("<?php echo getAnimal('image') ?>" == "")
            var marker = L.marker([latitude[i], longitude[i]]).addTo(mymap);
          else
            var marker = L.marker([latitude[i], longitude[i]], {icon: icon}).addTo(mymap);
          marker.bindPopup("<b>Ici :</b><br>Les "+"<?php echo getAnimal('name') ?>"+" peuvent vivrent en paix !!!").openPopup();
        }
      </script>
    </div>

  </body>
</html>
