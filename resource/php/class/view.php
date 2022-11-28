<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
require_once 'config.php';

class view extends config{

        public function collegeSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `collegeschool` WHERE `state` = 'active'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->college_school.'." value="'.$row->college_school.'">'.$row->college_school.'</option>';
                  echo 'success';
                }
        }

        public function courseSP2(){
            $config = new config;
            $con = $config->con();
            $sql = "SELECT * FROM `courseschool` WHERE `status` = 'active'";
            $data = $con-> prepare($sql);
            $data ->execute();
            $rows =$data-> fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $row) {
                  echo '<option data-tokens=".'.$row->course.'." value="'.$row->course.'">'.$row->course.'</option>';
                  echo 'success';
                }
        }

        public function semesterChoose(){
          echo '<option>Choose Semester</option>';
          echo '<option data-tokens="1" value="1">1</option>';
          echo '<option data-tokens="2" value="2">2</option>';
          echo '<option data-tokens="Summer" value="Summer">Summer</option>';
        }

        public function university(){
          $config = new config;
          $con = $config->con();
          $sql = "SELECT * FROM `university`";
          $data = $con-> prepare($sql);
          $data ->execute();
          $rows =$data-> fetchAll(PDO::FETCH_OBJ);
              foreach ($rows as $row) {
                echo '<option data-tokens=".'.$row->university.'." value="'.$row->university.'">'.$row->university.'</option>';
                echo 'success';
              }
      }

        public function reason(){
          echo '<option data-tokens="Continuation of Study" value="Continuation of Study">Continuation of Study</option>';
          echo '<option data-tokens="Financial Problem" value="Financial Problem">Financial Problem</option>';
          echo '<option data-tokens="Change of Major" value="Change of Major">Change of Major</option>';
          echo '<option data-tokens="Family Issues" value="Family Issues">Family Issues</option>';
          echo '<option data-tokens="Change of Residence" value="Change of Residence">Change of Residence</option>';
          echo '<option data-tokens="University Quality Concern" value="University Quality Concern">University Quality Concern</option>';
          echo '<option data-tokens="International Transfer" value="International Transfer">International Transfer</option>';
          echo '<option data-tokens="Others" value="Others">Others</option>';

        }

        public function getdpSRA(){
            $user = new user();
            return $user->data()->dp;
        }

        public function getMmSRA(){
            $user = new user();
             return $user->data()->mm;
        }

}
