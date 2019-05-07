<?php 
error_reporting(0);

$id = $_GET["id"];
include("../connect.php");
$sql = "SELECT * FROM inst WHERE inst_id=$id";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opt Instructor</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css">
</head>
<body>
  <br>
    <div class="container">
        <div aria-disabled="false" class="fr-element fr-view" dir="auto"
        spellcheck="true">
        <h1><?php echo "$row[name]"; ?></h1>
        <p><kbd><?php echo "$row[address]"; ?></kbd><br> Phone No: <?php echo "$row[phone]"; ?> <br> Email: <?php echo "$row[email]"; ?> <br>
        <b>Bio: <?php echo "$row[bio]"; ?></b><br><a href="<?php echo "$row[certificate]"; ?>">Certificate</a></p>
      </div>
    </div>
    <div class="jumbotron">
      <div class="container">
        <center><h3>To avail Stop the Bleed Training from Roman Roy, you need to fill up the form below. Once the instructor 
          receives your application, he will get in touch with you.
        </h3></center>

<!--form-->
        <form method="POST" action="book.php">
          <input type="text" class="form-control" placeholder="id" name="id" value="<?php echo "$id"; ?>" hidden>
                
        <div class="row align-items-center">
            <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
              <div class="fr-wrapper" dir="auto">
                <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                  spellcheck="true">
                  <p><input type="text" class="form-control" placeholder="Full Name" name="name" required></p>
                </div>
              </div>
            </div>
          
          
              <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                <div class="fr-wrapper" dir="auto">
                  <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                    spellcheck="true">
                    <p><input type="email" class="form-control" placeholder="Email" name="email" required></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row align-items-center">
                <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                  <div class="fr-wrapper" dir="auto">
                    <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                      spellcheck="true">
                      <p><input type="text" class="form-control" placeholder="Address" name="address" required></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                  <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                    <div class="fr-wrapper" dir="auto">
                      <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                        spellcheck="true">
                        <p><input type="text" class="form-control" placeholder="Phone No. (Including country code)" name="phone" required></p>
                      </div>
                    </div>
                  </div>
                
                
                    <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                      <div class="fr-wrapper" dir="auto">
                        <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                          spellcheck="true">
                          <p><input type="text" class="form-control" placeholder="Training Date (Date Month Year)" name="training_date" required></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <center><button class="btn btn-primary" type="submit" name="submit">Submit</button></center>
                </form>
      <!--form end-->
      </div>
    </div>
</body>
</html>

<?php
  if(isset($_POST['submit'])) {
    include("../connect.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['training_date'];
    $phone = $_POST['phone'];

    date_default_timezone_set('Asia/Kolkata');
    $timestamp = time();
    $date_time = date("d-m-Y (D) H:i:s", $timestamp);

    $sql = "INSERT INTO booking (inst_id, name, address, phone, email, training_date, reg_date) VALUES ($id, '$name', '$address', '$phone', '$email', '$date', '$date_time')";
    $results = mysqli_query($con,$sql);
    if($results){
      echo "<script>
      window.location.href = \"done.html\";
      </script>";
    }
    else{
      echo "<script>alert(\"Something went wrong. Please try again\");</script>";
    }
  }
?>
