<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Removed</title>
  <link rel="icon" href="../imgs/header.png">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/css/froala_blocks.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="../css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="../css/css/froala_style.min.css"> 
</head>
<body>
    <br>
<?php
    $id = $_GET["id"];
    include("../connect.php");
    $sql_r = "SELECT * FROM booking WHERE booking_id=$id";
    $results_r = mysqli_query($con, $sql_r);
    $row = mysqli_fetch_assoc($results_r);

    $sql = "DELETE FROM booking WHERE booking_id=$id";
    $results = mysqli_query($con, $sql);
    if($results){
    echo "<div class=\"container\">
        <div aria-disabled=\"false\" class=\"fr-element fr-view\" dir=\"auto\"
            spellcheck=\"true\">
            <h2>$row[name] is Removed!</h2>
            <button onclick=\"goBack()\" class=\"btn btn-primary\"><< Go Back</button>

            <script>
            function goBack() {
                alert(\"Please reload the Dashboard page to update the data!\");
            window.history.back();
            location.reload(1);
            }
            </script>
        </div>
    </div>";
        }
        else{
            echo "<div class=\"container\">
            <div aria-disabled=\"false\" class=\"fr-element fr-view\" dir=\"auto\"
                spellcheck=\"true\">
                <h2>Connection error!</h2>
                <button onclick=\"goBack()\" class=\"btn btn-primary\"><< Go Back</button>
    
                <script>
                function goBack() {
                window.history.back();
                }
                </script>
            </div>
        </div>";
        }
?>
    
</body>
</html>