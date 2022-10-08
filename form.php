<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('pdfprototype/fpdf.php');
require_once('pdfprototype/fpdi/src/autoload.php');

$filename="EXIT_CLEARANCE.pdf";

$lastname = $_POST['lname'];
$firstname = $_POST['fname'];
$middlename = $_POST['mname'];
//$reqDate = $_POST['dateReq'];

$school = $_POST['school'];
$studentID = $_POST['studID'];
$email = $_POST['email'];
$contact = $_POST['contact'];

$course = $_POST['course'];
$year = $_POST['year'];

$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile($filename);
$template = $pdf->importPage(1);
$pdf->useTemplate($template);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(9);

// Row 1
$pdf->SetXY(27, 40);
$pdf->Write(0, $lastname);
$pdf->SetXY(50, 40);
$pdf->Write(0, $firstname);
$pdf->SetXY(93, 40);
$pdf->Write(0, $middlename);
//$pdf->Image('pdfprototype/signature/signature.png', "122","34", "32","10");
$pdf->SetXY(168, 40);
$pdf->Write(0, date("Y-m-d"));

// Row 2
$pdf->SetXY(20, 52);
$pdf->Write(0, $school);
$pdf->SetXY(52, 52);
$pdf->Write(0, $studentID);
$pdf->SetXY(85, 52);
$pdf->Write(0, $email);
$pdf->SetXY(130, 52);
$pdf->Write(0, $contact);

// Row 3
$pdf->SetXY(15, 63);
$pdf->Write(0, $course);
$pdf->SetXY(88, 63);
$pdf->Write(0, $year);


// Signature Dean
$pdf->Image('pdfprototype/signature/signature.png', "135","70", "50","14");

// Signature accounting
$pdf->Image('pdfprototype/signature/signature.png', "135","84", "50","14");

// Signature Registrar
$pdf->Image('pdfprototype/signature/signature.png', "135","97", "50","14");

// Remarks
//$pdf->SetXY(19, 121);
//$pdf->Write(3, $remarks);

//$pdf->Image('signature/signature.png', "135","213", "40","12");
// $pdf->Write(0, date("Y-m-d"));
// $pdf->Output('D');

$pdf->Output('I', "Sample.pdf");
//header('Location: index.php');

?>