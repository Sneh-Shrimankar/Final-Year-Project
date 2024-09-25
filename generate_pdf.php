<?php
require('fpdf/fpdf.php'); // Assuming you have FPDF library included


class PDF extends FPDF {
    function Header() {
        $this->SetLineWidth(1);
        $this->Rect(10, 10, 190, 277, 'D');
    }
}
// Retrieve input data from query string or session or wherever you're storing it
$input1 = $_POST['input1'];
$input2 = $_POST['input2'];

// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Add content to the PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'PDF Generated with Input Data', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Input 1: $input1", 0, 1);
$pdf->Cell(0, 10, "Input 2: $input2", 0, 1);

// Output the PDF to the browser or save it to a file
$pdf->Output('generated_pdf.pdf', 'D'); // 'D' for download, 'I' for inline display, 'F' for saving to a file

// You can also redirect the user to another page after generating PDF if needed
// header("Location: some_other_page.php");
?>
