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

  <title>Remarks Registrar</title>
</head>
<body>
  <div class="form-group">
    <form action="" method="post">
    <?php
    if(!empty($_POST)){
      holdRegistrar();;
    }
    ?>
        <label for="remarks">Remarks</label>
        <textarea name="remarks" id="remarks" cols="30" rows="10"></textarea>
        <div class="bbutton">
          <button class="btn btn-primary my-5">
            <a href="registrar.php" class="text-light">Back</a>
          </button>
          <button type="submit" name="submit" value="submit" class="btn btn-primary my-5">Submit</button>
        </div>
    </form>
  </div>

</body>
</html>
