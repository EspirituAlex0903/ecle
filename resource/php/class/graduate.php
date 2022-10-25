<?php

class graduate extends config{
    public $studentNumber, $lname;

    public function __construct($studentNumber, $lname){
        $this->studentNumber = $studentNumber;
        $this->lname = $lname;
    }

    public function viewGraduate(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `studentID` = '$this->studentNumber' AND `lname` = '$this->lname'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data) {
            if($data['studentType'] === "Transfer"){
                echo "Please refer to the transfer section of reference checking for transferring students.";
            } else {
                echo "<h3 class='text-center'> Information of Student </h3>";
                echo "<div class='table-responsive'>";
                echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                echo "<thead class='thead-dark'>";
                echo "<th class='d-none d-sm-table-cell'>Department</th>";
                echo "<th class='d-none d-sm-table-cell'>Library</th>";
                echo "<th class='d-none d-sm-table-cell'>Laboratory</th>";
                echo "<th class='d-none d-sm-table-cell'>Accounting</th>";
                echo "<th class='d-none d-sm-table-cell'>Registrar</th>";
                echo "</thead>";
                echo "<br>";
                echo "<p> <strong>First Name:</strong> $data[fname] &emsp;&emsp; <strong>Last Name:</strong> $data[lname] &emsp;&emsp; <strong>Course:</strong> $data[course]</p>";
                echo "<p> <strong>Email:</strong> $data[email]</p>";
                echo "<tr>";
                echo "<td class='d-none d-sm-table-cell' >$data[departmentclearance]</td>";
                echo "<td class='d-none d-sm-table-cell' >$data[libraryclearance] </td>";
                echo "<td class='d-none d-sm-table-cell' >$data[laboratoryclearance]</td>";
                echo "<td class='d-none d-sm-table-cell' >$data[accountingclearance]</td>";
                echo "<td class='d-none d-sm-table-cell' >$data[registrarclearance]</td>";
                break;
            }
        }
        
    }
}