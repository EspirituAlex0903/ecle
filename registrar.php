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
    <link rel="stylesheet" href="resource/css/styledash.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="resource/img/icon.ico" />
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
            <!-- dashboard -->

            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-question-circle me-2"></i>Pendings <?php echo '<span class="badge badge-danger">'
            .$viewtable->viewTotalRegistrar(). '</span>';  ?>
            </a>

            <!-- requests -->
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-tag"></i>Requests<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <input type="submit" name="Rtransfer" class="sub-item border-bottom" value="Transfer">
                <input type="submit" name="Rgraduate" class="sub-item" value="Graduate">
              </div>
            </div>

            <!-- approved -->
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-thumbs-up"></i>Approved<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <input type="submit" name="Atransfer" class="sub-item" value="Transfer">
                <input type="submit" name="Agraduate" class="sub-item" value="Graduate">
              </div>
            </div>

            <!-- hold -->
            <div class="item">
              <a class="sub-btn"><i class="fa-sharp fa-solid fa-pause"></i>On Hold<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <input type="submit" name="Htransfer" class="sub-item" value="Transfer">
                <input type="submit" name="Hgraduate" class="sub-item" value="Graduate">
              </div>
            </div>

            <div class="item pb-3 border-bottom">
              <a class="sub-btn"><i class="fa-solid fa-list"></i>Others<i class="fas fa-chevron-right dropdown"></i></a>
              <div class="sub-menu">
                <input type="submit" name="Reports" class="sub-item" value="Reports">
              </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                  $('.sub-btn').click(function(){
                      $(this).next('.sub-menu').slideToggle();
                      $(this).find('.dropdown').toggleClass('rotate');
                  });
              });
            </script>



            <a href="reportsDownload.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold" style="font-size: 19px; color:blue">
            <i class="fa-solid fa-file-arrow-down me-2"></i>Download Reports</a>

          </div>
          </form>


        </div>

        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 border-bottom">
            <div class="d-flex align-items-center">
              <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
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
                    <li><a href="changepasswordRegistrar.php" class="dropdown-item">Setting</a></li>
                    <li><a href="sendmails.php" class="dropdown-item">Send Mails</a></li>
                    <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>

          <div class="container-fluid p-5">
            <div class="row">

              <div class="col-md p-5 content">

                <?php
                if(empty($_POST)){ ?>
                <div class="col-md p-5 mb-5">
                  <h3 class="col-md pb-5" style="text-align:center; font-weight:bold;">Summary of transferring Students' School of choice and their Reasons</h3>
                  <canvas id="chart_schools" style="width:100%;max-width:650px; display:inline"></canvas>
                  <canvas id="chart_reasons" style="width:100%;max-width:650px; float: right; display:inline"></canvas>

                </div>
                <?php $viewtable->viewRequestTableRegistrarTransfer();
                }
                else if(array_key_exists('Rtransfer', $_POST)) {
                  $viewtable->viewRequestTableRegistrarTransfer();
                }
                else if(array_key_exists('Rgraduate', $_POST)) {
                  $viewtable->viewRequestTableRegistrarGraduate();
                }
                else if(array_key_exists('Atransfer', $_POST)) {
                  $viewtable->viewApproveTableRegistrarTransfer();
                }
                else if(array_key_exists('Agraduate', $_POST)) {
                  $viewtable->viewApproveTableRegistrarGraduate();
                }
                else if(array_key_exists('Htransfer', $_POST)) {
                  $viewtable->viewHoldTableRegistrarTransfer();
                }
                else if(array_key_exists('Hgraduate', $_POST)) {
                  $viewtable->viewHoldTableRegistrarGraduate();
                }
                else if(array_key_exists('Reports', $_POST)) {
                  $viewtable->viewReports();

                }
              ?>
              <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
              <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
              <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
              <script type="text/javascript">
                $(document).ready( function () {
                  $('#scholartable').DataTable({
                    "ordering": false
                  });
                });
              </script>

              <script type="text/javascript">
                $(document).ready( function () {
                  $('#reports').DataTable({
                    "ordering": false,
                    "columnDefs": [
                        { "searchable": false, "targets": [0,1,2,3,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33]}
                    ],
                    "search": {
                      "search": "1"
                    }
                  });
                });
              </script>

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <script>
      const schoolbar = document.getElementById('chart_schools');

      new Chart(schoolbar, {
        type: 'horizontalBar',
        data: {
          labels: <?php echo'["' . implode('", "', $viewtable->viewTransferredSchoolNames()) . '"]' ?>,
          datasets: [{
            label: 'Total Students',
            data: <?php echo '[' . implode(', ', $viewtable->viewTransferredSchoolTotal()) . ']' ?>,
            backgroundColor: [
              'rgb(43, 58, 85)',
              'rgb(206, 119, 119)',
              'rgb(232, 196, 196)',
              'rgb(242, 229, 229)',
              'rgb(255, 115, 29)',
              'rgb(95, 157, 247)',
              'rgb(232, 196, 196)',
              'rgb(242, 229, 229)'
            ],
          }]
        },
        options: {
          scales: {
              xAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
        }
      });
    </script>

    <script>
      const reasonbar = document.getElementById('chart_reasons');

      new Chart(reasonbar, {
        type: 'horizontalBar',
        data: {
          labels: <?php echo'["' . implode('", "', $viewtable->viewReasonNames()) . '"]' ?>,
          datasets: [{
            label: 'Reasons',
            data: <?php echo '[' . implode(', ', $viewtable->viewReasonTotal()) . ']' ?>,
            backgroundColor: [
              'rgb(255,0,0)',
              'rgb(255,165,0)',
              'rgb(0,128,0)',
              'rgb(0,255,255)',
              'rgb(0,0,255)',
              'rgb(255,192,203)',
              'rgb(176,196,222)',

            ],
          }]
        },
        options: {
          scales: {
              xAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          },
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var el = document.getElementById("wrapper")
      var toggleButton = document.getElementById("menu-toggle")

      toggleButton.onclick = function(){
        el.classList.toggle("toggled")
      }
    </script>
  </body>
</html>
