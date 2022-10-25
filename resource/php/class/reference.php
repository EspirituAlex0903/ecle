<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/vendor/sendmail.php';

class reference extends config{

    public $transnumber;
    
    function __construct($transnumber=null){
        $this->transnumber=$transnumber;
    }

    public function referenceCheck(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `referenceID` = '$this->transnumber'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $data) {
            if($data['studentType'] === "Transfer"){
                if($data['libraryclearance'] === 'PENDING' || $data['laboratoryclearance'] === 'PENDING' || $data['departmentclearance'] === 'PENDING' || $data['accountingclearance'] === 'PENDING' || $data['registrarclearance'] === 'PENDING'){
                    echo "<h5>The current status for $data[fname] $data[mname] $data[lname] with transaction number $data[referenceID], is still being reviewed.</h5>";
                }else if($data['libraryclearance'] === 'APPROVED' && $data['laboratoryclearance'] === 'APPROVED' && $data['departmentclearance'] === 'APPROVED' && $data['accountingclearance'] === 'APPROVED' && $data['registrarclearance'] === 'APPROVED'){
                    echo "<h5>The current status for $data[fname] $data[mname] $data[lname] with transaction number $data[referenceID], has been finished reviewing, <a href='formDownload.php?referenceID=$data[referenceID]'>download your copy here.</a></h5>";
                }
            } else {
                echo "<h5>Please refer to the graduate section of reference checking for graduating students.</h5>";
            }
        }
    }
}
