<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/vendor/sendmailAccounts.php';

class sendMail extends config{

    public $student;

    public function sendLibrary(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `libraryclearance` = 'PENDING'";
        $data = $con->prepare($sql);
        $data->execute();
        $arr = array();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $arr[] = $row['lname'].", ".$row['fname']." ".$row['mname'];
        }

        $sql2 = "SELECT * FROM `tbl_accounts` WHERE `groups` = 6";
        $data2 = $con->prepare($sql2);
        $data2->execute();
        $result2 = $data2->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $row2){
            $email = $row2['email'];
            $username = $row2['username'];
        }
        //sendmailAccounts($email, $username, $arr);
    }

    public function sendDean(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `departmentclearance` = 'PENDING'";
        $data = $con->prepare($sql);
        $data->execute();
        $arr = array();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $arr[] = $row['lname'].", ".$row['fname']." ".$row['mname'];
        }

        $sql2 = "SELECT * FROM `tbl_accounts` WHERE `groups` = 3";
        $data2 = $con->prepare($sql2);
        $data2->execute();
        $emails = array();
        $usernames = array();
        $result2 = $data2->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $row2){
            $emails[] = $row2['email'];
            $usernames[] = $row2['colleges'];
        }
        sendmailAccountsDean($emails, $usernames, $arr);
    }

    public function sendAccounting(){
        $config = new config;
        $con = $config->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `accountingclearance` = 'PENDING'";
        $data = $con->prepare($sql);
        $data->execute();
        $arr = array();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $arr[] = $row['lname'].", ".$row['fname']." ".$row['mname'];
        }

        $sql2 = "SELECT * FROM `tbl_accounts` WHERE `groups` = 4";
        $data2 = $con->prepare($sql2);
        $data2->execute();
        $result2 = $data2->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $row2){
            $email = $row2['email'];
            $username = $row2['username'];
        }
        //sendmailAccounts($email, $username, $arr);
    }
}

?>