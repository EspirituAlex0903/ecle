<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
$view = new view;
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/ee4d206cc2.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="resource/css/adminstyle.css">
     <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
    <link href="vendor/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
    <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

     <title>ECLE Form</title>
 </head>
 <body>

 <header>

    <nav class="navbar navbar-expand-md navbar-dark">
      <img src="resource/img/logo6.png" class="img-fluid logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  

    <div class="box">
    <?php
        if(!empty($_POST)){
          $insert= new insert($_POST['fname'], $_POST['lname'], $_POST['mname'], $_POST['school'], $_POST['studID'], $_POST['email'], $_POST['contact'], $_POST['course'], $_POST['year']);
          $insert->insertApplication();
        }
    ?>
      <form action="" method="POST">
        
        <input type="text" placeholder="Last Name" name="lname" id="lname" required>
        <input type="text" placeholder="First Name" name="fname" id="fname" required>
        <input type="text" placeholder="Middle Name" name="mname" id="mname" required>

        <table class="table ">

        <div class="form-group col-4">
          <label for="school" >school</label>
          <select id="school" name="school" class="selectpicker form-control" data-live-search="true" placeholder="School" required>
            <?php $view->collegeSP2();?>
          </select>
        </div>

        </table>
        <input type="text" placeholder="Student Number" name="studID" id="studID" required>
        <input type="text" placeholder="Email" name="email" id="email" required>
        <input type="text" placeholder="Contact Number" name="contact" id="contact" required>

        <input type="text" name="course" id="course" placeholder="Course/Degree" required>
        <input type="text" name="year" id="year" placeholder="Year Graduated/Year Level" required>

        <button type="submit" name="submit" value="submit">Submit</button>

      </form>
    </div>
    
  </header>

 </body>
 <script src="vendor/js/jquery.js"></script>
  <script src="vendor/js/popper.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
  <script src="vendor/js/bootstrap-select.min.js"></script>
 </html>