<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/vendor/sendmailTransfer.php';

class insert extends config{

    public $fname,$lname,$mname,$studID,$email,$contact,$course,$year;
    
    function __construct($fname=null,$lname=null,$mname=null,$studID=null,$email=null,$contact=null,$course=null,$year=null, $campus=null, $university=null, $reason=null){

    $this->fname =$fname;
    $this->lname =$lname;
    $this->mname =$mname;
    $this->studID =$studID;
    $this->email =$email;
    $this->contact =$contact;
    $this->course =$course;
    $this->year =$year;
    $this->campus = $campus;
    $this->university = $university;
    $this->reason = $reason;
    }

    public function insertApplication(){
        $transnumber = uniqid('Transfer');
        $studentType = "Transfer";
        $config = new config;

        $con = $config->con();
        $sql2 = "SELECT `type` FROM `courseschool` WHERE `course` = '$this->course'";
        $data2 = $con->prepare($sql2);
        $data2 ->execute();
        $schoolType = $data2->fetchColumn();

        $con = $config->con();
        $sql3 = "SELECT `department` FROM `courseschool` WHERE `course` = '$this->course'";
        $data3 = $con->prepare($sql3);
        $data3 ->execute();
        $school = $data3->fetchColumn();

        $con = $config->con();
        $sql4 = "SELECT `semester` FROM `config`";
        $data4 = $con->prepare($sql4);
        $data4 ->execute();
        $semester = $data4->fetchColumn();

        $con = $config->con();
        $sql5 = "SELECT `schoolYear` FROM `config`";
        $data5 = $con->prepare($sql5);
        $data5 ->execute();
        $schoolYear = $data5->fetchColumn();

        if ($schoolType === "Science"){
            $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `semester`, `sy`, `school`, `studentID`, `email`, `contact`, `course`, `year`,`campus`, `transferredSchool`, `reason`, `studentType`, `schoolType`, `referenceID`) VALUES ('$this->lname', '$this->fname', '$this->mname', '$semester', '$schoolYear', '$school', '$this->studID', '$this->email', '$this->contact', '$this->course', '$this->year','$this->campus', '$this->university', '$this->reason', '$studentType', '$schoolType', '$transnumber')";
            $data1 = $con->prepare($sql1);
            $data1 ->execute();
        } else {
            $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `semester`, `sy`, `school`, `studentID`, `email`, `contact`, `course`, `year`,`campus`, `transferredSchool`, `reason`, `studentType`, `schoolType`, `referenceID`, `laboratoryclearance`, `laboratorydate`) VALUES ('$this->lname', '$this->fname', '$this->mname', '$semester', '$schoolYear', '$school', '$this->studID', '$this->email', '$this->contact', '$this->course', '$this->year','$this->campus', '$this->university', '$this->reason', '$studentType', '$schoolType', '$transnumber', 'NOT REQUIRED', CURRENT_TIMESTAMP)";
            $data1 = $con->prepare($sql1);
            $data1 ->execute();
        }

        sendReferenceMail($this->lname, $this->fname, $this->mname, $transnumber, $this->email);
        header('Location:transfer.php');

    }

    

}
?>