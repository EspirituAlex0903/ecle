<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once ('pdfprototype/fpdi/src/autoload.php');
require_once ('pdfprototype/fpdf.php');

$localhost = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "ecle";

$conn = new mysqli($localhost, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Reports.csv');

$sql = "SELECT * FROM `ecle_forms`";
$result = $conn->query($sql);

$sql2 = "SHOW columns FROM `ecle_forms`";
$header = $conn->query($sql2);
$heads[] = array();

$output = fopen('php://output', 'w');
foreach($header as $head){
    $heads[] = $head['Field'];
}
unset($heads[0]);
fputcsv($output, $heads);

foreach($result as $row){
    fputcsv($output, $row);
}


?>