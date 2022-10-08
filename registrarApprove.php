<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
approveRegistrar();
holdRegistrar();
header('Location:registrar.php');
?>