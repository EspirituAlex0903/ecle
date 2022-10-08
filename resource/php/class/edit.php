<?php

class edit extends config{
    public $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function approveClearanceAccounting(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `accountingclearance` = 'APPROVED' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceDepartment(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `departmentclearance` = 'APPROVED' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceLibrary(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `libraryclearance` = 'APPROVED' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceLaboratory(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `laboratoryclearance` = 'APPROVED' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function approveClearanceRegistrar(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `registrarclearance` = 'APPROVED' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>