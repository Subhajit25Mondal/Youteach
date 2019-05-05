<?php 
if(isset($_POST['submit'])) {
  include("../connect.php");
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM inst WHERE email='$email' AND pass='$pass'";
  $results = mysqli_query($con, $sql);
  if($results){
    if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_assoc($results);
        $id = $row['inst_id'];
        $name = $row['name'];
        $lat = $row['lat'];
        $lon = $row['lon'];
        $address = $row['address'];
        $phone = $row['phone'];
        $date = $row['date'];
        $email = $row['email'];
        $bio = $row['bio'];
        $certificate = $row['certificate'];
        head("$name : Dashboard");
        body($id, $name, $lat, $lon, $address, $phone, $date, $email, $bio, $certificate);
    }
    else{
      wrong_email();
    }
    }
    else{
      server_error();
    }
 }

 function wrong_email(){
     head("Try Again!");
     echo "<body>
    <br><br>
    <div class=\"container\">
            <div aria-disabled=\"false\" class=\"fr-element fr-view\" dir=\"auto\"
            spellcheck=\"true\">
            <h1>Wrong Email or Password!</h1>
            <p>Please go back to the Login page and try again!</p>
            <p><a href=\"../login.php\"><button class=\"btn btn-primary mt-4\"><<  Login</button></a></p>

        </div>
            
        </div>
    </body>";
 }

 function server_error(){
    head("Error!");
    echo "<body>
    <br><br>
    <div class=\"container\">
            <div aria-disabled=\"false\" class=\"fr-element fr-view\" dir=\"auto\"
            spellcheck=\"true\">
            <h1>Connection Error!</h1>
            <p>Please contact admin to resolve this issue.</p>
            <p><a href=\"../index.php\"><button class=\"btn btn-primary mt-4\">Home</button></a></p>

        </div>
            
        </div>
    </body>";
 }

 function head($message){
     echo "<head>
     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
     <title>$message</title>
     <link rel=\"icon\" href=\"../imgs/header.png\">
     <link rel=\"stylesheet\" href=\"../css/css/bootstrap.min.css\">
     <link rel=\"stylesheet\" href=\"../css/css/froala_blocks.min.css\">
     <link rel=\"stylesheet\"
       href=\"https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i\">
     <link rel=\"stylesheet\" href=\"../css/css/froala_editor.pkgd.min.css\">
     <link rel=\"stylesheet\" href=\"../css/css/froala_style.min.css\">
   </head>";
 }

 function body($id, $name, $lat, $lon, $address, $phone, $date, $email, $bio, $certificate){

  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1549984893\" />
  <script type=\"text/javascript\" src=\"https://js.api.here.com/v3/3.0/mapsjs-core.js\"></script>
  <script type=\"text/javascript\" src=\"https://js.api.here.com/v3/3.0/mapsjs-service.js\"></script>
  <script type=\"text/javascript\" src=\"https://js.api.here.com/v3/3.0/mapsjs-ui.js\"></script>
  <script type=\"text/javascript\" src=\"https://js.api.here.com/v3/3.0/mapsjs-mapevents.js\"></script>";

  echo "</head>
  <body>
    <div id=\"map\" style=\"width: 100%; height: 300px; background: grey\"></div>

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-10\">
                <div aria-disabled=\"false\" class=\"fr-element fr-view\" dir=\"auto\" spellcheck=\"true\">
                <h1>$name</h1>
                <p>$address <br> Email : <b>$email </b>   (Phone No. <b>$phone</b>)   $date  <br> 
                    $bio <br> 
                <a href=\"$certificate\">Certificate</a></p>
                </div>
            </div>
            <div class=\"col-2\">
                    <a href=\"acc_del?id=$id\"><button class=\"btn btn-danger btn-light btn-sm mt-4\" name=\"submit\">Delete Account</button></a>
                    <a href=\"../update/map.php?id=$id\"><button class=\"btn btn-outline-primary mt-4\" name=\"submit\">Edit Location</button></a>
                    <a href=\"../update/details.php?id=$id\"><button class=\"btn btn-dark mt-4\" name=\"submit\">Edit Details</button></a>
            </div>
        </div>
    </div>

<script  type=\"text/javascript\" charset=\"UTF-8\" >
      
  var lat_g = $lat, lng_g = $lon;

  function addMarkersToMap(map) {
    var parisMarker = new H.map.Marker({lat:lat_g, lng:lng_g});
    map.addObject(parisMarker);
  

  }
  
  
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
  
  //Step 2: initialize a map - this map is centered over Europe
  var map = new H.Map(document.getElementById('map'),
    defaultLayers.normal.map,{
    center: {lat:lat_g, lng:lng_g},
    zoom: 13,
    pixelRatio: pixelRatio
  });
  
  //Step 3: make the map interactive
  // MapEvents enables the event system
  // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
  var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
  
  // Create the default UI components
  var ui = H.ui.UI.createDefault(map, defaultLayers);
  
  // Now use the map as required...
  addMarkersToMap(map);
</script>

<!--Bookings-->
    <br>
    <div class=\"container\">
            People who opted you for Stop the Bleed training : <br><br>";

  include("../connect.php");
  $sql = "SELECT * FROM booking WHERE inst_id=$id";
  $results = mysqli_query($con, $sql);
  if (mysqli_num_rows($results) > 0) {
    
  while($row = mysqli_fetch_assoc($results)){
    //$row['inst_id'];
    echo "<div class=\"card border-dark mb-3\" style=\"margin-bottom : 15px\">
    <div class=\"row\">
        <div class=\"col-10\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">$row[name]</h5>
                <h5 class=\"card-subtitle mb-2 text-muted\">$row[email] (Phone: $row[phone])</h5>
                <p class=\"card-text\">$row[address] <br>
                <b>Training scheduled on <u>$row[training_date]</u></b> , <i>Registered on $row[reg_date]</i></p>
            </div>
        </div>
        <div class=\"col-2\">
            <a href=\"remove.php?id=$row[booking_id]\"><button class=\"btn btn-danger\" style=\"margin-top: 15px\">Remove</button></a>
        </div>
    </div>
</div>";
  }
}
else{
  echo "<center><p class=\"text-info\"><i>(Nobody has opted you yet)</i></p></center>";
}
echo "</div><br><br>
</body>
</html>";
}

?>