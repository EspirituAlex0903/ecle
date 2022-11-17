<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{

public function viewRequestTableRegistrarTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='PENDING' AND `libraryclearance`='APPROVED' AND `laboratoryclearance`='APPROVED' AND `departmentclearance`='APPROVED' AND `accountingclearance`='APPROVED' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Registrar (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }
  echo "<td>
          <a href='registrarApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
          <a href='remarksRegistrar.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
          <a href='viewRegistrar.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";


}

public function viewRequestTableRegistrarGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='PENDING' AND `libraryclearance`='APPROVED' AND `laboratoryclearance`='APPROVED' AND `departmentclearance`='APPROVED' AND `accountingclearance`='APPROVED' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Registrar (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
          <a href='registrarApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
          <a href='remarksRegistrar.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
          <a href='viewRegistrar.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableRegistrarTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='APPROVED' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Registrar (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableRegistrarGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='APPROVED' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Registrar (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableAccountingTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='PENDING' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Accounting (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
            <a href='accountingApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
            <a href='remarksAccounting.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
            <a href='viewAccounting.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableAccountingGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='PENDING' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Accounting (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
            <a href='accountingApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
            <a href='remarksAccounting.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
            <a href='viewAccounting.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";
}

public function viewApproveTableAccountingTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='APPROVED' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Accounting (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableAccountingGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='APPROVED' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Accounting (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableDepartmentTransfer(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='PENDING' AND `school` = '$department' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for $department (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
          <a href='deanApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
          <a href='remarksDean.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
          <a href='viewDean.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableDepartmentGraduate(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='PENDING' AND `school` = '$department' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for $department (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
          <a href='deanApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
          <a href='remarksDean.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
          <a href='viewDean.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableDepartmentTransfer(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='APPROVED' AND `school` = '$department' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by $department (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableDepartmentGraduate(){
  $user = new user();
  $department = $user->data()->colleges;
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='APPROVED' AND `school` = '$department' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by $department (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLibraryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='PENDING' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Library (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "<td>
            <a href='libraryApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
            <a href='remarksLibrary.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
            <a href='viewLibrary.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLibraryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='PENDING' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Library (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
            <a href='libraryApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
            <a href='remarksLibrary.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
            <a href='viewLibrary.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLibraryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='APPROVED' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Library (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLibraryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='APPROVED' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Library (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLaboratoryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `Laboratoryclearance`='PENDING' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Laboratory (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
            <a href='laboratoryApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
            <a href='remarksLaboratory.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
            <a href='viewLaboratory.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLaboratoryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `Laboratoryclearance`='PENDING' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Laboratory (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "<th>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "<td>
            <a href='laboratoryApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-3.5'>Approve</a>
            <a href='remarksLaboratory.php?hold=$data[id]' class='btn btn-warning btn-sm col-3.5'>On Hold</a>
            <a href='viewLaboratory.php?id=$data[id]' class='btn btn-primary btn-sm col-3.5'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLaboratoryTransfer(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `laboratoryclearance`='APPROVED' AND `studentType` = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Laboratory (Transfers)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }


  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLaboratoryGraduate(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `laboratoryclearance`='APPROVED' AND `studentType` = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Laboratory (Graduates)</h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th>Student Type</th>";
  echo "<th>School Type</th>";
  echo "<th>Library</th>";
  echo "<th>Laboratory</th>";
  echo "<th>Department</th>";
  echo "<th>Accounting</th>";
  echo "<th>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
  echo "<tr>";
  echo "<td>$data[fname] $data[mname] $data[lname] </td>";
  echo "<td>$data[course]</td>";
  echo "<td>$data[studentType]</td>";
  echo "<td>$data[schoolType]</td>";
  if($data["libraryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }
  if($data["laboratoryclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[laboratoryclearance]</p></td>";
  }
  if($data["departmentclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[departmentclearance]</p></td>";
  }
  if($data["accountingclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[accountingclearance]</p></td>";
  }
  if($data["registrarclearance"] === "PENDING"){
    echo "<td><p class='bg-info rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }elseif($data["libraryclearance"] === "ON HOLD"){
    echo "<td><p class='bg-warning rounded-pill p-1'>$data[libraryclearance]</p></td>";
  }else {
    echo "<td><p class='bg-success rounded-pill p-1'>$data[registrarclearance]</p></td>";
  }

  echo "</tr>";
  }
  echo "</table>";

}

public function viewTotalTransfers(){
  $con = $this->con();
  $sql = "SELECT COUNT(studentType) FROM `ecle_forms` WHERE studentType = 'Transfer'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTotalGraduates(){
  $con = $this->con();
  $sql = "SELECT COUNT(studentType) FROM `ecle_forms` WHERE studentType = 'Graduate'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTotalScience(){
  $con = $this->con();
  $sql = "SELECT COUNT(studentType) FROM `ecle_forms` WHERE schoolType = 'Science'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}

public function viewTotalNonScience(){
  $con = $this->con();
  $sql = "SELECT COUNT(studentType) FROM `ecle_forms` WHERE schoolType = 'Non-Science'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchColumn();
  return $result;
}
}
