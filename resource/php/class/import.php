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
                        $school = $line[3];
                        $studentID = $line[4];
                        $email = $line[5];
                        $contact = $line[6];
                        $course = $line[7];
                        $year = $line[8];
                        $studentType = "Graduate";
                        $transnumber = uniqid('Graduate');

                        $config = new config;
                        $con = $config->con();
                        $sql2 = "SELECT type FROM `courseschool` WHERE `course` = '$course'";
                        $data2 = $con->prepare($sql2);
                        $data2 ->execute();
                        $schoolType = $data2->fetchColumn();

                        $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `school`, `studentID`, `email`, `contact`, `course`, `year`, `studentType`, `schoolType`, `referenceID`) VALUES ('$lname', '$fname', '$mname', '$school', '$studentID', '$email', '$contact', '$course', '$year', '$studentType', '$schoolType', '$transnumber')";
                        $data1 = $con->prepare($sql1);
                        $data1 ->execute();

                    }
                }
                fclose($csvFile);
            }
        }

    }

    

}
