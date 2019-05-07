<?php 
error_reporting(0);
$id = $_GET["id"]; 
include("../connect.php");
$sqll = "SELECT * FROM inst WHERE inst_id=$id";
$resultss = mysqli_query($con, $sqll);
$roww = mysqli_fetch_assoc($resultss);
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Details</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css"> 
</head>
<body>
    <div class="container">
            <div aria-disabled="false" class="fr-element fr-view" dir="auto"
            spellcheck="true">
            <h1>Update Details</h1>
            <p>Please update the details in the fields below. <b>Every field is mandatory.</b></p>
            </div>       
    </div>
    <div class="jumbotron">
        <div class="container">
            <form method="POST" action="details.php">
                <input type="text" class="form-control" name="id" value="<?php echo "$id" ?>" hidden>
                <div class="row align-items-center">
                        <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                          <div class="fr-wrapper" dir="auto">
                            <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                              spellcheck="true">
                              <p><input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo "$roww[address]"; ?>" required></p>
                            </div>
                          </div>
                        </div>
                </div>
                <div class="row align-items-center">
                        <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                          <div class="fr-wrapper" dir="auto">
                            <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                              spellcheck="true">
                              <p><input type="text" class="form-control" placeholder="Phone no. (with country code)" name="phone" value="<?php echo "$roww[phone]"; ?>" required></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4">
                            <div class="col"><textarea class="form-control" rows="3" placeholder="About yourself" name="bio" required><?php echo "$roww[bio]"; ?></textarea></div>
                        </div>
                        <div class="row align-items-center">
                                <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
                                  <div class="fr-wrapper" dir="auto">
                                    <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                                      spellcheck="true">
                                      <p><input type="text" class="form-control" placeholder="Instructor Certificate Link" name="cert" value="<?php echo "$roww[certificate]"; ?>" required></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                <center><p><button class="btn btn-primary mt-4" type="submit" name="submit">Update</button></p></center>
            </form>
        </div>
    </div>
</body>

<?php 
  if(isset($_POST['submit'])) { 
    include("../connect.php");
    $id = $_POST['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $cert = $_POST['cert'];
    $sql = "UPDATE inst SET address = '$address',phone = '$phone',bio = '$bio',certificate = '$cert' WHERE inst_id = $id;";
    $results = mysqli_query($con, $sql);
  if($results){
  echo "<script>
            alert(\"Details has been updated. Please refresh the dashboard to view changes.\")
            window.history.back();
            window.history.back();
            location.reload(1);
            </script>";
  }
  else{
    echo "<script>
    alert(\"Data not uploaded. Please contact admin.\");
    </script>";
  }
  }
?>