<?php

class graduate extends config{
    public $studentNumber, $lname;

    public function __construct($studentNumber, $lname){
        $this->studentNumber = $studentNumber;
        $this->lname = ucwords($lname);
    }

    public function viewGraduate(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `studentID` = '$this->studentNumber' AND `lname` = '$this->lname'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                    <b>Error!</b> Invalid Credentials Inputted!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
        else {
            foreach ($result as $data) {
                if($data['studentType'] === "Transfer"){
                    echo "Please refer to the transfer section of reference checking for transferring students.";
                } else {
                    if($data['registrarclearance'] === "APPROVED" && $data['expiry'] === 'NO'){
                        echo "<h3 class='text-center font-weight-bold'> Student Information </h3>";
                        echo "<div class='table-responsive'>";
                        echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
                        echo "<thead class='thead-dark' style='font-size: large'>";
                        echo "<th>Department</th>";
                        echo "<th>Library</th>";
                        echo "<th>Laboratory</th>";
                        echo "<th>Accounting</th>";
                        echo "<th>Registrar</th>";
                        echo "</thead>";
                        echo "<br>";
                        echo "<p> <strong>First Name:</strong> $data[fname] &emsp;&emsp; <strong>Last Name:</strong> $data[lname] &emsp;&emsp; <strong><br>Course:</strong> $data[course]</p>";
                        echo "<p> <strong>Email:</strong> $data[email]</p>";
                        echo "<tr class='text-white'>";
                        echo "<td style='font-size: x-large'>$data[departmentclearance]</td>";
                        echo "<td style='font-size: x-large'>$data[libraryclearance] </td>";
                        echo "<td style='font-size: x-large'>$data[laboratoryclearance]</td>";
                        echo "<td style='font-size: x-large'>$data[accountingclearance]</td>";
                        echo "<td style='font-size: x-large'>$data[registrarclearance]</td>";
                        echo "<h5><a href='formDownload.php?referenceID=$data[referenceID]'>DOWNLOAD</a> your copy</h5>";
                        echo "</table>";
                        break;
                    }
                    else if($data['expiry'] === 'YES'){
                        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                                <b>Error!</b> Your form has expired due to unattended remarks set, please contact a Techer-In-Charge!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    }
                    else {
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
                        echo "</table>";
                        break;
                    }
                }
            }
        }
        

    }
}
?>