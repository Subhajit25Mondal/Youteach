<?php
error_reporting(0);
include("../connect.php");
$id = $_GET["id"];
$sql = "SELECT * FROM inst WHERE inst_id=$id";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Delete Account</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css">
</head>
<body><br>
  <div class="container">
    <div class="fr-wrapper" dir="auto">
      <div aria-disabled="false" class="fr-element fr-view" dir="auto"
        spellcheck="true">
        <h1>Delete?</h1>
        <p class="text-dark">Hello, <?php echo "$row[name]"; ?>! <br> Do you really want to delete your account. Please type your password below to delete your account.</p>
      
        <form method="POST" action="acc_del.php" class="form-group">
          <input class="form-control" type="text" name="id" value="<?php echo "$row[inst_id]"; ?>" hidden required>
          <input class="form-control" type="password" name="pass" placeholder="Password" required><br>
          <button type="submit" class="btn btn-danger" name="submit">Delete my Account</button>
        </form>
      
  </div>
  </div>
  </div>
  <br><br><br>
  <div class="jumbotron">
    <div class="container">
      <center>
        You can even contact us, if you have any problem with your account.<br>
        <a href="../contact.php"><button class="btn btn-dark" style="margin-top:15px">Contact Us</button></a></center>
    </div>
  </div>
</body>
</html>

<?php
  if(isset($_POST['submit'])) {
    include("../connect.php");
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM inst WHERE inst_id=$id";
    $results = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($results);
    if($pass == $row[pass]){
      $sqll = "DELETE FROM inst WHERE inst_id=$id";
      $results = mysqli_query($con, $sqll);
      if(results){
        echo "<script>alert(\"Account deleted successfully.\");
              window.location.href = '../index.php';
        </script>";
      }
      else{
        echo "<script>alert(\"Some internal problem occured. Please contact admin.\");</script>";
      }
    }
    else{
      echo "<script>alert(\"Wrong Password. Please try again.\");
      window.history.back();
      </script>";
    }
  }
?>
