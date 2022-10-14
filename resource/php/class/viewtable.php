<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{

public function viewRequestTableRegistrar(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='PENDING' AND `libraryclearance`='APPROVED' AND `laboratoryclearance`='APPROVED' AND `departmentclearance`='APPROVED' AND `accountingclearance`='APPROVED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Registrar </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "<th style='font-size: 85%;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }if($data['studentType'] === '1'){
      $studentType = "Graduate";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }if($data['schoolType'] === '2'){
      $schoolType = "Science";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";

  echo "<td>
            <a href='registrarApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-12 mt-1'>Approve</a>
            <a href='remarksRegistrar.php?hold=$data[id]' class='btn btn-warning btn-sm col-lg-12 mt-1'>On Hold</a>
            <a href='viewRegistrar.php?id=$data[id]' class='btn btn-primary btn-sm col-lg-12 mt-1'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableRegistrar(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `registrarclearance`='APPROVED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Registrar </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '2'){
      $schoolType = "Non-Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableAccounting(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Accounting </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "<th style='font-size: 85%;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '2'){
      $schoolType = "Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";

  echo "<td>
            <a href='accountingApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-12 mt-1'>Approve</a>
            <a href='remarksAccounting.php?hold=$data[id]' class='btn btn-warning btn-sm col-lg-12 mt-1'>On Hold</a>
            <a href='viewAccounting.php?id=$data[id]' class='btn btn-primary btn-sm col-lg-12 mt-1'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableAccounting(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance`='APPROVED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Accounting </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '2'){
      $schoolType = "Non-Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableDepartment(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Department </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "<th style='font-size: 85%;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '0'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '0'){
      $schoolType = "Non-Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";

  echo "<td>
            <a href='deanApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-12 mt-1'>Approve</a>
            <a href='remarksDean.php?hold=$data[id]' class='btn btn-warning btn-sm col-lg-12 mt-1'>On Hold</a>
            <a href='viewDean.php?id=$data[id]' class='btn btn-primary btn-sm col-lg-12 mt-1'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableDepartment(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance`='APPROVED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Department </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '2'){
      $schoolType = "Non-Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLibrary(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Library </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "<th style='font-size: 85%;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }if($data['schoolType'] === '2'){
      $schoolType = "Science";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";

  echo "<td>
            <a href='libraryApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-12 mt-1'>Approve</a>
            <a href='remarksLibrary.php?hold=$data[id].php?hold=$data[id]' class='btn btn-warning btn-sm col-lg-12 mt-1'>On Hold</a>
            <a href='viewLibrary.php?id=$data[id]' class='btn btn-primary btn-sm col-lg-12 mt-1'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLibrary(){ 
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance`='APPROVED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Library </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '2'){
      $schoolType = "Non-Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";


  echo "</tr>";
  }
  echo "</table>";

}

public function viewRequestTableLaboratory(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `Laboratoryclearance`='PENDING'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Pending for Laboratory </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "<th style='font-size: 85%;'>Actions</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }if($data['schoolType'] === '2'){
      $schoolType = "Science";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";

  echo "<td>
            <a href='laboratoryApprove.php?edit=$data[id]' class='btn btn-success btn-sm col-12 mt-1'>Approve</a>
            <a href='remarksLaboratory.php?hold=$data[id].php?hold=$data[id]' class='btn btn-warning btn-sm col-lg-12 mt-1'>On Hold</a>
            <a href='viewLaboratory.php?id=$data[id]' class='btn btn-primary btn-sm col-lg-12 mt-1'>View Info</a>
        </td>";
  echo "</tr>";
  }
  echo "</table>";

}

public function viewApproveTableLaboratory(){
  $con = $this->con();
  $sql = "SELECT * FROM `ecle_forms` WHERE `laboratoryclearance`='APPROVED'";
  $data= $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);
  echo "<h3 class='text-center'> Approved by Laboratory </h3>";
  echo "<div class='table-responsive'>";
  echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
  echo "<thead class='thead-dark'>";
  echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
  echo "<th>Course</th>";
  echo "<th class='d-none d-sm-table-cell'>Student Type</th>";
  echo "<th class='d-none d-sm-table-cell'>School Type</th>";
  echo "<th class='d-none d-sm-table-cell'>Library</th>";
  echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
  echo "<th class='d-none d-sm-table-cell'>Department</th>";
  echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
  echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
  echo "</thead>";
  foreach ($result as $data) {
    if($data['studentType'] === '1') {
      $studentType = "Transfer";
    }else if($data['studentType'] === '2'){
      $studentType = "Graduate";
    }else{
      $studentType = "Undefined";
    }

    if($data['schoolType'] === '1') {
      $schoolType = "Science";
    }else if($data['schoolType'] === '2'){
      $schoolType = "Non-Science";
    }else{
      $schoolType = "Undefined";
    }
  echo "<tr>";
  echo "<td class='d-none d-sm-table-cell' >$data[fname] $data[mname] $data[lname] </td>";
  echo "<td class='d-none d-sm-table-cell' >$data[course]</td>";
  echo "<td class='d-none d-sm-table-cell' >$studentType</td>";
  echo "<td class='d-none d-sm-table-cell' >$schoolType</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
  echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";


  echo "</tr>";
  }
  echo "</table>";

}


}
