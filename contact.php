<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact YouTeach</title>
  <link rel="icon" href="imgs/header.png">
  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css/froala_blocks.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="css/css/froala_style.min.css">
</head>

<body>
  <section class="fdb-block bg-dark fp-active" style="background-image: url(imgs/blue.svg);" data-block-type="contacts"
    data-id="1">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-12 col-md-8 col-lg-7" style="z-index: 10000;">
          <h1>Contact Us</h1>
          <h2>We love to hear from you!</h2>
        </div>
      </div>

      <div class="row pt-4">
        <div class="col-12" style="z-index: 10000;">
          <form action="contact.php" method="POST">
            <div class="row">
              <div class="col-12 col-md"><input type="text" class="form-control" placeholder="Name" name="name"></div>
              <div class="col-12 col-md mt-4 mt-md-0"><input type="email" class="form-control" placeholder="Email" name="email"></div>
              <div class="col-12 col-md mt-4 mt-md-0"><input type="text" class="form-control"
                  placeholder="Phone" name="phone"></div>
            </div>
            <div class="row mt-4">
              <div class="col"><input type="text" class="form-control" placeholder="Subject" name="subject"></div>
            </div>
            <div class="row mt-4">
              <div class="col"><textarea class="form-control" rows="3" placeholder="How can we help?" name="body"></textarea></div>
            </div>
            <div class="row mt-4">
              <div class="col text-center"><button class="btn btn-dark" type="submit" name="submit">Submit</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

</body>

</html>


<?php
  if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $body=$_POST['body'];

    include("connect.php");
    
    

    $sql = "insert into contact (name, email, phone, subject, body) value ('$name', '$email', '$phone', '$subject', '$body')";
        //echo "$name $email $phone $subject $body $sql";
    $res = mysqli_query($con, $sql);
    if($res == TRUE){
      echo "<script>alert(\"Message sent. We will contact you soon.\");</script>";
    }
    else{
      echo "<script>alert(\"Message sending failed.\");</script>";
    }

    mysqli_close($con);
  }
?>