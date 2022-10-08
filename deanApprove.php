<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
approveDepartment();
holdDepartment();
header('Location:dean.php');
?>