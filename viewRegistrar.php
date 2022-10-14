<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';

 ?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="resource/css/style.css">

  <title>Student Information</title>
</head>
<body>
  <div class="form-group">
    <?php
    viewRegistrar();
     ?>
  </div>
  <div class="bbutton">
    <button class="btn btn-primary my-5">
      <a href="registrar.php" class="text-light">Back</a>
    </button>
  </div>
</body>
</html>
