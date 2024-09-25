<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->SetLineWidth(1);
        $this->Rect(10, 10, 190, 277, 'D');
    }
}

function formatToDdMmYyyy($date) {
    return date('d-m-Y', strtotime($date));
}

$rollno=$_POST['rollno'];
$sname=$_POST['sname'];
$sid=$_POST['sid'];
$pno=$_POST['pno'];
$gno=$_POST['gno'];
$std=$_POST['std'];

$flmin=$_POST['flmin'];
$fltot=$_POST['fltot'];
$flremark=$_POST['flremark'];

$slmin=$_POST['slmin'];
$sltot=$_POST['sltot'];
$slremark=$_POST['slremark'];

$tlmin=$_POST['tlmin'];
$tltot=$_POST['tltot'];
$tlremark=$_POST['tlremark'];

$mlmin=$_POST['mlmin'];
$mltot=$_POST['mltot'];
$mlremark=$_POST['mlremark'];

$elmin=$_POST['elmin'];
$eltot=$_POST['eltot'];
$elremark=$_POST['elremark'];

$dlmin=$_POST['dlmin'];
$dltot=$_POST['dltot'];
$dlremark=$_POST['dlremark'];

$wlmin=$_POST['wlmin'];
$wltot=$_POST['wltot'];
$wlremark=$_POST['wlremark'];

$plmin=$_POST['plmin'];
$pltot=$_POST['pltot'];
$plremark=$_POST['plremark'];

$percentage=$_POST['percentage'];
$remark=$_POST['remark'];
$datetodisplay = $_POST['date'];
$formatteddate= formatToDdMmYyyy($datetodisplay);


// Create instance of PDF class
$pdf = new PDF();
$pdf->AddPage();

// Table header
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 10, 'Anandilal - Ganesh Podar Society',0,1,'C');
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0,10,"Sheth Anandilal Podar Vidyalay , Santacruz(w)",0,1,'C');
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0,10,"Annual Exam Marksheet",0,1,'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0,10,"Academic Year : 2023 - 2024",0,1,'C');

$pdf->Cell(140,10," SCHOOL UDISE NO.: 27230500169",0,0,'L');
$pdf->Cell(25,10," Roll No. ",0,0);
$pdf->Cell(0,10,$rollno,0,1);

$pdf->Cell(45,10," STUDENT NAME : ",0,0,'L');
$pdf->Cell(0,10,$sname,0,1,'L');

$pdf->Cell(35,10," STUDENT ID :",0,0,'L');
$pdf->Cell(0,10,$sid,0,1);

$pdf->Cell(25,10," PEN NO.: ",0,0);
$pdf->Cell(0,10,$pno,0,1);

$pdf->Cell(21,10," G.R.No: ",0,0);
$pdf->Cell(0,10,$gno,0,1);

$pdf->Cell(35,10," STD/Div: 5th / ",0,0);
$pdf->Cell(0,10,$std,0,1);

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(18,10,"Sr.No.",1,0,'C');
$pdf->Cell(78,10,"Subject",1,0,'C');
$pdf->Cell(34,10,"Min.Req Marks",1,0,'C');
$pdf->Cell(38,10,"Marks Out of 50",1,0,'C');
$pdf->Cell(0,10," Remark",1,1,'C');

$pdf->Cell(18,10,"1",1,0,'C');
$pdf->Cell(78,10,"First Language",1,0,'L');
$pdf->Cell(34,10,$flmin,1,0,'C');
$pdf->Cell(38,10,$fltot,1,0,'C');
$pdf->Cell(0,10,$flremark,1,1,'C');

$pdf->Cell(18,10,"2",1,0,'C');
$pdf->Cell(78,10,"Second Language",1,0,'L');
$pdf->Cell(34,10,"$slmin",1,0,'C');
$pdf->Cell(38,10,"$sltot",1,0,'C');
$pdf->Cell(0,10,"$slremark",1,1,'C');

$pdf->Cell(18,10,"3",1,0,'C');
$pdf->Cell(78,10,"Third Language",1,0,'L');
$pdf->Cell(34,10,"$tlmin",1,0,'C');
$pdf->Cell(38,10,"$tltot",1,0,'C');
$pdf->Cell(0,10,"$tlremark",1,1,'C');

$pdf->Cell(18,10,"4",1,0,'C');
$pdf->Cell(78,10,"Maths",1,0,'L');
$pdf->Cell(34,10,"$mlmin",1,0,'C');
$pdf->Cell(38,10,"$mltot",1,0,'C');
$pdf->Cell(0,10,"$mlremark",1,1,'C');

$pdf->Cell(18,10,"5",1,0,'C');
$pdf->Cell(78,10,"E.V.S.(I/II)",1,0,'L');
$pdf->Cell(34,10,"$elmin",1,0,'C');
$pdf->Cell(38,10,"$eltot",1,0,'C');
$pdf->Cell(0,10,"$elremark",1,1,'C');

$pdf->Cell(18,10,"6",1,0,'C');
$pdf->Cell(78,10,"Drawing",1,0,'L');
$pdf->Cell(34,10,"$dlmin",1,0,'C');
$pdf->Cell(38,10,"Grade: $dltot",1,0,'L');
$pdf->Cell(0,10,"$dlremark",1,1,'C');

$pdf->Cell(18,10,"7",1,0,'C');
$pdf->Cell(78,10,"Work Experience(Computer)",1,0,'L');
$pdf->Cell(34,10,"$wlmin",1,0,'C');
$pdf->Cell(38,10,"Grade: $wltot",1,0,'L');
$pdf->Cell(0,10,"$wlremark",1,1,'C');

$pdf->Cell(18,10,"8",1,0,'C');
$pdf->Cell(78,10,"Physical Education",1,0,'L');
$pdf->Cell(34,10,"$plmin",1,0,'C');
$pdf->Cell(38,10,"Grade: $pltot",1,0,'L');
$pdf->Cell(0,10,"$plremark",1,1,'C');

$pdf->Cell(30,10," Percentage : ",0,0,'L');
$pdf->Cell(0,10,"$percentage",0,1,'L');

$pdf->Cell(30,10," Remark : ",0,0,'L');
$pdf->Cell(0,10,"$remark",0,1,'L');

$pdf->Cell(30,10," Result Date :",0,0,'L');
$pdf->Cell(0,10,"$formatteddate",0,1,'L');
$pdf->Cell(0,10,"",0,0,'L');
$pdf->Cell(0,10,"Mr. Ajaykumar Singh ",0,1,'R');
$pdf->Cell(0,10," (Class Teachers Name) ",0,0,'L');
$pdf->Cell(0,10,"(Head Master Name)",0,1,'R');
$pdf->Cell(0,10," Sign:_____________",0,0,'L');
$pdf->Cell(0,10,"Sign:_____________ ",0,1,'R');
$pdf->Cell(0,10,"School Stamp",0,1,'C');


// Output the PDF
$pdf->Output();
?>
