

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
        head("$name : Dashboard");
        echo "Welcome";
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

?>