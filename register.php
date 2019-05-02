<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register as Instructor</title>
  <link rel="icon" href="imgs/header.png">
  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css/froala_blocks.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="css/css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="css/css/froala_style.min.css">
</head>

<body>

  <section class="fdb-block fp-active" data-block-type="forms" data-id="3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6" style="z-index: 10000;">
          <div class="row">
            <div class="col text-center fr-box" role="application" style="z-index: 10000;">
              <div class="fr-wrapper" dir="auto">
                <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                  spellcheck="true">
                  <h1>Register</h1>
                  <p>Please register your name, email and password to our system to get started.</p>
                </div>
              </div>
            </div>
          </div>
          <form method="POST" action="register/auth.php">
          <div class="row align-items-center">
            <div class="col mt-4 fr-box" role="application" style="z-index: 10000;">
              <div class="fr-wrapper" dir="auto">
                <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                  spellcheck="true">
                  <p><input type="text" class="form-control" placeholder="Full Name" name="name"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col fr-box" role="application" style="z-index: 10000;">
              <div class="fr-wrapper" dir="auto">
                <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                  spellcheck="true">
                  <p><input type="email" class="form-control" placeholder="Email" name="email"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col fr-box" role="application" style="z-index: 10000;">
              <div class="fr-wrapper" dir="auto">
                <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                  spellcheck="true">
                  <p><input type="password" class="form-control" placeholder="Password" name="pass1"></p>
                </div>
              </div>
            </div>
            <div class="col fr-box" role="application" style="z-index: 10000;">
              <div class="fr-wrapper" dir="auto">
                <div aria-disabled="false" class="fr-element fr-view" dir="auto"
                  spellcheck="true">
                  <p><input type="password" class="form-control" placeholder="Confirm Password" name="pass2"></p>
                </div>
              </div>
            </div>
          </div>
          <center><p><button class="btn btn-primary mt-4" type="submit" name="submit">Submit</button></p></center>
          </form>
        </div>
      </div>
    </div>
  </section>

</body>

</html>