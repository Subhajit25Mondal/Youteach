<?php 

include("../register/geolocation.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Instructors</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css"> 
  
  <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1549984893" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
</head>
<body>
  <div class="container">
      <div aria-disabled="false" class="fr-element fr-view" dir="auto"
      spellcheck="true">
      <h1>Find Instructors</h1>
      <p>Use the map below to find Instructors. Click on the <b>Markers</b> for details.</p>
    </div>
  </div>
  <div id="map" style="width: 100%; height: 650px; background: grey"></div>

  <script  type="text/javascript" charset="UTF-8" >
    
    /**
     * Creates a new marker and adds it to a group
     * @param {H.map.Group} group       The group holding the new marker
     * @param {H.geo.Point} coordinate  The location of the marker
     * @param {String} html             Data associated with the marker
     */
    function addMarkerToGroup(group, coordinate, html) {
      var marker = new H.map.Marker(coordinate);
      // add custom data to the marker
      marker.setData(html);
      group.addObject(marker);
    }
    
    /**
     * Add two markers showing the position of Liverpool and Manchester City football clubs.
     * Clicking on a marker opens an infobubble which holds HTML content related to the marker.
     * @param  {H.Map} map      A HERE Map instance within the application
     */
    function addInfoBubble(map) {
      var group = new H.map.Group();
    
      map.addObject(group);
    
      // add 'tap' event listener, that opens info bubble, to the group
      group.addEventListener('tap', function (evt) {
        // event target is the marker itself, group is a parent event target
        // for all objects that it contains
        var bubble =  new H.ui.InfoBubble(evt.target.getPosition(), {
          // read custom data
          content: evt.target.getData()
        });
        // show info bubble
        ui.addBubble(bubble);
      }, false);
    
    <?php

    include("../connect.php");
    $sql = "SELECT * FROM inst";
    $results = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($results)){
      
      echo "addMarkerToGroup(group, {lat:$row[lat], lng:$row[lon]},
        '<div>$row[name]<br><a href=\"book.php?id=$row[inst_id]\">Details</a></div>');";
    
      }
    ?>
    }
    
    
    
    /**
     * Boilerplate map initialization code starts below:
     */
    
    // initialize communication with the platform
    var platform = new H.service.Platform({
      app_id: 'T81U7W7QH7MsZOetXKcv',
      app_code: '0UcgkmbLFcP4PF5EsLuJLg',
      useHTTPS: true
    });
    var pixelRatio = window.devicePixelRatio || 1;
    var defaultLayers = platform.createDefaultLayers({
      tileSize: pixelRatio === 1 ? 256 : 512,
      ppi: pixelRatio === 1 ? undefined : 320
    });
    
    // initialize a map - this map is centered over Europe
    var map = new H.Map(document.getElementById('map'),
      defaultLayers.normal.map,{
      center: {lat: <?php echo "$lat"; ?>, lng: <?php echo "$lon"; ?>},
      zoom: 13,
      pixelRatio: pixelRatio
    });
    
    // MapEvents enables the event system
    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
    
    // create default UI with layers provided by the platform
    var ui = H.ui.UI.createDefault(map, defaultLayers);
    
    // Now use the map as required...
    addInfoBubble(map);
      </script>

</body>
</html>