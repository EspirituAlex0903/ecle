<?php

class hold extends config{
    public $id, $remarks;

    public function __construct($id=null, $remarks=null){
        $this->id = $id;
        $this->remarks = $remarks;
    }

    public function holdClearanceAccounting(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `accountingclearance` = 'ON HOLD', `accountingremarks` = '$this->remarks', `accountingdate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceDepartment(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `departmentclearance` = 'ON HOLD', `departmentremarks` = '$this->remarks', `departmentdate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceLibrary(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `libraryclearance` = 'ON HOLD', `libraryremarks` = '$this->remarks', `librarydate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceLaboratory(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `laboratoryclearance` = 'ON HOLD', `laboratoryremarks` = '$this->remarks', `laboratorydate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function holdClearanceRegistrar(){
        $con = $this->con();
        $sql = "UPDATE `ecle_forms` SET `registrarclearance` = 'ON HOLD', `registrarremarks` = '$this->remarks', `registrardate` = CURRENT_TIMESTAMP WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>