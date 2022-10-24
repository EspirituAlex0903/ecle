<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
isLogin();
$viewtable = new viewtable();
$user = new user();
isRegistrar($user->data()->groups);
$import = new import();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/adminConfigStyle.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title>Dashboard</title>
  </head>
  <body>
    <header>
      <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
          <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
            <img src="resource/img/logo.jpg" class="img-fluid logo">
          </div>
          <form action="" method="POST">
          <div class="list-group list-group-flush my-3">
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-share me-2"></i>Transfers <?php echo "(".$viewtable->viewTotalTransfers().")" ?>
            </a>
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-graduation-cap me-2"></i>Graduate <?php echo "(".$viewtable->viewTotalGraduates().")" ?>
            </a>
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-flask me-2"></i>Science <?php echo "(".$viewtable->viewTotalScience().")" ?>
            </a>
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-book me-2"></i>Non-Science <?php echo "(".$viewtable->viewTotalNonScience().")" ?>
            </a>

          </div>
          </form>


        </div>

        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 border-bottom">
            <div class="d-flex align-items-center">
              <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
              <a href="registrar.php" class="list-group list-group-item-action bg-transparent"><h2 class="fs-2 m-0 fw-bold"> Dashboard</h2></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupporteContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i> <?php echo $user->data()->username ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="adminconfig.php" class="dropdown-item">Config</a></li>
                    <li><a href="changepassword.php" class="dropdown-item">Setting</a></li>
                    <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

          <div class="container p-5">
            <div class="row">
              <div class="cold-md-12 head">
                <div class="float-right">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm')"><i class="fa-solid fa-plus mr-2"></i>Import</a>
                </div>
              </div>

              <div class="cold-md-12" id="importFrm" style="display: none;">
              <?php $import->insertGraduate(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="file" name="file">
                  <input type="submit" class="btn btn-primary" name="importSubmit" value="Import ">
                  <a href="ecle.csv" download="ecle template" class="btn btn-primary">Download Template</a>
                </form>
              </div>

              <script>
                function formToggle(ID){
                  var element = document.getElementById(ID);
                  if(element.style.display === "none"){
                    element.style.display = "block";
                  }else{
                    element.style.display = "none";
                  }
                }
              </script>
            </div>
          </div>
          <div class="container-fluid p-5">
            <div class="row justify-content-md-center">
              <div class="col-md-5 py-5 content">
              <?php
                if(!empty($_POST['semester']) && !empty($_POST['sy'])){
                  $update = new update($_POST['semester'], $_POST['sy']);
                  $update->updateSemester();
                  $update->updateSchoolyear();
                }
              ?>
                <form method="post">

                  <div class="col-md">
                    <label for="firstName" class="form-label">Semester</label>
                    <input type="text" name="semester" class="form-control">
                  </div>

                  <div class="col-md pt-5">
                    <label for="firstName" class="form-label">School Year</label>
                    <input type="text" name="sy" class="form-control">
                  </div>

                  <div class="col-md pt-5 text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      var el = document.getElementById("wrapper")
      var toggleButton = document.getElementById("menu-toggle")

      toggleButton.onclick = function(){
        el.classList.toggle("toggled")
      }
    </script>
  </body>
</html>
