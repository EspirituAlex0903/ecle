<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';

class reference extends config{

    public $transnumber;
    
    function __construct($transnumber=null){
        $this->transnumber=ucfirst($transnumber);
    }

    public function referenceCheck(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `referenceID` = '$this->transnumber'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            echo "<h4>Invalid reference number inputted!</h4>";
        }
        else {
            foreach ($result as $data) {
                if($data['studentType'] === "Transfer"){
                    if($data['libraryclearance'] === 'PENDING' && $data['laboratoryclearance'] === 'PENDING' && $data['departmentclearance'] === 'PENDING' && $data['accountingclearance'] === 'PENDING' && $data['registrarclearance'] === 'PENDING'){
                        echo "<h5>The current status for <h5 class='data'>$data[fname] $data[mname] $data[lname]</h5> <h5>with transaction number <h5 class='data'>$data[referenceID]</h5>, <h5>is still being reviewed.</h5>";
                    }else if($data['libraryclearance'] === 'APPROVED' && $data['laboratoryclearance'] === 'APPROVED' && $data['departmentclearance'] === 'APPROVED' && $data['accountingclearance'] === 'APPROVED' && $data['registrarclearance'] === 'APPROVED'){
                        echo "<h5>The current status for <h5 class='data'>$data[fname] $data[mname] $data[lname]</h5> <h5>with transaction number <h5 class='data'>$data[referenceID]</h5>, <h5>has been finished reviewing, <a href='formDownload.php?referenceID=$data[referenceID]'>download</a> your copy.</h5>";
                    }
                    else{
                        echo "<h3 class='text-center font-weight-bold'> Student Information </h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                        echo "<thead class='thead-dark'>";
                        echo "<th>Department</th>";
                        echo "<th>Library</th>";
                        echo "<th>Laboratory</th>";
                        echo "<th>Accounting</th>";
                        echo "<th>Registrar</th>";
                        echo "</thead>";
                        echo "<br>";
                        echo "<p> <strong>First Name:</strong> $data[fname] &emsp;&emsp; <strong>Last Name:</strong> $data[lname] &emsp;&emsp; <strong>Course:</strong> $data[course]</p>";
                        echo "<p> <strong>Email:</strong> $data[email]</p>";
                        echo "<tr class='text-white'>";
                        echo "<td style='font-size: x-large'>$data[departmentclearance]</td>";
                        echo "<td style='font-size: x-large'>$data[libraryclearance] </td>";
                        echo "<td style='font-size: x-large'>$data[laboratoryclearance]</td>";
                        echo "<td style='font-size: x-large'>$data[accountingclearance]</td>";
                        echo "<td style='font-size: x-large'>$data[registrarclearance]</td>";
                    }
                } else {
                    echo "<h4>Please refer to the graduate section of reference checking for graduating students.</h4>";
                }
            }
        }
    }
}
?>