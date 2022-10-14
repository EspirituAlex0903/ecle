<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/vendor/sendmail.php';

class insert extends config{

    public $fname,$lname,$mname,$school,$studID,$email,$contact,$course,$year;
    
    function __construct($fname=null,$lname=null,$mname=null,$school=null,$studID=null,$email=null,$contact=null,$course=null,$year=null){

    $this->fname =$fname;
    $this->lname =$lname;
    $this->mname =$mname;
    $this->school =$school;
    $this->studID =$studID;
    $this->email =$email;
    $this->contact =$contact;
    $this->course =$course;
    $this->year =$year;
    }

    public function insertApplication(){
        $transnumber = uniqid('ceuTrans');
        $config = new config;
        $con = $config->con();
        $sql1 = "INSERT INTO `ecle_forms`(`lname`, `fname`, `mname`, `school`, `studentID`, `email`, `contact`, `course`, `year`, `studentType`, `referenceID`) VALUES ('$this->lname', '$this->fname', '$this->mname', '$this->school', '$this->studID', '$this->email', '$this->contact', '$this->course', '$this->year', 1, '$transnumber')";
        $data1 = $con->prepare($sql1);
        $data1 ->execute();

        //sendReferenceMail($this->lname, $this->fname, $this->mname, $transnumber, $this->email);
        header('Location:transfer.php');

    }

    

}
