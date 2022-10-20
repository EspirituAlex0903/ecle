<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/vendor/sendmail.php';

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
                        $studentID = $line[3];
                        $email = $line[4];
                        $contact = $line[5];
                        $course = $line[6];
                        $year = $line[7];
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
                            $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `semester`, `sy`, `school`, `studentID`, `email`, `contact`, `course`, `year`, `studentType`, `schoolType`, `referenceID`) VALUES ('$lname', '$fname', '$mname', '$semester', '$schoolYear', '$school', '$studentID', '$email', '$contact', '$course', '$year', '$studentType', '$schoolType', '$transnumber')";
                            $data1 = $con->prepare($sql1);
                            $data1 ->execute();
                        } else {
                            $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `semester`, `sy`, `school`, `studentID`, `email`, `contact`, `course`, `year`, `studentType`, `schoolType`, `referenceID`, `laboratoryclearance`, `laboratorydate`) VALUES ('$lname', '$fname', '$mname', '$semester', '$schoolYear', '$school', '$studentID', '$email', '$contact', '$course', '$year', '$studentType', '$schoolType', '$transnumber', 'APPROVED', CURRENT_TIMESTAMP)";
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
