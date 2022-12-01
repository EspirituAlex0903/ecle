<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';

class import extends config{

    public function insertGraduate(){
        if(isset($_POST['importSubmit'])){
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'text/octet-stream', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain',);

            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

                    fgetcsv($csvFile);

                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        $lname = $line[0];
                        $fname = $line[1];
                        $mname = $line[2];
                        $bday = $line[3];
                        $studentID = $line[4];
                        $email = $line[5];
                        $contact = "0".$line[6];
                        $course = $line[7];
                        $year = $line[8];
                        $studentType = "Graduate";
                        $transnumber = uniqid('Graduate');

                        $config = new config;
                        $con = $config->con();
                        $sql2 = "SELECT `type` FROM `courseschool` WHERE `course` = '$course'";
                        $data2 = $con->prepare($sql2);
                        $data2 ->execute();
                        $schoolType = $data2->fetchColumn();

                        $config = new config;
                        $con = $config->con();
                        $sql5 = "SELECT `department` FROM `courseschool` WHERE `course` = '$course'";
                        $data5 = $con->prepare($sql5);
                        $data5 ->execute();
                        $school = $data5->fetchColumn();

                        $con = $config->con();
                        $sql6 = "SELECT `departmentABBR` FROM `courseschool` WHERE `course` = '$course'";
                        $data6 = $con->prepare($sql6);
                        $data6 ->execute();
                        $schoolABBR = $data6->fetchColumn();

                        $con = $config->con();
                        $sql7 = "SELECT `courseABBR` FROM `courseschool` WHERE `course` = '$course'";
                        $data7 = $con->prepare($sql7);
                        $data7 ->execute();
                        $courseABBR = $data7->fetchColumn();

                        $con = $config->con();
                        $sql3 = "SELECT `semester` FROM `config`";
                        $data3 = $con->prepare($sql3);
                        $data3 ->execute();
                        $semester = $data3->fetchColumn();

                        $con = $config->con();
                        $sql4 = "SELECT `schoolYear` FROM `config`";
                        $data4 = $con->prepare($sql4);
                        $data4 ->execute();
                        $schoolYear = $data4->fetchColumn();

                        if($schoolType === "Science"){
                            $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `semester`, `sy`, `school`, `schoolABBR`, `studentID`, `email`, `contact`, `bday`, `course`, `courseABBR`, `year`, `studentType`, `schoolType`, `referenceID`) VALUES ('$lname', '$fname', '$mname', '$semester', '$schoolYear', '$school', '$schoolABBR', '$studentID', '$email', '$contact', '$bday' '$course', '$courseABBR', '$year', '$studentType', '$schoolType', '$transnumber')";
                            $data1 = $con->prepare($sql1);
                            $data1 ->execute();
                        } else {
                            $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `semester`, `sy`, `school`, `schoolABBR`, `studentID`, `email`, `contact`, `bday`, `course`, `courseABBR`, `year`, `studentType`, `schoolType`, `referenceID`, `laboratoryclearance`, `laboratorydate`) VALUES ('$lname', '$fname', '$mname', '$semester', '$schoolYear', '$school', '$schoolABBR', '$studentID', '$email', '$contact', '$bday', '$course', '$courseABBR', '$year', '$studentType', '$schoolType', '$transnumber', 'NOT REQUIRED', CURRENT_TIMESTAMP)";
                            $data1 = $con->prepare($sql1);
                            $data1 ->execute();
                        }
                    }
                }
                fclose($csvFile);
            }
        }

    }

    

}
?>