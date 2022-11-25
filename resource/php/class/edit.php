<?php

class edit extends config{
    public $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function approveClearanceAccounting(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `accountingclearance` = 'APPROVED', `accountingremarks` = '', `accountingdate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceDepartment(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `departmentclearance` = 'APPROVED', `departmentremarks` = '', `departmentdate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceLibrary(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `libraryclearance` = 'APPROVED', `libraryremarks` = '', `librarydate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceLaboratory(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `laboratoryclearance` = 'APPROVED', `laboratoryremarks` = '', `laboratorydate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceRegistrar(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `registrarclearance` = 'APPROVED', `registrarremarks` = '', `registrardate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>