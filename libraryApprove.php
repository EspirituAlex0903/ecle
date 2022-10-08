<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ecle/resource/php/class/core/init.php';
approveLibrary();
holdLibrary();
header('Location:library.php');
?>