<?php

class info extends config{
    public $id,$_data;

    public function __construct($id){
        $this->id = $id;
    }

    public function infoAccounting(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> Information of Student </h3>";
        echo "<div class='table-responsive'>";
        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
        echo "<thead class='thead-dark'>";
        echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
        echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
        echo "<th class='d-none d-sm-table-cell'>Course</th>";
        echo "<th class='d-none d-sm-table-cell'>E-Mail</th>";
        echo "<th class='d-none d-sm-table-cell'>Contact</th>";
        echo "</thead>";
        foreach ($result as $data) {
        echo "<tr>";
        echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
        echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[email]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[contact]</td>";

        }
      }
    public function infoLibrary(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> Information of Student </h3>";
        echo "<div class='table-responsive'>";
        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
        echo "<thead class='thead-dark'>";
        echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
        echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
        echo "<th class='d-none d-sm-table-cell'>Course</th>";
        echo "<th class='d-none d-sm-table-cell'>E-Mail</th>";
        echo "<th class='d-none d-sm-table-cell'>Contact</th>";
        echo "</thead>";
        foreach ($result as $data) {
        echo "<tr>";
        echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
        echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[email]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[contact]</td>";

        }
      }
    public function infoLaboratory(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> Information of Student </h3>";
        echo "<div class='table-responsive'>";
        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
        echo "<thead class='thead-dark'>";
        echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
        echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
        echo "<th class='d-none d-sm-table-cell'>Course</th>";
        echo "<th class='d-none d-sm-table-cell'>E-Mail</th>";
        echo "<th class='d-none d-sm-table-cell'>Contact</th>";
        echo "</thead>";
        foreach ($result as $data) {
        echo "<tr>";
        echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
        echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[email]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[contact]</td>";

        }
      }
    public function infoRegistrar(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> Information of Student </h3>";
        echo "<div class='table-responsive'>";
        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
        echo "<thead class='thead-dark'>";
        echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
        echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
        echo "<th class='d-none d-sm-table-cell'>Course</th>";
        echo "<th class='d-none d-sm-table-cell'>E-Mail</th>";
        echo "<th class='d-none d-sm-table-cell'>Contact</th>";
        echo "</thead>";
        foreach ($result as $data) {
        echo "<tr>";
        echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
        echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[email]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[contact]</td>";

        }
      }
    public function infoDean(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class='text-center'> Information of Student </h3>";
        echo "<div class='table-responsive'>";
        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
        echo "<thead class='thead-dark'>";
        echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
        echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
        echo "<th class='d-none d-sm-table-cell'>Course</th>";
        echo "<th class='d-none d-sm-table-cell'>E-Mail</th>";
        echo "<th class='d-none d-sm-table-cell'>Contact</th>";
        echo "</thead>";
        foreach ($result as $data) {
        echo "<tr>";
        echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
        echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[email]</td>";
        echo "<td class='d-none d-sm-table-cell' >$data[contact]</td>";

        }
      }
    
  }

?>
