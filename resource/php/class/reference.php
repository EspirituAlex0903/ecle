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
            if($data['libraryclearance'] === 'PENDING' || $data['laboratoryclearance'] === 'PENDING' || $data['departmentclearance'] === 'PENDING' || $data['accountingclearance'] === 'PENDING' || $data['registrarclearance'] === 'PENDING'){
                echo "<h4 >The current status for $data[fname] $data[mname] $data[lname] with transaction number $data[referenceID], is still being reviewed.</h4>";
            }else if($data['libraryclearance'] === 'APPROVED' && $data['laboratoryclearance'] === 'APPROVED' && $data['departmentclearance'] === 'APPROVED' && $data['accountingclearance'] === 'APPROVED' && $data['registrarclearance'] === 'APPROVED'){
                echo "<h4>The current status for $data[fname] $data[mname] $data[lname] with transaction number $data[referenceID], has been finished reviewing and will be supplied soon.</h4>";
            }
        }
    }
}
