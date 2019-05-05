<?php
error_reporting(0);
 include("geolocation.php");
 $id = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Details</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css"> 
  <script>

    
  </script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
  <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
</head>
<body>
    <div class="container">
            <div aria-disabled="false" class="fr-element fr-view" dir="auto"
            spellcheck="true">
            <h1>Step 1 of 2</h1>
            <p>Please place the marker of the map where you want to register your class.</p>
            </div>
            <br>
            <div id="map" style="width: auto; height: 450px; background: grey"></div>
<br>
            <form method="POST" action="details.php">
                <input type="text" id="id" name="id" hidden>
                <input type="text" id="lat" name="lat" hidden>
                <input type="text" id="lng" name="lng" hidden>
                <center><p><button class="btn btn-primary mt-4" type="submit" name="submit">Next Step >></button></p></center>
            </form>

    </div>


<script>
  
  var lat_g = <?php echo "$lat"; ?>, lng_g = <?php echo "$lon"; ?>;
  document.getElementById("id").value = <?php echo "$id"; ?>;
    
/**
 * Adds a  draggable marker to the map..
 *
 * @param {H.Map} map                      A HERE Map instance within the
 *                                         application
 * @param {H.mapevents.Behavior} behavior  Behavior implements
 *                                         default interactions for pan/zoom
 */
function addDraggableMarker(map, behavior){

var marker = new H.map.Marker({lat:lat_g, lng:lng_g});
// Ensure that the marker can receive drag events
marker.draggable = true;
map.addObject(marker);

// disable the default draggability of the underlying map
// when starting to drag a marker object:
map.addEventListener('dragstart', function(ev) {
  var target = ev.target;
  if (target instanceof H.map.Marker) {
    behavior.disable();
  }
}, false);


// re-enable the default draggability of the underlying map
// when dragging has completed
map.addEventListener('dragend', function(ev) {
  var target = ev.target;
  if (target instanceof mapsjs.map.Marker) {
    behavior.enable();
  }
  var coord = map.screenToGeo(ev.currentPointer.viewportX,
          ev.currentPointer.viewportY);
  //alert(coord.lat + ',' + coord.lng);
  document.getElementById("lat").value = coord.lat;
  document.getElementById("lng").value = coord.lng;
}, false);

// Listen to the drag event and move the position of the marker
// as necessary
 map.addEventListener('drag', function(ev) {
  var target = ev.target,
      pointer = ev.currentPointer;
  if (target instanceof mapsjs.map.Marker) {
    target.setPosition(map.screenToGeo(pointer.viewportX, pointer.viewportY));
  }
}, false);
}

/**
* Boilerplate map initialization code starts below:
*/

//Step 1: initialize communication with the platform
var platform = new H.service.Platform({
app_id: 'DemoAppId01082013GAL',
app_code: 'AJKnXv84fjrb0KIHawS0Tg',
useCIT: true,
useHTTPS: true
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map - this map is centered over Boston
var map = new H.Map(document.getElementById('map'),
defaultLayers.normal.map,{
center: {lat:lat_g, lng:lng_g},
zoom: 10
});

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Step 4: Create the default UI:
var ui = H.ui.UI.createDefault(map, defaultLayers, 'en-US');

// Add the click event listener.
addDraggableMarker(map, behavior);

$('head').append('<link rel="stylesheet" href="../css/css/mapsjs-ui.css" type="text/css" />');

    
</script>


</body>

</html>

<?php 

if(isset($_POST['submit'])) { 
  include("../connect.php");
  $id = $_POST['id'];
  $latt = $_POST['lat'];
  $lngg = $_POST['lng'];
  $sql = "UPDATE inst SET lat = '$latt',lon = '$lngg' WHERE inst_id = $id;";
  $results = mysqli_query($con, $sql);
  if($results){
  $redirect = "details2.php?id=".$id;
  echo "<script>
            window.location.href = \"$redirect\";
            </script>";
  }
  else{
    echo "<script>
    alert(\"Data not uploaded. Please contact admin.\");
    </script>";
  }
}

?>