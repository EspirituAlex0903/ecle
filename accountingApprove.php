<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
approveAccounting();
holdAccounting();
header('Location:accounting.php');
?>