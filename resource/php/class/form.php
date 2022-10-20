<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once ('pdfprototype/fpdi/src/autoload.php');
require_once ('pdfprototype/fpdf.php');

class form extends config{
    public $referenceID;

    public function __construct($referenceID){
        $this->referenceID = $referenceID;
    }

    public function downloadClearance(){
        $con = $this->con();
        $sql = "SELECT * FROM `ecle_forms` WHERE `referenceID` = '$this->referenceID'";
        $data= $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $data) {
            $filename="EXIT_CLEARANCE.pdf";

            $pdf = new FPDI();
            $pdf->AddPage();
            $pdf->setSourceFile($filename);
            $template = $pdf->importPage(1);
            $pdf->useTemplate($template);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFont('Helvetica');
            $pdf->SetFontSize(9);

            $pdf->SetXY(27, 40);
            $pdf->Write(0, $data['lname']);
            $pdf->SetXY(50, 40);
            $pdf->Write(0, $data['fname']);
            $pdf->SetXY(93, 40);
            $pdf->Write(0, $data['mname']);
            //$pdf->Image('pdfprototype/signature/signature.png', "122","34", "32","10");
            $pdf->SetXY(168, 40);
            $pdf->Write(0, $data['dateReq']);

            $pdf->SetXY(20, 52);
            $pdf->Write(0, $data['school']);
            $pdf->SetXY(52, 52);
            $pdf->Write(0, $data['studentID']);
            $pdf->SetXY(85, 52);
            $pdf->Write(0, $data['email']);
            $pdf->SetXY(130, 52);
            $pdf->Write(0, $data['contact']);

            $pdf->SetXY(15, 63);
            $pdf->Write(0, $data['course']);
            $pdf->SetXY(88, 63);
            $pdf->Write(0, $data['year']);

            $pdf->Image('pdfprototype/signature/signature.png', "135","70", "50","14");

            // Signature accounting
            $pdf->Image('pdfprototype/signature/signature.png', "135","84", "50","14");

            // Signature Registrar
            $pdf->Image('pdfprototype/signature/signature.png', "135","97", "50","14");
            $pdf->Output('D', "$data[referenceID]
            ");
            header('Location: transferCheck.php');

        }
    }
}
?>