<?php

class hold extends config{
    public $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function holdClearanceAccounting(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `accountingclearance` = 'ON HOLD' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceDepartment(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `departmentclearance` = 'ON HOLD' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceLibrary(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `libraryclearance` = 'ON HOLD' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceLaboratory(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `laboratoryclearance` = 'ON HOLD' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceRegistrar(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `registrarclearance` = 'ON HOLD' WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>