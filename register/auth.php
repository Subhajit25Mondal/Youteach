<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Authentication</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css">
</head>


<?php 
    error_reporting(0);

    function check($email){
        include("../connect.php");
        $sql_e = "SELECT * FROM inst WHERE email='$email'";
        $res_e = mysqli_query($con, $sql_e);
        if (mysqli_num_rows($res_e) > 0) {
            return 0;
        }
        else{
            return 1;
        }
    }

    function go_back(){
        echo "<center><br><p>Please Register again.</p><button onclick=\"goBack()\" class=\"btn btn-primary mt-4\">Go Back</button></center>

        <script>
        function goBack() {
          window.history.back();
        }
        </script>";
    }

    function redirect($email){
        include("../connect.php");
        $sql = "SELECT inst_id FROM inst WHERE email='$email'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $link = "details.php?id=".$row[inst_id];
            echo "<script>
            window.location.href = \"$link\";
            </script>";
        }

    }

    if(isset($_POST['submit'])) {
        if($_POST['pass1'] == $_POST['pass2']){
            if(check($_POST['email'])==1){
                include("../connect.php");
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass1'];

                date_default_timezone_set('Asia/Kolkata');
                $timestamp = time();
                $date_time = date("d-m-Y (D) H:i:s", $timestamp);


                $query = "INSERT INTO inst (name, date, email, pass) VALUES ('$name', '$date_time', '$email', '$pass')";
                $results = mysqli_query($con, $query);
                redirect($email);
                exit();
            }
            else{
                echo "<script>alert(\"This email is currently used by another user. Please use another email.\");</script>";
                go_back();
            }
        }
        else{
            echo "<script>alert(\"Passwords do not match\");</script>";
            go_back();
        }
    }
?>