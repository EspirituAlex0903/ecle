<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/ee4d206cc2.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/loginstyle.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title>ECLE Student Checker</title>
  </head>
  <body>

    <header>

        <nav class="navbar navbar-expand-md navbar-dark">
          <img src="resource/img/ceulogo2.png" class="img-fluid logo">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="icons ml-auto">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="https:/www.facebook.com/theCEUofficial/"><i class="fab fa-facebook-f"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/ceuofficial/"><i class="fab fa-instagram"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="https://twitter.com/ceumalolos"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 ml-5 text-white text">
          <div class="headText pt-5">
            <h1><i>Cienca y Virtud</i></h1>
            <h2>CEU Empowers. CEU Inspires.</h2>
          </div>
          <div class="img-logo pt-5">
            <img class="logo3" src="resource/img/eclewhite.png" />
          </div>
        </div>

          <div class="col-md">
            <div class="sample">
              <div class="login-fields">
                <div class="row ">
                  <div class="col-3">
                    <img src="resource/img/CEU-logo.png" alt="CEU Logo" class="login-logo">
                  </div>
                  <div class="col">
                    <h2>Student Checker</h2>
                    <h4>MANILA * MAKATI * MALOLOS</h4>
                  </div>
                </div>
                 <?php gradInfo(); ?>
                <form action="" method="post">
                  <div class="inputs">

                    <input type="text" class="input" placeholder="Student Number" name="studentNumber">
                    <input type="text" class="input" placeholder="Last Name" name="lname">
                  </div>
                  <div>
                    <input type =hidden name="token" value="<?php echo Token::generate(); ?>">
                    <input type="submit" class="button-check"value="Check"/>
                  </div>
                </form>
                 <div>
                  <a href="index.php"><input type="submit" class="button-back"value="Back"/></a>
                </div>
                <?php
                  /*if(!empty($_POST)){
                      require 'viewGraduate.php';
                  }else{
                      require 'graduateForm.php';
                  }*/
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>


    </header>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
