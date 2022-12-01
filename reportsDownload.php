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

//$display_heading = array('id'=>'ID', 'lname'=> 'Last Name', 'fname'=> 'First Name','mname'=> 'Middle Name','semester'=> 'Semester','sy'=> 'School Year','dateReq'=> 'Date Requested','schoolABBR'=> 'Department Abbreviation','studentID'=> 'Student ID','email'=> 'Email Address','contact'=> 'Contact Number', 'bday'=> 'Birthday','courseABBR'=> 'Course Abbreviation','year'=> 'Last Year Enrolled');

$display_heading = array('Student ID','Last Name', 'First Name','Middle Name', 'Semester','School Year', 'Date Requested', 'Department','Contact Number','Birthday','Course','Last Year Enrolled', 'Email Address');

$sql = "SELECT `studentID`,`lname`,`fname`,`mname`,`semester`,`sy`,`dateReq`,`schoolABBR`,`contact`,`bday`,`courseABBR`,`year`,`email` FROM `ecle_forms`";
$result = $conn->query($sql);

//$sql2 = "SHOW columns FROM `ecle_forms`";
//$header = $conn->query($sql2);

$pdf = new FPDF('L', 'mm', 'Legal');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',6.5);

foreach($display_heading as $heading) {
    $pdf->Cell(25,10,$heading,1,'L');
}

foreach($result as $row) {
    if($row['studentID'] === NULL){
    }
    else{
        $pdf->Ln();
        foreach($row as $column){
            $pdf->Cell(25,10,$column,1);
        }
    }
    
}
$pdf->Output('D', "ALL REPORTS.pdf");
?>