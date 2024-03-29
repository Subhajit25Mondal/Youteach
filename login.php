<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Instructor Login</title>
  <link rel="icon" href="imgs/header.png">
  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css/froala_blocks.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="css/css/froala_style.min.css">
</head>

<body>

  <section class="fdb-block py-0 fp-active" data-block-type="forms" data-id="4">
    <div class="container py-5 my-5" style="background-image: url(imgs/4.svg);">
      <div class=" row justify-content-end">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-left" style="z-index: 10000;">
          <div class="fdb-box">
            <div class="row">
              <div class="col">
                <h1>Log In</h1>
                <p class="lead">Instructors can login to their account to keep of track of the people who opted to learn from them.
                </p>
              </div>
            </div>
            <form method="POST" action="dashboard/dashboard.php">
            <div class="row">
              <div class="col mt-4"><input type="email" class="form-control" placeholder="Email" name="email" required></div>
            </div>
            <div class="row mt-4">
              <div class="col"><input type="password" class="form-control" placeholder="Password" name="pass" required></div>
            </div>
            <div class="row mt-4">
              <div class="col"><button class="btn btn-secondary" type="submit" name="submit">Submit</button></div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>