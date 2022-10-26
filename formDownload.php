<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once ('pdfprototype/fpdi/src/autoload.php');
require_once ('pdfprototype/fpdf.php');

$localhost = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "ecle";
$referenceID = $_GET['referenceID'];

$conn = new mysqli($localhost, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `ecle_forms` WHERE `referenceID` = '$referenceID'";
$result = $conn->query($sql);

while($data = $result->fetch_assoc()) {
    $filename="EXIT_CLEARANCE.pdf";
    $college = $data['school'];
    $course = $data['course'];

    $pdf = new FPDI();
    $pdf->AddPage();
    $pdf->setSourceFile($filename);
    $template = $pdf->importPage(1);
    $pdf->useTemplate($template);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Helvetica');
    $pdf->SetFontSize(7);

    $pdf->SetXY(27, 40);
    $pdf->Write(0, $data['lname']);
    $pdf->SetXY(54, 40);
    $pdf->Write(0, $data['fname']);
    $pdf->SetXY(93, 40);
    $pdf->Write(0, $data['mname']);
    $pdf->SetXY(132, 40);
    $pdf->Write(0, substr($data['fname'],0,1).substr($data['mname'],0,1).substr($data['lname'],0,1)."(SGD)");
    $pdf->SetXY(170, 40);
    $pdf->Write(0, date('Y-m-d',strtotime($data['dateReq'])));

    $pdf->SetXY(12, 49);
    $pdf->MultiCell(34,2,$college,0,"L");
    $pdf->SetXY(52, 52);
    $pdf->Write(0, $data['studentID']);
    $pdf->SetXY(85, 52);
    $pdf->Write(0, $data['email']);
    $pdf->SetXY(130, 52);
    $pdf->Write(0, $data['contact']);

    $pdf->SetXY(13, 61);
    $pdf->MultiCell(65,2,$course,0,"L");
    $pdf->SetXY(88, 63);
    $pdf->Write(0, $data['year']);

    $pdf->Image('pdfprototype/signature/signature.png', "135","70", "50","14");

    // Signature accounting
    $pdf->Image('pdfprototype/signature/signature.png', "135","84", "50","14");

    // Signature Registrar
    $pdf->Image('pdfprototype/signature/signature.png', "135","97", "50","14");
    $pdf->Output('I', "EXIT_CLEARANCE_$data[lname] $data[fname].pdf");
}

?>