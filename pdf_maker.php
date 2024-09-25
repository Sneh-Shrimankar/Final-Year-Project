<?php                
require 'database_connection.php'; 
require_once 'vendor/autoload.php';

$MST_ID=$_GET['id'];

$inv_mst_query = "SELECT T1.id,T1.Roll_No,T1.Stu_Name,T1.Stu_ID,T1.PEN_No,T1.GR_No,T1.Division,T1.FLT,T1.FLMIN,T1.FLR,T1.SLT,T1.SLMIN,T1.SLR,T1.TLT,T1.TLMIN,T1.TLR,T1.MathTot,
T1.MathMin,T1.MathRe,T1.EVSTot,T1.EVSMin,T1.EVSRe,T1.DrawG,T1.DrawMin,T1.DrawRe,T1.WEG,T1.WEMin,T1.WERe,T1.PEG,T1.PEMin,T1.PERe,T1.Percen,T1.ReDate,T1.Remark FROM 5_std_data T1 WHERE T1.id='".$MST_ID."' ";             
$inv_mst_results = mysqli_query($con,$inv_mst_query);   
$count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
    $pdf->SetDrawColor(0, 0, 0); // RGB

    // Set border width
    $pdf->SetLineWidth(0.5); // in mm

    // Draw border around the entire page
    $pdf->Rect(5, 5, 200, 287, 'D');

	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	

<style>
  body {
    font-family: Arial, sans-serif;
  }
  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  .header {
    text-align: center;
  }
  .title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .subtitle {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .info {
    margin-bottom: 10px;
  }

  h4 {text-align: center;}
  h1 {text-align: center;}
  h2 {text-align: center;}
  h3 {text-align: center;}

  th{
    text-align: center; 
  }

</style>
</head>
<body>
    <h4><center>Anandilal - Ganesh Podar Society</center></h4>
    <h1>Sheth Anandilal Podar Vidyalay , Santacruz(w)</h1>
    <h2>Annual Exam Marksheet</h2>
    <h3>Academic Year: 2023-2024</h3>
    <table border="0">
     <tr>
      <td align="left">SCHOOL UDISE NO.: 27230500169</td>
      <td align="center">Roll No.: '.$inv_mst_data_row['Roll_No'].'</td>
    </tr>
    </table>

    <p>Student Name: '.$inv_mst_data_row['Stu_Name'].'</p>
    <p>Student ID: '.$inv_mst_data_row['Roll_No'].'</p>
    <p>PEN No.: '.$inv_mst_data_row['GR_No'].'</p>
    <p>G.R. No.: '.$inv_mst_data_row['Stu_ID'].'</p>
    <p>STD/Div: 5th / '.$inv_mst_data_row['Division'].'</p>
  
  <table border="0.5">
    <thead>
      <tr>
        <th>Sr.No.</th>
        <th>Subject</th>
        <th>Min. Req Marks</th>
        <th>Marks Out of 50</th>
        <th>Remark</th>
      </tr>
    </thead>
    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>1</td>
        <td> First Language</td>
        <td>  '.$inv_mst_data_row['FLMIN'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>2</td>
        <td> Second Language</td>
        <td>  '.$inv_mst_data_row['SLMIN'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>3</td>
        <td> Third Language</td>
        <td>  '.$inv_mst_data_row['TLMIN'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>4</td>
        <td> Maths</td>
        <td>  '.$inv_mst_data_row['MathMin'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>5</td>
        <td> EVS(I&II)</td>
        <td>  '.$inv_mst_data_row['EVSMin'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>6</td>
        <td> Drawing</td>
        <td>  '.$inv_mst_data_row['DrawMin'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td>7</td>
        <td> WE(Computer)</td>
        <td>  '.$inv_mst_data_row['WEMin'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

    <tbody>
      <!-- Repeat for each subject -->
      <tr>
        <td >8</td>
        <td > Phy.Education</td>
        <td>  '.$inv_mst_data_row['PEMin'].'</td>
        <td>     '.$inv_mst_data_row['FLT'].'</td>
        <td>     '.$inv_mst_data_row['FLR'].'</td>
      </tr>
      <!-- Repeat for other subjects -->
    </tbody>

  </table>
  <div class="info">
    <p><b>Percentage: '.$inv_mst_data_row['Percen'].'</b></p>
    <p><b>Remark: '.$inv_mst_data_row['Remark'].'</b></p>
    <p><b>Result Date: '.$inv_mst_data_row['ReDate'].'</b></p>
    <br>
    <br>
    <table border="0">
    <tr>
     <td align="left"></td>
     <td align="right">Mr. Ajaykumar Singh</td>
   </tr>
   <br>
   <tr>
      <td align="left"><b>(Class Teachers Name)</b></td>
      <td align="right"><b>(Head Master Name)</b></td>
    </tr>
   </table>
   <br>
   <br>
   <table border="0">
   <br>
   <br>
   <br>
   <br>
    <tr>
     <td align="left">Sign : ________________</td>
     <td align="right">Sign : _______________</td>
   </tr>
  </table>
  </div>
</div>
<h3>School Stamp</h3>
</body>';

$pdf->writeHTML($content);

$file_location = "C:\xampp\htdocs"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}
//----- End Code for generate pdf	
}
else
{
	echo 'Record not found for PDF.';
}

?>